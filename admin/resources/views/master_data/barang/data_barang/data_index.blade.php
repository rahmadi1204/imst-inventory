@extends('layouts.app')

@section('head')

@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title ?? 'Data' }}</h3>
                        <div class="card-tools">
                            {{-- <div class="btn btn-light" data-toggle="modal" data-target="#modal-default">
                                <i class="fa fa-plus"></i> Data Barang
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tableSearch" class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>NO</th>
                                    <th>KODE BARANG</th>
                                    <th>JENIS BARANG</th>
                                    <th>NAMA BARANG</th>
                                    <th>STOK</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->code_product }}</td>
                                        <td>{{ $item->type_product }}</td>
                                        <td>{{ $item->name_product }}</td>
                                        <td>{{ $item->qty_product }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Delete Modal --}}
    <form action="{{ route('data.destroy') }}" method="post">
        @csrf
        @include('components.delete_modal')
    </form>

@endsection
@section('scripts')

@endsection
