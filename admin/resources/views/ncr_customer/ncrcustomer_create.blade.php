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
                            <h3 class="card-title" id="ncrc_title">Tambah Kirim Ke Customer</h3>
                            <div class="card-tools">
                                <div class="btn btn-light" id="showMasuk">Return Dari Customer</div>
                                <div class="btn btn-secondary" id="showKeluar" style="display: none">Kirim Ke Customer
                                </div>
                            </div>
                        </div>
                        <div id="to_customer">
                            <form action="{{ route('ncr_customer.store') }}" method="post">
                                @csrf

                                @include('components.ncr_customer_form')

                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                </div>
                            </form>
                        </div>

                        <div id="from_customer" style="display: none">
                            <form action="{{ route('ncr_customer_return.store') }}" method="post">
                                @csrf

                                @include('components.ncr_customer_return_form')

                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    {{-- Delete Modal --}}
    <form action="{{ route('ncr_customer.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>

@endsection
@section('scripts')
    @include('scripts.ncrc_create')
    <script>
        $(document).ready(function() {
            $("#showMasuk").click(function() {
                $("#showKeluar").toggle();
                $("#showMasuk").toggle();
                $("#to_customer").toggle();
                $("#from_customer").toggle();
                $("#ncrc_title").text("Tambah Return Dari Customer");
            });
            $("#showKeluar").click(function() {
                $("#showKeluar").toggle();
                $("#showMasuk").toggle();
                $("#to_customer").toggle();
                $("#from_customer").toggle();
                $("#ncrc_title").text("Tambah Kirim Ke Customer");
            });
        });
    </script>
@endsection
