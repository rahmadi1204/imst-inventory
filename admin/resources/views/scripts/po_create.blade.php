<script>
    $('#send_address').change(function() {
        let code = $(this).val();
        let name = $('#send_address option:selected').text();
        let address = $('#send_address option:selected').attr("address");

        $("#address_warehouse").val(address);

    });
    $('#vendor_name').change(function() {
        let code = $(this).val();
        let name = $('#vendor_name option:selected').text();
        let address = $('#vendor_name option:selected').attr("address");

        $("#vendor_address").val(address);

    });
    $('#code_product').change(function() {
        let code = $(this).val();
        let name = $('#code_product option:selected').attr("name");
        let type = $('#code_product option:selected').attr("type");

        $("#type_product").val(type);
        $("#name_product").val(name);

    });
    $('#currency').change(function() {
        let code = $(this).val();
        let name = $('#vendor_name option:selected').text();

        $(".curr").text(code);

    });

    $("#qty_product0, #unit_price0").keyup(function() {
        let jumlah = $("#qty_product0").val();
        let harga = $("#unit_price0").val();
        let total = parseInt(jumlah) * parseInt(harga);
        $('#total_amount0').val(total);
    });
    $('#datePO').datetimepicker({
        format: 'Y-M-D'
    });
    let j = 0;
    $("#dynamic-pr").click(function() {
        ++j;
        $("#productAddRemove").append('<tr><td><select name="code_product[' + j +
            ']" id="code_product' +
            j +
            '" class="form-control"><option value="" selected disabled>Pilih</option>@foreach ($product as $item)<option value="{{ $item->code_product }}" type="{{ $item->type_product }}" name="{{ $item->name_product }}">{{ $item->code_product }}</option>@endforeach</select></td><td><input type="text" name="type_product[' +
            j +
            ']" class="form-control" id="type_product' + j +
            '"  readonly/></td><td><input type="text" name="name_product[' +
            j +
            ']" class="form-control" id="name_product' + j +
            '"  readonly/></td><td><input type="text" name="description[' +
            j +
            ']" id="description' +
            j +
            '" class="form-control"></td><td><input type="text" name="latest[' +
            j +
            ']" id="latest' + j +
            '" class="form-control"></td> <td><input type="number" name="qty_product[' +
            j +
            ']" id="qty_product' +
            j +
            '" class="form-control" /></td><td><div class="input-group"><div class="input-group-prepend"><span class="input-group-text curr">IDR</span></div><input name="unit_price[' +
            j +
            ']" type="number" class="form-control" id="unit_price' +
            j +
            '"value="{{ $po->unit_price ?? old('unit_price') }}" required></div></td><td><div class="input-group" ><div class="input-group-prepend" ><span class = "input-group-text curr" > IDR </span></div> <input name = "total_amount[' +
            j +
            ']"type = "number"class = "form-control mata-uang"id = "total_amount' +
            j +
            '"value="{{ $po->total_amount ?? old('total_amount') }}"required readonly ></div> </td><td><button type="button" class="btn btn-outline-danger remove-input-product"><i class="fa fa-trash"></i></button></td > < /tr>'
        );
        $("#qty_product" + j + ", #unit_price" + j).keyup(function() {
            let jumlah = $("#qty_product" + j).val();
            let harga = $("#unit_price" + j).val();
            let total = parseInt(jumlah) * parseInt(harga);
            $('#total_amount' + j).val(total);
        });
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
    $("#code_product" + 0).change(function() {
        let code = $(this).val();
        let name = $('#code_product' + 0 + ' option:selected').attr("name");
        let type = $('#code_product' + 0 + ' option:selected').attr("type");

        $("#name_product" + 0).val(name);
        $("#type_product" + 0).val(type);

    });
</script>
