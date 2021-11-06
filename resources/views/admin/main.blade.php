<!doctype html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body class="theme-black">
@include('admin.minileftbar')
@include('admin.leftsidebar')
<section class="content home">
    <div class="container-fluid">
        @include('admin.blockheader')
        @yield('content')
    </div>
</section>
</body>
@include('admin.scripts')
</html>
