@extends('layouts.app')

@section('head')

@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title ?? 'Data' }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('warehouse.create') }}" class="btn btn-primary mr-3">
                                    <i class="fa fa-plus"></i> Warehouse
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tableSearch" class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Kode Gudang</th>
                                        <th>Nama Gudang</th>
                                        <th>Alamat Gudang</th>
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
                                            <td>{{ $item->code_warehouse }}</td>
                                            <td>{{ $item->name_warehouse }}</td>
                                            <td>{{ $item->address_warehouse }}</td>
                                            <td>
                                                <a href="{{ route('warehouse.edit', $item->code_warehouse) }}"
                                                    class="btn btn-success">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <div class="btn btn-danger delete-modal" data-toggle="modal"
                                                    data-target="#modal-delete-user" data-id="{{ $item->code_warehouse }}"
                                                    data-name="{{ $item->name_warehouse }}"><i class="fa fa-trash"></i>
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
    <form action="{{ route('warehouse.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>

@endsection
@section('scripts')

@endsection
