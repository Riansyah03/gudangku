<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Traits\HasImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use HasImage;

    public $path = 'public/products/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['supplier', 'category'])
            ->search('name')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('backoffice.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();

        $categories = Category::all();

        return view('backoffice.product.create', compact('suppliers', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $image = $this->uploadImage($request, $this->path);

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'description' => $request->description,
            'unit' => $request->unit,
            'image' => $image->hashName(),
        ]);

        return redirect(route('backoffice.product.index'))->with('toast_success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $suppliers = Supplier::all();

        $categories = Category::all();

        return view('backoffice.product.edit', compact('suppliers', 'categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $image = $this->uploadImage($request, $this->path);

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'description' => $request->description,
            'unit' => $request->unit,
        ]);

        if($request->file('image')){
            $this->updateImage($this->path, $product, $name = $image->hashName());
        }

        return redirect(route('backoffice.product.index'))->with('toast_success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::disk('local')->delete($this->path. basename($product->image));

        $product->delete();

        return redirect(route('backoffice.product.index'))->with('toast_success', 'Data berhasil dihapus');
    }
}