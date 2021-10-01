@extends('layouts.app')

@section('head')

@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>{{ $title ?? 'Data' }}</h4>
                            </div>
                            <div class="card-tools">
                                <div class="btn btn-light" data-toggle="modal" data-target="#modal-create">
                                    <i class="fa fa-plus"></i> Customer
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tableSearch" class="table table-bordered table-hover nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Kode Customer</th>
                                        <th>Nama Customer</th>
                                        <th>Alamat Customer</th>
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
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->code_customer }}</td>
                                            <td>{{ $item->name_customer }}</td>
                                            <td>{{ $item->address_customer }}</td>
                                            <td>
                                                <a href="{{ route('customer.edit', $item->code_customer) }}"
                                                    class="btn btn-success">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <div class="btn btn-danger delete-modal" data-toggle="modal"
                                                    data-target="#modal-delete-user" data-id="{{ $item->code_customer }}"
                                                    data-name="{{ $item->name_customer }}"><i class="fa fa-trash"></i>
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

    {{-- Create Modal --}}
    <form action="{{ route('customer.store') }}" method="post">
        @csrf
        <div class="modal fade" id="modal-create">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Customer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('components.customer_form')
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
    <form action="{{ route('customer.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>

@endsection
@section('scripts')

@endsection
