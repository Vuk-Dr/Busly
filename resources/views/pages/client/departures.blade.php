@extends('layouts.clientLayout')
@section('title', 'Departures')
@section('content')
    <div class="container container-mt mt-4">

        <h2 class="mb-5 text-center fw-bold text-primary">Find Your Perfect Ride</h2>

        <div class="bg-white p-4 rounded-4 shadow-sm mb-5 border">
            <h4 class="mb-4">Search Parameters</h4>
            <form action="{{ route('departures.search') }}" method="get" class="row g-3 align-items-start">
                <div class="col-md-4">
                    <label for="arrivalStation" class="form-label text-muted small">Departure Station</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text bg-transparent"><i data-lucide="map-pin"></i></span>
                        <select class="form-select select-ajax-city" name="departure" id="departureStation" data-url="{{ route('cities.search') }}">
                            <option value="{{ $departureCity->id ?? old('departure') ?? '' }}" selected>{{ $departureCity->name ?? session('old_departure') ?? ''}}</option>
                        </select>
                    </div>
                    @error('departure')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="arrivalStation" class="form-label text-muted small">Arrival Station</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text bg-transparent"><i data-lucide="map-pin"></i></span>
                        <select class="form-select select-ajax-city" name="arrival" id="arrivalStation" data-url="{{ route('cities.search') }}">
                            <option value="{{ $arrivalCity->id ?? old('arrival') ?? '' }}" selected>{{ $arrivalCity->name ?? session('old_arrival') ?? ''}}</option>
                        </select>
                    </div>
                    @error('arrival')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="departureDate" class="form-label text-muted small">Date</label>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i data-lucide="calendar"></i></span>
                        <input type="date" value="{{ old('date') ?? $searchDate }}" name="date" class="form-control" id="departureDate">
                    </div>
                    @error('date')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-1 align-items-end">
                    <span>&nbsp;</span>
                    <button type="submit" class="btn btn-primary w-100 d-flex justify-content-center align-items-center mt-1" style="height: 38px;">
                        <i data-lucide="search"></i>
                    </button>
                </div>
            </form>
        </div>

        @if(isset($departures))
            <div class="container mt-4">
                <h3 class="mb-4">Avaliable departures: </h3>

                @forelse($departures as $i => $departure)
                    <x-departure :departure="$departure" :i="$i"></x-departure>
                @empty
                    <div class="alert alert-warning text-center">
                        No available departures found
                    </div>
                @endforelse
                <div class="card-footer pt-4 text-center">
                    {{ $departures->withQueryString()->links() }}
                </div>
            </div>
        @endif
    </div>
@endsection
