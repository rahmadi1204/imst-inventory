<div id="step3-part" class="content" role="tabpanel" aria-labelledby="step3-part-trigger">
    <div class="row">
        <div class="form-group col">
            <label for="invoice">Nomor Invoice</label>
            <input name="invoice" type="text" class="form-control" id="invoice"
                value="{{ $pib->pibInvoice->invoice ?? old('invoice') }}">
        </div>
        <div class="form-group col">
            <label for="date_invoice">Tanggal Invoice</label>
            <div class="input-group date" id="invoiceDate" data-target-input="nearest">
                <input name="date_invoice" type="text" class="form-control datetimepicker-input"
                    data-target="#invoiceDate" value="{{ $pib->pibInvoice->date_invoice ?? old('date_invoice') }}" />
                <div class="input-group-append" data-target="#invoiceDate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="transaction">Transaksi</label>
            <input name="transaction" type="text" class="form-control" id="transaction"
                value="{{ $pib->pibInvoice->transaction ?? old('transaction') }}">
        </div>
        <div class="form-group col">
            <label for="date_transaction">Tanggal Transaksi</label>
            <div class="input-group date" id="transactionDate" data-target-input="nearest">
                <input name="date_transaction" type="text" class="form-control datetimepicker-input"
                    data-target="#transactionDate"
                    value="{{ $pib->pibInvoice->date_transaction ?? old('date_transaction') }}" />
                <div class="input-group-append" data-target="#transactionDate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="house_bl">House-BL</label>
            <input name="house_bl" type="text" class="form-control" id="house_bl"
                value="{{ $pib->pibInvoice->house_bl ?? old('house_bl') }}">
        </div>
        <div class="form-group col">
            <label for="date_house_bl">Tanggal House-BL</label>
            <div class="input-group date" id="houseblDate" data-target-input="nearest">
                <input name="date_house_bl" type="text" class="form-control datetimepicker-input"
                    data-target="#houseblDate"
                    value="{{ $pib->pibInvoice->date_house_bl ?? old('date_house_bl') }}" />
                <div class="input-group-append" data-target="#houseblDate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="master_bl">Master-BL</label>
            <input name="master_bl" type="text" class="form-control" id="master_bl"
                value="{{ $pib->pibInvoice->master_bl ?? old('master_bl') }}">
        </div>
        <div class="form-group col">
            <label for="date_master_bl">Tanggal Master-BL</label>
            <div class="input-group date" id="masterblDate" data-target-input="nearest">
                <input name="date_master_bl" type="text" class="form-control datetimepicker-input"
                    data-target="#masterblDate"
                    value="{{ $pib->pibInvoice->date_master_bl ?? old('date_master_bl') }}" />
                <div class="input-group-append" data-target="#masterblDate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="bc11">BC1.1</label>
            <input name="bc11" type="text" class="form-control" id="bc11"
                value="{{ $pib->pibInvoice->bc11 ?? old('bc11') }}">
        </div>
        <div class="form-group col">
            <label for="date_bc11">Tanggal BC 1.1</label>
            <div class="input-group date" id="bc11Date" data-target-input="nearest">
                <input name="date_bc11" type="text" class="form-control datetimepicker-input" data-target="#bc11Date"
                    value="{{ $pib->pibInvoice->date_bc11 ?? old('date_bc11') }}" />
                <div class="input-group-append" data-target="#bc11Date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="pos">POS</label>
            <input name="pos" type="text" class="form-control" id="pos"
                value="{{ $pib->pibInvoice->pos ?? old('pos') }}">
        </div>
        <div class="form-group col">
            <label for="sub">SUB</label>
            <input name="sub" type="text" class="form-control" id="sub" data-inputmask='"mask": "9999 9999"' data-mask
                value="{{ $pib->pibInvoice->sub ?? (old('sub') ?? '00000000') }}">
        </div>

    </div>
    <div class="row">
        <div class="form-group col">
            <label for="facility">Pemenuhan Persyaratan/Fasilitas Import</label>
            <input name="facility" type="text" class="form-control" id="facility"
                value="{{ $pib->pibInvoice->facility ?? old('facility') }}">
        </div>
        <div class="form-group col">
            <label for="dump">Tempat Penimbunan</label>
            <input name="dump" type="text" class="form-control" id="dump"
                value="{{ $pib->pibInvoice->dump ?? old('dump') }}">
        </div>

    </div>
    <div class="row">
        <div class="form-group col">
            <label for="valuta">Valuta</label>
            <select name="valuta" id="valuta" class="form-control">
                <option value="" selected disabled>Pilih</option>
                @foreach ($currency as $item)
                    @if (isset($pib))
                        @if ($pib->pibInvoice->valuta == $item->code)
                            <option value="{{ $item->code }}" symbol="{{ $item->symbol }}" selected>
                                {{ $item->name }} {{ $item->symbol }}
                            </option>
                        @else
                            <option value="{{ $item->code }}" symbol="{{ $item->symbol }}">
                                {{ $item->name }} {{ $item->symbol }}
                            </option>
                        @endif
                    @else
                        @if (old('valuta') == $item->code)
                            <option value="{{ $item->code }}" symbol="{{ $item->symbol }}" selected>
                                {{ $item->name }} {{ $item->symbol }}
                            </option>
                        @else
                            <option value="{{ $item->code }}" symbol="{{ $item->symbol }}">
                                {{ $item->name }} {{ $item->symbol }}
                            </option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="ndpbm">NDPBM</label>
            <input name="ndpbm" type="number" step="0.01" class="form-control" id="ndpbm"
                value="{{ $pib->pibInvoice->ndpbm ?? old('ndpbm') }}">
        </div>
        <div class="form-group col">
            <label for="value">Nilai EXW</label>
            <input name="value" type="number" step="0.01" class="form-control" id="value"
                value="{{ $pib->pibInvoice->value ?? old('value') }}">
        </div>
        <div class="form-group col">
            <label for="insurance">Asuransi LN/DN</label>
            <input name="insurance" type="number" step="0.01" class="form-control" id="insurance"
                value="{{ $pib->pibInvoice->insurance ?? old('insurance') }}">
        </div>
        <div class="form-group col">
            <label for="freight">Freight</label>
            <input name="freight" type="number" step="0.01" class="form-control" id="freight"
                value="{{ $pib->pibInvoice->freight ?? old('freight') }}">
        </div>
        <div class="form-group col">
            <label for="pabean_value">Nilai Pabean</label>
            <input name="pabean_value" type="number" step="0.01" class="form-control" id="pabean_value" readonly
                value="{{ $pib->pibInvoice->pabean_value ?? old('pabean_value') }}">
        </div>

    </div>
    <div class="btn btn-primary" onclick="stepper.next()">Next</div>
    <div class="btn btn-secondary" onclick="stepper.previous()">Kembali</div>

</div>
