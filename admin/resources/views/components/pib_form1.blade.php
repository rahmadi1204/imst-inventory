<div id="step1" class="content" role="tabpanel" aria-labelledby="step1-trigger">
    <div class="row">

        <div class="form-group col">
            <label for="type_document_pabean">Tipe Dokumen Pabean</label>
            <input name="type_document_pabean" type="text" class="form-control" id="type_document_pabean"
                value="{{ $pib->type_document_pabean ?? old('type_document_pabean') }}">
        </div>
        <div class="form-group col">
            <label for="office_pabean">Kantor Pabean</label>
            <input name="office_pabean" type="text" class="form-control" id="office_pabean"
                value="{{ $pib->office_pabean ?? old('office_pabean') }}">
        </div>
        <div class="form-group col">
            <label for="no_approval">Nomor Pengajuan</label>
            <input name="no_approval" type="text" class="form-control"
                data-inputmask='"mask": "999999-999999-99999999-999999"' data-mask id="no_approval"
                value="{{ $pib->no_approval ?? old('no_approval') }}">
        </div>
        <div class="form-group col">
            <label for="no_po">Nomor Pre Order</label>
            <select name="no_po" id="no_po" class="form-control">
                <option selected disabled>Pilih</option>
                @foreach ($po as $item)
                    @isset($pib)
                        @if ($item->no_po == $pib->no_po)
                            <option value="{{ $item->no_po }}" selected>{{ $item->no_po }}</option>
                        @endif
                    @endisset
                    @if ($item->no_po == old('no_po'))
                        <option value="{{ $item->no_po }}" selected>{{ $item->no_po }}</option>
                    @else
                        <option value="{{ $item->no_po }}">{{ $item->no_po }}</option>
                    @endif
                @endforeach
            </select>
        </div>

    </div>
    <div class="row">
        <div class="form-group col">
            <label for="type_pib">Jenis PIB</label>
            <select name="type_pib" id="type_pib" class="form-control">
                <option selected disabled>Pilih</option>
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
            <input name="address_shipper" type="text" class="form-control" id="address_shipper" readonly
                value="{{ $pib->address_shipper ?? old('address_shipper') }}">
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
            <input name="address_seller" type="text" class="form-control" id="address_seller" readonly
                value="{{ $pib->address_seller ?? old('address_seller') }}">
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
            <input name="nik_importir" type="text" class="form-control" id="nik_importir" readonly
                value="{{ $pib->nik_importir ?? old('nik_importir') }}">
        </div>
        <div class="form-group col">
            <label for="address_importir">Alamat Importir</label>
            <input name="address_importir" type="text" class="form-control" id="address_importir" readonly
                value="{{ $pib->address_importir ?? old('address_importir') }}">
        </div>
        <div class="form-group col">
            <label for="status_importir">Status Importir</label>
            <input name="status_importir" type="text" class="form-control" id="status_importir" readonly
                value="{{ $pib->status_importir ?? old('status_importir') }}">
        </div>
        <div class="form-group col">
            <label for="apiu">APIU</label>
            <input name="apiu" type="text" class="form-control" id="apiu" readonly
                value="{{ $pib->apiu ?? old('apiu') }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="name_owner">Pemilik</label>
            <select name="name_owner" id="name_owner" class="form-control">
                <option selected disabled>Pilih</option>
                @foreach ($importir as $item)
                    <option value="{{ $item->name_importir }}" address="{{ $item->address_importir }}">
                        {{ $item->name_importir }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="address_owner">Alamat Pemilik</label>
            <input name="address_owner" type="text" class="form-control" id="address_owner" readonly
                value="{{ $pib->address_owner ?? old('address_owner') }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="name_ppjk">PPJK</label>
            <input type="text" name="name_ppjk" id="name_ppjk" class="form-control"
                value="{{ $pib->name_ppjk ?? old('name_ppjk') }}">
        </div>
        <div class="form-group col">
            <label for="npwp_ppjk">NPWP PPJK</label>
            <input name="npwp_ppjk" type="text" class="form-control" data-inputmask='"mask": "99.999.999.9.999.999"'
                data-mask id="npwp_ppjk" value="{{ $pib->npwp_ppjk ?? old('npwp_ppjk') }}">
        </div>
        <div class="form-group col">
            <label for="np_ppjk">NP-PPJK</label>
            <input name="np_ppjk" type="text" class="form-control" id="np_ppjk"
                data-inputmask='"mask": "999999 99-99-9999"' data-mask value="{{ $pib->np_ppjk ?? old('np_ppjk') }}">
        </div>


    </div>
    <div class="btn btn-primary" onclick="stepper.next()">Next</div>
</div>
