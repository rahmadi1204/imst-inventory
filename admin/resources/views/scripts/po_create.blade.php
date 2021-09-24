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
    $('#value_product, #unit_price').keyup(function() {
        $('.mata-uang').mask('0.000.000.000', {
            reverse: true
        });
        let jumlah = $("#value_product").val();
        let harga = $("#unit_price").val();
        let total = parseInt(jumlah) * parseInt(harga);
        $('#total_amount').val(total);
    });
    $('#datePO').datetimepicker({
        format: 'Y-M-D'
    });
</script>
