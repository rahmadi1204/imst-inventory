<div class="card-body">
    <div class="row">
        <div class="form-group col">
            <label for="inputKdCustomer">Kode Customer</label>
            <input name="code_customer" type="text" class="form-control"
                value="{{ $customer->code_customer ?? old('code_customer') }}" id="inputKdCustomer" required>
        </div>
        <div class="form-group col">
            <label for="inputNameCustomer">Nama Customer</label>
            <input name="name_customer" type="text" class="form-control"
                value="{{ $customer->name_customer ?? old('name_customer') }}" id="inputKdCustomer" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="tanggal">Tanggal:</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input name="date" type="text" class="form-control datetimepicker-input" data-target="#reservationdate"
                    required value="{{ $customer->date ?? old('date') }} " />
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>

        <div class="form-group col">
            <label for="alamatCustomer">Alamat Customer</label>
            <input name="address_customer" type="text" class="form-control" id="alamatCustomer"
                value="{{ $customer->address_customer ?? old('address_customer') }}" required>
        </div>
    </div>
</div>
<!-- /.card-body -->
