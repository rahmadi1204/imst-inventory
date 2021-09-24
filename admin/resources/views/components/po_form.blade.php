<div class="card-body">
    <div class="row">
        <div class="form-group col">
            <label for="vendor_name">Vendor </label>
            <select name="vendor_name" id="vendor_name" class="form-control custom-select">
                <option selected>Pilih</option>
                @foreach ($supplier as $item)

                    @if (isset($po))
                        @if ($po->vendor_name == $item->name_supplier)
                            <option value="{{ $item->name_supplier }}" address="{{ $item->address_supplier }}"
                                selected>
                                {{ $item->name_supplier }}
                            </option>
                        @else
                            <option value="{{ $item->name_supplier }}" address="{{ $item->address_supplier }}">
                                {{ $item->name_supplier }}
                            </option>
                        @endif
                    @else
                        <option value="{{ $item->name_supplier }}" address="{{ $item->address_supplier }}">
                            {{ $item->name_supplier }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="vendor_address">Alamat Vendor</label>
            <input name="vendor_address" type="text" class="form-control" value="{{ $po->no_po ?? old('no_po') }}"
                id="vendor_address" required readonly>
        </div>
        <div class="form-group col">
            <label for="send_address">Tujuan / Lokasi</label>
            <div class="input-group">
                <select name="send_address" id="send_address" class="form-control custom-select">
                    <option selected>Pilih</option>
                    @foreach ($tujuan as $item)
                        @if (isset($po))
                            @if ($po->send_address == $item->name_warehouse)
                                <option value="{{ $item->name_warehouse }}"
                                    address="{{ $item->address_warehouse }}" selected>
                                    {{ $item->name_warehouse }}
                                </option>
                            @else
                                <option value="{{ $item->name_warehouse }}"
                                    address="{{ $item->address_warehouse }}">
                                    {{ $item->name_warehouse }}
                                </option>
                            @endif
                        @else
                            <option value="{{ $item->name_warehouse }}" address="{{ $item->address_warehouse }}">
                                {{ $item->name_warehouse }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <input type="text" name="address_warehouse" class="form-control" id="address_warehouse" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="no_po">Nomor PO</label>
            <input name="no_po" type="text" class="form-control" value="{{ $po->no_po ?? old('no_po') }}"
                id="no_po" required>
        </div>
        <div class="form-group col">
            <label for="project">Project</label>
            <input name="project" type="text" class="form-control" value="{{ $po->no_pib ?? old('project') }}"
                required>
        </div>
        <div class="form-group col">
            <label for="date_po">Tanggal:</label>
            <div class="input-group date" id="datePO" data-target-input="nearest">
                <input name="date_po" type="text" class="form-control datetimepicker-input" data-target="#datePO"
                    required value="{{ $po->date ?? old('date_po') }} " />
                <div class="input-group-append" data-target="#datePO" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="form-group col">
            <label for="currency">Mata Uang</label>
            <select name="currency" id="currency" class="form-control custom-select">
                <option selected disabled>Pilih</option>
                <option value="USD">Dolar US</option>
                <option value="IDR">Rupiah</option>
            </select>
        </div>
    </div>
    <table id="productAddRemove" class="table table-bordered table-hover table-responsive">
        <tr>
            <th style="width: 10%">Kode Barang</th>
            <th style="width: 14%">Tipe Barang</th>
            <th style="width: 14%">Nama Barang</th>
            <th style="width: 10%">Deskripsi</th>
            <th style="width: 8%">Latestk</th>
            <th style="width: 9%">Jumlah Barang</th>
            <th style="width: 15%">Harga Barang</th>
            <th style="width: 15%">Jumlah Total</th>
            <th style="width: 5%"></th>
        </tr>
        <tr>
            <td>
                <select name="code_product[0]" id="code_product0" class="form-control">
                    <option value="" selected disabled>Pilih</option>
                    @foreach ($product as $item)
                        <option value="{{ $item->code_product }}" type="{{ $item->type_product }}"
                            name="{{ $item->name_product }}">
                            {{ $item->code_product }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="type_product[0]" id="type_product0" readonly>
            </td>
            <td>
                <input type="text" name="name_product[0]" id="name_product0" class="form-control" readonly>
            </td>
            <td>
                <input type="text" name="description[0]" id="description0" class="form-control">
            </td>
            <td>
                <input type="text" name="latest[0]" id="latest0" class="form-control">
            </td>
            <td><input type="number" name="qty_product[0]" id="qty_product0" class="form-control" />
            </td>
            <td>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text curr">IDR</span>
                    </div>
                    <input name="unit_price[0]" type="number" class="form-control" id="unit_price0"
                        value="{{ $po->unit_price ?? old('unit_price') }}" required>
                </div>
            </td>
            <td>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text curr">IDR</span>
                    </div>
                    <input name="total_amount[0]" type="number" class="form-control mata-uang" id="total_amount0"
                        value="{{ $po->total_amount ?? old('total_amount') }}" required readonly>
                </div>
            </td>
            <td><button type="button" name="add" id="dynamic-pr" class="btn btn-outline-primary"><i
                        class="fa fa-plus"></i></button></td>
        </tr>
    </table>
    {{-- <div class="row">
        <div class="form-group col">
            <label for="code_product">Kode Barang</label>
            <select name="code_product" id="code_product" class="form-control custom-select">
                <option selected disabled>Pilih</option>
                @foreach ($product as $item)

                    @if (isset($po))
                        @if ($po->code_product == $item->code_product)
                            <option value="{{ $item->code_product }}" type="{{ $item->type_product }}"
                                name="{{ $item->name_product }}" selected>
                                {{ $item->code_product }}
                            </option>
                        @else
                            <option value="{{ $item->code_product }}" type="{{ $item->type_product }}"
                                name="{{ $item->name_product }}">
                                {{ $item->code_product }}
                            </option>
                        @endif
                    @else
                        <option value="{{ $item->code_product }}" type="{{ $item->type_product }}"
                            name="{{ $item->name_product }}">
                            {{ $item->code_product }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="type_product">Tipe Produk</label>
            <input type="text" name="type_product" class="form-control" id="type_product" readonly>
        </div>
        <div class="form-group col">
            <label for="name_product">Nama Barang</label>
            <input name="name_product" type="text" class="form-control" id="name_product"
                value="{{ $po->name_product ?? old('name_product') }}" required readonly>
        </div>
        <div class="form-group col">
            <label for="description">Deskripsi</label>
            <input name="description" type="text" class="form-control" id="description"
                value="{{ $po->description ?? old('description') }}" required>
        </div>
        <div class="form-group col">
            <label for="latest">Latest</label>
            <input name="latest" type="text" class="form-control" id="latest"
                value="{{ $po->latest ?? old('latest') }}" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="value_product">Jumlah Barang</label>
            <input name="value_product" type="number" class="form-control" id="value_product"
                value="{{ $po->value_product ?? old('value_product') }}" required>
        </div>
        <div class="form-group col">
            <label for="unit_price">Harga Per Unit</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text curr">IDR</span>
                </div>
                <input name="unit_price" type="number" class="form-control" id="unit_price"
                    value="{{ $po->unit_price ?? old('unit_price') }}" required>
            </div>
        </div>
        <div class="form-group col">
            <label for="total_amount">Jumlah Total</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text curr">IDR</span>
                </div>
                <input name="total_amount" type="number" class="form-control mata-uang" id="total_amount"
                    value="{{ $po->total_amount ?? old('total_amount') }}" required readonly>
            </div>
        </div>
    </div> --}}
</div>
<!-- /.card-body -->
