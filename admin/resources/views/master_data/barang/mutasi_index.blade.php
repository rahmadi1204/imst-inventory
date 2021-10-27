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
                                    <th>KODE BARANG</th>
                                    <th>NAMA BARANG</th>
                                    <th>SATUAN</th>
                                    <th>SALDO AWAL</th>
                                    <th>PEMASUKAN</th>
                                    <th>PENGELUARAN</th>
                                    <th>PENYESUAIAN</th>
                                    <th>SALDO AKHIR</th>
                                    <th>OPNAME STOCK</th>
                                    <th>SELISIH</th>
                                    <th>KETERANGAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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
