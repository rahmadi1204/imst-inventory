<script>
    $(document).on("click", ".delete-modal", function() {
        const deleteId = $(this).data('id');
        const deleteName = $(this).data('name');
        $("#data-target-delete-id").val(deleteId);
        $("#data-target-delete-name").text(deleteName);
    });
</script>
