@extends('layouts.dashboard')

@section('content')
        <!-- Page Content  -->
        <div id="content">
            @include('includes.dashboard_navbar')
            <div class="container">
                @include('receptionist.sections.welcome_dashboard.upper_badges')
            </div> 
            @include('receptionist.sections.patients_statistics')
        </div>
@endsection
