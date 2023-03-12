<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::pluck('name','id');
        return view('products.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function data(Request $request)
    {
        $products = Product::all();

        return datatables($products)
            ->addIndexColumn()
            ->addColumn('description', function ($products) {
                return
                    '<small>' . $products->description . '</small>';
            })
            ->addColumn('price', function ($products) {
                return format_uang($products->price);
            })
            ->addColumn('stock', function ($products) {
                return $products->stock;
            })
            ->editColumn('image', function ($products) {
                return '<img src="' . Storage::url($products->image) . '" class="img-thumbnail" width="50px">';
            })
            ->addColumn('aksi', function ($products) {
                return '
                <button onclick="editForm(`' . route('products.show', $products->id) . '`)" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Lihat Detail</button>
                <button onclick="deleteData(`' . route('products.destroy', $products->id) . '`, `' . $products->name . '`)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                ';
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3',
                'categories' => 'required|array',
                'description' => 'required|min:5',
                'price' => 'required|regex:/^[0-9.]+$/',
                'stock' => 'required|numeric',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048|min:200',
            ],
            [
                'name.required' => 'Nama produk wajib diisi',
                'name.min' => 'Nama produk minimal 3 karakter',
                'categories.required' => 'Kategori produk wajib diisi',
                'description.required' => 'Deskripsi produk wajib diisi',
                'description.min' => 'Deskripsi produk minimal 5 karakter',
                'price.required' => 'Harga wajib diisi.',
                'stock.required' => 'Stok wajib diisi.',
                'stock.numeric' => 'Stok berupa angka.',
                'image.required' => 'File wajib diisi.',
                'image.mimes' => 'File harus berupa berkas berjenis: png, jpg, jpeg.',
                'image.min' => 'File harus berukuran minimal 200 kb.',
                'image.max' => 'File harus berukuran maksimal 2 MB.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Data ' . $request->name . ' gagal tersimpan'], 422);
        }

        if (!$request->hasFile('image')) {
            return response()->json(['message' => 'File tidak boleh kosong!.'], 422);
        }

        $fileImage = $request->file('image');

        if (!$fileImage->isValid()) {
            return response()->json(['message' => 'Upload file gagal!.'], 422);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->price = str_replace('.', '', $request->price);
        $product->stock = $request->stock;
        $product->image = upload('product', $fileImage, 'product');
        $product->save();

        $product->categories()->attach($request->categories);

        return response()->json(['data' => $product, 'message' => 'Data ' . $request->name . ' berhasil tersimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->categories = $product->categories;
        $product->image = Storage::url($product->image);

        return response()->json(['data' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3',
                'categories' => 'required|array',
                'description' => 'required|min:5',
                'price' => 'required|regex:/^[0-9.]+$/',
                'stock' => 'required|numeric',
                'image' => 'nullable|mimes:png,jpg,jpeg|max:2048|min:200',
                'slug' => 'unique:products,slug,' . $product->id
            ],
            [
                'name.required' => 'Nama produk wajib diisi',
                'name.min' => 'Nama produk minimal 3 karakter',
                'categories.required' => 'Kategori produk wajib diisi',
                'description.required' => 'Deskripsi produk wajib diisi',
                'description.min' => 'Deskripsi produk minimal 5 karakter',
                'price.required' => 'Harga wajib diisi.',
                'stock.required' => 'Stok wajib diisi.',
                'stock.numeric' => 'Stok berupa angka.',
                'image.required' => 'File wajib diisi.',
                'image.mimes' => 'File harus berupa berkas berjenis: png, jpg, jpeg.',
                'image.min' => 'File harus berukuran minimal 200 kb.',
                'image.max' => 'File harus berukuran maksimal 2 MB.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Data ' . $request->name . ' gagal tersimpan'], 422);
        }

        $data = $request->except('image', 'categories');

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => str_replace('.', '', $request->price),
            'stock' => $request->stock,
            'slug' => Str::slug($request->name)
        ];

        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = upload('product', $request->file('image'), 'product');
        }

        $product->update($data);

        $product->categories()->sync($request->categories);

        return response()->json(['data' => $data, 'message' => 'Data ' . $request->name . ' berhasil tersimpan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        if (Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        return response()->json(['message' => 'Data ' . $product->name . ' berhasil dihapus.']);
    }
}
