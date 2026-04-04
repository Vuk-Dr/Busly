@extends('layouts.clientLayout')
@section('title', 'Home')
@section('content')

    <div class="position-relative d-flex align-items-center overflow-hidden hero-wrapper">
        <div class="position-absolute w-100 h-75 top-0 start-0 z-0">
            <div class="position-absolute w-100 h-100 top-0 start-0 bg-hero-gradient hero-overlay"></div>
            <img src="{{ asset('assets/img/hero.png') }}"
                 class="w-100 h-100 object-fit-cover" alt="Hero background with centered bus">
        </div>

        <div class="container position-relative z-1 mt-5">
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
            <form action="{{ route('departures.search') }}" method="get" class="row g-3 align-items-start">
                <div class="col-md-4">
                    <label for="arrivalStation" class="form-label text-muted small">Departure Station</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text bg-transparent"><i data-lucide="map-pin"></i></span>
                        <select class="form-select select-ajax-city" name="departure" id="departureStation" data-url="{{ route('cities.search') }}">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="arrivalStation" class="form-label text-muted small">Arrival Station</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text bg-transparent"><i data-lucide="map-pin"></i></span>
                        <select class="form-select select-ajax-city" name="arrival" id="arrivalStation" data-url="{{ route('cities.search') }}">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="departureDate" class="form-label text-muted small">Date</label>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i data-lucide="calendar"></i></span>
                        <input type="date" name="date" value="{{ $todayDate }}" class="form-control" id="departureDate">
                    </div>
                </div>
                <div class="col-md-1 align-items-end">
                    <span>&nbsp;</span>
                    <button type="submit" class="btn btn-primary w-100 d-flex justify-content-center align-items-center mt-1" style="height: 38px;">
                        <i data-lucide="search"></i>
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
                @foreach($routes as $r)
                    <x-popular-route :route="$r"></x-popular-route>
                @endforeach
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
                @foreach($carriers as $c)
                    <img src="{{ asset('storage/uploads/carriers/' . $c->image) }}" class="operator-logo" alt="{{ $c->name }}">
                @endforeach
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
                            @csrf
                            <input type="email"
                                   id="newsletterEmail"
                                   class="newsletter-input form-control bg-light bg-opacity-10 border-light border-opacity-25 text-white px-3 py-2 rounded-pill"
                                   placeholder="Your email address">
                            <button type="button"
                                    id="newsletterButton"
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

