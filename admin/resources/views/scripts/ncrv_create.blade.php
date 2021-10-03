<script>
    $('#no_po').change(function() {
        let code = $(this).val();
        let code_supplier = $('#no_po option:selected').attr("code_supplier");
        let name = $('#no_po option:selected').attr("name_supplier");
        let address = $('#no_po option:selected').attr("address");
        let code_po = $('#no_po option:selected').attr("code_po");

        $("#name_supplier").val(name);
        $("#address_supplier").val(address);
        $("#code_po").val(code_po);
        $("#code_supplier").val(code_supplier);

    });
    $("#code_product" + 0).change(function() {
        let code = $(this).val();
        let name = $('#code_product' + 0 + ' option:selected').attr("name");
        let type = $('#code_product' + 0 + ' option:selected').attr("type");

        $("#name_product" + 0).val(name);
        $("#type_product" + 0).val(type);

    });
</script>


<script type="text/javascript">
    let j = 0;
    $("#dynamic-pr").click(function() {
        ++j;
        $("#productAddRemove").append('<tr><td><select name="code_product[' + j +
            ']" id="code_product' +
            j +
            '" class="form-control"><option value="" selected disabled>Pilih</option>@foreach ($product as $item)<option value="{{ $item->code_product }}" type="{{ $item->type_product }}" name="{{ $item->name_product }}">{{ $item->code_product }}</option>@endforeach</select></td><td><input type="text" name="type_product[' +
            j +
            ']" class="form-control" id="type_product' + j +
            '"  readonly hidden/><input type="text" name="name_product[' +
            j +
            ']" class="form-control" id="name_product' + j +
            '"  readonly/></td><td><input type="text" name="qty_product[' +
            j +
            ']" class="form-control" /></td><td><select name="unit_product[' + j +
            ']" class="form-control"><option selected disabled>Pilih</option>@foreach ($unit as $item) <option value="{{ $item->unit }}">{{ $item->unit }}</option>@endforeach</select></td><td><button type="button" class="btn btn-outline-danger remove-input-product"><i class="fa fa-trash"></i></button></td></tr>'
        );
        $("#code_product" + j).change(function() {
            let code = $(this).val();
            let name = $('#code_product' + j + ' option:selected').attr("name");
            let type = $('#code_product' + j + ' option:selected').attr("type");

            $("#name_product" + j).val(name);
            $("#type_product" + j).val(type);

        });
    });
    $(document).on('click', '.remove-input-product', function() {
        $(this).parents('tr').remove();
    });
</script>
