@extends('layouts.landing.master', ['title' => 'Gudangku'])

@section('content')
    @include('layouts.landing.partials.hero')
    <x-landing.container>
        <x-landing.grid class="lg:grid-cols-12 gap-6">
            <div class="col-span-12 lg:col-span-8">
                <x-landing.header title="Daftar Produk" subtitle="Kumpulan data produk yang ada di gudang.." url="" />
                <x-landing.grid class="md:grid-cols-2 gap-6 items-start">
                    @foreach ($products as $product)
                        <x-landing.product-item :product=$product />
                    @endforeach
                </x-landing.grid>
                @if ($products->count() >= 6)
                    <div class="mt-8 text-center flex justify-center">
                        <a href="{{ route('product.index') }}"
                            class="bg-gray-700 px-4 py-2 rounded-lg text-gray-50 flex items-center hover:bg-gray-900">
                            Lihat Semua Produk
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevrons-right"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="7 7 12 12 7 17"></polyline>
                                <polyline points="13 7 18 12 13 17"></polyline>
                            </svg>
                        </a>
                    </div>
                @endif
            </div>
            <div class="col-span-12 lg:col-span-4 row-start-1">
                <div class="flex flex-col py-4 lg:py-0 lg:px-4">
                    <h1 class="text-gray-700 font-semibold text-lg">Daftar Kategori</h1>
                    <p class="text-gray-500 text-xs">Kumpulan data kategori yang berada di gudang</p>
                </div>
                <div class="lg:p-4 flex flex-row gap-8 overflow-x-auto sm:grid sm:grid-cols-2 md:gap-2">
                    @foreach ($categories as $category)
                        <x-landing.category-item :category=$category />
                    @endforeach
                </div>
            </div>
        </x-landing.grid>
    </x-landing.container>
@endsection