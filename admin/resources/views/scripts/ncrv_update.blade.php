<script>
    $(document).on("click", "#update-modal-product", function() {
        let productId = $(this).data('id');

        let productCode = $(this).data('code');
        let productType = $(this).data('type');
        let productName = $(this).data('name');
        let productQty = $(this).data('qty');
        let productUnit = $(this).data('unit');
        console.log(productCode)

        $('#data-update-id option[value="' + productId + '"]').prop('selected', true)
        $("#data-update-code").val(productCode);
        $("#data-update-type").val(productType);
        $("#data-update-name").val(productName);
        $("#data-update-qty").val(productQty);
        $('#data-update-unit option[value="' + productUnit + '"]').prop('selected', true)
    });
    $("#data-update-id").change(function() {
        let codeProduct = $(this).val();
        let nameProduct = $('#data-update-id option:selected').attr("name");
        let typeProduct = $('#data-update-id option:selected').attr("type");

        $("#data-update-name").val(nameProduct);

    });
</script>
