@extends('layouts.dashboard')

@section('content')
        <!-- Page Content  -->
        <div id="content">
            @include('includes.doctor_dashboard_navbar')
            @include('profile.sections.profile')
        </div>
@endsection
