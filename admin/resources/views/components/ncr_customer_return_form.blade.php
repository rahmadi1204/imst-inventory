<div class="card-body">
    <div class="row">
        <div class="form-group col-md-2">
            <label for="date_ncrc">Tanggal Return</label>
            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                <input name="date_ncrc" type="text" class="form-control datetimepicker-input"
                    data-target="#reservationdate1" required value="{{ $ncrc->date_ncrc ?? old('date_ncrc') }} " />
                <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="form-group col">
            <label for="no_ref">No. Referensi</label>
            <select name="no_ref" id="no_ref" class="form-control" required>
                <option selected disabled>Pilih</option>

                @foreach ($codeNcrc as $item)
                    @isset($ncrc)
                        @if ($item->code_ncrc == $ncrc->code_ncrc)
                            <option value="{{ $item->no_ref }}" code_customer="{{ $item->id }}"
                                name_customer="{{ $item->name_customer }}" code_po="{{ $item->code_po }}"
                                address="{{ $item->address_customer }}" selected>
                                {{ $item->no_ref }}</option>
                        @endif
                    @endisset
                    @if ($item->no_ref == old('no_ref'))
                        <option value="{{ $item->no_ref }}" code_customer="{{ $item->id }}"
                            name_customer="{{ $item->name_customer }}" code_po="{{ $item->code_po }}"
                            address="{{ $item->address_customer }}" selected>
                            {{ $item->no_ref }}</option>
                    @else
                        <option value="{{ $item->no_ref }}" code_customer="{{ $item->id }}"
                            name_customer="{{ $item->name_customer }}" code_po="{{ $item->code_po }}"
                            address="{{ $item->address_customer }}">
                            {{ $item->no_ref }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col">
            <label for="name_warehouse">Gudang</label>
            <select name="name_warehouse" id="name_warehouse" class="form-control custom-select" required>
                <option selected disabled>Pilih</option>
                @foreach ($warehouse as $item)
                    @if (isset($ncrv))
                        @if ($ncrv->name_warehouse == $item->name_warehouse)
                            <option value="{{ $item->id }}" name="{{ $item->name_warehouse }}" selected>
                                {{ $item->name_warehouse }}
                            </option>
                        @else
                            <option value="{{ $item->id }}" name="{{ $item->name_warehouse }}">
                                {{ $item->name_warehouse }}
                            </option>
                        @endif
                    @else
                        <option value="{{ $item->id }}" name="{{ $item->name_warehouse }}">
                            {{ $item->name_warehouse }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="name_customer">Customer</label>
            <input type="hidden" name="code_customer" id="code_customer" class="code_customer" required>
            <input name="name_customer" type="text" class="form-control name_customer" id="name_customer"
                value="{{ $ncrv->name_customer ?? old('name_customer') }}" required readonly>
        </div>
        <div class="form-group col">
            <label for="way_transport">Via</label>
            <input name="way_transport" id="way_transport" type="text" class="form-control"
                value="{{ $ncrv->way_transport ?? old('way_transport') }}" required>
        </div>
    </div>
    <table class="table table-bordered" id="productAddRemove2">
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
                <select name="code_product[0]" id="code_product20" class="form-control" required>
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
                <select name="unit_product[0]" id="unit_product20" class="form-control" required>
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
