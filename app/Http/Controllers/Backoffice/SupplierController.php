<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::search('name')
        ->latest()
        ->paginate(8)
        ->withQueryString();

        return view('backoffice.supplier.index', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        Supplier::create([
            'name' => $request->name,
            'telp' => $request->telp,
            'address' => $request->address,
        ]);

        return back()->with('toast_success', 'Data berhasil disimpan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, Supplier $supplier)
    {
        $supplier->update([
            'name' => $request->name,
            'telp' => $request->telp,
            'address' => $request->address,
        ]);

        return back()->with('toast_success','Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return back()->with('toast_success', 'Data berhasil dihapus');
    }
}