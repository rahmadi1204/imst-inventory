<div class="form-group col">
    <label for="inputKdwarehouse">Kode Gudang</label>
    <input name="code_warehouse" type="text" class="form-control"
        value="{{ $warehouse->code_warehouse ?? old('code_warehouse') }}" id="inputKdwarehouse" required>
</div>
<div class="form-group col">
    <label for="inputNamewarehouse">Nama Gudang</label>
    <input name="name_warehouse" type="text" class="form-control"
        value="{{ $warehouse->name_warehouse ?? old('name_warehouse') }}" id="inputKdwarehouse" required>
</div>
<div class="form-group col">
    <label for="tanggal">Tanggal:</label>
    <div class="input-group date" id="reservationdate" data-target-input="nearest">
        <input name="date" type="text" class="form-control datetimepicker-input" data-target="#reservationdate" required
            value="{{ $warehouse->date ?? old('date') }} " />
        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
</div>
<div class="form-group col">
    <label for="alamatwarehouse">Alamat Gudang</label>
    <input name="address_warehouse" type="text" class="form-control" id="alamatwarehouse"
        value="{{ $warehouse->address_warehouse ?? old('address_warehouse') }}" required>
</div>
