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

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tableSearch" class="table table-bordered table-hover nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th>NO</th>
                                    <th>TANGGAL</th>
                                    <th>KODE BARANG</th>
                                    <th>JENIS BARANG</th>
                                    <th>NAMA BARANG</th>
                                    <th>TRANSAKSI</th>
                                    <th>DARI</th>
                                    <th>KE</th>
                                    <th>JUMLAH</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        {{-- <td>{{ $item->code_po_product }}</td>
                                        <td>{{ $item->code_pib_product }}</td>
                                        <td>{{ $item->code_ncrv_product }}</td>
                                        <td>{{ $item->code_ncrc_product }}</td> --}}
                                        <td>{{ date('d F Y', strtotime($item->date_product)) }}</td>
                                        <td>{{ $item->code_product }}</td>
                                        <td>{{ $item->type_product }}</td>
                                        <td>{{ $item->name_product }}</td>
                                        <td>
                                            @if ($item->type_history == 1)
                                                <span class="btn btn-success">Barang Masuk (PIB)</span>
                                            @elseif ($item->type_history == -2)
                                                <span class="btn btn-info">Barang Keluar (NCR VENDOR)</span>
                                            @elseif ($item->type_history == 2)
                                                <span class="btn btn-primary">Barang Masuk (NCR VENDOR)</span>
                                            @elseif ($item->type_history == -3)
                                                <span class="btn btn-dark">Barang Keluar (NCR CUSTOMER)</span>
                                            @else
                                                <span class="btn btn-secondary">Barang Masuk (NCR CUSTOMER)</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->type_history < 1)
                                                {{ $item->name_warehouse }}
                                            @else
                                                {{ $item->name_supplier }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->type_history < 1)
                                                {{ $item->name_supplier }}
                                            @else
                                                {{ $item->name_warehouse }}
                                            @endif
                                        </td>
                                        <td>{{ $item->qty_product }}</td>
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
    <form action="{{ route('data.store') }}" method="post">
        @csrf
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Barang</h4>
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
    <form action="{{ route('data.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>

@endsection
@section('scripts')

@endsection
