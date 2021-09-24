@extends('layouts.app')

@section('head')

@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title ?? 'Data' }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('bahan_baku.create') }}"
                                    class="btn btn-light text-dark
                                mr-3">
                                    <i class="fa fa-plus"></i> Bahan Baku
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tableSearch" class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>NO</th>
                                        <th>NO PIB</th>
                                        <th>NO REGISTRASI</th>
                                        <th>KODE PRODUK</th>
                                        <th>JENIS PRODUK</th>
                                        <th>NAMA PRODUK</th>
                                        <th>MERK PRODUK</th>
                                        <th>NEGARA ASAL</th>
                                        <th>JUMLAH</th>
                                        <th>SATUAN</th>
                                        <th>NILAI PABEAN</th>
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
                                            <td>{{ $item->no_approval }}</td>
                                            <td>{{ $item->no_register }}</td>
                                            <td>{{ $item->code_product }}</td>
                                            <td>{{ $item->type_product }}</td>
                                            <td>{{ $item->name_product }}</td>
                                            <td>{{ $item->brand_product }}</td>
                                            <td>{{ $item->country_product }}</td>
                                            <td>{{ number_format($item->qty_product, 0, ',', '.') }}</td>
                                            <td>{{ $item->unit_product }}</td>
                                            <td>{{ $item->value_pabean }}</td>
                                            {{-- <td>{{ $item->user->name }}</td> --}}
                                            <td>
                                                <a href="{{ route('bahan_baku.edit', $item->code_product) }}"
                                                    class="btn btn-success">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <div class="btn btn-danger delete-modal" data-toggle="modal"
                                                    data-target="#modal-delete-user" data-id="{{ $item->code_product }}"
                                                    data-name="{{ $item->name_product }}"><i class="fa fa-trash"></i>
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
    <form action="{{ route('bahan_baku.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>

@endsection
@section('scripts')
    @include('scripts.datatable')
@endsection
