        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark"><small>{{ __('lang.dashboard.actions')}}</small></a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mailbox" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M10 21v-6.5a3.5 3.5 0 0 0 -7 0v6.5h18v-6a4 4 0 0 0 -4 -4h-10.5" />
                                <path d="M12 11v-8h4l2 2l-2 2h-4" />
                                <path d="M6 15h1" />
                            </svg>
                            <div class="mx-2">{{ __('lang.dashboard.registration_requests')}}</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.receptionists')}}" class="text-dark d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-man" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <circle cx="12" cy="5" r="2" />
                                <path d="M10 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5" />
                            </svg>
                            <div class="mx-2">{{ __('lang.dashboard.receptionists')}}</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.doctors')}}" class="text-dark d-flex">
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
                        <a href="{{route('admin.medical.specialities')}}" class="text-dark d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-medical" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                <rect x="9" y="3" width="6" height="4" rx="2" />
                                <line x1="10" y1="14" x2="14" y2="14" />
                                <line x1="12" y1="12" x2="12" y2="16" />
                            </svg>
                            <div class="mx-2">{{ __('lang.dashboard.medical_specialities')}}</div>
                        </a>
                    </li>
                <ul>
            </a>
        </li>