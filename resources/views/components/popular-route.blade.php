<div class="col-md-6 col-lg-4">
    <div class="card h-100 border-0 rounded-4 overflow-hidden shadow-sm hover-shadow transition-all">
        <div class="position-relative overflow-hidden route-img-wrapper">
            <img src="{{ asset('storage/uploads/cities/'.$route->image) }}"
                 class="w-100 h-100 object-fit-cover transition-all" alt="London">
        </div>
        <div class="card-body p-4 d-flex flex-column">
            <h4 class="font-headline fs-5 fw-bold mb-1">{{ $route->getName() }}</h4>
            <p class="text-secondary mb-4 small">Approx. {{ $route->duration }} • Daily departures</p>
            <div class="d-flex justify-content-between align-items-center mt-auto">
                <span class="text-secondary small">Starting from</span>
                <span class="fs-4 fw-bolder text-primary">{{ $route->totalPrice() }} RSD</span>
            </div>
        </div>
    </div>
</div>
