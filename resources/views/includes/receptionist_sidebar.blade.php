<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header text-center">
        <h3 class="text-dark">{{ __('lang.dashboard.dashboard')}}</h3>
        @if(Auth::user()->getHasAdminProfileAttribute())
        <img src="{{url('/images/dashboard/settings.png')}}" class="mt-2" width="100" height="100" alt="welcome" />
        @elseif(Auth::user()->getHasDoctorProfileAttribute())
        <img src="{{url('/images/dashboard/doctor.png')}}" class="mt-2" width="100" height="100" alt="welcome" />
        @else
        <img src="{{url('/images/dashboard/receptionist.png')}}" class="mt-2" width="100" height="100" alt="welcome" />
        @endif
    </div>
    <ul class="list-unstyled components" class="text-dark">
        <h6 class="text-dark font-weight-bold text-center">{{ __('lang.dashboard.welcome', ['name' => Auth::user()->username])}}</h6> 
        <!-------------------------------------------------------------- Profile ---------------------------------------->
        @include('profile.sections.profile_sidebar_actions') 
        <!-------------------------------------------------------------- Admins ---------------------------------------->
        @if(Auth::user()->getHasAdminProfileAttribute())
            @include('admin.sections.admin_sidebar_actions') 
         <!-------------------------------------------------------------- Doctors ---------------------------------------->
        @elseif(Auth::user()->getHasDoctorProfileAttribute())
            @include('doctor.sections.doctor_sidebar_actions')    
        <!-------------------------------------------------------------- Receptionists ---------------------------------------->
        @else
            @include('receptionist.sections.receptionists_sidebar_actions')    
        @endif
    </ul>
</nav>

    
