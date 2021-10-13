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
                                <a href="{{ route('ncr_customer.create') }}" class="btn btn-primary mr-3">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tableSearch" class="table table-bordered table-hover nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>No Referensi</th>
                                        <th>Nama Customer</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ date('d F Y', strtotime($item->date_ncrc)) }}</td>
                                            <td>{{ $item->no_ref }}</td>
                                            <td>{{ $item->name_customer }}</td>
                                            <td>{{ $item->name_product }}</td>
                                            <td>{{ $item->qty_product }}</td>
                                            <td>
                                                @if ($item->qty_product < 0)
                                                    <div class="btn btn-warning">Keluar</div>
                                                @else
                                                    <div class="btn btn-primary">Masuk</div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('ncr_customer.edit', $item->code_ncrc) }}"
                                                    class="btn btn-success">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <div class="btn btn-danger delete-modal" data-toggle="modal"
                                                    data-target="#modal-delete" data-id="{{ $item->code_ncrc_product }}"
                                                    data-name="{{ $item->no_ref }}"><i class="fa fa-trash"></i>
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
    <form action="{{ route('ncr_customer.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>

@endsection
@section('scripts')

@endsection
