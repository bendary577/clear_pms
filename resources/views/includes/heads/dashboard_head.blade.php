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
<!-- Styles -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">

<link href="{{ asset('css/app.css') }}" rel="stylesheet"> 

<link href="{{ asset('css/main.css') }}" rel="stylesheet"> 

<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet"> 

<!----- PATIENT FILES LIST ------->
<link href="{{ asset('css/files_list.css') }}" rel="stylesheet"> 
<script src="{{ asset('js/files_list.js') }}" defer></script>
<link href="{{ asset('css/images.css') }}" rel="stylesheet"> 
<script src="{{ asset('js/image_viewer.js') }}" defer></script>


<!-----  RTL ----------->

<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-40ix5a3dj6/qaC7tfz0Yr+p9fqWLzzAXiwxVLt9dw7UjQzGYw6rWRhFAnRapuQyK" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

