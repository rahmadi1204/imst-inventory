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
                            <div class="card-title">
                                <h4>Edit Data Pre Order</h4>
                            </div>
                            <div class="card-tools">
                                <div class="btn btn-light" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus"></i> Master Barang
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('po.update', $po->code_po) }}" method="post">
                            @csrf

                            @include('components.po_form')

                            <div class="card-footer ">
                                Note: Pilih Mata Uang Terakhir Untuk Menyesuaikan Symbol Mata Uang (Tidak Berpengaruh Pada
                                Database)
                                <button type="submit" class="btn btn-primary float-right">
                                    Simpan
                                </button>
                                <a href="{{ route('po') }}" class="btn btn-secondary float-right mr-2">
                                    Kembali</a>
                            </div>
                        </form>
                    </div>
                    <div class="card card-secondary">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Data Barang Pre Order</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @isset($po)
                                <table id="tableSearch" class="table table-bordered table-hover nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Deskripsi Barang (Tipe Barang dan Nama Barang)</th>
                                            <th>Jumlah Barang</th>
                                            <th>Harga Barang</th>
                                            <th>Jumlah Total</th>
                                            <th>Latest Of Shipment</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $item)
                                            <tr>
                                                <td>{{ $item->code_product }}</td>
                                                <td>{{ $item->type_product }} - {{ $item->name_product }}</td>
                                                <td>{{ $item->qty_product }}</td>
                                                <td>{{ $item->unit_price }}</td>
                                                <td>{{ $item->total_amount }}</td>
                                                <td>{{ date('d F Y', strtotime($item->latest)) }}</td>
                                                <td> <a href="{{ route('poProduct.update', $item->code_po_product) }}"
                                                        class="btn btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <div class="btn btn-danger delete-modal" data-toggle="modal"
                                                        data-target="#modal-delete" data-id="{{ $item->code_po_product }}"
                                                        data-name="{{ $item->description }}"><i class="fa fa-trash"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endisset
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        </div>
    </section>
    {{-- Create Modal --}}
    <form action="{{ route('master.store') }}" method="post">
        @csrf
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Master Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col">
                            <label for="type_product">Tipe Produk</label>
                            <select name="type_product" class="form-control">
                                <option selected>Pilih</option>
                                @foreach ($typeProduct as $item)
                                    <option value="{{ $item->type_product }}">
                                        {{ $item->type_product }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="code_product">Kode Produk</label>
                            <input name="code_product" type="text" class="form-control" required>
                        </div>
                        <div class="form-group col">
                            <label for="name_product">Nama Produk</label>
                            <input name="name_product" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </form>

    {{-- Delete Modal --}}
    <form action="{{ route('poProduct.destroy', $po->id) }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>
@endsection
@section('scripts')
    @include('scripts.po_create')
@endsection
