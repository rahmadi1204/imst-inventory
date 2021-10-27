@extends('layouts.app')

@section('head')

@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>{{ $title ?? 'Data' }}</h4>
                        </div>
                        <div class="card-tools">

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tableSearch" class="table table-bordered table-hover nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th>NO</th>
                                    <th>TANGGAL</th>
                                    <th>KODE BARANG</th>
                                    <th>JENIS BARANG</th>
                                    <th>NAMA BARANG</th>
                                    <th>TRANSAKSI</th>
                                    <th>DARI</th>
                                    <th>KE</th>
                                    <th>JUMLAH</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        {{-- <td>{{ $item->code_po_product }}</td>
                                        <td>{{ $item->code_pib_product }}</td>
                                        <td>{{ $item->code_ncrv_product }}</td>
                                        <td>{{ $item->code_ncrc_product }}</td> --}}
                                        <td>{{ date('d F Y', strtotime($item->date_product)) }}</td>
                                        <td>{{ $item->code_product }}</td>
                                        <td>{{ $item->type_product }}</td>
                                        <td>{{ $item->name_product }}</td>
                                        <td>
                                            @if ($item->type_history == 1)
                                                <span class="btn btn-success">Barang Masuk (PIB)</span>
                                            @elseif ($item->type_history == -2)
                                                <span class="btn btn-info">Barang Keluar (NCR VENDOR)</span>
                                            @elseif ($item->type_history == 2)
                                                <span class="btn btn-primary">Barang Masuk (NCR VENDOR)</span>
                                            @elseif ($item->type_history == -3)
                                                <span class="btn btn-dark">Barang Keluar (NCR CUSTOMER)</span>
                                            @else
                                                <span class="btn btn-secondary">Barang Masuk (NCR CUSTOMER)</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->type_history < 1)
                                                {{ $item->name_warehouse }}
                                            @else
                                                {{ $item->name_supplier }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->type_history < 1)
                                                {{ $item->name_supplier }}
                                            @else
                                                {{ $item->name_warehouse }}
                                            @endif
                                        </td>
                                        <td>{{ $item->qty_product }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')

@endsection
