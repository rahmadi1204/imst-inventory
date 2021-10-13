<script type="text/javascript">
    $("#name_customer").change(function() {
        let code = $(this).val();
        let customer = $('#name_customer option:selected').attr("name");
        $("#customer").val(customer);
    });
    $("#name_warehouse").change(function() {
        let code = $(this).val();
        let warehouse = $('#name_warehouse option:selected').attr("name");
        $("#warehouse").val(warehouse);
    });
    let j = 0;
    $("#code_product" + j).change(function() {
        let code = $(this).val();
        let name = $('#code_product' + j + ' option:selected').attr("name");
        let type = $('#code_product' + j + ' option:selected').attr("type");

        $("#name_product" + j).val(name);
        $("#type_product" + j).val(type);
    });
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

    $("#dynamic-pr2").click(function() {
        ++j;
        $("#productAddRemove").append('<tr><td><select name="code_product[' + j +
            ']" id="code_product2' +
            j +
            '" class="form-control"><option value="" selected disabled>Pilih</option>@foreach ($product as $item)<option value="{{ $item->code_product }}" type="{{ $item->type_product }}" name="{{ $item->name_product }}">{{ $item->code_product }}</option>@endforeach</select></td><td><input type="text" name="type_product[' +
            j +
            ']" class="form-control" id="type_product2' + j +
            '"  readonly hidden/><input type="text" name="name_product[' +
            j +
            ']" class="form-control" id="name_product2' + j +
            '"  readonly/></td><td><input type="text" name="qty_product[' +
            j +
            ']" class="form-control" /></td><td><select name="unit_product[' + j +
            ']" class="form-control"><option selected disabled>Pilih</option>@foreach ($unit as $item) <option value="{{ $item->unit }}">{{ $item->unit }}</option>@endforeach</select></td><td><button type="button" class="btn btn-outline-danger remove-input-product"><i class="fa fa-trash"></i></button></td></tr>'
        );
        $("#code_product2" + j).change(function() {
            let code = $(this).val();
            let name = $('#code_product2' + j + ' option:selected').attr("name");
            let type = $('#code_product2' + j + ' option:selected').attr("type");

            $("#name_product2" + j).val(name);
            $("#type_product2" + j).val(type);

        });
    });
    $(document).on('click', '.remove-input-product', function() {
        $(this).parents('tr').remove();
    });
</script>
