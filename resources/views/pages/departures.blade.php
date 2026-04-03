@extends('layouts.clientLayout')
@section('title', 'Departures')
@section('content')
    <div class="container mt-5 pt-5">

        <h2 class="mb-5 text-center fw-bold text-primary">Find Your Perfect Ride</h2>

        <div class="bg-white p-4 rounded-4 shadow-sm mb-5 border">
            <h4 class="mb-4">Search Parameters</h4>
            <form class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label for="departureStation" class="form-label text-muted small">Departure Station</label>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i data-lucide="map-pin"></i></span>
                        <input type="text" class="form-control" id="departureStation" placeholder="E.g. Belgrade">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="arrivalStation" class="form-label text-muted small">Arrival Station</label>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i data-lucide="map-pin"></i></span>
                        <input type="text" class="form-control" id="arrivalStation" placeholder="E.g. Novi Sad">
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="departureDate" class="form-label text-muted small">Date</label>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i data-lucide="calendar"></i></span>
                        <input type="date" class="form-control" id="departureDate">
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="departureTime" class="form-label text-muted small">Time (from)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i data-lucide="clock"></i></span>
                        <input type="time" class="form-control" id="departureTime">
                    </div>
                </div>
                <div class="col-md-1">
                    <label for="passengers" class="form-label text-muted small">Passengers</label>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent px-2"><i data-lucide="users" style="width: 18px;"></i></span>
                        <input type="number" class="form-control px-2" id="passengers" min="1" value="1">
                    </div>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary w-100 d-flex justify-content-center align-items-center" style="height: 38px;">
                        <i data-lucide="search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div>
            <h5 class="mb-3">Available Departures (2)</h5>

            <div class="card mb-3 shadow-sm border-0 rounded-3 overflow-hidden">
                <div class="card-body ticket-card" role="button" data-bs-toggle="collapse" data-bs-target="#departure1" aria-expanded="false" aria-controls="departure1">
                    <div class="row align-items-center text-center text-md-start">

                        <div class="col-md-3 mb-3 mb-md-0 border-md-end">
                            <div class="fw-bold fs-5">Lasta</div>
                            <div class="text-success small mt-1 d-flex align-items-center justify-content-center justify-content-md-start">
                                <i data-lucide="user-check" class="me-1" style="width: 16px; height: 16px;"></i>
                                Available seats: 12
                            </div>
                        </div>

                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="d-flex justify-content-center justify-content-md-between align-items-center px-md-3">
                                <div class="text-end">
                                    <div class="fs-4 fw-bold">08:00</div>
                                    <div class="text-muted small">Belgrade</div>
                                </div>
                                <div class="mx-3 text-muted d-flex flex-column align-items-center">
                                    <span class="small mb-1">1h 30m</span>
                                    <i data-lucide="move-right" class="text-primary"></i>
                                </div>
                                <div class="text-start">
                                    <div class="fs-4 fw-bold">09:30</div>
                                    <div class="text-muted small">Novi Sad</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 text-md-end border-md-start">
                            <div class="fs-4 fw-bold text-primary mb-1">850 RSD</div>
                            <div class="text-muted small d-flex align-items-center justify-content-center justify-content-md-end">
                                Route details <i data-lucide="chevron-down" class="ms-1 chevron-icon" style="width: 16px; transition: transform 0.3s;"></i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="collapse" id="departure1">
                    <div class="card-footer bg-light border-top p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h6 class="mb-0 fw-bold">Trip Details</h6>
                            <span class="badge bg-primary rounded-pill">Total duration: 1h 30m</span>
                        </div>

                        <div class="timeline mt-3">
                            <div class="timeline-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="fw-bold">08:00</span>
                                    <span class="ms-2">Belgrade (Main Bus Station)</span>
                                </div>
                            </div>
                            <div class="timeline-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="fw-bold text-muted">08:45</span>
                                    <span class="ms-2 text-muted">Stara Pazova (Stop)</span>
                                </div>
                            </div>
                            <div class="timeline-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="fw-bold text-secondary">09:05</span>
                                    <span class="ms-2 text-secondary">Inđija (Stop)</span>
                                </div>
                            </div>
                            <div class="timeline-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="fw-bold">09:30</span>
                                    <span class="ms-2">Novi Sad (Main Bus Station)</span>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <button class="btn btn-success px-4">Book Ticket</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
