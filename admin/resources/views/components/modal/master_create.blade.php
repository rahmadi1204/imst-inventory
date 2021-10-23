<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Master Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col">
                    <label for="type_product">Tipe Produk</label>
                    <select name="type_product" class="form-control">
                        <option selected>Pilih</option>
                        @foreach ($typeProduct as $item)
                            <option value="{{ $item->type_product }}">
                                {{ $item->type_product }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                    <label for="code_product">Kode Produk</label>
                    <input name="code_product" type="text" class="form-control" required>
                </div>
                <div class="form-group col">
                    <label for="name_product">Nama Produk</label>
                    <input name="name_product" type="text" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
