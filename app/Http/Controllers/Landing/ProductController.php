<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['supplier', 'category'])
            ->search('name')
            ->latest()
            ->get();

        return view('landing.product.index',compact('products'));
    }

    public function show(Product $product)
    {
        return view('landing.product.show', compact('product'));
    }
}
