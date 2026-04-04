@extends('layouts.clientLayout')
@section('title', 'Author')
@section('content')
        <div class="container container-mt">
            <h2 class="display-4 fw-normal my-2 text-center">Author</h2>
            <hr class="text-primary mx-auto mb-5 w-25 border-5 rounded opacity-75">
            <div class="row mb-5 mx-5">
                <div class="col-sm-6 d-flex flex-column justify-content-center align-items-center text-lg-start text-center">
                    <p class="lead">Vuk Drobnjaković</p>
                    <p class="h5">Index: <span class="text-primary">12/23</span></p>
                </div>
                <div class="col-sm-4">
                    <img src="{{ asset('assets/img/author.jpg') }}" alt="autor" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
@endsection
