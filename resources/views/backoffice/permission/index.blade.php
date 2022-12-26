@extends('layouts.backoffice.master', ['title' => 'Permission'])

@section('content')
    <x-container>
        <div class="col-12 col-lg-8">
            <x-card-action title="Daftar Permission" url="{{ route('backoffice.permission.index') }}">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Perizinan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $i => $permission)
                            <tr>
                                <td>{{ $i + $permissions->firstItem() }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <x-button-modal id="{{ $permission->id }}" title="Ubah Data" />
                                    <x-modal id="{{ $permission->id }}" title="Ubah Data">
                                        <form action="{{ route('backoffice.permission.update', $permission->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <x-input title="Nama Perizinan" name="name" type="text"
                                                placeholder="Masukan Nama Perizinan" value="{{ $permission->name }}" />
                                            <x-button-save title="Simpan" />
                                        </form>
                                    </x-modal>
                                    <x-button-delete id="{{ $permission->id }}" title="Hapus Data"
                                        url="{{ route('backoffice.permission.destroy', $permission->id) }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card-action>
            <div class="d-flex justify-content-end">{{ $permissions->links() }}</div>
        </div>
        <div class="col-12 col-lg-4">
            <form action="{{ route('backoffice.permission.store') }}" method="POST">
                @csrf
                <x-card title="Tambah Perizinan" class="card-body">
                    <x-input title="Nama Perizinan" name="name" type="text" placeholder="Masukan Nama Perizinan"
                        value="{{ old('name') }}" />
                    <x-button-save title="Simpan" />
                </x-card>
            </form>
        </div>
    </x-container>
@endsection
