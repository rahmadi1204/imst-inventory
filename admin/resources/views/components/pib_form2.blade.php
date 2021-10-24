<div id="step2" class="content" role="tabpanel" aria-labelledby="step2-trigger">

    <div class="row">
        <div class="form-group col">
            <label for="no_register">Nomor Pendaftaran</label>
            <input name="no_register" type="text" class="form-control" id="no_register"
                value="{{ $pib->pibLoad->no_register ?? old('no_register') }}">
        </div>
        <div class="form-group col">
            <label for="date_register">Tanggal Pendaftaran</label>
            <div class="input-group date" id="registerDate" data-target-input="nearest">
                <input name="date_register" type="text" class="form-control datetimepicker-input"
                    data-target="#registerDate" value="{{ $pib->pibLoad->date_register ?? old('date_register') }}" />
                <div class="input-group-append" data-target="#registerDate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-3">
            <label for="way_transport">Cara Pengangkatan</label>
            <input name="way_transport" type="text" class="form-control" id="way_transport"
                value="{{ $pib->pibLoad->way_transport ?? old('way_transport') }}">
        </div>
        <div class="form-group col">
            <label for="name_transport">Nama Sarana Pengangkat & No. Voy dan
                Bendera</label>
            <input name="name_transport" type="text" class="form-control" id="name_transport"
                value="{{ $pib->pibLoad->name_transport ?? old('name_transport') }}">
        </div>
        <div class="form-group col">
            <label for="date_estimate">Estimasi Tiba</label>
            <div class="input-group date" id="estimateDate" data-target-input="nearest">
                <input name="date_estimate" type="text" class="form-control datetimepicker-input"
                    data-target="#estimateDate" value="{{ $pib->pibLoad->date_estimate ?? old('date_estimate') }}" />
                <div class="input-group-append" data-target="#estimateDate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="load_place">Pelabuhan Muat</label>
            <input name="load_place" type="text" class="form-control" id="load_place"
                value="{{ $pib->pibLoad->load_place ?? old('load_place') }}">
        </div>
        <div class="form-group col">
            <label for="load_transit">Pelabuhan Transit</label>
            <input name="load_transit" type="text" class="form-control" id="load_transit"
                value="{{ $pib->pibLoad->load_transit ?? old('load_transit') }}">
        </div>
        <div class="form-group col">
            <label for="load_destination">Pelabuhan Tujuan</label>
            <input name="load_destination" type="text" class="form-control" id="load_destination"
                value="{{ $pib->pibLoad->load_destination ?? old('load_destination') }}">
        </div>

    </div>
    <div class="btn btn-primary" onclick="stepper.next()">Next</div>
    <div class="btn btn-secondary" onclick="stepper.previous()">Kembali</div>
</div>
