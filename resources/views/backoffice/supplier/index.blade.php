@extends('layouts.backoffice.master', ['title' => 'Supplier'])

@section('content')
    <x-container>
        <div class="col-12 col-lg-8">
            <x-card-action title="Daftar Supplier" url="{{ route('backoffice.supplier.index') }}">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Supplier</th>
                            <th>Alamat Supplier</th>
                            <th>Telp Supplier</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $i => $supplier)
                            <tr>
                                <td>{{ $i + $suppliers->firstItem() }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->address }}</td>
                                <td>{{ $supplier->telp }}</td>
                                <td>
                                    @can('supplier-update')
                                        <x-button-modal id="{{ $supplier->id }}" title="Ubah Data" />
                                        <x-modal id="{{ $supplier->id }}" title="Ubah Data">
                                            <form action="{{ route('backoffice.supplier.update', $supplier->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <x-input title="Nama Supplier" name="name" type="text"
                                                    placeholder="Masukan Nama Supplier" value="{{ $supplier->name }}" />
                                                <x-input title="Telp Supplier" name="telp" type="number"
                                                    placeholder="Masukan Telp Supplier" value="{{ $supplier->telp }}" />
                                                <x-input title="Alamat Supplier" name="address" type="text"
                                                    placeholder="Masukan Alamat Supplier" value="{{ $supplier->address }}" />
                                                <x-button-save title="Simpan" />
                                            </form>
                                        </x-modal>
                                    @endcan
                                    @can('supplier-delete')
                                        <x-button-delete id="{{ $supplier->id }}" title="Hapus Data"
                                            url="{{ route('backoffice.supplier.destroy', $supplier->id) }}" />
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card-action>
            <div class="d-flex justify-content-end">{{ $suppliers->links() }}</div>
        </div>
        @can('supplier-create')
            <div class="col-12 col-lg-4">
                <form action="{{ route('backoffice.supplier.store') }}" method="POST">
                    @csrf
                    <x-card title="Tambah Supplier" class="card-body">
                        <x-input title="Nama Supplier" name="name" type="text" placeholder="Masukan Nama Supplier"
                            value="{{ old('name') }}" />
                        <x-input title="Telp Supplier" name="telp" type="number" placeholder="Masukan Telp Supplier"
                            value="{{ old('telp') }}" />
                        <x-input title="Alamat Supplier" name="address" type="text" placeholder="Masukan Alamat Supplier"
                            value="{{ old('address') }}" />
                        <x-button-save title="Simpan" />
                    </x-card>
                </form>
            </div>
        @endcan
    </x-container>
@endsection
