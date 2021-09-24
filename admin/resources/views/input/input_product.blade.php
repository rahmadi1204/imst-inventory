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
                            <h3 class="card-title">Input Barang</h3>
                            <div class="card-tools">

                            </div>
                        </div>

                        <form action="{{ route('bahan_baku.store') }}" method="post">
                            @csrf

                            @include('components.bahan_baku_form')

                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary float-right">
                                    Simpan
                                </button>

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
    <form action="{{ route('bahan_baku.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>

@endsection
@section('scripts')
    @include('scripts.datatable')
@endsection
