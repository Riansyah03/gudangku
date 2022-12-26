@extends('layouts.backoffice.master', ['title' => 'Kategori'])

@section('content')
    <x-container>
        <div class="col-12 col-lg-8">
            <x-card-action title="Daftar Kategori" url="{{ route('backoffice.category.index') }}">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $i => $category)
                            <tr>
                                <td>{{ $i + $categories->firstItem() }}</td>
                                <td>
                                    <span class="avatar rounded avatar-md"
                                        style="background-image: url({{ $category->image }})"></span>
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @can('category-update')
                                        <x-button-modal id="{{ $category->id }}" title="Ubah Data" />
                                        <x-modal id="{{ $category->id }}" title="Ubah Data">
                                            <form action="{{ route('backoffice.category.update', $category->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <x-input title="Nama Kategori" name="name" type="text"
                                                    placeholder="Masukan Nama Kategori" value="{{ $category->name }}" />
                                                <x-input title="Gambar Kategori" name="image" type="file" placeholder=""
                                                    value="{{ $category->image }}" />
                                                <x-button-save title="Simpan" />
                                            </form>
                                        </x-modal>
                                    @endcan
                                    @can('category-delete')
                                        <x-button-delete id="{{ $category->id }}" title="Hapus Data"
                                            url="{{ route('backoffice.category.destroy', $category->id) }}" />
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card-action>
            <div class="d-flex justify-content-end">{{ $categories->links() }}</div>
        </div>
        @can('category-create')
            <div class="col-12 col-lg-4">
                <form action="{{ route('backoffice.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-card title="Tambah Kategori" class="card-body">
                        <x-input title="Nama Kategori" name="name" type="text" placeholder="Masukan Nama Kategori"
                            value="{{ old('name') }}" />
                        <x-input title="Gambar Kategori" name="image" type="file" placeholder=""
                            value="{{ old('image') }}" />
                        <x-button-save title="Simpan" />
                    </x-card>
                </form>
            </div>
        @endcan
    </x-container>
@endsection
