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
                            <div class="col-12 mb-5" id="tabelMasuk">
                                <table id="masuk" class="table table-bordered table-hover nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>NO</th>
                                            <th>KODE BARANG</th>
                                            <th>NAMA BARANG</th>
                                            <th>SAT</th>
                                            <th>SALDO AWAL</th>
                                            <th>PEMASUKAN</th>
                                            <th>PENGELUARAN</th>
                                            <th>PENYESUAIAN</th>
                                            <th>SALDO AKHIR</th>
                                            <th>STOK OPNAME</th>
                                            <th>SELISIH</th>
                                            <th>KETERANGAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@section('scripts')

@endsection
