@extends('layouts.dashboard')

@section('content')
    <div id="content">
        @include('includes.dashboard_navbar')
        <div class="container">
            @include('receptionist.sections.welcome_dashboard.upper_badges')
        </div> 
        @include('receptionist.sections.system_statistics')
    </div>
@endsection
