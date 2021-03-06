<div id="step1" class="content" role="tabpanel" aria-labelledby="step1-trigger">
    <div class="row">

        <div class="form-group col">
            <label for="type_document_pabean">Tipe Dokumen Pabean</label>
            <input name="type_document_pabean" type="text" class="form-control" id="type_document_pabean"
                value="{{ $pib->type_document_pabean ?? old('type_document_pabean') }}" required>
        </div>
        <div class="form-group col">
            <label for="office_pabean">Kantor Pabean</label>
            <input name="office_pabean" type="text" class="form-control" id="office_pabean"
                value="{{ $pib->office_pabean ?? old('office_pabean') }}" required>
        </div>
        <div class="form-group col">
            <label for="no_approval">Nomor Pengajuan</label>
            <input name="no_approval" type="text" class="form-control"
                data-inputmask='"mask": "999999-999999-99999999-999999"' data-mask id="no_approval"
                value="{{ $pib->no_approval ?? (old('no_approval') ?? '000000000000' . date('Ymdhis')) }}" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="no_po">Nomor Pre Order</label>
            <select name="no_po" id="no_po" class="form-control" required>
                <option selected>Pilih</option>
                @foreach ($po as $item)
                    @if (isset($pib))
                        @if ($item->code_po == $pib->code_po)
                            <option value="{{ $pib->po->code_po }}"
                                name_supplier="{{ $pib->supplier->name_supplier }}"
                                code_supplier="{{ $pib->supplier_id }}" code_po="{{ $pib->code_po }}"
                                address="{{ $pib->supplier->address_supplier }}" selected>
                                {{ $pib->po->no_po }}</option>
                        @else
                            <option value="{{ $pib->po->code_po }}"
                                name_supplier="{{ $pib->supplier->name_supplier }}"
                                code_supplier="{{ $pib->supplier_id }}" code_po="{{ $pib->code_po }}"
                                address="{{ $pib->supplier->address_supplier }}">
                                {{ $pib->po->no_po }}</option>
                        @endif
                    @else
                        @if ($item->no_po == old('no_po'))
                            <option value="{{ $item->po->code_po }}"
                                name_supplier="{{ $item->supplier->name_supplier }}"
                                code_supplier="{{ $item->supplier_id }}" code_po="{{ $item->code_po }}"
                                address="{{ $item->supplier->address_supplier }}" selected>
                                {{ $item->po->no_po }}</option>
                        @else
                            <option value="{{ $item->code_po }}"
                                name_supplier="{{ $item->supplier->name_supplier }}"
                                code_supplier="{{ $item->supplier_id }}" code_po="{{ $item->code_po }}"
                                address="{{ $item->supplier->address_supplier }}">
                                {{ $item->no_po }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
            <input type="hidden" name="code_po" id="code_po" value="{{ old('code_po') }}">
        </div>
        <div class="form-group col">
            <label for="type_pib">Jenis PIB</label>
            <select name="type_pib" id="type_pib" class="form-control" required>
                <option selected>Pilih</option>
                @if (isset($pib->type_pib))
                    <option value="Biasa" {{ $pib->type_pib == 'Biasa' ? 'selected' : '' }}>1. Biasa</option>
                    <option value="Berkala" {{ $pib->type_pib == 'Berkala' ? 'selected' : '' }}>2. Berkala</option>
                @else
                    <option value="Biasa" {{ old('type_pib') == 'Biasa' ? 'selected' : '' }}>1. Biasa</option>
                    <option value="Berkala" {{ old('type_pib') == 'Berkala' ? 'selected' : '' }}>2. Berkala</option>
                @endif
            </select>
        </div>
        <div class="form-group col">
            <label for="type_import">Jenis Import</label>
            <select name="type_import" id="type_import" class="form-control" required>
                <option selected>Pilih</option>
                @if (isset($pib->type_pib))
                    <option value="Untuk Dipakai" {{ $pib->type_import == 'Untuk Dipakai' ? 'selected' : '' }}>1.
                        Untuk
                        Dipakai</option>
                    <option value="Sementara" {{ $pib->type_import == 'Sementara' ? 'selected' : '' }}>2. Sementara
                    </option>
                    <option value="Pelayanan Segera" {{ $pib->type_import == 'Pelayanan Segera' ? 'selected' : '' }}>
                        3.
                        Pelayanan Segera</option>
                    <option value="Gabungan 1 dan 2"
                        {{ $pib->type_import == 'Gaabungan 1 dan 2' ? 'selected' : '' }}>4.
                        Gabungan 1 dan 2</option>
                @else
                    <option value="Untuk Dipakai" {{ old('type_import') == 'Untuk Dipakai' ? 'selected' : '' }}>1.
                        Untuk
                        Dipakai</option>
                    <option value="Sementara" {{ old('type_import') == 'Sementara' ? 'selected' : '' }}>2. Sementara
                    </option>
                    <option value="Pelayanan Segera"
                        {{ old('type_import') == 'Pelayanan Segera' ? 'selected' : '' }}>3.
                        Pelayanan Segera</option>
                    <option value="Gabungan 1 dan 2"
                        {{ old('type_import') == 'Gaabungan 1 dan 2' ? 'selected' : '' }}>
                        4.
                        Gabungan 1 dan 2</option>
                @endif
            </select>
        </div>
        <div class="form-group col">
            <label for="payment_method">Cara Pembayaran</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option selected>Pilih</option>
                @if (isset($pib->type_pib))
                    <option value="Biasa/Tunai" {{ $pib->payment_method == 'Biasa/Tunai' ? 'selected' : '' }}>1.
                        Biasa/Tunai</option>
                    <option value="Berkala" {{ $pib->payment_method == 'Berkala' ? 'selected' : '' }}>2. Berkala
                    </option>
                    <option value="Dengan Jaminan" {{ $pib->payment_method == 'Dengan Jaminan' ? 'selected' : '' }}>
                        3.
                        Dengan Jaminan</option>
                    <option value="Lainnya" {{ $pib->payment_method == 'Lainnya' ? 'selected' : '' }}>4.
                        Lainnya</option>
                @else
                    <option value="Biasa/Tunai" {{ old('payment_method') == 'Biasa/Tunai' ? 'selected' : '' }}>1.
                        Biasa/Tunai</option>
                    <option value="Berkala" {{ old('payment_method') == 'Berkala' ? 'selected' : '' }}>2. Berkala
                    </option>
                    <option value="Dengan Jaminan" {{ old('payment_method') == 'Dengan Jaminan' ? 'selected' : '' }}>
                        3.
                        Dengan Jaminan</option>
                    <option value="Lainnya" {{ old('payment_method') == 'Lainnya' ? 'selected' : '' }}>
                        4.
                        Lainnya</option>
                @endif
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="name_shipper">Pengirim</label>
            <select name="name_shipper" id="name_shipper" class="form-control" required>
                <option selected>Pilih</option>
                @foreach ($seller as $item)
                    @if (isset($pib))
                        @if ($item->id == $pib->supplier_id)
                            <option value="{{ $pib->supplier_id }}"
                                address="{{ $pib->supplier->address_supplier }}" selected>
                                {{ $pib->supplier->name_supplier }}</option>
                        @else
                            <option value="{{ $pib->supplier_id }}"
                                address="{{ $pib->supplier->address_supplier }}">
                                {{ $pib->supplier->name_supplier }}</option>
                        @endif
                    @else
                        @if ($item->id == old('name_shipper'))
                            <option value="{{ $item->id }}" address="{{ $item->address_supplier }}" selected>
                                {{ $item->name_supplier }}</option>
                        @else
                            <option value="{{ $item->id }}" address="{{ $item->address_supplier }}">
                                {{ $item->name_supplier }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="address_shipper">Alamat Pengirim</label>
            <input name="address_shipper" type="text" class="form-control" id="address_shipper" readonly
                value="{{ $pib->supplier->address_supplier ?? old('address_shipper') }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="name_seller">Penjual</label>
            <select name="name_seller" id="name_seller" class="form-control" required>
                <option selected>Pilih</option>
                @foreach ($seller as $item)
                    @if (isset($pib))
                        @if ($item->id == $pib->supplier_id)
                            <option value="{{ $pib->supplier_id }}"
                                address="{{ $pib->supplier->address_supplier }}" selected>
                                {{ $pib->supplier->name_supplier }}</option>
                        @else
                            <option value="{{ $pib->supplier_id }}"
                                address="{{ $pib->supplier->address_supplier }}">
                                {{ $pib->supplier->name_supplier }}</option>
                        @endif
                    @else
                        @if ($item->id == old('name_shipper'))
                            <option value="{{ $item->id }}" address="{{ $item->address_supplier }}" selected>
                                {{ $item->name_supplier }}</option>
                        @else
                            <option value="{{ $item->id }}" address="{{ $item->address_supplier }}">
                                {{ $item->name_supplier }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="address_seller">Alamat Penjual</label>
            <input name="address_seller" type="text" class="form-control" id="address_seller" readonly
                value="{{ $pib->supplier->address_supplier ?? old('address_seller') }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="name_importir">Importir</label>
            <select name="name_importir" id="name_importir" class="form-control" required>
                <option selected>Pilih</option>
                @foreach ($importir as $item)
                    @if (isset($pib))
                        @if ($item->id == $pib->importir_id)
                            <option value="{{ $pib->importir_id }}"
                                address="{{ $pib->importir->address_importir }}"
                                nik="{{ $pib->importir->nik_importir }}"
                                status="{{ $pib->importir->status_importir }}" apiu="{{ $pib->importir->apiu }}"
                                selected>
                                {{ $pib->importir->name_importir }}</option>
                        @else
                            <option value="{{ $pib->importir_id }}"
                                address="{{ $pib->importir->address_importir }}"
                                nik="{{ $pib->importir->nik_importir }}"
                                status="{{ $pib->importir->status_importir }}" apiu="{{ $pib->importir->apiu }}">
                                {{ $pib->importir->name_importir }}</option>
                        @endif
                    @else
                        @if ($item->id == old('name_importir'))
                            <option value="{{ $item->id }}" address="{{ $item->address_importir }}"
                                nik="{{ $item->nik_importir }}" status="{{ $item->status_importir }}"
                                apiu="{{ $item->apiu }}" selected>
                                {{ $item->name_importir }}</option>
                        @else
                            <option value="{{ $item->id }}" address="{{ $item->address_importir }}"
                                nik="{{ $item->nik_importir }}" status="{{ $item->status_importir }}"
                                apiu="{{ $item->apiu }}">
                                {{ $item->name_importir }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="nik_importir">Identitas Importir</label>
            <input name="nik_importir" type="text" class="form-control" id="nik_importir" readonly
                value="{{ $pib->importir->nik_importir ?? old('nik_importir') }}">
        </div>
        <div class="form-group col">
            <label for="address_importir">Alamat Importir</label>
            <input name="address_importir" type="text" class="form-control" id="address_importir" readonly
                value="{{ $pib->importir->address_importir ?? old('address_importir') }}">
        </div>
        <div class="form-group col">
            <label for="status_importir">Status Importir</label>
            <input name="status_importir" type="text" class="form-control" id="status_importir" readonly
                value="{{ $pib->importir->status_importir ?? old('status_importir') }}">
        </div>
        <div class="form-group col">
            <label for="apiu">APIU</label>
            <input name="apiu" type="text" class="form-control" id="apiu" readonly
                value="{{ $pib->importir->apiu ?? old('apiu') }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="name_owner">Pemilik</label>
            <select name="name_owner" id="name_owner" class="form-control" required>
                <option selected>Pilih</option>
                @foreach ($importir as $item)
                    @if (isset($pib))
                        @if ($item->id == $pib->importir_id)
                            <option value="{{ $pib->importir_id }}"
                                address="{{ $pib->importir->address_importir }}"
                                nik="{{ $pib->importir->nik_importir }}"
                                status="{{ $pib->importir->status_importir }}" apiu="{{ $pib->importir->apiu }}"
                                selected>
                                {{ $pib->importir->name_importir }}</option>
                        @else
                            <option value="{{ $pib->importir_id }}"
                                address="{{ $pib->importir->address_importir }}"
                                nik="{{ $pib->importir->nik_importir }}"
                                status="{{ $pib->importir->status_importir }}"
                                apiu="{{ $pib->importir->apiu }}">
                                {{ $pib->importir->name_importir }}</option>
                        @endif
                    @else
                        @if ($item->id == old('name_importir'))
                            <option value="{{ $item->id }}" address="{{ $item->address_importir }}"
                                nik="{{ $item->nik_importir }}" status="{{ $item->status_importir }}"
                                apiu="{{ $item->apiu }}" selected>
                                {{ $item->name_importir }}</option>
                        @else
                            <option value="{{ $item->id }}" address="{{ $item->address_importir }}"
                                nik="{{ $item->nik_importir }}" status="{{ $item->status_importir }}"
                                apiu="{{ $item->apiu }}">
                                {{ $item->name_importir }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="address_owner">Alamat Pemilik</label>
            <input name="address_owner" type="text" class="form-control" id="address_owner" readonly
                value="{{ $pib->importir->address_importir ?? old('address_owner') }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="name_ppjk">PPJK</label>
            <input type="text" name="name_ppjk" id="name_ppjk" class="form-control"
                value="{{ $pib->name_ppjk ?? old('name_ppjk') }}" required>
        </div>
        <div class="form-group col">
            <label for="npwp_ppjk">NPWP PPJK</label>
            <input name="npwp_ppjk" type="text" class="form-control" data-inputmask='"mask": "99.999.999.9.999.999"'
                data-mask id="npwp_ppjk" value="{{ $pib->npwp_ppjk ?? (old('npwp_ppjk') ?? '000000000000000') }}">
        </div>
        <div class="form-group col">
            <label for="np_ppjk">NP-PPJK</label>
            <input name="np_ppjk" type="text" class="form-control" id="np_ppjk"
                data-inputmask='"mask": "999999 99-99-9999"' data-mask
                value="{{ $pib->np_ppjk ?? (old('np_ppjk') ?? '00000000000000') }}">
        </div>


    </div>
    <div class="btn btn-primary" onclick="stepper.next()">Next</div>
</div>
