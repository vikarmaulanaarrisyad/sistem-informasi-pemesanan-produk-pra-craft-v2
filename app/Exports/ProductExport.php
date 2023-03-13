<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductExport implements FromView
{

    public function view(): View
    {
        return view('products.export_excel', [
            'products' => Product::with('categories')->get(),
        ]);
    }
}
