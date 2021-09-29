<div id="step5-part" class="content" role="tabpanel" aria-labelledby="step5-part-trigger">
    <div class="row">
        {{-- <div class="form-group col">
        <label for="type_product">Tipe Produk</label>
        <select name="type_product" id="type_product" class="form-control">
            <option selected disabled>Pilih</option>
            @foreach ($typeProduct as $item)
                <option value="{{ $item->type_product }}">
                    {{ $item->type_product }}</option>
            @endforeach
        </select>
    </div> --}}
        <div class="form-group col">
            <label for="country_product">Negara Asal Produk</label>
            <input name="country_product" type="text" class="form-control" id="country_product"
                value="{{ $pib->country_product ?? old('country_product') }}">
        </div>
        <div class="form-group col">
            <label for="type_pabean">Tipe Pabean</label>
            <input name="type_pabean" type="text" class="form-control" id="type_pabean"
                value="{{ $pib->type_pabean ?? old('type_pabean') }}">
        </div>
        <div class="form-group col">
            <label for="date_product">Tanggal Produk</label>
            <div class="input-group date" id="productDate" data-target-input="nearest">
                <input name="date_product" type="text" class="form-control datetimepicker-input"
                    value="{{ $pib->date_product ?? old('date_product') }}" data-target="#productDate" />
                <div class="input-group-append" data-target="#productDate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered" id="productAddRemove">
        <tr>
            <th>Pos Tarif Produk, Uraian</th>
            <th width="12%">Kode Barang</th>
            <th width="20%">Uraian Jenis Barang, Merek, Tipe,
                Spesifikasi Wajib</th>
            <th>Jumlah Produk</th>
            <th>Satuan Produk</th>
            <th>Berat Bersih Produk</th>
            <th>Jumlah Kemasan Produk</th>
            <th>Satuan Kemasan Produk</th>
            <th>Nilai Pabean</th>
            <th></th>
        </tr>
        <tr>
            <td><input type="text" name="pos_product[0]" class="form-control" />
            </td>
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
            <td>
                <div class="input-group">
                    <input type="number" step="0.01" name="netto_product[0]" class="form-control" />
                    <div class="input-group-appeand">
                        <div class="input-group-text">KG</div>
                    </div>
                </div>
            </td>
            <td><input type="number" step="0.01" name="qty_pack[0]" class="form-control" />
            </td>
            <td><select name="type_pack[0]" id="type_pack" class="form-control">
                    <option value="" selected disabled>
                        Pilih</option>
                    <option value="Pack">Pack</option>
                    <option value="Container">Container</option>
                    <option value="Pallet">Pallet</option>
                </select>
            </td>
            <td><input type="number" step="0.01" name="value_pabean[0]" class="form-control" />
            </td>
            <td><button type="button" name="add" id="dynamic-pr" class="btn btn-outline-primary"><i
                        class="fa fa-plus"></i></button></td>
        </tr>
    </table>
    <div class="btn btn-primary" onclick="stepper.next()">Next</div>
    <div class="btn btn-secondary" onclick="stepper.previous()">Kembali</div>

</div>
