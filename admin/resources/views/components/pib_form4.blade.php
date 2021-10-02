<div id="step4-part" class="content" role="tabpanel" aria-labelledby="step4-part-trigger">

    <table id="containerAddRemove" class="table table-bordered table-hover nowrap">
        <thead class="thead-light">
            <tr>
                <th>Nomor Container</th>
                <th>Ukuran Container</th>
                <th>Tipe Container</th>
                <th>Add/Delete</th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>
    <div class="btn btn-primary" onclick="stepper.next()">Next</div>
    <div class="btn btn-secondary" onclick="stepper.previous()">Kembali</div>

    @isset($containers)
        <table class="table table-bordered table-hover nowrap mt-5">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>No Container</th>
                    <th>Ukuran Container</th>
                    <th>Tipe Container</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($containers as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->no_container }}</td>
                        <td>{{ $item->size_container }}</td>
                        <td>{{ $item->type_container }}</td>
                        <td>
                            <a href="{{ route('container.update', $item->id) }}" class=" btn btn-success">
                                <i class="fa fa-edit"></i>
                            </a>
                            <div class="btn btn-danger delete-modal" data-toggle="modal" data-target="#modal-delete-user"
                                data-id="{{ $item->id }}" data-name="{{ $item->no_container }}"><i
                                    class="fa fa-trash"></i>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>

            </tfoot>
        </table>

    @endisset

</div>
