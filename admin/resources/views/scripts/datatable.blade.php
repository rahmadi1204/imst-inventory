<script>
    $(function() {
        $('#tableSearch').DataTable({
            "lengthChange": false,
            "scrollX": true,
            "info": true,
            "autoWidth": false,
        });
        $('#productAddRemove').DataTable({
            "searching": false,
            "lengthChange": false,
            "scrollX": true,
            "info": true,
            "autoWidth": false,
        });
        $('#productAddRemove1').DataTable({
            "searching": false,
        });
        $('#productAddRemove2').DataTable({
            "searching": false,
        });
        $('#containerAddRemove').DataTable({
            "searching": false,
        });
        $('#tableSearch1').DataTable({
            "paging": true,
            "lengthChange": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#masuk').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "scrollX": true,
        });
        $('#keluar').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "scrollX": true,
        });
        $('#saldo').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "scrollX": true,
        });
    });
</script>
