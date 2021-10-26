<div class="modal fade" id="modal-update-product">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Produk NCR Vendor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                    <label for="name_product">Nama Barang</label>
                    <input type="text" name="name_product" id="data-update-name" class="form-control" readonly>
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
