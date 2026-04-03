<div class="card mb-3 bg-white shadow-sm border-0 rounded-3 overflow-hidden">
    <div class="card-body ticket-card" role="button" data-bs-toggle="collapse" data-bs-target="#departure{{ $i+1 }}" aria-expanded="false" aria-controls="departure{{ $i+1 }}">
        <div class="row align-items-center text-center text-md-start">

            <div class="col-md-3 mb-3 mb-md-0 border-md-end">
                <div class="fw-bold fs-5">{{ $departure->route->carrier->name }}</div>
                <div class="text-success small mt-1 d-flex align-items-center justify-content-center justify-content-md-start">
                    <i data-lucide="user-check" class="me-1" style="width: 16px; height: 16px;"></i>
                    Available seats: {{ $departure->route->seats }}
                </div>
            </div>

            <div class="col-md-6 mb-3 mb-md-0">
                <div class="d-flex justify-content-center justify-content-md-between align-items-center px-md-3">
                    <div class="text-end">
                        <div class="fs-4 fw-bold">{{ $departure->segment_departure_time }}</div>
                        <div class="text-muted small">{{ $departure->start_city_name }}</div>
                    </div>
                    <div class="mx-3 text-muted d-flex flex-column align-items-center">
                        <span class="small mb-1">{{ $departure->duration_text }}</span>
                        <i data-lucide="move-right" class="text-primary"></i>
                    </div>
                    <div class="text-start">
                        <div class="fs-4 fw-bold">{{ $departure->segment_arrival_time }}</div>
                        <div class="text-muted small">{{ $departure->end_city_name }}</div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 text-md-end border-md-start">
                <div class="fs-4 fw-bold text-success mb-1">{{ $departure->segment_price }} RSD</div>
                <div class="text-muted small d-flex align-items-center justify-content-center justify-content-md-end">
                    Route details <i data-lucide="chevron-down" class="ms-1 chevron-icon" style="width: 16px; transition: transform 0.3s;"></i>
                </div>
            </div>

        </div>
    </div>

    <div class="collapse" id="departure{{ $i+1 }}">
        <div class="card-footer bg-light border-top p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="mb-0 fw-bold">Trip Details</h6>
                <span class="badge bg-primary rounded-pill">Total duration: {{ $departure->duration_text }}</span>
            </div>

            <div class="timeline mt-3">
                @foreach($departure->timeline as $t)
                    <div class="timeline-item d-flex justify-content-between align-items-center">
                        <div>
                            <span class="fw-bold {{ $t->class }}">{{ $t->time }}</span>
                            <span class="ms-2 {{ $t->class }}">{{ $t->city_name }}</span>
                        </div>
                    </div>
                @endforeach
                <div class="text-end mt-4">
                    <button class="btn btn-success px-4">Book Ticket</button>
                </div>
            </div>
        </div>
    </div>
</div>
