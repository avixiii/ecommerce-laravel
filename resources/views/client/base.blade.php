<!doctype html>
<html lang="en">
<head>
    @include('client.head')
</head>
<body>
@include('client.header')
<main class="main wrapper">
    @yield('content')
</main>
@include('client.footer')
</body>
@include('client.scripts')
</html>
