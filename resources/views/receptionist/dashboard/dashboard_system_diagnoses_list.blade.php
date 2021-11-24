@extends('layouts.dashboard')

@section('content')
        <!-- Page Content  -->
        <div id="content">
            @include('includes.dashboard_navbar')
            @include('receptionist.sections.system_diagnoses_list')
        </div>
@endsection
