@extends('layouts.backoffice.master', ['title' => 'Permintaan Barang'])

@section('content')
    <x-container>
        @role('admin')
            <div class="col-12">
                <x-card-action title="Daftar Permintaan Barang" url="{{ route('backoffice.order.index') }}">
                    <x-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Nama Barang</th>
                                <th>Kuantitas</th>
                                <th>Satuan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $i => $order)
                                <tr>
                                    <td>{{ $i + $orders->firstItem() }}</td>
                                    <td>
                                        <span class="avatar rounded avatar-md"
                                            style="background-image: url({{ $order->image }})"></span>
                                    </td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->unit }}</td>
                                    <td
                                        class="{{ $order->status == App\Enums\OrderStatus::Pending ? 'text-danger' : 'text-success' }}">
                                        {{ $order->status->value }}
                                    </td>
                                    <td>
                                        @if ($order->status == App\Enums\OrderStatus::Pending)
                                            <form action="{{ route('backoffice.order.update', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <x-button-save title="Konfirmasi" icon="check" class="btn btn-primary btn-sm" />
                                            </form>
                                        @elseif($order->status == App\Enums\OrderStatus::Verified)
                                            <x-button-modal :id="$order->id" title="Tambahkan Permintaan" icon="plus"
                                                style="mr-1" class="btn btn-info btn-sm" />
                                            <x-modal :id="$order->id" title="Tambahkan Barang">
                                                <form action="{{ route('backoffice.order.update', $order->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <x-input name="name" type="text" title="Nama Barang"
                                                        placeholder="Nama Barang" :value="$order->name" />
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <x-select title="Kategori Barang" name="category_id">
                                                                <option value="">Silahkan Pilih</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </x-select>
                                                        </div>
                                                        <div class="col-6">
                                                            <x-select title="Supplier Barang" name="supplier_id">
                                                                <option value="">Silahkan Pilih</option>
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}">
                                                                        {{ $supplier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </x-select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <x-input name="quantity" type="number" title="Kuantitas Barang"
                                                                placeholder="" :value="$order->quantity" />
                                                        </div>
                                                        <div class="col-6">
                                                            <x-input name="unit" type="text" title="Satuan Barang"
                                                                placeholder="Satuan Barang" :value="$order->unit" />
                                                        </div>
                                                    </div>
                                                    <x-input name="image" type="file" title="Foto Barang" placeholder=""
                                                        :value="$order->image" />
                                                    <x-textarea name="description" title="Deskripsi Barang"
                                                        placeholder="Deskripsi Barang">
                                                    </x-textarea>
                                                    <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                                                </form>
                                            </x-modal>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-table>
                </x-card-action>
                <div class="d-flex justify-content-end">{{ $orders->links() }}</div>
            </div>
        @endrole
        @role('customer')
            <div class="col-12 col-lg-8">
                <x-card title="Daftar Permintaan Produk" class="card-body p-0">
                    <x-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Nama Barang</th>
                                <th>Kuantitas</th>
                                <th>Satuan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $i => $order)
                                <tr>
                                    <td>{{ $i + $orders->firstItem() }}</td>
                                    <td>
                                        <span class="avatar rounded avatar-md"
                                            style="background-image: url({{ $order->image }})"></span>
                                    </td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->unit }}</td>
                                    <td
                                        class="{{ $order->status == App\Enums\OrderStatus::Pending ? 'text-danger' : 'text-success' }}">
                                        {{ $order->status->value }}
                                    </td>
                                    <td>
                                        @if ($order->status == App\Enums\OrderStatus::Pending)
                                            <x-button-delete :id="$order->id" :url="route('backoffice.order.destroy', $order->id)" title="Hapus Data"
                                                class="btn btn-danger btn-sm" />
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-table>
                </x-card>
            </div>
            <div class="col-lg-4 col-12">
                <x-card title="Tambah Permintaan Produk" class="card-body">
                    <form action="{{ route('backoffice.order.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-input name="image" type="file" title="Foto Produk" placeholder="" :value="old('image')" />
                        <x-input name="name" type="text" title="Nama Produk" placeholder="Nama Produk"
                            :value="old('name')" />
                        <x-input name="quantity" type="number" title="Kuantitas" placeholder="Kuantitas" :value="old('quantity')" />
                        <x-input name="unit" type="text" title="Satuan" placeholder="Satuan" :value="old('unit')" />
                        <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                    </form>
                </x-card>
            </div>
        @endrole
    </x-container>
@endsection
