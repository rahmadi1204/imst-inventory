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
                            <h3 class="card-title" id="ncrv_title">Tambah Return Ke Vendor</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div id="from_vendor">

                            <form action="{{ route('ncr_vendor.return.update', $data->code_ncrv) }}" method="post">
                                @csrf

                                @include('components.ncr_vendor_return_form')

                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                </div>
                            </form>
                        </div>
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
                                    <th>Barang & No. Lot</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($ncrvProduct as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->product->name_product }}</td>
                                        <td>{{ $item->qty_product }}</td>
                                        <td>{{ $item->unit_product }}</td>
                                        <td>
                                            <div class=" btn btn-success" data-toggle="modal" id="update-modal-product"
                                                data-target="#modal-update-product" data-id="{{ $item->product_id }}"
                                                data-code="{{ $item->code_ncrv_product }}"
                                                data-type="{{ $item->product->type_product }}"
                                                data-name="{{ $item->product->name_product }}"
                                                data-qty="{{ $item->qty_product }}"
                                                data-unit="{{ $item->unit_product }}">
                                                <i class="fa fa-edit"></i>
                                            </div>

                                            <div class="btn btn-danger modal-delete1" data-toggle="modal"
                                                data-target="#modal-delete-product" data-id="{{ $item->product_id }}"
                                                data-code="{{ $item->code_ncrv_product }}"
                                                data-name="{{ $item->product->name_product }}">
                                                <i class="fa fa-trash"></i>
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
    <form action="{{ route('ncr_vendor.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>
    <form action="{{ route('ncrv.product.destroy', $data->code_ncrv) }}" method="post">
        @csrf
        @include('components.modal.delete_modal1')
    </form>
    <form action="{{ route('ncrv.product.update', $data->code_ncrv) }}" method="post">
        @csrf
        @include('components.modal.update_ncrv_product')
    </form>

@endsection
@section('scripts')
    @include('scripts.ncrv_update')
    @include('scripts.delete_modal1')
@endsection
