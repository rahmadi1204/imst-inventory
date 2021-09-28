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
                                <a href="{{ route('po.create') }}" class="btn btn-primary mr-3">
                                    <i class="fa fa-plus"></i> Data
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tableSearch" class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>No PO Vendor</th>
                                        <th>Project</th>
                                        <th>Tanggal</th>
                                        <th>Nama Vendor</th>
                                        <th>Alamat Vendor</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Kode Barang</th>
                                        <th>Deskripsi</th>
                                        <th>Kuantitas</th>
                                        <th>Kekurangan</th>
                                        <th>Mata Uang</th>
                                        <th>Satuan Harga</th>
                                        <th>Jumlah</th>
                                        <th>Latest</th>
                                        <th>Status</th>
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
                                            <td>{{ $item->project }}</td>
                                            <td>{{ $item->date_po }}</td>
                                            <td>{{ $item->vendor_name }}</td>
                                            <td>{{ $item->vendor_address }}</td>
                                            <td>{{ $item->send_address }}</td>
                                            <td>{{ $item->code_product }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ number_format($item->qty_product) }}</td>
                                            <td>{{ number_format($item->qty_product - $item->qty_recived) }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>{{ number_format($item->unit_price, 3, ',', '.') }} </td>
                                            <td>{{ number_format($item->total_amount, 3, ',', '.') }}</td>
                                            <td>{{ $item->latest }}</td>
                                            <td>
                                                @if ($item->qty_recived == $item->qty_product)
                                                    <span class="btn btn-success">
                                                        Selesai
                                                    @else
                                                        <span class="btn btn-warning">
                                                            Kurang
                                                @endif
                                                </span>
                                            </td>
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
            </div>
        </div>
    </section>

    {{-- Delete Modal --}}
    <form action="{{ route('po.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>

@endsection
@section('scripts')

@endsection
