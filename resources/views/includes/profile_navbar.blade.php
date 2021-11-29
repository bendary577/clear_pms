
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
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

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <a class="navbar-brand mt-2 mt-lg-0" href="#">{{ __('lang.accnav.brand')}}</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item mx-2">
          @if(Auth::user()->getHasReceptionistProfileAttribute())
            <a class="nav-link d-flex justify-content-center align-items-center" href="{{route('receptionist.dashboard')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dashboard" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <circle cx="12" cy="13" r="2" />
                  <line x1="13.45" y1="11.55" x2="15.5" y2="9.5" />
                  <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
                </svg> 
                <div class="mx-1">{{ __('lang.accnav.dashboard')}}</div>
            </a>    
          @elseif(Auth::user()->getHasDoctorProfileAttribute())
              <a class="nav-link d-flex justify-content-center align-items-center" href="{{route('doctor.dashboard')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dashboard" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <circle cx="12" cy="13" r="2" />
                  <line x1="13.45" y1="11.55" x2="15.5" y2="9.5" />
                  <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
                </svg> 
                <div class="mx-1">{{ __('lang.accnav.dashboard')}}</div>
              </a>
          @else
            <a class="nav-link d-flex justify-content-center align-items-center" href="{{route('admin.dashboard')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dashboard" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <circle cx="12" cy="13" r="2" />
                  <line x1="13.45" y1="11.55" x2="15.5" y2="9.5" />
                  <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
                </svg> 
                <div class="mx-1">{{ __('lang.accnav.dashboard')}}</div>
            </a>
          @endif
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link d-flex justify-content-center align-items-center" href="{{route('profile')}}">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home pe-3" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <polyline points="5 12 3 12 12 3 21 12 19 12" />
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
              </svg>
              <div class="mx-1">{{ __('lang.accnav.profile')}}</div>
          </a>
        </li>
        <li class="nav-item mx-2">
            <a class="nav-link d-flex justify-content-center align-items-center" href="{{ route('change.language', ['lang' => app()->getLocale() == 'en' ? 'ar' : 'en' ])}}">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-language" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M5 7h7m-2 -2v2a5 8 0 0 1 -5 8m1 -4a7 4 0 0 0 6.7 4" />
                <path d="M11 19l4 -9l4 9m-.9 -2h-6.2" />
              </svg>
              <div class="mx-1">{{ app()->getLocale() == 'en' ? 'اللغة العربية' : 'english' }}</div>
            </a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link d-flex justify-content-center align-items-center" href="{{route('logout')}}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
              <path d="M7 12h14l-3 -3m0 6l3 -3" />
            </svg>
            <div class="mx-1">{{ __('lang.accnav.logout')}}</div>
          </a>
        </li>
      </ul>
    </div>
    <div class="d-flex align-items-center">
      @if(isset(Auth::user()->avatar_path))
        <img
          src="{{url(Auth::user()->avatar_path)}}"
          class="rounded-circle"
          height="30"
          width="30"
          loading="lazy"
        />
      @else
      <img
          src="{{url('/images/profile/avatar.jpg')}}"
          class="rounded-circle dropdown-toggle"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
          height="30"
          width="30"
          alt=""
          loading="lazy"
        />
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
        </div>
      @endif
    </div>
  </div>
</nav>