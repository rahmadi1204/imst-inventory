<script>
    $(document).on("click", ".delete-modal", function() {
        let deleteId = $(this).data('id');
        let deleteCode = $(this).data('code');
        let deleteName = $(this).data('name');
        console.log(deleteCode);
        $("#data-target-delete-id").val(deleteId);
        $("#data-target-delete-name").text(deleteName);
        $("#data-target-delete-code").val(deleteCode);
    });
</script>
