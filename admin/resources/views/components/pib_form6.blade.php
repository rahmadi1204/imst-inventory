<div id="step6-part" class="content" role="tabpanel" aria-labelledby="step6-part-trigger">

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
                <td><input type="number" name="bm_kite_paid" id="bm_kite_paid" class="form-control">
                </td>
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
                <td><input type="number" name="cukai_paid" id="cukai_paid" class="form-control">
                </td>
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
                <td><input type="number" name="ppnbm_paid" id="ppnbm_paid" class="form-control">
                </td>
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
                <td><input type="number" name="total_borne" id="total_borne" class="form-control" readonly>
                </td>
                <td><input type="number" name="total_delay" id="total_delay" class="form-control" readonly>
                </td>
                <td><input type="number" name="total_taxfree" id="total_taxfree" class="form-control" readonly>
                </td>
                <td><input type="number" name="total_free" id="total_free" class="form-control" readonly>
                </td>
                <td><input type="number" name="total_paidoff" id="total_paidoff" class="form-control" readonly>
                </td>
            </tr>
        </tbody>
    </table>
    <button type="submit" class="btn btn-success">Simpan</button>
    <div class="btn btn-secondary" onclick="stepper.previous()">Kembali</div>

</div>
