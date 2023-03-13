<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('order.index');
    }

    /**
     * Show datatables.
     */
    public function data()
    {
        $order = Order::with('user')->orderBy('created_at', 'DESC');

        return datatables($order)
            ->addIndexColumn()
            ->addColumn('user', function ($order) {
                return $order->user->name;
            })
            ->addColumn('invoice_number', function ($order) {
                return '
                    <span class="badge 2x1 badge-success">' . $order->invoice_number . '</span>
                ';
            })
            ->addColumn('status', function ($order) {
                return '<span class="badge 2xl badge-' . $order->statusColor() . '">' . $order->statusText() . '</span>';
            })
            ->addColumn('aksi', function ($order) {
                return '';
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function cartStore(Request $request, $slug)
    {

        DB::beginTransaction();

        try {
            $product = Product::where('slug', $slug)->first();
            $tanggal = date('Y-m-d');

            // validasi orders 
            $cekOrder = Order::where('user_id', Auth::user()->id)->where('status', 'submit')->first();

            if (empty($cekOrder)) {
                // buat orders dan simpan database Orders
                $order = new Order();
                $order->date = $tanggal;
                $order->user_id = Auth::user()->id;
                $order->invoice_number = 'INV' . rand(9999999, 1000000);
                $order->total_price = 0;
                $order->status = 'submit';
                $order->save();

                DB::commit();
            }
            // Simpan database pesanan detail

            $orderNew = Order::where('user_id', Auth::user()->id)->where('status', 'submit')->first();

            $cekOrderDetail = OrderDetail::where('product_id', $product->id)->where('order_id', $orderNew->id)->first();

            // cek Order Produk / DetailPesanan
            if (empty($cekOrderDetail)) {
                $orderDetail = new OrderDetail();
                $orderDetail->product_id = $product->id;
                $orderDetail->order_id = $orderNew->id;
                $orderDetail->quantity = $request->qty ?? 1;
                $orderDetail->total_price = $product->price * 1;
                $orderDetail->save();
                DB::commit();
            } else {
                $orderDetail = OrderDetail::where('product_id', $product->id)->where('order_id', $orderNew->id)->first();

                $orderDetail->quantity = $orderDetail->quantity + $request->qty;

                // Harga Terbaru
                $harga_orderDetail_baru = $product->price * $request->qty;
                $orderDetail->total_price = $orderDetail->total_price + $harga_orderDetail_baru;
                $orderDetail->update();
                DB::commit();
            }
            // Jumlah total pesanan
            $pesanan = Order::where('user_id', Auth::user()->id)->where('status', 'submit')->first();
            $pesanan->total_price = $pesanan->total_price + $product->price *  1;
            $pesanan->update();

            DB::commit();


            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    public function cart(Request $request)
    {
        $order = Order::with('user')->where('user_id', Auth()->user()->id)->where('status', 'submit')->first();
        $orderDetail = OrderDetail::with('order','product')->where('order_id',$order->id)->get();


        return view('order.cart', compact('orderDetail'));
    }
}
