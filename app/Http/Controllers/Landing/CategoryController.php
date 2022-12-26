<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')
            ->latest()
            ->search('name')
            ->get();

        return view('landing.category.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $products = Product::where('category_id', $category->id)
            ->latest()
            ->search('name')
            ->get();
        return view('landing.category.show', compact('products', 'category'));
    }
}
