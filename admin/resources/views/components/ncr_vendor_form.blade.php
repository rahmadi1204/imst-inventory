<div class="card-body">
    <div class="row">
        <div class="form-group col-md-2">
            <label for="date_po">Tanggal Return</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input name="date_po" type="text" class="form-control datetimepicker-input"
                    data-target="#reservationdate" required value="{{ $po->date ?? old('date_po') }} " />
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="form-group col">
            <label for="no_po">No. Referensi</label>
            <input name="no_po" type="text" class="form-control" value="{{ $po->no_po ?? old('no_po') }}" id="no_po"
                required>
        </div>
        <div class="form-group col">
            <label for="project">Vendor</label>
            <input name="project" type="text" class="form-control" value="{{ $po->no_pib ?? old('project') }}"
                required>
        </div>
    </div>
    <div class="row">
        <li class="form-group col">
            <input class="form-check-input me-1" type="checkbox">
            Return Terima Barang
        </li>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="no_po">No Terima Barang</label>
            <input name="no_po" type="text" class="form-control" value="{{ $po->no_po ?? old('no_po') }}" id="no_po"
                required>
        </div>
        <div class="form-group col">
            <label for="product_code">Tipe Barang</label>
            <select name="product_code" id="product_code" class="form-control custom-select">
                <option selected disabled>Pilih</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="product_code">Kode Barang</label>
            <select name="product_code" id="product_code" class="form-control custom-select">
                <option selected disabled>Pilih</option>
                {{-- @foreach ($product as $item)

                @if (isset($po))
                    @if ($po->product_code == $item->product_code)
                        <option value="{{ $item->product_code }}" selected>
                            {{ $item->product_code }}
                        </option>
                    @else
                        <option value="{{ $item->product_code }}">
                            {{ $item->product_code }}
                        </option>
                    @endif
                @else
                    <option value="{{ $item->product_code }}">
                        {{ $item->product_code }}
                    </option>
                @endif
            @endforeach --}}
            </select>
        </div>
        <div class="form-group col">
            <label for="product_name">Nama Barang</label>
            <input name="product_name" type="text" class="form-control" id="product_name"
                value="{{ $po->product_name ?? old('product_name') }}" required readonly>
        </div>
        <div class="form-group col">
            <label for="value">Jumlah Barang</label>
            <input name="value" type="number" class="form-control" id="value"
                value="{{ $po->stock ?? old('stock') }}" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="unit_price">Mata Uang</label>
            <select name="product_code" id="product_code" class="form-control custom-select">
                <option selected disabled>Pilih</option>
                <option value="us">Dolar US</option>
                <option value="rp">Rupiah</option>
            </select>
        </div>
        <div class="form-group col-md-1">
            <label for="value">Kurs</label>
            <input name="value" type="number" class="form-control" id="value"
                value="{{ $po->stock ?? old('stock') }}" required>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <label for="no_po">Gudang</label>
            <input name="no_po" type="text" class="form-control" value="{{ $po->no_po ?? old('no_po') }}" id="no_po"
                required>
        </div>
        <div class="form-group col-md-4">
            <label for="project">Via</label>
            <input name="project" type="text" class="form-control" value="{{ $po->no_pib ?? old('project') }}"
                required>
        </div>
    </div>
</div>
<!-- /.card-body -->
