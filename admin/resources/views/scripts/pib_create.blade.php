<script type="text/javascript">
    let i = 0;
    $("#dynamic-ar").click(function() {
        ++i;
        $("#containerAddRemove").append('<tr><td><input type="text" name="no_container[' + i +
            ']" class="form-control" /></td><td><input type="text" name="size_container[' +
            i +
            ']" class="form-control" /></td><td><input type="text" name="type_container[' +
            i +
            ']" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="fa fa-trash"></i></button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function() {
        $(this).parents('tr').remove();
    });
</script>
<script type="text/javascript">
    let j = 0;
    $("#dynamic-pr").click(function() {
        ++j;
        $("#productAddRemove").append('<tr><td><input type="text" name="pos_product[' +
            j +
            ']" class="form-control" /><td><input type="text" name="detail_product[' +
            j +
            ']" class="form-control" /></td></td><td><input type="text" name="code_product[' +
            j +
            ']" class="form-control" /></td><td><input type="text" name="name_product[' +
            j +
            ']" class="form-control" /><td><input type="text" name="qty_product[' +
            j +
            ']" class="form-control" /></td><td><select name="unit_product[' + j +
            ']" class="form-control"><option selected disabled>Pilih</option>@foreach ($unit as $item) <option value="{{ $item->unit }}">{{ $item->unit }}</option>@endforeach</select></td><td><div class="input-group"><input type = "text" name = "netto_product[' +
            j +
            ']" class="form-control" />   <div class="input-group-appeand"><div class = "input-group-text" >KG</div></div></div></td ><td><input type="text" name="qty_pack[' +
            j +
            ']" class="form-control" /></td><td><select name="type_pack[' + j +
            ']" class="form-control"><option selected disabled>Pilih</option><option value="Pack">Pack</option><option value="Container">Container</option></select></td><td><input type="text" name="value_pabean[' +
            j +
            ']" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-product"><i class="fa fa-trash"></i></button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-product', function() {
        $(this).parents('tr').remove();
    });
</script>
<script>
    $('#name_shipper').change(function() {
        let code = $(this).val();
        let name = $('#name_shipper option:selected').text();
        let address = $('#name_shipper option:selected').attr("address");

        $("#address_shipper").val(address);

    });
    $('#name_seller').change(function() {
        let code = $(this).val();
        let name = $('#name_seller option:selected').text();
        let address = $('#name_seller option:selected').attr("address");

        $("#address_seller").val(address);

    });
    $('#name_importir').change(function() {
        let code = $(this).val();
        let name = $('#name_importir option:selected').text();
        let address = $('#name_importir option:selected').attr("address");
        let nik = $('#name_importir option:selected').attr("nik");
        let status = $('#name_importir option:selected').attr("status");
        let apiu = $('#name_importir option:selected').attr("apiu");

        $("#address_importir").val(address);
        $("#nik_importir").val(nik);
        $("#status_importir").val(status);
        $("#apiu").val(apiu);

    });
    $('#name_owner').change(function() {
        let code = $(this).val();
        let name = $('#name_owner option:selected').text();
        let address = $('#name_owner option:selected').attr("address");

        $("#address_owner").val(address);

    });
</script>
