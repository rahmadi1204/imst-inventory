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
                            <div class="btn btn-light" data-toggle="modal" data-target="#modal-default">
                                <i class="fa fa-plus"></i> Master Barang
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tableSearch" class="table table-bordered table-hover nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th>NO</th>
                                    <th>KODE BARANG</th>
                                    <th>JENIS BARANG</th>
                                    <th>NAMA BARANG</th>
                                    <th>STATUS</th>
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
                                        <td>{{ $item->code_product }}</td>
                                        <td>{{ $item->type_product }}</td>
                                        <td>{{ $item->name_product }}</td>
                                        <td>{{ $item->status_product }}</td>
                                        <td>
                                            <a href="{{ route('master.edit', $item->code_product) }}"
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
                    <div class="card-footer">

                    </div>
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
                            <select name="type_product" id="type_product" class="form-control">
                                <option selected disabled>Pilih</option>
                                @foreach ($typeProduct as $item)
                                    <option value="{{ $item->type_product }}">
                                        {{ $item->type_product }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="code_product">Kode Produk</label>
                            <input name="code_product" type="text" class="form-control" id="code_product" required>
                        </div>
                        <div class="form-group col">
                            <label for="name_product">Nama Produk</label>
                            <input name="name_product" type="text" class="form-control" id="name_product" required>
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
    <form action="{{ route('master.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>

@endsection
@section('scripts')

@endsection
