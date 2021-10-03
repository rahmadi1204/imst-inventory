<script>
    $(document).on("click", ".update-item", function() {
        let updateId = $(this).data('id');
        let updateCode = $(this).data('code');
        let updateName = $(this).data('name');
        let updateType = $(this).data('type');
        $("#data_id_product").val(updateId);
        $("#code_product").val(updateCode);
        $("#name_product").val(updateName);
        $('#type_product option[value="' + updateType + '"]').prop('selected', true)
        $("#data_name_product").text(updateName);

    });
</script>
