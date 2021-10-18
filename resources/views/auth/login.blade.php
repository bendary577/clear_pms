@extends('layouts.auth')

@section('content')
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="{{url('/images/auth/login/login.png')}}" class="img-fluid"
          alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

      
        <form method="POST" action="{{route('authenticate')}}">
        {{ csrf_field() }}

            <!--- if user is added is added successfully ----------->
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            <!--- if user is added is added successfully ----------->
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

          <!-- Username input -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="{{ __('lang.signup.username')}}" name="username"/>
            <label class="form-label" for="form3Example3">{{ __('lang.signup.username')}}</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="{{ __('lang.signup.password')}}" name="password"/>
            <label class="form-label" for="form3Example4">{{ __('lang.signup.password')}}</label>
          </div>

          
          <div class="d-flex justify-content-between align-items-center">
            <div class="form-check mb-0">
              <input class="form-check-input " type="checkbox" name="remember_me" value="1"  id="remember_me" />
              <label class="form-check-label" for="remember_me">
              {{ __('lang.login.remember_me')}}
              </label>
            </div>
            <a href="{{route('forgot.password')}}" class="text-body">{{ __('lang.login.forgot_password')}}</a>
          </div>
          

          <div class="text-center mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('lang.login')}}</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">{{ __('lang.login.dont_have_account')}} <a href="{{route('register')}}" class="link-danger">{{ __('lang.signup.register')}}</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
