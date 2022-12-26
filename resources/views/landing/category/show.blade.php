@extends('layouts.landing.master', ['title' => 'Kategori'])

@section('content')
    @include('layouts.landing.partials.hero')
    <x-landing.container>
        <x-landing.grid class="lg:grid-cols-12 gap-6">
            <div class="col-span-12">
                <x-landing.header title="Daftar Produk" subtitle="Kumpulan data produk yang ada di gudang.." url="" />
                <x-landing.grid class="md:grid-cols-4 gap-6 items-start">
                    @foreach ($products as $product)
                        <x-landing.product-item :product=$product />
                    @endforeach
                </x-landing.grid>
            </div>
        </x-landing.grid>
    </x-landing.container>
@endsection
