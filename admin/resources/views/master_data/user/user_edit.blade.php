@extends('layouts.app')

@section('head')

@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit User {{ $data->name }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal needs-validation" action="{{ route('user.update', $data->username) }}"
                            method="post">
                            @csrf
                            <div class="card-body">
                                @include('components.user_form')
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary float-right">
                                    Simpan
                                </button>
                                <a href="{{ route('user') }}" class="btn btn-secondary float-right mr-2">
                                    Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>

@endsection
@section('scripts')
    @include('scripts.datatable')
@endsection
