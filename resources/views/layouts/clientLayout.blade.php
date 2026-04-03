<!DOCTYPE html>
<html lang="en">
<head>
    @include('common.client.head')
</head>
<body>
@include('common.client.navigation')

<main>
    @yield('content')
</main>

@include('common.client.footer')

@yield('additional-scripts')
@vite('resources/js/app.js')
</body>
</html>
