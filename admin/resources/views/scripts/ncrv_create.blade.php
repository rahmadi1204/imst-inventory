<script>
    $('#no_po').change(function() {
        let code = $(this).val();
        let name = $('#no_po option:selected').attr("name_supplier");
        let address = $('#no_po option:selected').attr("address");

        $("#name_supplier").val(name);
        $("#address_supplier").val(address);

    });
</script>
