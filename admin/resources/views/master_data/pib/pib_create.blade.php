@extends('layouts.app')

@section('head')

@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Input PIB</h3>
                        </div>
                        <form action="{{ route('pib.store') }}" method="post">
                            @csrf
                            <div class="card-body p-0">
                                <div class="bs-stepper">
                                    <div class="bs-stepper-header" role="tablist">
                                        <!-- your steps here -->
                                        <div class="step" data-target="#step1">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="step1"
                                                id="step1-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">Data Pemberitahuan</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#step2">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="step2"
                                                id="step2-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Data Transportasi</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#step3-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="step3-part" id="step3-part-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Data Invoice</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#step4-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="step4-part" id="step4-part-trigger">
                                                <span class="bs-stepper-circle">4</span>
                                                <span class="bs-stepper-label">Data Container</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#step5-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="step5-part" id="step5-part-trigger">
                                                <span class="bs-stepper-circle">5</span>
                                                <span class="bs-stepper-label">Data Produk</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">

                                        <!-- your steps content here -->
                                        <div id="step1" class="content" role="tabpanel"
                                            aria-labelledby="step1-trigger">
                                            <div class="row">

                                                <div class="form-group col">
                                                    <label for="type_document_pabean">Tipe Dokumen Pabean</label>
                                                    <input name="type_document_pabean" type="text" class="form-control"
                                                        id="type_document_pabean">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="office_pabean">Kantor Pabean</label>
                                                    <input name="office_pabean" type="text" class="form-control"
                                                        id="office_pabean">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="no_approval">Nomor Pengajuan</label>
                                                    <input name="no_approval" type="text" class="form-control"
                                                        data-inputmask='"mask": "999999-999999-99999999-999999"' data-mask
                                                        id="no_approval">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="no_po">Nomor Pre Order</label>
                                                    <input name="no_po" type="text" class="form-control" id="no_po">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="type_pib">Jenis PIB</label>
                                                    <select name="type_pib" id="type_pib" class="form-control ">
                                                        <option selected disabled>Pilih</option>
                                                        <option value="Biasa">1. Biasa</option>
                                                        <option value="Berkala">2. Berkala</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="type_import">Jenis Import</label>
                                                    <select name="type_import" id="type_import" class="form-control ">
                                                        <option selected disabled>Pilih</option>
                                                        <option value="Untuk Dipakai">1. Untuk Dipakai</option>
                                                        <option value="Sementara">2. Sementara</option>
                                                        <option value="Pelayanan Segera">3. Pelayanan Segera</option>
                                                        <option value="Gabunagn 1 dan 2">4. Gabunagn 1 dan 2</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="payment_method">Cara Pembayaran</label>
                                                    <select name="payment_method" id="payment_method"
                                                        class="form-control ">
                                                        <option selected disabled>Pilih</option>
                                                        <option value="Biasa/Tunai">1. Biasa/Tunai</option>
                                                        <option value="Berkala">2. Berkala</option>
                                                        <option value="Dengan Jaminan">3. Dengan Jaminan</option>
                                                        <option value="Lainnya">4. Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="name_shipper">Pengirim</label>
                                                    <select name="name_shipper" id="name_shipper" class="form-control ">
                                                        <option selected disabled>Pilih</option>
                                                        @foreach ($seller as $item)
                                                            <option value="{{ $item->name_supplier }}"
                                                                address="{{ $item->address_supplier }}">
                                                                {{ $item->name_supplier }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="address_shipper">Alamat Pengirim</label>
                                                    <input name="address_shipper" type="text" class="form-control"
                                                        id="address_shipper" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="name_seller">Penjual</label>
                                                    <select name="name_seller" id="name_seller" class="form-control ">
                                                        <option selected disabled>Pilih</option>
                                                        @foreach ($seller as $item)
                                                            <option value="{{ $item->name_supplier }}"
                                                                address="{{ $item->address_supplier }}">
                                                                {{ $item->name_supplier }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="address_seller">Alamat Penjual</label>
                                                    <input name="address_seller" type="text" class="form-control"
                                                        id="address_seller" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="name_importir">Importir</label>
                                                    <select name="name_importir" id="name_importir" class="form-control ">
                                                        <option selected disabled>Pilih</option>
                                                        @foreach ($importir as $item)
                                                            <option value="{{ $item->name_importir }}"
                                                                address="{{ $item->address_importir }}"
                                                                nik="{{ $item->nik_importir }}"
                                                                status="{{ $item->status_importir }}"
                                                                apiu="{{ $item->apiu }}">
                                                                {{ $item->name_importir }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="nik_importir">Identitas Importir</label>
                                                    <input name="nik_importir" type="text" class="form-control"
                                                        id="nik_importir" readonly>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="address_importir">Alamat Importir</label>
                                                    <input name="address_importir" type="text" class="form-control"
                                                        id="address_importir" readonly>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="status_importir">Status Importir</label>
                                                    <input name="status_importir" type="text" class="form-control"
                                                        id="status_importir" readonly>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="apiu">APIU</label>
                                                    <input name="apiu" type="text" class="form-control" id="apiu"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="name_owner">Pemilik</label>
                                                    <select name="name_owner" id="name_owner" class="form-control ">
                                                        <option selected disabled>Pilih</option>
                                                        @foreach ($importir as $item)
                                                            <option value="{{ $item->name_importir }}"
                                                                address="{{ $item->address_importir }}">
                                                                {{ $item->name_importir }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="address_owner">Alamat Pemilik</label>
                                                    <input name="address_owner" type="text" class="form-control"
                                                        id="address_owner" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="name_ppjk">PPJK</label>
                                                    <input type="text" name="name_ppjk" id="name_ppjk"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="npwp_ppjk">NPWP PPJK</label>
                                                    <input name="npwp_ppjk" type="text" class="form-control"
                                                        data-inputmask='"mask": "99.999.999.9.999.999"' data-mask
                                                        id="npwp_ppjk">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="np_ppjk">NP-PPJK</label>
                                                    <input name="np_ppjk" type="text" class="form-control" id="np_ppjk"
                                                        data-inputmask='"mask": "999999 99-99-9999"' data-mask>
                                                </div>
                                                <div class="row">
                                                    <div class="card-body">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Jenis Pungutan</th>
                                                                    <th>Dibayar</th>
                                                                    <th>Ditanggung Pemerintah</th>
                                                                    <th>Ditunda</th>
                                                                    <th>Tidak Dipungut</th>
                                                                    <th>Dibebaskan</th>
                                                                    <th>Telah Dilunasi</th>
                                                                </tr>

                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>BM</th>
                                                                    <td><input type="number" name="bm_paid" id="bm_paid"
                                                                            class="form-control"></td>
                                                                    <td><input type="number" name="bm_borne" id="bm_borne"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="bm_delay" id="bm_delay"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="bm_taxfree"
                                                                            id="bm_taxfree" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="bm_free" id="bm_free"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="bm_paidoff"
                                                                            id="bm_paidoff" class="form-control">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>BM KITE</th>
                                                                    <td><input type="number" name="bm_kite_paid"
                                                                            id="bm_kite_paid" class="form-control"></td>
                                                                    <td><input type="number" name="bm_kite_borne"
                                                                            id="bm_kite_borne" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="bm_kite_delay"
                                                                            id="bm_kite_delay" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="bm_kite_taxfree"
                                                                            id="bm_kite_taxfree" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="bm_kite_free"
                                                                            id="bm_kite_free" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="bm_kite_paidoff"
                                                                            id="bm_kite_paidoff" class="form-control">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>BMT</th>
                                                                    <td><input type="number" name="bmt_paid" id="bmt_paid"
                                                                            class="form-control"></td>
                                                                    <td><input type="number" name="bmt_borne" id="bmt_borne"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="bmt_delay" id="bmt_delay"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="bmt_taxfree"
                                                                            id="bmt_taxfree" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="bmt_free" id="bmt_free"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="bmt_paidoff"
                                                                            id="bmt_paidoff" class="form-control">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Cukai</th>
                                                                    <td><input type="number" name="cukai_paid"
                                                                            id="cukai_paid" class="form-control"></td>
                                                                    <td><input type="number" name="cukai_borne"
                                                                            id="cukai_borne" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="cukai_delay"
                                                                            id="cukai_delay" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="cukai_taxfree"
                                                                            id="cukai_taxfree" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="cukai_free"
                                                                            id="cukai_free" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="cukai_paidoff"
                                                                            id="cukai_paidoff" class="form-control">
                                                                    </td>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>PPN</th>
                                                                    <td><input type="number" name="ppn_paid" id="ppn_paid"
                                                                            class="form-control"></td>
                                                                    <td><input type="number" name="ppn_borne" id="ppn_borne"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="ppn_delay" id="ppn_delay"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="ppn_taxfree"
                                                                            id="ppn_taxfree" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="ppn_free" id="ppn_free"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="ppn_paidoff"
                                                                            id="ppn_paidoff" class="form-control">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>PPnBM</th>
                                                                    <td><input type="number" name="ppnbm_paid"
                                                                            id="ppnbm_paid" class="form-control"></td>
                                                                    <td><input type="number" name="ppnbm_borne"
                                                                            id="ppnbm_borne" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="ppnbm_delay"
                                                                            id="ppnbm_delay" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="ppnbm_taxfree"
                                                                            id="ppnbm_taxfree" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="ppnbm_free"
                                                                            id="ppnbm_free" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="ppnbm_paidoff"
                                                                            id="ppnbm_paidoff" class="form-control">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>PPh</th>
                                                                    <td><input type="number" name="pph_paid" id="pph_paid"
                                                                            class="form-control"></td>
                                                                    <td><input type="number" name="pph_borne" id="pph_borne"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="pph_delay" id="pph_delay"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="pph_taxfree"
                                                                            id="pph_taxfree" class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="pph_free" id="pph_free"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td><input type="number" name="pph_paidoff"
                                                                            id="pph_paidoff" class="form-control">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total</th>
                                                                    <td><input type="number" name="total_paid"
                                                                            id="total_paid" class="form-control"
                                                                            readonly>
                                                                    </td>
                                                                    <td><input type="number" name="total_borne"
                                                                            id="total_borne" class="form-control"
                                                                            readonly>
                                                                    </td>
                                                                    <td><input type="number" name="total_delay"
                                                                            id="total_delay" class="form-control"
                                                                            readonly>
                                                                    </td>
                                                                    <td><input type="number" name="total_taxfree"
                                                                            id="total_taxfree" class="form-control"
                                                                            readonly>
                                                                    </td>
                                                                    <td><input type="number" name="total_free"
                                                                            id="total_free" class="form-control"
                                                                            readonly>
                                                                    </td>
                                                                    <td><input type="number" name="total_paidoff"
                                                                            id="total_paidoff" class="form-control"
                                                                            readonly>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="btn btn-primary" onclick="stepper.next()">Next</div>
                                        </div>
                                        <div id="step2" class="content" role="tabpanel"
                                            aria-labelledby="step2-trigger">

                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="no_register">Nomor Pendaftaran</label>
                                                    <input name="no_register" type="text" class="form-control"
                                                        id="no_register">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="date_register">Tanggal Pendaftaran</label>
                                                    <div class="input-group date" id="registerDate"
                                                        data-target-input="nearest">
                                                        <input name="date_register" type="text"
                                                            class="form-control datetimepicker-input"
                                                            data-target="#registerDate" />
                                                        <div class="input-group-append" data-target="#registerDate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label for="way_transport">Cara Pengangkatan</label>
                                                    <input name="way_transport" type="text" class="form-control"
                                                        id="way_transport">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="name_transport">Nama Sarana Pengangkat & No. Voy dan
                                                        Bendera</label>
                                                    <input name="name_transport" type="text" class="form-control"
                                                        id="name_transport">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="date_estimate">Estimasi Tiba</label>
                                                    <div class="input-group date" id="estimateDate"
                                                        data-target-input="nearest">
                                                        <input name="date_estimate" type="text"
                                                            class="form-control datetimepicker-input"
                                                            data-target="#estimateDate" />
                                                        <div class="input-group-append" data-target="#estimateDate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="load_place">Pelabuhan Muat</label>
                                                    <input name="load_place" type="text" class="form-control"
                                                        id="load_place">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="load_transit">Pelabuhan Transit</label>
                                                    <input name="load_transit" type="text" class="form-control"
                                                        id="load_transit">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="load_destination">Pelabuhan Tujuan</label>
                                                    <input name="load_destination" type="text" class="form-control"
                                                        id="load_destination">
                                                </div>

                                            </div>
                                            <div class="btn btn-primary" onclick="stepper.next()">Next</div>
                                            <div class="btn btn-secondary" onclick="stepper.previous()">Kembali</div>
                                        </div>
                                        <div id="step3-part" class="content" role="tabpanel"
                                            aria-labelledby="step3-part-trigger">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="invoice">Nomor Invoice</label>
                                                    <input name="invoice" type="text" class="form-control" id="invoice">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="date_invoice">Tanggal Invoice</label>
                                                    <div class="input-group date" id="invoiceDate"
                                                        data-target-input="nearest">
                                                        <input name="date_invoice" type="text"
                                                            class="form-control datetimepicker-input"
                                                            data-target="#invoiceDate" />
                                                        <div class="input-group-append" data-target="#invoiceDate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="transaction">Transaksi</label>
                                                    <input name="transaction" type="text" class="form-control"
                                                        id="transaction">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="date_transaction">Tanggal Transaksi</label>
                                                    <div class="input-group date" id="transactionDate"
                                                        data-target-input="nearest">
                                                        <input name="date_transaction" type="text"
                                                            class="form-control datetimepicker-input"
                                                            data-target="#transactionDate" />
                                                        <div class="input-group-append" data-target="#transactionDate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="house_bl">House-BL</label>
                                                    <input name="house_bl" type="text" class="form-control"
                                                        id="house_bl">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="date_house_bl">Tanggal House-BL</label>
                                                    <div class="input-group date" id="houseblDate"
                                                        data-target-input="nearest">
                                                        <input name="date_house_bl" type="text"
                                                            class="form-control datetimepicker-input"
                                                            data-target="#houseblDate" />
                                                        <div class="input-group-append" data-target="#houseblDate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="master_bl">Master-BL</label>
                                                    <input name="master_bl" type="text" class="form-control"
                                                        id="master_bl">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="date_master_bl">Tanggal Master-BL</label>
                                                    <div class="input-group date" id="masterblDate"
                                                        data-target-input="nearest">
                                                        <input name="date_master_bl" type="text"
                                                            class="form-control datetimepicker-input"
                                                            data-target="#masterblDate" />
                                                        <div class="input-group-append" data-target="#masterblDate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="bc11">BC1.1</label>
                                                    <input name="bc11" type="text" class="form-control" id="bc11">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="date_bc11">Tanggal Master-BL</label>
                                                    <div class="input-group date" id="bc11Date"
                                                        data-target-input="nearest">
                                                        <input name="date_bc11" type="text"
                                                            class="form-control datetimepicker-input"
                                                            data-target="#bc11Date" />
                                                        <div class="input-group-append" data-target="#bc11Date"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="pos">POS</label>
                                                    <input name="pos" type="text" class="form-control" id="pos">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="sub">SUB</label>
                                                    <input name="sub" type="text" class="form-control" id="sub"
                                                        data-inputmask='"mask": "9999 9999"' data-mask>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="facility">Pemenuhan Persyaratan/Fasilitas Import</label>
                                                    <input name="facility" type="text" class="form-control"
                                                        id="facility">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="dump">Tempat Penimbunan</label>
                                                    <input name="dump" type="text" class="form-control" id="dump">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="valuta">Valuta</label>
                                                    <select name="valuta" id="valuta" class="form-control">
                                                        <option value="" selected disabled>Pilih</option>
                                                        <option value="USD">USD</option>
                                                        <option value="IDR">IDR</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="ndpbm">NDPBM</label>
                                                    <input name="ndpbm" type="text" class="form-control" id="ndpbm">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="value">Nilai EXW</label>
                                                    <input name="value" type="text" class="form-control" id="value">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="insurance">Asuransi LN/DN</label>
                                                    <input name="insurance" type="text" class="form-control"
                                                        id="insurance">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="freight">Freight</label>
                                                    <input name="freight" type="text" class="form-control" id="freight">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="pabean_value">Nilai Pabean</label>
                                                    <input name="pabean_value" type="text" class="form-control"
                                                        id="pabean_value" readonly>
                                                </div>

                                            </div>
                                            <div class="btn btn-primary" onclick="stepper.next()">Next</div>
                                            <div class="btn btn-secondary" onclick="stepper.previous()">Kembali</div>

                                        </div>
                                        <div id="step4-part" class="content" role="tabpanel"
                                            aria-labelledby="step4-part-trigger">

                                            <table class="table table-bordered" id="containerAddRemove">
                                                <tr>
                                                    <th>Nomor Container</th>
                                                    <th>Ukuran Container</th>
                                                    <th>Tipe Container</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="no_container[0]" class="form-control" />
                                                    </td>
                                                    <td><input type="text" name="size_container[0]"
                                                            class="form-control" />
                                                    </td>
                                                    <td><input type="text" name="type_container[0]"
                                                            class="form-control" />
                                                    </td>
                                                    <td><button type="button" name="add" id="dynamic-ar"
                                                            class="btn btn-outline-primary"><i
                                                                class="fa fa-plus"></i></button></td>
                                                </tr>
                                            </table>
                                            <div class="btn btn-primary" onclick="stepper.next()">Next</div>
                                            <div class="btn btn-secondary" onclick="stepper.previous()">Kembali</div>

                                        </div>
                                        <div id="step5-part" class="content" role="tabpanel"
                                            aria-labelledby="step5-part-trigger">
                                            <div class="row">
                                                {{-- <div class="form-group col">
                                                    <label for="type_product">Tipe Produk</label>
                                                    <select name="type_product" id="type_product" class="form-control">
                                                        <option selected disabled>Pilih</option>
                                                        @foreach ($typeProduct as $item)
                                                            <option value="{{ $item->type_product }}">
                                                                {{ $item->type_product }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
                                                <div class="form-group col">
                                                    <label for="country_product">Negara Asal Produk</label>
                                                    <input name="country_product" type="text" class="form-control"
                                                        id="country_product">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="type_pabean">Tipe Pabean</label>
                                                    <input name="type_pabean" type="text" class="form-control"
                                                        id="type_pabean">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="date_product">Tanggal Produk</label>
                                                    <div class="input-group date" id="productDate"
                                                        data-target-input="nearest">
                                                        <input name="date_product" type="text"
                                                            class="form-control datetimepicker-input"
                                                            data-target="#productDate" />
                                                        <div class="input-group-append" data-target="#productDate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <table class="table table-bordered" id="productAddRemove">
                                                <tr>
                                                    <th style="width: 9%">Pos Tarif Produk</th>
                                                    <th style="width: 8%">Kode Barang</th>
                                                    <th colspan="2" style="width: 22%">Uraian Jenis Barang, Merek, Tipe,
                                                        Spesifikasi Wajib</th>
                                                    <th style="width: 9%">Jumlah Produk</th>
                                                    <th style="width: 9%">Satuan Produk</th>
                                                    <th style="width: 10%">Berat Bersih Produk</th>
                                                    <th style="width: 9%">Jumlah Kemasan Produk</th>
                                                    <th style="width: 9%">Satuan Kemasan Produk</th>
                                                    <th style="width: 10%">Nilai Pabean</th>
                                                    <th style="width: 5%"></th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="pos_product[0]" class="form-control" />
                                                    </td>
                                                    <td>
                                                        <select name="code_product[0]" id="code_product0"
                                                            class="form-control">
                                                            <option value="" selected disabled>Pilih</option>
                                                            @foreach ($product as $item)
                                                                <option value="{{ $item->code_product }}"
                                                                    type="{{ $item->type_product }}"
                                                                    name="{{ $item->name_product }}">
                                                                    {{ $item->code_product }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="type_product[0]"
                                                            id="type_product0" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="name_product[0]" id="name_product0"
                                                            class="form-control" readonly>
                                                    </td>
                                                    <td><input type="number" name="qty_product[0]"
                                                            class="form-control" />
                                                    </td>
                                                    <td>
                                                        <select name="unit_product[0]" id="unit_product"
                                                            class="form-control">
                                                            <option value="" selected disabled>Pilih</option>
                                                            @foreach ($unit as $item)
                                                                <option value="{{ $item->unit }}">{{ $item->unit }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="number" name="netto_product[0]"
                                                                class="form-control" />
                                                            <div class="input-group-appeand">
                                                                <div class="input-group-text">KG</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><input type="number" name="qty_pack[0]" class="form-control" />
                                                    </td>
                                                    <td><select name="type_pack[0]" id="type_pack" class="form-control">
                                                            <option value="" selected disabled>
                                                                Pilih</option>
                                                            <option value="Pack">Pack</option>
                                                            <option value="Container">Container</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="number" name="value_pabean[0]"
                                                            class="form-control" />
                                                    </td>
                                                    <td><button type="button" name="add" id="dynamic-pr"
                                                            class="btn btn-outline-primary"><i
                                                                class="fa fa-plus"></i></button></td>
                                                </tr>
                                            </table>
                                            <div class="btn btn-secondary" onclick="stepper.previous()">Kembali</div>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Ket : Bila Data Kosong, Isikan Nilai 0 atau -
            </div>
        </div>
        <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->

        </div>
        </div>
    </section>

@endsection
@section('scripts')
    @include('scripts.pib_create')
    @include('scripts.pib_form')

@endsection
