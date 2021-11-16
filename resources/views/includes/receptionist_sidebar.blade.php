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
        <!-- <p class="text-dark font-weight-bold text-center">{{ __('lang.dashboard.welcome', ['name' => Auth::user()->username])}}</p> -->
        
        <!-------------------------------------------------------------- Profile ---------------------------------------->
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">{{ __('lang.dashboard.profile')}}</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="{{route('profile')}}" class="text-dark d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments-alt" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <rect x="4" y="8" width="4" height="4" />
                            <line x1="6" y1="4" x2="6" y2="8" />
                            <line x1="6" y1="12" x2="6" y2="20" />
                            <rect x="10" y="14" width="4" height="4" />
                            <line x1="12" y1="4" x2="12" y2="14" />
                            <line x1="12" y1="18" x2="12" y2="20" />
                            <rect x="16" y="5" width="4" height="4" />
                            <line x1="18" y1="4" x2="18" y2="5" />
                            <line x1="18" y1="9" x2="18" y2="20" />
                        </svg>
                        <div class="mx-2">{{ __('lang.dashboard.my_profile')}}</div>
                    </a>
                </li>
                <li>
                    @if(Auth::user()->getHasAdminProfileAttribute())
                        <a href="{{route('admin.edit.profile')}}" class="text-dark d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                <line x1="16" y1="5" x2="19" y2="8" />
                            </svg>
                            <div class="mx-2">{{ __('lang.dashboard.edit_profile')}}</div>
                        </a>
                    @elseif(Auth::user()->getHasDoctorProfileAttribute())
                        <a href="{{route('doctor.edit.profile')}}" class="text-dark d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                <line x1="16" y1="5" x2="19" y2="8" />
                            </svg>
                            <div class="mx-2">{{ __('lang.dashboard.edit_profile')}}</div>
                        </a>
                    @else
                        <a href="{{route('receptionist.edit.profile')}}" class="text-dark d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                <line x1="16" y1="5" x2="19" y2="8" />
                            </svg>
                            <div class="mx-2">{{ __('lang.dashboard.edit_profile')}}</div>
                        </a>
                    @endif
                </li>
            </ul>
        </li>

        <!-------------------------------------------------------------- Actions ---------------------------------------->
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">{{ __('lang.dashboard.actions')}}</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    @if(Auth::user()->getHasAdminProfileAttribute())
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark">{{ __('lang.dashboard.registration_requests')}}</a>
                        </li>
                        <li>
                            <a href="{{route('admin.receptionists')}}" class="text-dark">{{ __('lang.dashboard.receptionists')}}</a>
                        </li>
                        <li>
                            <a href="{{route('admin.doctors')}}" class="text-dark">{{ __('lang.dashboard.doctors')}}</a>
                        </li>
                        <li>
                            <a href="{{route('admin.medical.specialities')}}" class="text-dark">{{ __('lang.dashboard.medical_specialities')}}</a>
                        </li>
                    @elseif(Auth::user()->getHasDoctorProfileAttribute())
                        @if(isset(Auth::user()->profile->clinic))
                            <li>
                                <a href="{{route('doctor.clinic')}}" class="text-dark">{{ __('lang.dashboard.clinic')}}</a>
                            </li>
                        @else
                            <li>
                                <p class="text-danger" >{{ __('lang.dashboard.no_clinic')}}</p>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('doctor.doctor.file', ['id' => Auth::user()->profile->id])}}">{{ __('lang.dashboard.file_history')}}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('receptionist.patients')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-friends" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="7" cy="5" r="2" />
                                    <path d="M5 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5" />
                                    <circle cx="17" cy="5" r="2" />
                                    <path d="M15 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4" />
                                </svg>
                                <div class="mx-2">{{ __('lang.dashboard.patients') }}</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('receptionist.clinics')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-hospital" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="3" y1="21" x2="21" y2="21" />
                                    <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" />
                                    <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                                    <line x1="10" y1="9" x2="14" y2="9" />
                                    <line x1="12" y1="7" x2="12" y2="11" />
                                </svg>
                                <div class="mx-2">{{ __('lang.dashboard.clinics')}}</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('receptionist.doctors')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                </svg>
                                <div class="mx-2">{{ __('lang.dashboard.doctors')}}</div>
                            </a>
                        </li>
                        <li>
                             <a href="{{route('receptionist.add.medicine')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pill" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4.5 12.5l8 -8a4.94 4.94 0 0 1 7 7l-8 8a4.94 4.94 0 0 1 -7 -7" />
                                    <line x1="8.5" y1="8.5" x2="15.5" y2="15.5" />
                                </svg> 
                                <div class="mx-2">medicines</div>
                            </a> 
                        </li>
                        <li>
                             <a href="{{route('receptionist.add.diagnose')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stethoscope" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M6 4h-1a2 2 0 0 0 -2 2v3.5h0a5.5 5.5 0 0 0 11 0v-3.5a2 2 0 0 0 -2 -2h-1" />
                                    <path d="M8 15a6 6 0 1 0 12 0v-3" />
                                    <path  d="M11 3v2" />
                                    <path  d="M6 3v2" />
                                    <circle cx="20" cy="10" r="2" />
                                </svg>
                                <div class="mx-2">diagnoses</div>
                            </a> 
                        </li>

                        <li>
                            <a href="{{route('receptionist.import.excel.view')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-import" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <ellipse cx="12" cy="6" rx="8" ry="3" />
                                    <path d="M4 6v8m5.009 .783c.924 .14 1.933 .217 2.991 .217c4.418 0 8 -1.343 8 -3v-6" />
                                    <path d="M11.252 20.987c.246 .009 .496 .013 .748 .013c4.418 0 8 -1.343 8 -3v-6m-18 7h7m-3 -3l3 3l-3 3" />
                                </svg>
                                <div class="mx-2">{{ __('lang.rec.import_data')}}</div>
                            </a>                            
                        </li>
                         <li>
                            <a href="{{route('receptionist.export.excel')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-export" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <ellipse cx="12" cy="6" rx="8" ry="3" />
                                    <path d="M4 6v6c0 1.657 3.582 3 8 3a19.84 19.84 0 0 0 3.302 -.267m4.698 -2.733v-6" />
                                    <path d="M4 12v6c0 1.599 3.335 2.905 7.538 2.995m8.462 -6.995v-2m-6 7h7m-3 -3l3 3l-3 3" />
                                </svg>
                                <div class="mx-2">{{ __('lang.rec.export_data')}}</div>
                            </a>   
                        </li>

                    @endif
                </ul>
        </li>
</nav>

    
