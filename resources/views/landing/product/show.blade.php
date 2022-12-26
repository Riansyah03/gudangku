@extends('layouts.landing.master', ['title' => 'Produk'])

@section('content')
    <x-landing.container>
        <div class="lg:w-4/5 mx-auto flex flex-wrap justify-center bg-white p-6 rounded-lg border">
            <img alt="{{ $product->name }}" class="w-1/2 object-cover object-center rounded border border-gray-200"
                src="{{ $product->image }}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2 class="text-sm text-gray-500 tracking-widest underline">{{ $product->category->name }}</h2>
                <h1 class="text-gray-700 text-2xl font-bold mb-1">{{ $product->name }}</h1>
                <p class="leading-relaxed text-justify text-gray-500 text-sm">{{ $product->description }}</p>
                <div class="flex mt-6 items-center pb-5 border-b-2 mb-5 justify-between">
                    <span class="text-xl font-bold text-gray-700 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-import mr-1"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                            <path d="M4 6v8m5.009 .783c.924 .14 1.933 .217 2.991 .217c4.418 0 8 -1.343 8 -3v-6"></path>
                            <path
                                d="M11.252 20.987c.246 .009 .496 .013 .748 .013c4.418 0 8 -1.343 8 -3v-6m-18 7h7m-3 -3l3 3l-3 3">
                            </path>
                        </svg>
                        Stok Produk
                    </span>
                    <h1 class="{{ $product->quantity > 0 ? 'text-green-700' : 'text-rose-700' }} text-xl font-bold">
                        {{ $product->quantity }}
                    </h1>
                </div>
                <div class="flex items-center">
                    @if ($product->quantity > 0)
                        <form action="{{ route('cart.store', $product->id) }}" method="POST" class="w-full">
                            @csrf
                            <button
                                class="text-gray-700 bg-gray-200 p-2 rounded-lg text-sm text-center hover:bg-gray-300 w-full"
                                type="submit">
                                Tambah ke keranjang
                            </button>
                        </form>
                    @else
                        <button
                            class="text-gray-700 bg-gray-200 p-2 rounded-lg text-sm text-center hover:bg-gray-300 w-full cursor-not-allowed">
                            Barang Tidak Tersedia
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </x-landing.container>
@endsection
