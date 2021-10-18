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

      
        <form method="POST" action="{{route('activate.code')}}">
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

          <div class="mb-4 d-flex">
            <h5>{{ __('lang.forgotPassword.no_code_sent')}}</h5>
            <a href="#" class="text-primary mx-2"><h5>{{ __('lang.forgotPassword.resend')}}</h5></a>
          </div>

          <div class="form-outline mb-4">
            <input type="tel" id="mobile" class="form-control form-control-lg"
              placeholder="{{ __('lang.forgotPassword.mobile')}}" name="mobile"/>
            <label class="form-label" for="mobile">{{ __('lang.forgotPassword.mobile')}}</label>
          </div>   

          <div class="form-outline mb-4">
            <input type="text" id="code" class="form-control form-control-lg"
              placeholder="{{ __('lang.forgotPassword.code')}}" name="code"/>
            <label class="form-label" for="code">{{ __('lang.forgotPassword.code')}}</label>
          </div>          

          <div class="text-center mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('lang.forgotPassword.submit')}}</button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
