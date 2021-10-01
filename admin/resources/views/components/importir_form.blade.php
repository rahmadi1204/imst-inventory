<div class="form-group col">
    <label for="inputKdImportir">Kode Importir</label>
    <input name="nik_mportir" type="text" class="form-control"
        value="{{ $importir->nik_mportir ?? old('nik_mportir') }}" id="inputKdImportir" required>
</div>
<div class="form-group col">
    <label for="inputNameimportir">Nama Importir</label>
    <input name="name_importir" type="text" class="form-control"
        value="{{ $importir->name_importir ?? old('name_importir') }}" id="inputKdImportir" required>
</div>
<div class="form-group col">
    <label for="tanggal">Tanggal:</label>
    <div class="input-group date" id="reservationdate" data-target-input="nearest">
        <input name="date" type="text" class="form-control datetimepicker-input" data-target="#reservationdate" required
            value="{{ $importir->date ?? old('date') }} " />
        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
</div>
<div class="form-group col">
    <label for="alamatimportir">Alamat Importir</label>
    <input name="address_importir" type="text" class="form-control" id="alamatimportir"
        value="{{ $importir->address_importir ?? old('address_importir') }}" required>
</div>
