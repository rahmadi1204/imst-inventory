<div class="form-group col">
    <label for="nik_importir">NIK Importir</label>
    <input name="nik_importir" type="text" class="form-control"
        value="{{ $importir->nik_importir ?? old('nik_importir') }}" id="nik_importir" required>
</div>
<div class="form-group col">
    <label for="name_importir">Nama Importir</label>
    <input name="name_importir" type="text" class="form-control"
        value="{{ $importir->name_importir ?? old('name_importir') }}" id="name_importir" required>
</div>
<div class="form-group col">
    <label for="address_importir">Alamat Importir</label>
    <input name="address_importir" type="text" class="form-control" id="address_importir"
        value="{{ $importir->address_importir ?? old('address_importir') }}" required>
</div>
<div class="form-group col">
    <label for="status_importir">Status Importir</label>
    <input name="status_importir" type="text" class="form-control" id="status_importir"
        value="{{ $importir->status_importir ?? old('status_importir') }}" required>
</div>
<div class="form-group col">
    <label for="apiu">APIU Importir</label>
    <input name="apiu" type="text" class="form-control" id="apiu" value="{{ $importir->apiu ?? old('apiu') }}"
        required>
</div>
