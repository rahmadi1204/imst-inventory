<div id="step4-part" class="content" role="tabpanel" aria-labelledby="step4-part-trigger">

    <table class="table table-bordered" id="containerAddRemove">
        <tr>
            <th>Nomor Container</th>
            <th>Ukuran Container</th>
            <th>Tipe Container</th>
        </tr>
        <tr>
            <td><input type="text" name="no_container[0]" class="form-control" />
            </td>
            <td>
                <div class="input-group">
                    <input type="text" name="size_container[0]" class="form-control" />
                    <div class="input-group-prepand">
                        <div class="form-control">
                            FEET
                        </div>
                    </div>
                </div>
            </td>
            <td><input type="text" name="type_container[0]" class="form-control" />
            </td>
            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary"><i
                        class="fa fa-plus"></i></button></td>
        </tr>
    </table>
    <div class="btn btn-primary" onclick="stepper.next()">Next</div>
    <div class="btn btn-secondary" onclick="stepper.previous()">Kembali</div>

</div>
