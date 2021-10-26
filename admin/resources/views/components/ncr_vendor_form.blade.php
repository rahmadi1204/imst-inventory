<div class="card-body">
    <div class="row">
        <div class="form-group col-md-2">
            <label for="date_ncrv">Tanggal Return</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input name="date_ncrv" type="text" class="form-control datetimepicker-input"
                    data-target="#reservationdate" required value="{{ $data->date_ncrv ?? old('date_ncrv') }} " />
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="form-group col">
            <label for="no_po">No. PO</label>
            <select name="no_po" id="no_po" class="form-control">
                <option selected disabled>Pilih</option>
                @foreach ($po as $item)
                    @if (isset($data))
                        @if ($item->code_po == $data->code_po)
                            <option value="{{ $item->code_po }}" code_supplier="{{ $item->id }}"
                                name_supplier="{{ $item->name_supplier }}" code_po="{{ $item->code_po }}"
                                address="{{ $item->address_supplier }}" selected>
                                {{ $item->no_po }}</option>
                        @else
                            <option value="{{ $item->code_po }}" code_supplier="{{ $item->id }}"
                                name_supplier="{{ $item->name_supplier }}" code_po="{{ $item->code_po }}"
                                address="{{ $item->address_supplier }}">
                                {{ $item->no_po }}</option>
                        @endif
                    @else
                        @if ($item->no_po == old('no_po'))
                            <option value="{{ $item->code_po }}" code_supplier="{{ $item->id }}"
                                name_supplier="{{ $item->name_supplier }}" code_po="{{ $item->code_po }}"
                                address="{{ $item->address_supplier }}" selected>
                                {{ $item->no_po }}</option>
                        @else
                            <option value="{{ $item->code_po }}" code_supplier="{{ $item->id }}"
                                name_supplier="{{ $item->name_supplier }}" code_po="{{ $item->code_po }}"
                                address="{{ $item->address_supplier }}" selected>
                                {{ $item->no_po }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="no_ref">No. Referensi</label>
            <input type="text" name="no_ref" class="form-control" value="{{ $data->no_ref ?? old('no_ref') }}">
        </div>
        <div class="form-group col">
            <label for="name_supplier">Vendor</label>
            <input type="hidden" name="code_po" id="code_po" value="{{ $data->code_po ?? old('code_po') }}" required>
            <input type="hidden" name="code_supplier" id="code_supplier"
                value="{{ $data->supplier_id ?? old('code_supplier') }}" required>
            <input name="name_supplier" type="text" class="form-control" id="name_supplier"
                value="{{ $data->supplier->name_supplier ?? old('name_supplier') }}" required readonly>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="name_warehouse">Gudang</label>
            <select name="name_warehouse" id="name_warehouse" class="form-control custom-select">
                <option selected>Pilih</option>
                @foreach ($warehouse as $item)
                    @if (isset($data))
                        @if ($data->warehouse_id == $item->id)
                            <option value="{{ $item->id }}" address="{{ $item->address_warehouse }}" selected>
                                {{ $item->name_warehouse }}
                            </option>
                        @else
                            <option value="{{ $item->id }}" address="{{ $item->address_warehouse }}">
                                {{ $item->name_warehouse }}
                            </option>
                        @endif
                    @else
                        @if (old('name_warehouse') == $item->id)
                            <option value="{{ $item->id }}" address="{{ $item->address_warehouse }}" selected>
                                {{ $item->name_warehouse }}
                            </option>
                        @else
                            <option value="{{ $item->id }}" address="{{ $item->address_warehouse }}">
                                {{ $item->name_warehouse }}
                            </option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="way_transport">Via</label>
            <input name="way_transport" id="way_transport" type="text" class="form-control"
                value="{{ $data->way_transport ?? old('way_transport') }}" required>
        </div>
    </div>

    <table class="table table-bordered nowrap" id="productAddRemove1">
        <thead class="thead-light">
            <tr>
                <th>Kode Barang</th>
                <th>Jenis & Nama Barang</th>
                <th>Jumlah Produk</th>
                <th>Satuan Produk</th>
                <th></th>
            </tr>
        </thead>
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
            <input type="text" class="form-control" name="type_product[0]" id="type_product0" readonly hidden>
            <td>
                <input type="text" name="name_product[0]" id="name_product0" class="form-control" readonly>
            </td>
            <td><input type="number" step="0.01" name="qty_product[0]" class="form-control" />
            </td>
            <td>
                <select name="unit_product[0]" id="unit_product" class="form-control">
                    <option value="" selected disabled>Pilih</option>
                    @foreach ($unit as $item)
                        <option value="{{ $item->unit }}">{{ $item->unit }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td><button type="button" name="add" id="dynamic-pr" class="btn btn-outline-primary"><i
                        class="fa fa-plus"></i></button></td>
        </tr>
    </table>

</div>
<!-- /.card-body -->
