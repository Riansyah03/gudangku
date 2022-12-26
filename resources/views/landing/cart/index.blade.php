@extends('layouts.landing.master', ['title' => 'Keranjang'])

@section('content')
    <x-landing.container>
        <x-landing.grid class="lg:grid-cols-12 gap-6">
            <div class="col-span-12 lg:col-span-8">
                <x-landing.cart-table :carts=$carts :grandQuantity=$grandQuantity />
            </div>
            <div class="col-span-12 lg:col-span-4">
                <x-landing.cart-form :carts=$carts />
            </div>
        </x-landing.grid>
    </x-landing.container>
@endsection
