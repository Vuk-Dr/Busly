@extends('adminlte::page')
@section('title', 'Edit carrier')
@section('plugins.BsCustomFileInput', true)
@section('plugins.Select2', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Edit carrier {{ $carrier->name }}</h1>
        <a href="{{ route('admin.carriers.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> &nbsp Back
        </a>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.carriers.update', $carrier->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @method('PUT')
                @csrf
                <input type="hidden" name="page" value="{{ request('page') }}">
                <div class="col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $carrier->name }}">
                    @error('name')
                    <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $carrier->email }}">
                    @error('email')
                    <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $carrier->phone }}">
                    @error('phone')
                    <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <x-adminlte-select2 name="city" label="City" data-placeholder="Select city...">
                        <option value=""/>
                        @foreach($cities as $c)
                            <option value="{{ $c->id }}" {{ $carrier->city->id == $c->id ? 'selected' : '' }}>
                                {{ $c->name }}
                            </option>
                        @endforeach
                    </x-adminlte-select2>
                    @error('city')
                    <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
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

                <div class="col-12 row pt-4 justify-content-around align-items-center">

                    @if($carrier->image)
                        <img src="{{ asset('storage/uploads/carriers/' . $carrier->image) }}" alt="city-img" width="300" class=""/>
                    @else

                        <div class="alert alert-warning">
                            Carrier has no linked image.
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
