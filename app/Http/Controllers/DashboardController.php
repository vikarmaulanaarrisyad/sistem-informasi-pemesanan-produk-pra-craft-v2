<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('dashboard');
        } else if (auth()->user()->hasRole('user')) {
            $userId = auth()->user()->id;

            $products = Product::all();
            $orders = Order::where('user_id', $userId)
                ->where('status', '!=', 'cancel')
                ->first();
            // dd($orders);
            return view('front.homepage', compact('products'));
        }
    }
}
