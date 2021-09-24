@extends('layouts.app')

@section('head')

@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Input Barang</h3>
                            <div class="card-tools">

                            </div>
                        </div>

                        <form action="{{ route('bahan_penolong.store') }}" method="post">
                            @csrf

                            @include('components.master_product_form')

                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary float-right">
                                    Simpan
                                </button>
                                <a href="{{ route('bahan_penolong') }}" class="btn btn-secondary float-right mr-2">
                                    Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Hari Ini</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tableSearch" class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>No PO</th>
                                    <th>No PIB</th>
                                    <th>Tanggal</th>
                                    <th>Kode Bahan Penolong</th>
                                    <th>Nama</th>
                                    <th>Asal</th>
                                    <th>Lokasi</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                    <th>Status</th>
                                    <th>Admin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->no_po }}</td>
                                        <td>{{ $item->no_pib }}</td>
                                        <td>{{ $item->date_in }}</td>
                                        <td>{{ $item->product_code }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->product_from }}</td>
                                        <td>{{ $item->product_now }}</td>
                                        <td>{{ number_format($item->stock, 0, ',', '.') }}</td>
                                        <td>{{ $item->unit }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>
                                            <a href="{{ route('bahan_penolong.edit', $item->product_code) }}"
                                                class="btn btn-success">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <div class="btn btn-danger delete-modal" data-toggle="modal"
                                                data-target="#modal-delete-user" data-id="{{ $item->product_code }}"
                                                data-name="{{ $item->product_name }}"><i class="fa fa-trash"></i>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    {{-- Delete Modal --}}
    <form action="{{ route('bahan_penolong.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>

@endsection
@section('scripts')
    @include('scripts.datatable')
@endsection
