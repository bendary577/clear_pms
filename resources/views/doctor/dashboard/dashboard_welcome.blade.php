@extends('layouts.dashboard')

@section('content')
        <!-- Page Content  -->
        <div id="content">
            @include('includes.doctor_dashboard_navbar')
            <div class="container">
                <div class="row">
                    <h2>{{__('lang.doctor.welcome')}}</h2>
                </div>
            </div>
        </div>
@endsection
