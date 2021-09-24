@extends('layouts.app')

@section('head')

@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Input PO</h3>
                            <div class="card-tools">
                                <div class="btn btn-light" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus"></i> Master Barang
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('po.store') }}" method="post">
                            @csrf

                            @include('components.po_form')

                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary float-right">
                                    Simpan
                                </button>
                                <a href="{{ route('po') }}" class="btn btn-secondary float-right mr-2">
                                    Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        </div>
    </section>
    {{-- Create Modal --}}
    <form action="{{ route('master.store') }}" method="post">
        @csrf
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Master Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col">
                            <label for="type_product">Tipe Produk</label>
                            <select name="type_product" id="type_product" class="form-control">
                                <option selected disabled>Pilih</option>
                                @foreach ($typeProduct as $item)
                                    <option value="{{ $item->type_product }}">
                                        {{ $item->type_product }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="code_product">Kode Produk</label>
                            <input name="code_product" type="text" class="form-control" id="code_product" required>
                        </div>
                        <div class="form-group col">
                            <label for="name_product">Nama Produk</label>
                            <input name="name_product" type="text" class="form-control" id="name_product" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </form>

    {{-- Delete Modal --}}
    <form action="{{ route('po.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('/templates/admin') }}/plugins/rupiah/jquery.mask.min.js"></script>
    <script src="{{ asset('/templates/admin') }}/plugins/rupiah/terbilang.js"></script>
    <script type="text/javascript">
        function inputTerbilang() {
            //membuat inputan otomatis jadi mata uang
            $('.mata-uang').mask('0.000.000.000', {
                reverse: true
            });

            //mengambil data uang yang akan dirubah jadi terbilang
            var input = document.getElementById("terbilang-input").value.replace(/\./g, "");

            //menampilkan hasil dari terbilang
            document.getElementById("terbilang-output").value = terbilang(input).replace(/  +/g, ' ');
        }
    </script>
    @include('scripts.po_create')
@endsection
