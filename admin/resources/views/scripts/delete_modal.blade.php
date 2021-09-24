<script>
    $(document).on("click", ".delete-modal", function() {
        const deleteId = $(this).data('id');
        const deleteName = $(this).data('name');
        $("#data-target-delete-id").val(deleteId);
        $("#data-target-delete-name").text(deleteName);
        // As pointed out in comments,
        // it is unnecessary to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });
</script>
