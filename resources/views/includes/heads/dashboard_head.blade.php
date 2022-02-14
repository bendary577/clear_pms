<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Scotch">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Patient Management System</title>

<!-- Scripts -->

@if(Auth::user()->getHasDoctorProfileAttribute())
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
@endif

<script src="{{ asset('js/app.js') }}" defer></script>
   
<script src="{{ asset('js/dashboard.js') }}" defer></script>

<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

<!-- Styles -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">

<link href="{{ asset('fullcalendar-5.10.2/lib/main.css') }}" rel='stylesheet' />

<link href="{{ asset('css/app.css') }}" rel="stylesheet"> 

<link href="{{ asset('css/main.css') }}" rel="stylesheet"> 

<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet"> 

<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> 

<link href="{{ asset('css/upper_badge.css') }}" rel="stylesheet"> 

<!----- PATIENT FILES LIST ------->
<link href="{{ asset('css/files_list.css') }}" rel="stylesheet"> 
<script src="{{ asset('js/files_list.js') }}" defer></script>
<link href="{{ asset('css/images.css') }}" rel="stylesheet"> 
<script src="{{ asset('js/image_viewer.js') }}" defer></script>

<!----------------- JQUERY -------------------->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>

<!-- Charting library -->
<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>


<script src="{{ asset('fullcalendar-5.10.2/lib/main.js') }}"></script>

