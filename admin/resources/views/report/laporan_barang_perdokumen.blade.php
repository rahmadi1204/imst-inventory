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
                            <div class="form-group col-4 card-title">
                                <label>Periode Bebas</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="reservation">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            <div class="form-group col-4 card-tools">
                                <label>Periode Pilihan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <select name="periode" id="periode" class="form-control">
                                        <option value="" selected disabled>Pilih</option>
                                        <option value="1">Periode I (Jan - Apr)</option>
                                        <option value="2">Periode II (Mei - Ags)</option>
                                        <option value="3">Periode III (Sep - Des)</option>
                                    </select>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                        <div class="card-body">
                            <table id="tableSearch" class="table table-bordered table-hover nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center bg-primary"></th>
                                        <th class="text-center bg-primary" colspan="10">DOKUMEN PEMASUKAN</th>
                                        <th class="text-center bg-primary" colspan="10">DOKUMEN PENGELUARAN</th>
                                        <th class="text-center bg-primary" colspan="3">SALDO BARANG</th>
                                    </tr>
                                    <tr>
                                        <th>NO</th>
                                        <th>JENIS</th>
                                        <th>NO</th>
                                        <th>TGL</th>
                                        <th>TGL MASUK</th>
                                        <th>KODE BARANG</th>
                                        <th>SERI BARANG</th>
                                        <th>NAMA BARANG</th>
                                        <th>SATUAN</th>
                                        <th>JUMLAH</th>
                                        <th>NILAI PABEAN</th>
                                        <th>JENIS</th>
                                        <th>NO</th>
                                        <th>TGL</th>
                                        <th>TGL MASUK</th>
                                        <th>KODE BARANG</th>
                                        <th>SERI BARANG</th>
                                        <th>NAMA BARANG</th>
                                        <th>SATUAN</th>
                                        <th>JUMLAH</th>
                                        <th>NILAI PABEAN</th>
                                        <th>SATUAN</th>
                                        <th>JUMLAH</th>
                                        <th>NILAI PABEAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            @if ($item->type_in == 1)
                                                <td>PIB</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{ $item->no_in }}</td>
                                            <td>{{ $item->date_in }}</td>
                                            <td>{{ $item->date_product_in }}</td>
                                            <td>{{ $item->code_product_in }}</td>
                                            <td>{{ $item->type_product_in }}</td>
                                            <td>{{ $item->name_product_in }}</td>
                                            <td>{{ $item->unit_product_in }}</td>
                                            <td>{{ $item->qty_product_in }}</td>
                                            <td>{{ $item->value_product_in }}</td>
                                            @if ($item->type_out == 1)
                                                <td>NCR Vendor</td>
                                            @elseif($item->type_out == 2)
                                                <td>NCR Customer</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{ $item->no_out }}</td>
                                            <td>{{ $item->date_out }}</td>
                                            <td>{{ $item->date_product_out }}</td>
                                            <td>{{ $item->code_product_out }}</td>
                                            <td>{{ $item->type_product_out }}</td>
                                            <td>{{ $item->name_product_out }}</td>
                                            <td>{{ $item->unit_product_out }}</td>
                                            <td>{{ $item->qty_product_out }}</td>
                                            <td>{{ $item->value_product_out }}</td>
                                            <td>{{ $item->unit_product_all }}</td>
                                            <td>{{ $item->qty_product_all }}</td>
                                            <td>{{ $item->value_product_all }}</td>
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

@endsection
@section('scripts')
@endsection
