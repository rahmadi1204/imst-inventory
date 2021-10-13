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
                                <div class="btn btn-light" id="showMasuk">Return Dari Vendor</div>
                                <div class="btn btn-secondary" id="showKeluar" style="display: none">Return Ke Vendor
                                </div>
                            </div>
                        </div>
                        <div id="to_vendor">

                            <form action="{{ route('ncr_vendor.store') }}" method="post">
                                @csrf

                                @include('components.ncr_vendor_form')
                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <div id="from_vendor" style="display: none">

                            <form action="{{ route('ncr_vendor_return.store') }}" method="post">
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
        {{-- <div class="row">
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
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->no_po }}</td>
                                        <td>{{ $item->no_po }}</td>
                                        <td>{{ $item->no_po }}</td>
                                        <td>{{ $item->no_po }}</td>
                                        <td>{{ $item->no_po }}</td>
                                        <td>{{ $item->no_po }}</td>
                                        <td>{{ $item->no_po }}</td>
                                        <td>{{ $item->no_po }}</td>
                                        <td>{{ $item->no_po }}</td>
                                        <td>{{ $item->no_po }}</td>
                                        <td>{{ $item->no_po }}</td>
                                        <td>{{ $item->no_po }}</td>
                                        <td>{{ $item->no_po }}</td>
                                        <td>
                                            <a href="{{ route('po.edit', $item->id) }}" class="btn btn-success">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <div class="btn btn-danger delete-modal" data-toggle="modal"
                                                data-target="#modal-delete-user" data-id="{{ $item->id }}"
                                                data-name="{{ $item->no_po }}"><i class="fa fa-trash"></i>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
        </div>
    </section>
    {{-- Delete Modal --}}
    <form action="{{ route('ncr_vendor.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>

@endsection
@section('scripts')
    @include('scripts.ncrv_create')
    <script>
        $(document).ready(function() {
            $("#showMasuk").click(function() {
                $("#showKeluar").toggle();
                $("#showMasuk").toggle();
                $("#to_vendor").toggle();
                $("#from_vendor").toggle();
                $("#ncrv_title").text("Tambah Return Dari Vendor");
            });
            $("#showKeluar").click(function() {
                $("#showKeluar").toggle();
                $("#showMasuk").toggle();
                $("#to_vendor").toggle();
                $("#from_vendor").toggle();
                $("#ncrv_title").text("Tambah Return Ke Vendor");
            });
        });
    </script>
@endsection
