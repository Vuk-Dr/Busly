@extends('adminlte::page')
@section('title', 'Edit departure')
@section('plugins.Select2', true)
@vite('resources/js/admin.js')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Edit departure</h1>
        <a href="{{ route('admin.departures.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> &nbsp Back
        </a>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.departures.update', $departure->id) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <x-adminlte-select2 name="route_id" label="Route" data-placeholder="Select route...">
                        <option value=""/>
                        @foreach($routes as $r)
                            <option value="{{ $r->id }}" {{ $departure->route_id == $r->id ? 'selected' : '' }}>
                                {{ $r->getName() }}
                            </option>
                        @endforeach
                    </x-adminlte-select2>
                    @error('route_id')
                    <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4 col-md-2 mt-4 d-flex justify-content-center align-items-center">
                    <label class="mt-1 mr-2">Active: </label>
                    <input type="checkbox" name="active" {{ $departure->active ? 'checked' : ''}}>
                </div>
                <div class="col-8 col-md-4">
                    <label for="time">Time:</label>
                    <input type="time" id="time" value="{{ \Carbon\Carbon::parse($departure->time)->format('H:i') }}" class="form-control @error('time') is-invalid @enderror" name="time">
                    @error('time')
                    <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4 col-md-2 mt-4 d-flex justify-content-end align-items-center">
                    <label class="mt-1 mr-2" for="enableDateCheckbox">One time: </label>
                    <input type="checkbox" name="one_time" id="enableDateCheckbox" {{ $departure->one_time ? 'checked' : ''}}>
                </div>

                <div class="col-8 col-md-4">
                    <label for="dateInput">Date:</label>
                    <input type="date" name="date" value="{{ $departure->date }}" id="dateInput" class="form-control @error('date') is-invalid @enderror">
                    @error('date')
                    <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mt-4 d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> &nbsp Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
