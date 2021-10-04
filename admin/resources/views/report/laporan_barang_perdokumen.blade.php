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
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <div class="form-group">
                                        <label>Periode Bebas</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="reservation">
                                            <div class="input-group-append">
                                                <span class="input-group-text" onclick="">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group ml-3">
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
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="btn btn-primary" id="showMasuk">Tampilkan Data Masuk</div>
                                        <div class="btn btn-warning ml-3" id="showKeluar">Tampilkan Data Keluar</div>
                                        <div class="btn btn-danger ml-3" id="pdf"><i class="fa fa-print"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-12 mb-5" id="tabelMasuk" style="display: none">
                                <table id="masuk" class="table table-bordered table-hover nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center bg-primary"></th>
                                            <th class="text-center bg-primary" colspan="10">DAFTAR BARANG MASUK</th>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($masuk as $item)
                                            <tr>
                                                <td>{{ $noMasuk++ }}</td>
                                                @if ($item->type_history == 1)
                                                    <td>PIB</td>
                                                @else
                                                    <td></td>
                                                @endif
                                                <td>{{ $item->no_in }}</td>
                                                <td>{{ $item->date_product }}</td>
                                                <td>{{ $item->date_product }}</td>
                                                <td>{{ $item->code_product }}</td>
                                                <td>{{ $item->type_product }}</td>
                                                <td>{{ $item->name_product }}</td>
                                                <td>{{ $item->unit_product }}</td>
                                                <td>{{ $item->qty_product }}</td>
                                                <td>{{ $item->product_pabean }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-12 mb-5" id="tabelKeluar" style="display: none">
                                <table id="keluar" class="table table-bordered table-hover nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center bg-primary"></th>
                                            <th class="text-center bg-primary" colspan="10">DAFTAR BARANG KELUAR</th>
                                        </tr>
                                        <tr>
                                            <th>NO</th>
                                            <th>JENIS</th>
                                            <th>NO</th>
                                            <th>TGL</th>
                                            <th>TGL KELUAR</th>
                                            <th>KODE BARANG</th>
                                            <th>SERI BARANG</th>
                                            <th>NAMA BARANG</th>
                                            <th>SATUAN</th>
                                            <th>JUMLAH</th>
                                            <th>NILAI PABEAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keluar as $item)
                                            <tr>
                                                <td>{{ $noKeluar++ }}</td>
                                                @if ($item->type_history == 0)
                                                    <td>NCR Vendor</td>
                                                @else
                                                    <td>NCR Customer</td>
                                                @endif
                                                <td>{{ $item->no_out }}</td>
                                                <td>{{ $item->date_product }}</td>
                                                <td>{{ $item->date_product }}</td>
                                                <td>{{ $item->code_product }}</td>
                                                <td>{{ $item->type_product }}</td>
                                                <td>{{ $item->name_product }}</td>
                                                <td>{{ $item->unit_product }}</td>
                                                <td>{{ $item->qty_product }}</td>
                                                <td>{{ $item->product_pabean }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-12">
                                <table id="saldo" class="table table-bordered table-hover nowrap">
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
                                            <th>TGL KELUAR</th>
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
                                        @php
                                            $j = 1;
                                            $jml = 0;
                                            $pabean = 0;
                                        @endphp
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $j++ }}</td>
                                                <td>{{ $item->type_product }}</td>
                                                <td></td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>{{ $item->code_product }}</td>
                                                <td>{{ $item->type_product }}</td>
                                                <td>{{ $item->name_product }}</td>
                                                <td>{{ $item->unit_product_in }}</td>
                                                <td>{{ $item->qty_product_in }}</td>
                                                <td>{{ $item->product_pabean_in }}</td>
                                                <td>{{ $item->type_product }}</td>
                                                <td></td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>{{ $item->code_product }}</td>
                                                <td>{{ $item->type_product }}</td>
                                                <td>{{ $item->name_product }}</td>
                                                <td>{{ $item->unit_product_out }}</td>
                                                <td>{{ $item->qty_product_out }}</td>
                                                <td>{{ $item->product_pabean_out }}</td>
                                                <td>{{ $item->unit_product_in }}</td>
                                                <td>
                                                    {{ $jml = $item->qty_product_in + $item->qty_product_out }}
                                                </td>
                                                <td>{{ $pabean = $item->product_pabean_in + $item->product_pabean_out }}
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
        </div>
    </section>

    {{-- Delete Modal --}}
    <form action="{{ route('ncr_vendor.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#showMasuk").click(function() {
                $("#tabelMasuk").toggle();
            });
            $("#showKeluar").click(function() {
                $("#tabelKeluar").toggle();
            });
        });
    </script>
@endsection
