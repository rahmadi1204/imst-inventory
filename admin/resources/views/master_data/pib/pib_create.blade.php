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
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Input PIB</h3>
                        </div>
                        <form action="{{ route('pib.store') }}" method="post">
                            @csrf
                            <div class="card-body p-0">
                                <div class="bs-stepper">
                                    <div class="bs-stepper-header" role="tablist">
                                        <!-- your steps here -->
                                        <div class="step" data-target="#step1">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="step1"
                                                id="step1-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">Data Pemberitahuan</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#step2">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="step2"
                                                id="step2-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Data Transportasi</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#step3-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="step3-part" id="step3-part-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Data Invoice</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#step4-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="step4-part" id="step4-part-trigger">
                                                <span class="bs-stepper-circle">4</span>
                                                <span class="bs-stepper-label">Data Container</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#step5-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="step5-part" id="step5-part-trigger">
                                                <span class="bs-stepper-circle">5</span>
                                                <span class="bs-stepper-label">Data Produk</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">

                                        <!-- your steps content here -->
                                        @include('components.pib_form1')
                                        @include('components.pib_form2')
                                        @include('components.pib_form3')
                                        @include('components.pib_form4')
                                        @include('components.pib_form5')

                                    </div>
                                </div>
                                <div class="card-footer">
                                    Ket : Bila Data Kosong, Isikan Nilai 0 atau -
                                </div>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>

@endsection
@section('scripts')
    @include('scripts.pib_create')
    @include('scripts.pib_form')

@endsection
