<div class="modal fade" id="modal-update-product">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Produk PIB</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="pos">Pos Tarif, Uraian Produk</label>
                    <input type="text" name="pos" id="data-update-pos" class="form-control">
                </div>
                <div class="form-group">
                    <label for="code">Kode Barang</label>
                    <input type="hidden" name="id" id="data-update-code">
                    <select name="code_product" id="data-update-id" class="form-control">
                        <option selected disabled>Pilih</option>
                        @foreach ($product as $item)
                            <option value="{{ $item->id }}" type="{{ $item->type_product }}"
                                name="{{ $item->name_product }}">
                                {{ $item->code_product }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="qty">Jumlah</label>
                    <input type="text" name="qty_product" id="data-update-qty" class="form-control">
                </div>
                <div class="form-group">
                    <label for="unit">Satuan Produk</label>
                    <select name="unit" id="unit" class="form-control">
                        @foreach ($unit as $item)
                            <option value="{{ $item->unit }}">{{ $item->unit }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="qty_pack">Jumlah Kemasan</label>
                    <input type="text" name="qty_pack" id="data-update-qty-pack" class="form-control">
                </div>
                <div class="form-group">
                    <label for="qty_pack">Satuan Kemasan Produk</label>
                    <select name="type_pack" id="data-update-type-pack" class="form-control">
                        <option selected disabled>Pilih</option>
                        <option value="Pcs">Pcs</option>
                        <option value="Box">Box</option>
                        <option value="Kg">Kg</option>
                        <option value="Container">Container</option>
                        <option value="Unit">Unit</option>
                        <option value="Pallet">Pallet</option>
                    </select>
                    <div class="form-group">
                        <label for="product_pabean">Nilai Pabean</label>
                        <input type="text" name="product_pabean" id="data-update-product-pabean" class="form-control">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
