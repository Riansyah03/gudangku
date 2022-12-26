@extends('layouts.backoffice.master', ['title' => 'Laporan'])

@section('content')
    <x-container>
        <div class="col-12">
            <form action="{{ route('backoffice.report.filter') }}" method="GET">
                <div class="row">
                    <div class="col-6">
                        <x-input title="Tanggal Awal" name="from_date" type="date" placeholder=""
                            value="{{ $fromDate }}" />
                    </div>
                    <div class="col-6">
                        <x-input title="Tanggal Akhir" name="to_date" type="date" placeholder=""
                            value="{{ $toDate }}" />
                    </div>
                </div>
                <x-button-save title="Report Data" />
            </form>
        </div>
        @isset($fromDate, $toDate)
            <div class="col-12 my-3">
                <div class="d-flex justify-content-end mb-2">
                    <a href="{{ route('backoffice.report.pdf', [$fromDate, $toDate]) }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-download"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                            <path d="M12 17v-6"></path>
                            <path d="M9.5 14.5l2.5 2.5l2.5 -2.5"></path>
                        </svg>
                        Cetak Laporan
                    </a>
                </div>
                <x-card title="LAPORAN DATA BARANG" class="card-body p-0">
                    <x-table>
                        <thead>
                            <tr>
                                <th style="width: 0px;">No</th>
                                <th>Nama Barang</th>
                                <th class="text-right">Kuantitas Barang Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $i => $report)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>
                                        @foreach ($report->details as $detail)
                                            <p>{{ $detail->product->name }}</p>
                                        @endforeach
                                    </td>
                                    <td class="text-right">
                                        @foreach ($report->details as $detail)
                                            <p>{{ $detail->product->quantity }} Item</p>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-table>
                </x-card>
            </div>
        @endisset
    </x-container>
@endsection