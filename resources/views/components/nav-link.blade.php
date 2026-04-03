<li class="nav-item">
    <a class="nav-link text-{{ request()->routeIs($route) ? 'primary' : 'secondary' }} fw-medium link-primary" href="{{ route($route) }}">{{$page}}</a>
</li>
