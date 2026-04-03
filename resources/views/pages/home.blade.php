@extends('layouts.clientLayout')
@section('title', 'Home')
@section('content')

    <div class="position-relative d-flex align-items-center overflow-hidden hero-wrapper">
        <div class="position-absolute w-100 h-100 top-0 start-0 z-0">
            <div class="position-absolute w-100 h-100 top-0 start-0 bg-hero-gradient hero-overlay"></div>
            <img src="https://images.unsplash.com/photo-1570125909232-eb263c188f7e?q=80&w=2071&auto=format&fit=crop"
                 class="w-100 h-100 object-fit-cover" alt="Hero background with centered bus">
        </div>

        <div class="container position-relative z-1 pt-5 mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="font-headline display-3 fw-bolder text-white mb-4 lh-sm">
                        Your Next Journey <br><span style="color: var(--color-secondary-fixed);">Starts Here</span>
                    </h1>
                    <p class="fs-4 fw-light mb-5" style="color: var(--color-on-primary-container);">
                        Book affordable and comfortable bus tickets across the largest network in the country with ease.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container position-relative z-2 mt-n-custom">
        <div class="bg-white p-4 p-md-5 rounded-4 shadow-lg">
            <form class="row g-4">
                <div class="col-md-6 col-lg">
                    <label class="form-label text-secondary fw-semibold small d-flex align-items-center gap-2 mb-2">
                        <i data-lucide="map-pin" class="icon-sm"></i> DEPARTURE
                    </label>
                    <select class="w-100 form-select select-ajax-city" id="departureCity" name="departureCity" data-url="{{ route('cities.search') }}">
                    </select>
                </div>

                <div class="col-md-6 col-lg">
                    <label class="form-label text-secondary fw-semibold small d-flex align-items-center gap-2 mb-2">
                        <i data-lucide="navigation" class="icon-sm"></i> ARRIVAL
                    </label>
                    <select class="w-100 form-select select-ajax-city" id="arrivalCity" name="arrivalCity" data-url="{{ route('cities.search') }}">
                    </select>
                </div>

                <div class="col-md-4 col-lg">
                    <label class="form-label text-secondary fw-semibold small d-flex align-items-center gap-2 mb-2">
                        <i data-lucide="calendar" class="icon-sm"></i> DATE
                    </label>
                    <input type="date" class="form-control bg-light border-0 fs-6">
                </div>

                <div class="col-md-4 col-lg">
                    <label class="form-label text-secondary fw-semibold small d-flex align-items-center gap-2 mb-2">
                        <i data-lucide="users" class="icon-sm"></i> PASSENGERS
                    </label>
                    <input type="number" class="form-control bg-light border-0 fs-6" value="1" min="1"
                           max="5"/>
                </div>

                <div class="col-md-4 col-lg d-flex align-items-end">
                    <button type="submit"
                            class="btn w-100 py-3 rounded-pill fw-bold text-white bg-hero-gradient border-0 shadow-sm transition-all hover-scale">
                        Search Buses
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="py-5 my-5">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-4 d-flex flex-column align-items-center">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mb-4 transition-all feature-icon-wrapper">
                        <i data-lucide="banknote" class="icon-lg text-primary"></i>
                    </div>
                    <h3 class="font-headline fs-4 fw-bold mb-3">Best Prices</h3>
                    <p class="text-secondary">Save up to 40% on early bookings with our exclusive dynamic pricing
                        deals.</p>
                </div>

                <div class="col-md-4 d-flex flex-column align-items-center">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mb-4 transition-all feature-icon-wrapper">
                        <i data-lucide="network" class="icon-lg text-primary"></i>
                    </div>
                    <h3 class="font-headline fs-4 fw-bold mb-3">Wide Network</h3>
                    <p class="text-secondary">Connecting over 2,500 cities nationwide with more than 10,000 daily
                        departures.</p>
                </div>

                <div class="col-md-4 d-flex flex-column align-items-center">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mb-4 transition-all feature-icon-wrapper">
                        <i data-lucide="headset" class="icon-lg text-primary"></i>
                    </div>
                    <h3 class="font-headline fs-4 fw-bold mb-3">24/7 Support</h3>
                    <p class="text-secondary">Our dedicated customer happiness team is always available to assist with
                        your journey.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-popular-routes">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-end mb-5">
                <div>
                    <h2 class="font-headline display-6 fw-bolder mb-2">Popular Routes</h2>
                    <p class="text-secondary fs-5 mb-0">Travel to the most visited destinations across the country.</p>
                </div>
                <a href="#" class="d-none d-md-flex align-items-center gap-2 text-primary fw-bold text-decoration-none">
                    View All Routes <i data-lucide="arrow-right" class="icon-sm"></i>
                </a>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 rounded-4 overflow-hidden shadow-sm hover-shadow transition-all">
                        <div class="position-relative overflow-hidden route-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1513635269975-5969336ac1fc?q=80&w=2070&auto=format&fit=crop"
                                 class="w-100 h-100 object-fit-cover transition-all" alt="London">
                            <span class="badge position-absolute top-0 end-0 m-3 rounded-pill px-3 py-2 text-white badge-trending">Trending</span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="font-headline fs-5 fw-bold mb-1">London → Manchester</h4>
                            <p class="text-secondary mb-4 small">Approx. 4h 30m • Daily departures</p>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <span class="text-secondary small">Starting from</span>
                                <span class="fs-4 fw-bolder text-primary">£12.00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 rounded-4 overflow-hidden shadow-sm hover-shadow transition-all">
                        <div class="position-relative overflow-hidden route-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1520623695276-8dc87cb7356c?q=80&w=2070&auto=format&fit=crop"
                                 class="w-100 h-100 object-fit-cover transition-all" alt="Edinburgh">
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="font-headline fs-5 fw-bold mb-1">London → Edinburgh</h4>
                            <p class="text-secondary mb-4 small">Approx. 8h 15m • Overnight sleeper</p>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <span class="text-secondary small">Starting from</span>
                                <span class="fs-4 fw-bolder text-primary">£24.50</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 rounded-4 overflow-hidden shadow-sm hover-shadow transition-all">
                        <div class="position-relative overflow-hidden route-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1505881402582-c5bc11054f91?q=80&w=2105&auto=format&fit=crop"
                                 class="w-100 h-100 object-fit-cover transition-all" alt="Brighton">
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="font-headline fs-5 fw-bold mb-1">London → Brighton</h4>
                            <p class="text-secondary mb-4 small">Approx. 2h 00m • Frequent service</p>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <span class="text-secondary small">Starting from</span>
                                <span class="fs-4 fw-bolder text-primary">£8.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 my-5">
        <div class="container text-center mb-5">
            <h2 class="font-headline fs-2 fw-bolder mb-3">Trusted by Leading Operators</h2>
            <div class="mx-auto rounded-pill operators-underline mb-4"></div>
        </div>

        <div class="container px-0 slider-wrapper">
            <div id="logo-slider">
                <img src="https://placehold.co/180x50/f9f9ff/727784?text=National+Express" class="operator-logo"
                     alt="National Express"> <!--uradi link ka prevozniku -->
                <img src="https://placehold.co/150x50/f9f9ff/727784?text=Megabus" class="operator-logo" alt="Megabus">
                <img src="https://placehold.co/150x50/f9f9ff/727784?text=FlixBus" class="operator-logo" alt="FlixBus">
                <img src="https://placehold.co/160x50/f9f9ff/727784?text=Greyhound" class="operator-logo"
                     alt="Greyhound">
                <img src="https://placehold.co/170x50/f9f9ff/727784?text=Stagecoach" class="operator-logo"
                     alt="Stagecoach">
                <img src="https://placehold.co/180x50/f9f9ff/727784?text=Arriva" class="operator-logo" alt="Arriva">

                <img src="https://placehold.co/180x50/f9f9ff/727784?text=National+Express" class="operator-logo"
                     alt="National Express">
                <img src="https://placehold.co/150x50/f9f9ff/727784?text=Megabus" class="operator-logo" alt="Megabus">
                <img src="https://placehold.co/150x50/f9f9ff/727784?text=FlixBus" class="operator-logo" alt="FlixBus">
                <img src="https://placehold.co/160x50/f9f9ff/727784?text=Greyhound" class="operator-logo"
                     alt="Greyhound">
                <img src="https://placehold.co/170x50/f9f9ff/727784?text=Stagecoach" class="operator-logo"
                     alt="Stagecoach">
                <img src="https://placehold.co/180x50/f9f9ff/727784?text=Arriva" class="operator-logo" alt="Arriva">
            </div>
        </div>
    </div>

    <div class="py-5 mb-4">
        <div class="container">
            <div class="bg-hero-gradient rounded-4 p-4 p-md-5 position-relative overflow-hidden shadow-lg">
                <div class="position-absolute top-0 end-0 h-100 bg-white newsletter-skew-bg"></div>

                <div class="row align-items-center position-relative z-1 p-md-3">
                    <div class="col-lg-6 mb-4 mb-lg-0 text-white">
                        <h2 class="font-headline display-6 fw-bolder mb-3">Get Exclusive Offers</h2>
                        <p class="fs-5 mb-0" style="color: var(--color-on-primary-container);">Subscribe to our
                            newsletter and receive travel inspiration and discount codes directly in your inbox</p>
                    </div>
                    <div class="col-lg-6">
                        <form class="d-flex flex-column flex-md-row gap-3">
                            <input type="email"
                                   class="newsletter-input form-control bg-light bg-opacity-10 border-light border-opacity-25 text-white px-3 py-2 rounded-pill"
                                   placeholder="Your email address">
                            <button type="submit"
                                    class="btn btn-success rounded-pill fw-bold px-1 text-white col-md-4 text-nowrap transition-all">
                                Subscribe Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

