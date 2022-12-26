@extends('layouts.backoffice.master', ['title' => 'Barang Keluar'])

@section('content')
    <x-container>
        <div class="col-12">
            <x-card-action title="Daftar Barang Keluar" url="{{ route('backoffice.transaction') }}">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Invoice</th>
                            <th>Nama Produk</th>
                            <th>Kuantitas Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $i => $transaction)
                            <tr>
                                <td>{{ $i + $transactions->firstItem() }}</td>
                                <td>{{ $transaction->user->name }}</td>
                                <td>{{ $transaction->invoice }}</td>
                                <td>
                                    @foreach ($transaction->details as $detail)
                                        <li>{{ $detail->product->name }}</li>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($transaction->details as $detail)
                                        <li>{{ $detail->quantity }}</li>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card-action>
            <div class="d-flex justify-content-end">{{ $transactions->links() }}</div>
        </div>
    </x-container>
@endsection