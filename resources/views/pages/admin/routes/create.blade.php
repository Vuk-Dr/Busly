@extends('adminlte::page')
@section('title', 'Add route')
@section('plugins.Select2', true)
@vite('resources/js/admin.js')
@vite('resources/css/app.css')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Add route</h1>
        <a href="{{ route('admin.routes.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> &nbsp Back
        </a>
    </div>
@endsection

@section('content')
    <div class="card card-primary">
        <form action="{{ route('admin.routes.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row pb-4 mb-3 border-bottom">
                    <div class="col-12 col-md-8">
                        <x-adminlte-select2 name="carrier_id" label="Carrier" data-placeholder="Select carrier...">
                            <option value=""/>
                            @foreach($carriers as $c)
                                <option value="{{ $c->id }}" {{ old('carrier_id') == $c->id ? 'selected' : '' }}>
                                    {{ $c->name }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                        @error('carrier')
                        <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md-2">
                        <label>Seats</label>
                        <input type="number" name="seats" placeholder="..." value="{{ old('seats') }}"
                               class="form-control @error('seats') is-invalid @enderror" min="0">
                        @error('seats')
                        <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md-2">
                        <label>Base price</label>
                        <input type="number" name="base_price" placeholder="..." value="{{ old('base_price') }}"
                               class="form-control @error('base_price') is-invalid @enderror" min="0">
                        @error('base_price')
                        <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div id="stations-container">
                    @php
                        $oldStops = old('stops', [['city' => '', 'duration' => '', 'price' => '', 'order' => 1]]);
                    @endphp
                    @foreach($oldStops as $i => $stop)
                        <div class="row align-items-start station-row mb-3 pb-4 border-bottom">
                            <div class="col-md-1 pt-4 text-center">
                                <span class="station-order badge fs-5 bg-primary">{{ $i+1 }}</span>
                                <input type="hidden" name="stops[{{ $i }}][order]" class="input-order" value="{{ $i+1 }}">
                            </div>
                            <div class="col-12 col-md-4">
                                <label>City</label>
                                <select name="stops[{{ $i }}][city]"
                                        class="form-select input-city @error('stops.' . $i . '.city') is-invalid @enderror" >
                                    <option value="">Choose city...</option>
                                    @foreach($cities as $c)
                                        <option value="{{ $c->id }}" {{ $stop['city'] == $c->id ? 'selected' : '' }}>
                                            {{ $c->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('stops.'.$i.'.city')
                                <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class=" col-md-2 col-6">
                                <label>Duration <span class="d-none d-md-inline">(min)</span></label>
                                <input type="number" name="stops[{{ $i }}][duration]"
                                       class="form-control input-duration @error('stops.' . $i . '.duration') is-invalid @enderror"
                                       value="{{ $stop['duration'] ?? '' }}" placeholder="From prev..." min="0">
                                @error('stops.'.$i.'.duration')
                                <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class=" col-md-2 col-6">
                                <label>Price</label>
                                <input type="number" name="stops[{{ $i }}][price]"
                                       class="form-control input-price @error('stops.' . $i . '.price') is-invalid @enderror"
                                       value="{{ $stop['price'] ?? '' }}" placeholder="From prev..." min="0">
                                @error('stops.'.$i.'.price')
                                <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 col-8 text-center">
                                <div class="btn-group mt-4">
                                    <button type="button" class="btn btn-outline-secondary btn-up"><i class="fas fa-arrow-up"></i></button>
                                    <button type="button" class="btn btn-outline-secondary btn-down"><i class="fas fa-arrow-down"></i></button>
                                </div>
                            </div>
                            <div class="col-4 col-md-1  text-center mt-4">
                                <button type="button" class="btn btn-danger btn-remove"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-between px-2 mt-4">
                    <button type="button" class="btn btn-success" id="add-station">
                        <i class="fas fa-plus"></i> &nbsp Add station
                    </button>
                    @error('stops') <div class="fs-6 text-danger text-bold">{{ $message }}</div> @enderror
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> &nbsp Save
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

