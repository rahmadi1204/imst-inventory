<div class="form-group col">
    <label for="type_product">Tipe Produk</label>
    <select name="type_product" id="type_product" class="form-control">
        <option selected disabled>Pilih</option>
        @foreach ($typeProduct as $item)
            <option value="{{ $item->type_product }}">
                {{ $item->type_product }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col">
    <label for="code_product">Kode Produk</label>
    <input name="id" type="hidden" class="form-control id_product" id="data_id_product">
    <input name="code_product" type="text" class="form-control" id="code_product">
</div>
<div class="form-group col">
    <label for="name_product">Nama Produk</label>
    <input name="name_product" type="text" class="form-control" id="name_product">
</div>
