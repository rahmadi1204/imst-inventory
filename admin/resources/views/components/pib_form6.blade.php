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
                <td><input type="number" step="0.01" name="bm_paid" id="bm_paid" class="form-control"
                        value="{{ $pib->pibDevy->bm_paid ?? (old('bm_paid') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="bm_borne" id="bm_borne" class="form-control"
                        value="{{ $pib->pibDevy->bm_borne ?? (old('bm_borne') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="bm_delay" id="bm_delay" class="form-control"
                        value="{{ $pib->pibDevy->bm_delay ?? (old('bm_delay') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="bm_taxfree" id="bm_taxfree" class="form-control"
                        value="{{ $pib->pibDevy->bm_taxfree ?? (old('bm_taxfree') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="bm_free" id="bm_free" class="form-control"
                        value="{{ $pib->pibDevy->bm_free ?? (old('bm_free') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="bm_paidoff" id="bm_paidoff" class="form-control"
                        value="{{ $pib->pibDevy->bm_paidoff ?? (old('bm_paidoff') ?? '0') }}">
                </td>
            </tr>
            <tr>
                <th>BM KITE</th>
                <td><input type="number" step="0.01" name="bm_kite_paid" id="bm_kite_paid" class="form-control"
                        value="{{ $pib->pibDevy->bm_kite_paid ?? (old('bm_kite_paid') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="bm_kite_borne" id="bm_kite_borne" class="form-control"
                        value="{{ $pib->pibDevy->bm_kite_borne ?? (old('bm_kite_borne') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="bm_kite_delay" id="bm_kite_delay" class="form-control"
                        value="{{ $pib->pibDevy->bm_kite_delay ?? (old('bm_kite_delay') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="bm_kite_taxfree" id="bm_kite_taxfree" class="form-control"
                        value="{{ $pib->pibDevy->bm_kite_taxfree ?? (old('bm_kite_taxfree') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="bm_kite_free" id="bm_kite_free" class="form-control"
                        value="{{ $pib->pibDevy->bm_kite_free ?? (old('bm_kite_free') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="bm_kite_paidoff" id="bm_kite_paidoff" class="form-control"
                        value="{{ $pib->pibDevy->bm_kite_paidoff ?? (old('bm_kite_paidoff') ?? '0') }}">
                </td>
            </tr>
            <tr>
                <th>BMT</th>
                <td><input type="number" step="0.01" name="bmt_paid" id="bmt_paid" class="form-control"
                        value="{{ $pib->pibDevy->bmt_paid ?? (old('bmt_paid') ?? '0') }}"></td>
                <td><input type="number" step="0.01" name="bmt_borne" id="bmt_borne" class="form-control"
                        value="{{ $pib->pibDevy->bmt_borne ?? (old('bmt_borne') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="bmt_delay" id="bmt_delay" class="form-control"
                        value="{{ $pib->pibDevy->bmt_delay ?? (old('bmt_delay') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="bmt_taxfree" id="bmt_taxfree" class="form-control"
                        value="{{ $pib->pibDevy->bmt_taxfree ?? (old('bmt_taxfree') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="bmt_free" id="bmt_free" class="form-control"
                        value="{{ $pib->pibDevy->bmt_free ?? (old('bmt_free') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="bmt_paidoff" id="bmt_paidoff" class="form-control"
                        value="{{ $pib->pibDevy->bmt_paidoff ?? (old('bmt_paidoff') ?? '0') }}">
                </td>
            </tr>
            <tr>
                <th>Cukai</th>
                <td><input type="number" step="0.01" name="cukai_paid" id="cukai_paid" class="form-control"
                        value="{{ $pib->pibDevy->cukai_paid ?? (old('cukai_paid') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="cukai_borne" id="cukai_borne" class="form-control"
                        value="{{ $pib->pibDevy->cukai_borne ?? (old('cukai_borne') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="cukai_delay" id="cukai_delay" class="form-control"
                        value="{{ $pib->pibDevy->cukai_delay ?? (old('cukai_delay') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="cukai_taxfree" id="cukai_taxfree" class="form-control"
                        value="{{ $pib->pibDevy->cukai_taxfree ?? (old('cukai_taxfree') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="cukai_free" id="cukai_free" class="form-control"
                        value="{{ $pib->pibDevy->cukai_free ?? (old('cukai_free') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="cukai_paidoff" id="cukai_paidoff" class="form-control"
                        value="{{ $pib->pibDevy->cukai_paidoff ?? (old('cukai_paidoff') ?? '0') }}">
                </td>
                </td>
            </tr>
            <tr>
                <th>PPN</th>
                <td><input type="number" step="0.01" name="ppn_paid" id="ppn_paid" class="form-control"
                        value="{{ $pib->pibDevy->ppn_paid ?? (old('ppn_paid') ?? '0') }}"></td>
                <td><input type="number" step="0.01" name="ppn_borne" id="ppn_borne" class="form-control"
                        value="{{ $pib->pibDevy->ppn_borne ?? (old('ppn_borne') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="ppn_delay" id="ppn_delay" class="form-control"
                        value="{{ $pib->pibDevy->ppn_delay ?? (old('ppn_delay') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="ppn_taxfree" id="ppn_taxfree" class="form-control"
                        value="{{ $pib->pibDevy->ppn_taxfree ?? (old('ppn_taxfree') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="ppn_free" id="ppn_free" class="form-control"
                        value="{{ $pib->pibDevy->ppn_free ?? (old('ppn_free') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="ppn_paidoff" id="ppn_paidoff" class="form-control"
                        value="{{ $pib->pibDevy->ppn_paidoff ?? (old('ppn_paidoff') ?? '0') }}">
                </td>
            </tr>
            <tr>
                <th>PPnBM</th>
                <td><input type="number" step="0.01" name="ppnbm_paid" id="ppnbm_paid" class="form-control"
                        value="{{ $pib->pibDevy->ppnbm_paid ?? (old('ppnbm_paid') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="ppnbm_borne" id="ppnbm_borne" class="form-control"
                        value="{{ $pib->pibDevy->ppnbm_borne ?? (old('ppnbm_borne') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="ppnbm_delay" id="ppnbm_delay" class="form-control"
                        value="{{ $pib->pibDevy->ppnbm_delay ?? (old('ppnbm_delay') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="ppnbm_taxfree" id="ppnbm_taxfree" class="form-control"
                        value="{{ $pib->pibDevy->ppnbm_taxfree ?? (old('ppnbm_taxfree') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="ppnbm_free" id="ppnbm_free" class="form-control"
                        value="{{ $pib->pibDevy->ppnbm_free ?? (old('ppnbm_free') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="ppnbm_paidoff" id="ppnbm_paidoff" class="form-control"
                        value="{{ $pib->pibDevy->ppnbm_paidoff ?? (old('ppnbm_paidoff') ?? '0') }}">
                </td>
            </tr>
            <tr>
                <th>PPh</th>
                <td><input type="number" step="0.01" name="pph_paid" id="pph_paid" class="form-control"
                        value="{{ $pib->pibDevy->pph_paid ?? (old('pph_paid') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="pph_borne" id="pph_borne" class="form-control"
                        value="{{ $pib->pibDevy->pph_borne ?? (old('pph_borne') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="pph_delay" id="pph_delay" class="form-control"
                        value="{{ $pib->pibDevy->pph_delay ?? (old('pph_delay') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="pph_taxfree" id="pph_taxfree" class="form-control"
                        value="{{ $pib->pibDevy->pph_taxfree ?? (old('pph_taxfree') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="pph_free" id="pph_free" class="form-control"
                        value="{{ $pib->pibDevy->pph_free ?? (old('pph_free') ?? '0') }}">
                </td>
                <td><input type="number" step="0.01" name="pph_paidoff" id="pph_paidoff" class="form-control"
                        value="{{ $pib->pibDevy->pph_paidoff ?? (old('pph_paidoff') ?? '0') }}">
                </td>
            </tr>
            <tr>
                <th>Total</th>
                </td>
                <td><input type="number" step="0.01" name="total_paid" id="total_paid" class="form-control"
                        value="{{ $pib->pibDevy->total_paid ?? (old('total_paid') ?? '0') }}" readonly>
                </td>
                <td><input type="number" step="0.01" name="total_borne" id="total_borne" class="form-control"
                        value="{{ $pib->pibDevy->total_borne ?? (old('total_borne') ?? '0') }}" readonly>
                </td>
                <td><input type="number" step="0.01" name="total_delay" id="total_delay" class="form-control"
                        value="{{ $pib->pibDevy->total_delay ?? (old('total_delay') ?? '0') }}" readonly>
                </td>
                <td><input type="number" step="0.01" name="total_taxfree" id="total_taxfree" class="form-control"
                        value="{{ $pib->pibDevy->total_taxfree ?? (old('total_taxfree') ?? '0') }}" readonly>
                </td>
                <td><input type="number" step="0.01" name="total_free" id="total_free" class="form-control"
                        value="{{ $pib->pibDevy->total_free ?? (old('total_free') ?? '0') }}" readonly>
                </td>
                <td><input type="number" step="0.01" name="total_paidoff" id="total_paidoff" class="form-control"
                        value="{{ $pib->pibDevy->total_paidoff ?? (old('total_paidoff') ?? '0') }}" readonly>
                </td>
            </tr>
        </tbody>
    </table>
    <button type="submit" class="btn btn-success">Simpan</button>
    <div class="btn btn-secondary" onclick="stepper.previous()">Kembali</div>

</div>
