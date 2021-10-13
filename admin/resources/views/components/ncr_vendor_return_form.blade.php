<div class="card-body">
    <div class="row">
        <div class="form-group col-md-2">
            <label for="date_ncrv">Tanggal Return</label>
            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                <input name="date_ncrv" type="text" class="form-control datetimepicker-input"
                    data-target="#reservationdate1" required value="{{ $ncrv->date_ncrv ?? old('date_ncrv') }} " />
                <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="form-group col">
            <label for="no_ref">No. Referensi</label>
            <select name="no_ref" id="no_ref" class="form-control">
                <option selected disabled>Pilih</option>

                @foreach ($codeNcrv as $item)
                    @isset($ncrv)
                        @if ($item->code_ncrv == $ncrv->code->ncrv)
                            <option value="{{ $item->no_ref }}" code_supplier="{{ $item->id }}"
                                name_supplier="{{ $item->name_supplier }}" code_po="{{ $item->code_po }}"
                                address="{{ $item->address_supplier }}" selected>
                                {{ $item->no_ref }}</option>
                        @endif
                    @endisset
                    @if ($item->no_ref == old('no_ref'))
                        <option value="{{ $item->no_ref }}" code_supplier="{{ $item->id }}"
                            name_supplier="{{ $item->name_supplier }}" code_po="{{ $item->code_po }}"
                            address="{{ $item->address_supplier }}" selected>
                            {{ $item->no_ref }}</option>
                    @else
                        <option value="{{ $item->no_ref }}" code_supplier="{{ $item->id }}"
                            name_supplier="{{ $item->name_supplier }}" code_po="{{ $item->code_po }}"
                            address="{{ $item->address_supplier }}">
                            {{ $item->no_ref }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="name_supplier">Vendor</label>
            <input type="hidden" name="code_po" id="code_po" class="code_po" required>
            <input type="hidden" name="code_supplier" id="code_supplier" class="code_supplier" required>
            <input name="name_supplier" type="text" class="form-control name_supplier" id="name_supplier"
                value="{{ $ncrv->name_supplier ?? old('name_supplier') }}" required readonly>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="name_warehouse">Gudang</label>
            <select name="name_warehouse" id="name_warehouse" class="form-control custom-select">
                <option selected>Pilih</option>
                @foreach ($warehouse as $item)
                    @if (isset($ncrv))
                        @if ($ncrv->warehouse_id == $item->id)
                            <option value="{{ $item->id }}" address="{{ $item->address_warehouse }}" selected>
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
        </div>
        <div class="form-group col">
            <label for="way_transport">Via</label>
            <input name="way_transport" id="way_transport" type="text" class="form-control"
                value="{{ $ncrv->way_transport ?? old('way_transport') }}" required>
        </div>
    </div>
    <table class="table table-bordered nowrap" id="productAddRemove2">
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
                <select name="code_product[0]" id="code_product20" class="form-control">
                    <option value="" selected disabled>Pilih</option>
                    @foreach ($product as $item)
                        <option value="{{ $item->id }}" type="{{ $item->type_product }}"
                            name="{{ $item->name_product }}">
                            {{ $item->code_product }}
                        </option>
                    @endforeach
                </select>
            </td>
            <input type="text" class="form-control" name="type_product[0]" id="type_product20" readonly hidden>
            <td>
                <input type="text" name="name_product[0]" id="name_product20" class="form-control" readonly>
            </td>
            <td><input type="number" step="0.01" name="qty_product[0]" class="form-control" />
            </td>
            <td>
                <select name="unit_product[0]" id="unit_product2" class="form-control">
                    <option value="" selected disabled>Pilih</option>
                    @foreach ($unit as $item)
                        <option value="{{ $item->unit }}">{{ $item->unit }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td><button type="button" name="add" id="dynamic-pr2" class="btn btn-outline-primary"><i
                        class="fa fa-plus"></i></button></td>
        </tr>
    </table>

</div>
<!-- /.card-body -->
