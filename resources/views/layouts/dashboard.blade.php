<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
<head>
    @include('includes.heads.dashboard_head')
</head>
<body>
<div id="main" class="{{(App::isLocale('ar') ? 'text-left' : 'text-right')}}" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}" >
    @include('includes.profile_navbar')
    <div class="wrapper">
        @include('includes.receptionist_sidebar')
        @yield('content')
    </div>  
    @include('includes.footer')
</div>
</body>
</html>