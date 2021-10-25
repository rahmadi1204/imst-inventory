<script>
    $(document).on("click", ".modal-delete1", function() {
        let deleteproductId = $(this).data('id');
        let deleteproductCode = $(this).data('code');
        let deleteproductName = $(this).data('name');
        console.log(deleteproductName);
        $("#data-target-delete-id1").val(deleteproductId);
        $("#data-target-delete-name1").text(deleteproductName);
        $("#data-target-delete-code1").val(deleteproductCode);
    });
</script>
