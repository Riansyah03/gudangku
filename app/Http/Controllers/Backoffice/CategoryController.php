<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\Category;
use App\Traits\HasImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use HasImage;

    private $path = 'public/categories/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::search('name')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('backoffice.category.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $image = $this->uploadImage($request, $this->path);

        Category::create([
            'name' => $request->name,
            'image' => $image->hashName(),
        ]);

        return back()->with('toast_success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $image = $this->uploadImage($request, $this->path);

        $category->update([
            'name' => $request->name,
        ]);

        if($request->file('image')){
            $this->updateImage($this->path, $category, $name = $image->hashName());
        }

        return back()->with('toast_success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Storage::disk('local')->delete($this->path. basename($category->image));

        $category->delete();

        return back()->with('toast_success', 'Data berhasil dihapus');
    }
}