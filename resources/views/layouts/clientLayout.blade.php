<!DOCTYPE html>
<html lang="en">
<head>
    @include('common.client.head')
</head>
<body class="d-flex flex-column min-vh-100">
@include('common.client.navigation')

<main class="flex-grow-1 d-flex flex-column justify-content-center">
    @yield('content')
</main>

@include('common.client.footer')

@yield('additional-scripts')
@vite('resources/js/app.js')
</body>
</html>
