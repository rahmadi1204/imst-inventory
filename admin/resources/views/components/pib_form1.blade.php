<div id="step1" class="content" role="tabpanel" aria-labelledby="step1-trigger">
    <div class="row">

        <div class="form-group col">
            <label for="type_document_pabean">Tipe Dokumen Pabean</label>
            <input name="type_document_pabean" type="text" class="form-control" id="type_document_pabean">
        </div>
        <div class="form-group col">
            <label for="office_pabean">Kantor Pabean</label>
            <input name="office_pabean" type="text" class="form-control" id="office_pabean">
        </div>
        <div class="form-group col">
            <label for="no_approval">Nomor Pengajuan</label>
            <input name="no_approval" type="text" class="form-control"
                data-inputmask='"mask": "999999-999999-99999999-999999"' data-mask id="no_approval">
        </div>
        <div class="form-group col">
            <label for="no_po">Nomor Pre Order</label>
            <select name="no_po" id="no_po" class="form-control">
                <option selected disabled>Pilih</option>
                @foreach ($po as $item)
                    <option value="{{ $item->no_po }}">{{ $item->no_po }}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="row">
        <div class="form-group col">
            <label for="type_pib">Jenis PIB</label>
            <select name="type_pib" id="type_pib" class="form-control">
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
            <select name="payment_method" id="payment_method" class="form-control ">
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
                    <option value="{{ $item->name_supplier }}" address="{{ $item->address_supplier }}">
                        {{ $item->name_supplier }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="address_shipper">Alamat Pengirim</label>
            <input name="address_shipper" type="text" class="form-control" id="address_shipper" readonly>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="name_seller">Penjual</label>
            <select name="name_seller" id="name_seller" class="form-control ">
                <option selected disabled>Pilih</option>
                @foreach ($seller as $item)
                    <option value="{{ $item->name_supplier }}" address="{{ $item->address_supplier }}">
                        {{ $item->name_supplier }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="address_seller">Alamat Penjual</label>
            <input name="address_seller" type="text" class="form-control" id="address_seller" readonly>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="name_importir">Importir</label>
            <select name="name_importir" id="name_importir" class="form-control ">
                <option selected disabled>Pilih</option>
                @foreach ($importir as $item)
                    <option value="{{ $item->name_importir }}" address="{{ $item->address_importir }}"
                        nik="{{ $item->nik_importir }}" status="{{ $item->status_importir }}"
                        apiu="{{ $item->apiu }}">
                        {{ $item->name_importir }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="nik_importir">Identitas Importir</label>
            <input name="nik_importir" type="text" class="form-control" id="nik_importir" readonly>
        </div>
        <div class="form-group col">
            <label for="address_importir">Alamat Importir</label>
            <input name="address_importir" type="text" class="form-control" id="address_importir" readonly>
        </div>
        <div class="form-group col">
            <label for="status_importir">Status Importir</label>
            <input name="status_importir" type="text" class="form-control" id="status_importir" readonly>
        </div>
        <div class="form-group col">
            <label for="apiu">APIU</label>
            <input name="apiu" type="text" class="form-control" id="apiu" readonly>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="name_owner">Pemilik</label>
            <select name="name_owner" id="name_owner" class="form-control ">
                <option selected disabled>Pilih</option>
                @foreach ($importir as $item)
                    <option value="{{ $item->name_importir }}" address="{{ $item->address_importir }}">
                        {{ $item->name_importir }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="address_owner">Alamat Pemilik</label>
            <input name="address_owner" type="text" class="form-control" id="address_owner" readonly>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="name_ppjk">PPJK</label>
            <input type="text" name="name_ppjk" id="name_ppjk" class="form-control">
        </div>
        <div class="form-group col">
            <label for="npwp_ppjk">NPWP PPJK</label>
            <input name="npwp_ppjk" type="text" class="form-control" data-inputmask='"mask": "99.999.999.9.999.999"'
                data-mask id="npwp_ppjk">
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
                            <td><input type="number" name="bm_paid" id="bm_paid" class="form-control"></td>
                            <td><input type="number" name="bm_borne" id="bm_borne" class="form-control">
                            </td>
                            <td><input type="number" name="bm_delay" id="bm_delay" class="form-control">
                            </td>
                            <td><input type="number" name="bm_taxfree" id="bm_taxfree" class="form-control">
                            </td>
                            <td><input type="number" name="bm_free" id="bm_free" class="form-control">
                            </td>
                            <td><input type="number" name="bm_paidoff" id="bm_paidoff" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>BM KITE</th>
                            <td><input type="number" name="bm_kite_paid" id="bm_kite_paid" class="form-control"></td>
                            <td><input type="number" name="bm_kite_borne" id="bm_kite_borne" class="form-control">
                            </td>
                            <td><input type="number" name="bm_kite_delay" id="bm_kite_delay" class="form-control">
                            </td>
                            <td><input type="number" name="bm_kite_taxfree" id="bm_kite_taxfree" class="form-control">
                            </td>
                            <td><input type="number" name="bm_kite_free" id="bm_kite_free" class="form-control">
                            </td>
                            <td><input type="number" name="bm_kite_paidoff" id="bm_kite_paidoff" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>BMT</th>
                            <td><input type="number" name="bmt_paid" id="bmt_paid" class="form-control"></td>
                            <td><input type="number" name="bmt_borne" id="bmt_borne" class="form-control">
                            </td>
                            <td><input type="number" name="bmt_delay" id="bmt_delay" class="form-control">
                            </td>
                            <td><input type="number" name="bmt_taxfree" id="bmt_taxfree" class="form-control">
                            </td>
                            <td><input type="number" name="bmt_free" id="bmt_free" class="form-control">
                            </td>
                            <td><input type="number" name="bmt_paidoff" id="bmt_paidoff" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>Cukai</th>
                            <td><input type="number" name="cukai_paid" id="cukai_paid" class="form-control"></td>
                            <td><input type="number" name="cukai_borne" id="cukai_borne" class="form-control">
                            </td>
                            <td><input type="number" name="cukai_delay" id="cukai_delay" class="form-control">
                            </td>
                            <td><input type="number" name="cukai_taxfree" id="cukai_taxfree" class="form-control">
                            </td>
                            <td><input type="number" name="cukai_free" id="cukai_free" class="form-control">
                            </td>
                            <td><input type="number" name="cukai_paidoff" id="cukai_paidoff" class="form-control">
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <th>PPN</th>
                            <td><input type="number" name="ppn_paid" id="ppn_paid" class="form-control"></td>
                            <td><input type="number" name="ppn_borne" id="ppn_borne" class="form-control">
                            </td>
                            <td><input type="number" name="ppn_delay" id="ppn_delay" class="form-control">
                            </td>
                            <td><input type="number" name="ppn_taxfree" id="ppn_taxfree" class="form-control">
                            </td>
                            <td><input type="number" name="ppn_free" id="ppn_free" class="form-control">
                            </td>
                            <td><input type="number" name="ppn_paidoff" id="ppn_paidoff" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>PPnBM</th>
                            <td><input type="number" name="ppnbm_paid" id="ppnbm_paid" class="form-control"></td>
                            <td><input type="number" name="ppnbm_borne" id="ppnbm_borne" class="form-control">
                            </td>
                            <td><input type="number" name="ppnbm_delay" id="ppnbm_delay" class="form-control">
                            </td>
                            <td><input type="number" name="ppnbm_taxfree" id="ppnbm_taxfree" class="form-control">
                            </td>
                            <td><input type="number" name="ppnbm_free" id="ppnbm_free" class="form-control">
                            </td>
                            <td><input type="number" name="ppnbm_paidoff" id="ppnbm_paidoff" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>PPh</th>
                            <td><input type="number" name="pph_paid" id="pph_paid" class="form-control"></td>
                            <td><input type="number" name="pph_borne" id="pph_borne" class="form-control">
                            </td>
                            <td><input type="number" name="pph_delay" id="pph_delay" class="form-control">
                            </td>
                            <td><input type="number" name="pph_taxfree" id="pph_taxfree" class="form-control">
                            </td>
                            <td><input type="number" name="pph_free" id="pph_free" class="form-control">
                            </td>
                            <td><input type="number" name="pph_paidoff" id="pph_paidoff" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td><input type="number" name="total_paid" id="total_paid" class="form-control" readonly>
                            </td>
                            <td><input type="number" name="total_borne" id="total_borne" class="form-control"
                                    readonly>
                            </td>
                            <td><input type="number" name="total_delay" id="total_delay" class="form-control"
                                    readonly>
                            </td>
                            <td><input type="number" name="total_taxfree" id="total_taxfree" class="form-control"
                                    readonly>
                            </td>
                            <td><input type="number" name="total_free" id="total_free" class="form-control" readonly>
                            </td>
                            <td><input type="number" name="total_paidoff" id="total_paidoff" class="form-control"
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
