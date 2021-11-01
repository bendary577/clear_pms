    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/images.css') }}" rel="stylesheet"> 
