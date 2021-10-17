<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="{{route('home')}}">
        {{ __('lang.accnav.brand')}}
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('home')}}">{{ __('lang.home')}} <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contacts">{{ __('lang.contacts')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">{{ __('lang.about')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('change.language', ['lang' => app()->getLocale() == 'en' ? 'ar' : 'en' ])}}">{{ app()->getLocale() == 'en' ? 'اللغة العربية' : 'english' }}</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">

      <a  href="{{route('login')}}" class="btn btn-success"> 
          {{ __('lang.login')}}
      </a>

    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
