<div class="card-body">
    <div class="row">
        <div class="form-group col">
            <label for="inputAsalBarang">Asal Barang </label>
            <select name="product_from" id="inputAsalBarang" class="form-control custom-select">
                <option selected disabled>Pilih</option>
                @foreach ($asal as $item)

                    @if (isset($raw))
                        @if ($raw->product_from == $item->code_origin)
                            <option value="{{ $item->code_origin }}" selected>
                                {{ $item->origin . ' (' . strtoupper($item->code_origin) . ')' }}
                            </option>
                        @else
                            <option value="{{ $item->code_origin }}">
                                {{ $item->origin . ' (' . strtoupper($item->code_origin) . ')' }}
                            </option>
                        @endif
                    @else
                        <option value="{{ $item->code_origin }}">
                            {{ $item->origin . ' (' . strtoupper($item->code_origin) . ')' }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="inputLokasi">Tujuan / Lokasi</label>
            <select name="product_now" id="inputLokasi" class="form-control custom-select">
                <option selected disabled>Pilih</option>
                @foreach ($tujuan as $item)
                    @if (isset($raw))
                        @if ($raw->product_now == $item->code_warehouse)
                            <option value="{{ $item->code_warehouse }}" selected>
                                {{ $item->name_warehouse }}
                            </option>
                        @else
                            <option value="{{ $item->code_warehouse }}">
                                {{ $item->name_warehouse }}
                            </option>
                        @endif
                    @else
                        <option value="{{ $item->code_warehouse }}">
                            {{ $item->name_warehouse }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="inputKegunaan">Penggunaan</label>
            <select name="for_use" id="inputKegunaan" class="form-control custom-select">
                <option selected disabled>Pilih</option>
                <option value="Sendiri">Sendiri</option>
                <option value="Disubkontrakkan">Disubkontrakkan</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="inputPo">Nomor PO</label>
            <input name="no_po" type="text" class="form-control" value="{{ $raw->no_po ?? old('no_po') }}"
                required>
        </div>
        <div class="form-group col">
            <label for="inputPib">Nomor PIB</label>
            <input name="no_pib" type="text" class="form-control" value="{{ $raw->no_pib ?? old('no_pib') }}"
                required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="tanggal">Tanggal:</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input name="date_in" type="text" class="form-control datetimepicker-input"
                    data-target="#reservationdate" required value="{{ $raw->date_in ?? old('date_in') }} " />
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>

        <div class="form-group col">
            <label for="kodeBarang">Kode Barang</label>
            <input name="product_code" type="text" class="form-control" id="kodeBarang"
                value="{{ $raw->product_code ?? old('product_code') }}" required>
        </div>
        <div class="form-group col">
            <label for="namaBarang">Nama Barang</label>
            <input name="product_name" type="text" class="form-control" id="namaBarang"
                value="{{ $raw->product_name ?? old('product_name') }}" required>
        </div>
        <div class="form-group col">
            <label for="jmlBarang">Jumlah Barang</label>
            <input name="stock" type="number" class="form-control" id="jmlBarang"
                value="{{ $raw->stock ?? old('stock') }}" required>
        </div>
        <div class="form-group col">
            <label for="satuanBarang">Satuan Barang</label>
            <select name="unit" id="satuanBarang" class="form-control" id="satuanBarang">
                <option selected disabled>Pilih</option>
                @foreach ($satuan as $item)
                    @if (isset($raw))
                        @if ($raw->unit == $item->unit)
                            <option value="{{ $item->unit }}" selected>
                                {{ $item->unit }}
                            </option>
                        @else
                            <option value="{{ $item->unit }}">
                                {{ $item->unit }}
                            </option>
                        @endif
                    @else
                        <option value="{{ $item->unit }}">
                            {{ $item->unit }}
                        </option>
                    @endif
                @endforeach

            </select>
        </div>
    </div>
</div>
<!-- /.card-body -->
