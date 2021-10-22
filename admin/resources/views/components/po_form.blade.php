<div class="card-body">
    <div class="row">
        <div class="form-group col">
            <label for="no_po">Nomor PO</label>
            <input name="no_po" type="text" class="form-control" value="{{ $po->no_po ?? old('no_po') }}" id="no_po"
                required>
        </div>
        <div class="form-group col">
            <label for="project">Project</label>
            <input name="project" type="text" class="form-control" value="{{ $po->project ?? old('project') }}"
                required>
        </div>
        <div class="form-group col">
            <label for="date_po">Tanggal:</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input name="date_po" type="text" class="form-control datetimepicker-input"
                    data-target="#reservationdate" required value="{{ $po->date_po ?? old('date_po') }} " />
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="name_supplier">Vendor </label>
            <select name="name_supplier" id="name_supplier" class="form-control custom-select">
                <option selected>Pilih</option>
                @foreach ($supplier as $item)

                    @if (isset($po))
                        @if ($po->supplier_id == $item->id)
                            <option value="{{ $item->id }}" address="{{ $item->address_supplier }}" selected>
                                {{ $item->name_supplier }}
                            </option>
                        @else
                            <option value="{{ $item->id }}" address="{{ $item->address_supplier }}">
                                {{ $item->name_supplier }}
                            </option>
                        @endif
                    @else
                        <option value="{{ $item->id }}" address="{{ $item->address_supplier }}">
                            {{ $item->name_supplier }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="address_supplier">Alamat Vendor</label>
            <input name="address_supplier" type="text" class="form-control"
                value="{{ $poSupplier->address_supplier ?? old('address_supplier') }}" id="address_supplier" required
                readonly>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="name_warehouse">Tujuan / Lokasi</label>
            <div class="input-group">
                <select name="name_warehouse" id="name_warehouse" class="form-control custom-select">
                    <option selected>Pilih</option>
                    @foreach ($tujuan as $item)
                        @if (isset($po))
                            @if ($po->warehouse_id == $item->id)
                                <option value="{{ $item->id }}" address="{{ $item->address_warehouse }}"
                                    selected>
                                    {{ $item->name_warehouse }}
                                </option>
                            @else
                                <option value="{{ $item->id }}" address="{{ $item->address_warehouse }}">
                                    {{ $item->name_warehouse }}
                                </option>
                            @endif
                        @else
                            <option value="{{ $item->id }}" address="{{ $item->address_warehouse }}">
                                {{ $item->name_warehouse }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <input type="text" name="address_warehouse" class="form-control" id="address_warehouse" @isset($po)
                    value="{{ $poWarehouse->address_warehouse }}" @endisset readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-4">
            <label for="currency">Mata Uang</label>
            <select name="currency" id="currency" class="form-control custom-select">
                <option selected disabled>Pilih</option>
                @foreach ($currency as $item)

                    @if (isset($po))
                        @if ($po->currency == $item->code)
                            <option value="{{ $item->code }}" symbol="{{ $item->symbol }}" selected>
                                {{ $item->symbol }} {{ $item->name }}
                            </option>
                        @else
                            <option value="{{ $item->code }}" symbol="{{ $item->symbol }}">
                                {{ $item->symbol }} {{ $item->name }}
                            </option>
                        @endif
                    @else
                        <option value="{{ $item->code }}" symbol="{{ $item->symbol }}">
                            {{ $item->name }} ({{ $item->symbol }})
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <table id="productAddRemove" class="table table-bordered table-hover nowrap">
        <thead class="thead-light">
            <tr>
                <th>Kode Barang</th>
                <th>Deskripsi Barang (Tipe Barang dan Nama Barang)</th>
                <th>Jumlah Barang</th>
                <th>Harga Barang</th>
                <th>Jumlah Total</th>
                <th>Latest Of Shipment</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select name="code_product[0]" id="code_product0" class="form-control">
                        <option value="" selected disabled>Pilih</option>
                        @foreach ($product as $item)
                            <option value="{{ $item->id }}" type="{{ $item->type_product }}"
                                name="{{ $item->name_product }}">
                                {{ $item->code_product }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <div class="input-group">
                        <input type="text" name="description[0]" id="description0" class="form-control">
                    </div>
                </td>

                <td><input type="number" name="qty_product[0]" id="qty_product0" class="form-control" />
                </td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text curr">$</span>
                        </div>
                        <input name="unit_price[0]" type="number" step="0.01" class="form-control" id="unit_price0"
                            value="{{ $po->unit_price ?? old('unit_price') }}">
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text curr">$</span>
                        </div>
                        <input name="total_amount[0]" type="number" step="0.01" class="form-control mata-uang"
                            id="total_amount0" value="{{ $po->total_amount ?? old('total_amount') }}" readonly>
                    </div>
                </td>
                <td>
                    <input type="text" name="latest[0]" id="latest0" class="form-control"
                        data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                </td>
                <td><button type="button" name="add" id="dynamic-pr" class="btn btn-outline-primary"><i
                            class="fa fa-plus"></i></button></td>
            </tr>
        </tbody>
    </table>
</div>
