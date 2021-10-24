<script>
    $(document).on("click", ".update-modal", function() {
        let containerId = $(this).data('id');
        let containerNo = $(this).data('no');
        let containerType = $(this).data('type');
        let containerSize = $(this).data('size');
        console.log(containerNo)
        $("#data-update-id").val(containerId);
        $("#data-update-no").val(containerNo);
        $("#data-update-type").val(containerType);
        $("#data-update-size").val(containerSize);
    });
    $(document).on("click", "#update-modal-product", function() {
        let productId = $(this).data('id');
        let productPos = $(this).data('pos');
        let productCode = $(this).data('code');
        let productType = $(this).data('type');
        let productName = $(this).data('name');
        let productQty = $(this).data('qty');
        let productUnit = $(this).data('unit');
        let productNetto = $(this).data('netto');
        let productQtyPack = $(this).data('qty-pack');
        let productTypePack = $(this).data('type-pack');
        let productProductPabean = $(this).data('product-pabean');
        console.log(productUnit)
        $("#data-update-id").val(productId);
        $("#data-update-code").val(productCode);
        $("#data-update-pos").val(productPos);
        $("#data-update-type").val(productType);
        $("#data-update-name").val(productName);
        $("#data-update-qty").val(productQty);
        $("#data-update-unit").val(productUnit);
        $("#data-update-netto").val(productNetto);
        $("#data-update-qty-pack").val(productQtyPack);
        $("#data-update-type-pack").val(productTypePack);
        $("#data-update-product-pabean").val(productProductPabean);
    });
</script>
