<div class="card-body">
    <div class="row">
        <div class="form-group col-md-2">
            <label for="date_ncrv">Tanggal Return</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input name="date_ncrv" type="text" class="form-control datetimepicker-input"
                    data-target="#reservationdate" required value="{{ $ncrv->date_ncrv ?? old('date_ncrv') }} " />
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="form-group col">
            <label for="no_po">No. Referensi</label>
            <select name="no_po" id="no_po" class="form-control">
                <option selected disabled>Pilih</option>
                @foreach ($po as $item)
                    @isset($ncrv)
                        @if ($item->no_po == $pib->no_po)
                            <option value="{{ $item->no_po }}" code_supplier="{{ $item->code_supplier }}"
                                name_supplier="{{ $item->name_supplier }}" code_po="{{ $item->code_po }}"
                                address="{{ $item->address_supplier }}" selected>
                                {{ $item->no_po }}</option>
                        @endif
                    @endisset
                    @if ($item->no_po == old('no_po'))
                        <option value="{{ $item->no_po }}" code_supplier="{{ $item->code_supplier }}"
                            name_supplier="{{ $item->name_supplier }}" code_po="{{ $item->code_po }}"
                            address="{{ $item->address_supplier }}" selected>
                            {{ $item->no_po }}</option>
                    @else
                        <option value="{{ $item->no_po }}" code_supplier="{{ $item->code_supplier }}"
                            name_supplier="{{ $item->name_supplier }}" code_po="{{ $item->code_po }}"
                            address="{{ $item->address_supplier }}">
                            {{ $item->no_po }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="name_supplier">Vendor</label>
            <input type="hidden" name="code_po" id="code_po">
            <input type="hidden" name="code_supplier" id="code_supplier">
            <input name="name_supplier" type="text" class="form-control" id="name_supplier"
                value="{{ $ncrv->name_supplier ?? old('name_supplier') }}" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="name_warehouse">Gudang</label>
            <select name="name_warehouse" id="name_warehouse" class="form-control custom-select">
                <option selected>Pilih</option>
                @foreach ($warehouse as $item)
                    @if (isset($ncrv))
                        @if ($ncrv->name_warehouse == $item->name_warehouse)
                            <option value="{{ $item->name_warehouse }}" address="{{ $item->address_warehouse }}"
                                selected>
                                {{ $item->name_warehouse }}
                            </option>
                        @else
                            <option value="{{ $item->name_warehouse }}" address="{{ $item->address_warehouse }}">
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
        </div>
        <div class="form-group col">
            <label for="way_transport">Via</label>
            <input name="way_transport" id="way_transport" type="text" class="form-control"
                value="{{ $ncrv->way_transport ?? old('way_transport') }}" required>
        </div>
    </div>
    {{-- <div class="row">
        <li class="form-group col">
            <input class="form-check-input me-1" type="checkbox">
            Return Terima Barang
        </li>
    </div>` --}}
    {{-- <div class="row">
        <div class="form-group col">
            <label for="no_pib">No Terima Barang</label>
            <select name="no_pib" id="no_pib" class="form-control">
                <option selected disabled>Pilih</option>
                @foreach ($pib as $item)
                    @isset($ncrv)
                        @if ($item->no_approval == $pib->no_approval)
                            <option value="{{ $item->no_approval }}" name_supplier="{{ $item->name_seller }}"
                                address="{{ $item->address_seller }}" selected>
                                {{ $item->no_approval }}</option>
                        @endif
                    @endisset
                    @if ($item->no_approval == old('no_approval'))
                        <option value="{{ $item->no_approval }}" name_supplier="{{ $item->name_seller }}"
                            address="{{ $item->address_seller }}" selected>
                            {{ $item->no_approval }}</option>
                    @else
                        <option value="{{ $item->no_approval }}" name_supplier="{{ $item->name_seller }}"
                            address="{{ $item->address_seller }}">
                            {{ $item->no_approval }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="product_code">Tipe Barang</label>
            <select name="type_product" id="type_product" class="form-control">
                <option selected disabled>Pilih</option>
                @foreach ($typeProduct as $item)
                    @isset($ncrv)
                        @if ($item->type_product == $pib->type_product)
                            <option value="{{ $item->type_product }}" selected>
                                {{ $item->type_product }}</option>
                        @endif
                    @endisset
                    @if ($item->type_product == old('type_product'))
                        <option value="{{ $item->type_product }}" selected>
                            {{ $item->type_product }}</option>
                    @else
                        <option value="{{ $item->type_product }}">
                            {{ $item->type_product }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div> --}}
    {{-- <div class="row">
        <div class="form-group col">
            <label for="product_code">Kode Barang</label>
            <select name="code_product" id="code_product" class="form-control">
                <option value="" selected disabled>Pilih</option>
                @foreach ($product as $item)
                    <option value="{{ $item->code_product }}" type="{{ $item->type_product }}"
                        name="{{ $item->name_product }}">
                        {{ $item->code_product }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="product_name">Nama Barang</label>
            <input name="product_name" type="text" class="form-control" id="product_name"
                value="{{ $ncrv->product_name ?? old('product_name') }}" required readonly>
        </div>
        <div class="form-group col">
            <label for="value">Jumlah Barang</label>
            <input name="value" type="number" class="form-control" id="value"
                value="{{ $ncrv->stock ?? old('stock') }}" required>
        </div>
    </div> --}}
    {{-- <div class="row">
        <div class="form-group col-md-4">
            <label for="unit_price">Mata Uang</label>
            <select name="product_code" id="product_code" class="form-control custom-select">
                <option value="" selected disabled>Pilih</option>
                @foreach ($currency as $item)
                    @if (isset($ncrv))
                        @if ($pib->currency == $item->code)
                            <option value="{{ $item->code }}" symbol="{{ $item->symbol }}" selected>
                                {{ $item->symbol }} {{ $item->name }}
                            </option>
                        @else
                            <option value="{{ $item->code }}" symbol="{{ $item->symbol }}">
                                {{ $item->symbol }} {{ $item->name }}
                            </option>
                        @endif
                    @else
                        @if (old('valuta') == $item->code)
                            <option value="{{ $item->code }}" symbol="{{ $item->symbol }}" selected>
                                {{ $item->symbol }} {{ $item->name }}
                            </option>
                        @else
                            <option value="{{ $item->code }}" symbol="{{ $item->symbol }}">
                                {{ $item->symbol }} {{ $item->name }}
                            </option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-1">
            <label for="value">Kurs</label>
            <input name="value" type="number" class="form-control" id="value"
                value="{{ $ncrv->stock ?? old('stock') }}" required>
        </div>
    </div> --}}
    <table class="table table-bordered" id="productAddRemove">
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
                        <option value="{{ $item->code_product }}" type="{{ $item->type_product }}"
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
