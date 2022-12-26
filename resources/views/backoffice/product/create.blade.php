@extends('layouts.backoffice.master', ['title' => 'Tambah Produk'])

@section('content')
    <x-container>
        <div class="col-12">
            <x-card title="Tambah Produk" class="card-body">
                <form action="{{ route('backoffice.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-input title="Nama Produk" name="name" type="text" placeholder="Masukan Nama Produk"
                        value="{{ old('name') }}" />
                    <div class="row">
                        <div class="col-6">
                            <x-input title="Gambar Produk" name="image" type="file" placeholder=""
                                value="{{ old('image') }}" />
                        </div>
                        <div class="col-6">
                            <x-input title="Satuan Produk" name="unit" type="text" placeholder="Masukan Satuan Produk"
                                value="{{ old('unit') }}" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <x-select title="Kategori" name="category_id">
                                <option value="" selected>Silahkan Pilih Kategori Produk</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </x-select>
                        </div>
                        <div class="col-6">
                            <x-select title="Supplier" name="supplier_id">
                                <option value="" selected>Silahkan Pilih Supplier Produk</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" @selected(old('supplier_id') == $supplier->id)>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-textarea title="Deskripsi Produk" name="description" placeholder="Masukan Deskripsi Produk" />
                    </div>
                    <a href="{{ route('backoffice.product.index') }}" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevrons-left"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="11 7 6 12 11 17"></polyline>
                            <polyline points="17 7 12 12 17 17"></polyline>
                        </svg> Kembali
                    </a>
                    <x-button-save title="Simpan" />
                </form>
            </x-card>
        </div>
    </x-container>
@endsection