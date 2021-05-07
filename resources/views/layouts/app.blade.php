<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'>
{{--    <title>Laravel</title>--}}
{!! SEOMeta::generate() !!}
<!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
</head>
<body>
<div class="base-container">
    <div class="nav-hodih main-header nav-{{$type}}">
        {{\TCG\Voyager\Models\Menu::display('Nav', 'layouts.navigation')}}
    </div>

    <main class="main-body">
        @yield('content')
    </main>
    <footer class="main-footer">
        @yield('footer')
        @include('layouts.footer')
    </footer>
</div>
<script src="{{asset('assets/js/app.js')}}"></script>
</body>
</html>
