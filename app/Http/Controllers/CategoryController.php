<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.index');
    }

    /**
     * Show data with datatable.
     */
    public function data(Request $request)
    {
        $category = Category::when($request->has('status') && $request->status != "", function ($query) use ($request) {
            $query->where('status', $request->status);
        })->orderBy('created_at', 'asc');

        return datatables($category)
            ->addIndexColumn()
            ->addColumn('gambar', function ($category) {
                return '<img src="' . Storage::url($category->image) . '" class="img-thumbnail" width="50px">';
            })
            ->addColumn('status', function ($category) {
                return '
                    <button data-nama="' . $category->name . '" id="updateStatus" onclick="updateStatus(`' . route('category.update_status', $category->id) . '`, `' . $category->name . '`)"
                    class="btn btn-xs updateStatus btn-' . $category->statusColor() . '">' . $category->statusText() . '</button>
                ';
            })
            ->addColumn('aksi', function ($category) {
                return '
                <button onclick="editForm(`' . route('category.show', $category->id) . '`)" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Lihat Detail</button>
                <button onclick="deleteData(`' . route('category.destroy', $category->id) . '`, `' . $category->name . '`)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
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
                'name' => 'required|min:1',
                'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
                'slug' => 'unique:categories,slug'
            ],
            [
                'name.required' => 'Nama kategori wajib diisi.',
                'image.mimes' => 'File harus berupa berkas berjenis: png, jpg, jpeg.',
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

        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->image = upload('category', $fileImage, 'category');
        $category->save();

        if ($category->save()) {
            return response()->json(['data' => $category, 'message' => 'Data ' . $request->name . ' berhasil tersimpan']);
        }

        return response()->json(['data' => $category, 'message' => 'Data ' . $request->name . ' gagal tersimpan'], 422);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        if ($category == NULL) {
            return response()->json(['message' => 'Tidak dapat menampilkan data'], 422);
        }

        $category->image = Storage::url($category->image);
        return response()->json(['data' => $category]);
    }

    /**
     * updateing status.
     */
    public function updateStatus(Category $category)
    {
        if ($category->status != 'publish') {
            $category->update([
                'status' => 'publish'
            ]);
        } else {
            $category->update([
                'status' => 'archived'
            ]);
        }

        return response()->json(['data' => $category, 'message' => 'Data ' . $category->name . ' berhasil diubah.']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrfail($id);

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:1',
                'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
                'slug' => 'unique:categories,slug,' . $category->id
            ],
            [
                'name.required' => 'Nama kategori wajib diisi.',
                'image.mimes' => 'File harus berupa berkas berjenis: png, jpg, jpeg.',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Data ' . $request->name . ' gagal tersimpan.'], 422);
        }

        $data = $request->except('image');

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            $data['image'] = upload('category', $request->file('image'), 'category');
        }

        $category->update($data);

        return response()->json(['data' => $data, 'message' => 'Data ' . $request->name . ' berhasil tersimpan.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        if (Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        return response()->json(['message' => 'Data ' . $category->name . ' berhasil dihapus.']);
    }
}
