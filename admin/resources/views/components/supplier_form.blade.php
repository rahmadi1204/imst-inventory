<div class="card-body">
    <div class="row">
        <div class="form-group col">
            <label for="inputKdSupplier">Kode Supplier</label>
            <input name="code_supplier" type="text" class="form-control"
                value="{{ $supplier->code_supplier ?? old('code_supplier') }}" id="inputKdSupplier" required>
        </div>
        <div class="form-group col">
            <label for="inputNameSupplier">Nama Supplier</label>
            <input name="name_supplier" type="text" class="form-control"
                value="{{ $supplier->name_supplier ?? old('name_supplier') }}" id="inputKdSupplier" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="tanggal">Tanggal:</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input name="date" type="text" class="form-control datetimepicker-input" data-target="#reservationdate"
                    required value="{{ $supplier->date ?? old('date') }} " />
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>

        <div class="form-group col">
            <label for="alamatSupplier">Alamat Supplier</label>
            <input name="address_supplier" type="text" class="form-control" id="alamatSupplier"
                value="{{ $supplier->address_supplier ?? old('address_supplier') }}" required>
        </div>
    </div>
</div>
<!-- /.card-body -->
