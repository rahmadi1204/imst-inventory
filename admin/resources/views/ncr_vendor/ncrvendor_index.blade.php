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
                            <div class="card-tools">
                                <a href="{{ route('ncr_vendor.create') }}" class="btn btn-primary mr-3">
                                    <i class="fa fa-plus"></i> Tambah
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
                                        <th>No Return</th>
                                        <th>No Referensi</th>
                                        <th>Keterangan</th>
                                        <th>Nama Vendor</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
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
                                                <a href="{{ route('ncr_vendor.edit', $item->id) }}" class="btn btn-success">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <div class="btn btn-danger delete-modal" data-toggle="modal"
                                                    data-target="#modal-delete-user" data-id="{{ $item->id }}"
                                                    data-name="{{ $item->no_po }}"><i class="fa fa-trash"></i>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
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

@endsection
@section('scripts')

@endsection
