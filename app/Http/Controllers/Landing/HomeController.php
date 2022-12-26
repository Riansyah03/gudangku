<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $products = Product::with(['supplier', 'category'])
        ->latest()
        ->paginate(6)
        ->withQueryString();

        $categories = Category::withCount('products')
        ->latest()
        ->get();

    return view('landing.welcome', compact('products', 'categories'));
    }
}
