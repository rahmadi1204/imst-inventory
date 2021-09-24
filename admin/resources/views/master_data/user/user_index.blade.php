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
                            <div class="card-title">
                                <div class="row">
                                    <h4>Tabel user</h4>
                                </div>
                            </div>
                            <div class="card-tools">
                                <a href="{{ route('user.create') }}"
                                    class="btn btn-light text-dark
                                 mr-3">
                                    <i class="fa fa-plus"></i> User
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tableSearch" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($users as $user)
                                        <tr class="data-row">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td class="d-flex justify-content-md-center">
                                                <a href="{{ route('user.edit', $user->username) }}"
                                                    class="btn btn-success mr-2">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <div class="btn btn-danger delete-modal" data-toggle="modal"
                                                    data-target="#modal-delete-user" data-id="{{ $user->id }}"
                                                    data-name="{{ $user->name }}"><i class="fa fa-trash"></i></div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Delete Modal --}}
    <form action="{{ route('user.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>

@endsection
@section('scripts')

@endsection
