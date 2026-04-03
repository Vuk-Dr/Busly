@extends('adminlte::page')
@section('title', 'Edit city')
@section('plugins.BsCustomFileInput', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Edit city {{ $city->name }}</h1>
        <a href="{{ route('admin.cities.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> &nbsp Back
        </a>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.cities.update', $city->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="page" value="{{ request('page') }}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $city->name }}">
                    @error('name')
                    <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <x-adminlte-input-file name="image" id="image" placeholder="Choose a file..." accept="image/png, image/jpeg">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-upload"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-file>
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row pt-4 justify-content-around align-items-center">

                    @if($city->image)
                        <img src="{{ asset('storage/uploads/cities/' . $city->image) }}" alt="city-img" width="300" class=""/>
                    @else

                        <div class="alert alert-warning">
                            City has no linked image.
                        </div>
                    @endif

                    <button type="submit" class="btn btn-lg btn-primary mt-5 mt-sm-0">
                        <i class="fas fa-save"></i> &nbsp Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
