<nav class="fixed-top container navbar navbar-expand-lg glass-nav shadow py-3 px-4">
    <a class="navbar-brand font-headline fw-bolder fs-3 text-primary me-auto" href="{{ route('home.index') }}">Busly</a>

    <div class="d-flex align-items-center gap-2 gap-md-3 order-lg-last">
        @if(session()->has('user'))
            <span class="text-secondary fw-medium d-none d-sm-inline">
                Hi, {{ session('user')->first_name }}
            </span>
            <a class="btn btn-primary rounded-pill fw-bold px-3 px-md-4 transition-all" href="{{ route('login.logout') }}">Logout</a>
        @else
            <a class="btn btn-outline-primary rounded-pill fw-bold px-3 px-md-4 transition-all" href="{{ route('login.login') }}">Login</a>
        @endif

        <button class="navbar-toggler border-0 px-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav gap-3 gap-lg-4 mt-3 mt-lg-0 text-center">
            <x-nav-link route="departures.index" page="Departures"/>
            <li class="nav-item"><a class="nav-link text-secondary fw-medium link-primary" href="#">Routes</a></li>
            <li class="nav-item"><a class="nav-link text-secondary fw-medium link-primary" href="#">Bus Operators</a></li>
            <li class="nav-item"><a class="nav-link text-secondary fw-medium link-primary" href="#">Author</a></li>
            @if(session()->has('user'))
            <li class="nav-item"><a class="nav-link text-secondary fw-medium link-primary" href="#">My Bookings</a></li>
            @endif
        </ul>
    </div>
</nav>
