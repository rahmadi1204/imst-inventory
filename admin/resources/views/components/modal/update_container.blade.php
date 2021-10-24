<div class="modal fade" id="modal-update-container">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Container</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="no">No Container</label>
                    <input type="hidden" name="id" id="data-update-id" class="form-control">
                    <input type="text" name="no_container" id="data-update-no" class="form-control">
                </div>
                <div class="form-group">
                    <label for="size">Size Container</label>
                    <input type="text" name="size_container" id="data-update-size" class="form-control">
                </div>
                <div class="form-group">
                    <label for="type">Type Container</label>
                    <input type="text" name="type_container" id="data-update-type" class="form-control">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
