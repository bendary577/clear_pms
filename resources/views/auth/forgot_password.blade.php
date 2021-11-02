@extends('layouts.auth')

@section('content')
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="{{url('/images/auth/forgotPassword/forgot_password.png')}}" class="img-fluid"
          alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST" action="{{route('send.code')}}">
        {{ csrf_field() }}

            <!--- if user is added successfully ----------->
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            <!--- if user is not added successfully ----------->
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <!--- if user is not added successfully ----------->
            @if($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

          <div class="mb-4">
            <h5>{{ __('lang.forgotPassword.desc')}}</h5>
          </div>

          <!-- mobile input -->
          <div class="form-outline mb-4">
            <input type="email" id="email" class="form-control form-control-lg"
              placeholder="{{ __('lang.forgotPassword.email')}}" name="email"/>
            <label class="form-label" for="email">{{ __('lang.forgotPassword.email')}}</label>
          </div>          

          <div class="text-center mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('lang.forgotPassword.send')}}</button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
