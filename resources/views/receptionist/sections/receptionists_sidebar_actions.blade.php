            <li>
                <a href="#patients" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-friends" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="7" cy="5" r="2" />
                        <path d="M5 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5" />
                        <circle cx="17" cy="5" r="2" />
                        <path d="M15 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4" />
                    </svg>
                    <small>{{ __('lang.dashboard.patients') }}</small>
                </a>
                    <ul class="collapse list-unstyled" id="patients">
                        <li>
                            <a href="{{route('receptionist.patients')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="9" y1="6" x2="20" y2="6" />
                                    <line x1="9" y1="12" x2="20" y2="12" />
                                    <line x1="9" y1="18" x2="20" y2="18" />
                                    <line x1="5" y1="6" x2="5" y2="6.01" />
                                    <line x1="5" y1="12" x2="5" y2="12.01" />
                                    <line x1="5" y1="18" x2="5" y2="18.01" />
                                </svg>
                                <div class="mx-2"><small>manage patients</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('receptionist.patients.list')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="9" y1="6" x2="20" y2="6" />
                                    <line x1="9" y1="12" x2="20" y2="12" />
                                    <line x1="9" y1="18" x2="20" y2="18" />
                                    <line x1="5" y1="6" x2="5" y2="6.01" />
                                    <line x1="5" y1="12" x2="5" y2="12.01" />
                                    <line x1="5" y1="18" x2="5" y2="18.01" />
                                </svg>
                                <div class="mx-2"><small>available patients</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 11h6m-3 -3v6" />
                                </svg>
                                <div class="mx-2"><small>add new patient</small></div>
                            </a>
                        </li>
                    </ul>
                </a>
            </li>
            <li>
                <a href="#doctors" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="9" cy="7" r="4" />
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                    </svg>
                    <small>{{ __('lang.dashboard.doctors')}}</small></a>
                    <ul class="collapse list-unstyled" id="doctors">
                        <li>
                            <a href="{{route('receptionist.doctors')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="9" y1="6" x2="20" y2="6" />
                                    <line x1="9" y1="12" x2="20" y2="12" />
                                    <line x1="9" y1="18" x2="20" y2="18" />
                                    <line x1="5" y1="6" x2="5" y2="6.01" />
                                    <line x1="5" y1="12" x2="5" y2="12.01" />
                                    <line x1="5" y1="18" x2="5" y2="18.01" />
                                </svg>
                                <div class="mx-2"><small>available doctors</small></div>
                            </a>
                        </li>
                    </ul>
                </a>
            </li>
            <li>
                <a href="#clinics" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-hospital" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <line x1="3" y1="21" x2="21" y2="21" />
                        <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" />
                        <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                        <line x1="10" y1="9" x2="14" y2="9" />
                        <line x1="12" y1="7" x2="12" y2="11" />
                    </svg>
                    <small>{{ __('lang.dashboard.clinics')}}</small>
                </a>
                    <ul class="collapse list-unstyled" id="clinics">
                        <li>
                            <a href="{{route('receptionist.clinics')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="9" y1="6" x2="20" y2="6" />
                                    <line x1="9" y1="12" x2="20" y2="12" />
                                    <line x1="9" y1="18" x2="20" y2="18" />
                                    <line x1="5" y1="6" x2="5" y2="6.01" />
                                    <line x1="5" y1="12" x2="5" y2="12.01" />
                                    <line x1="5" y1="18" x2="5" y2="18.01" />
                                </svg>
                                <div class="mx-2"><small>available clinics</small></div>
                            </a>
                        </li>
                    </ul>
                </a>
            </li>
            <li>
                <a href="#system_medicines" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pill" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4.5 12.5l8 -8a4.94 4.94 0 0 1 7 7l-8 8a4.94 4.94 0 0 1 -7 -7" />
                        <line x1="8.5" y1="8.5" x2="15.5" y2="15.5" />
                    </svg> 
                    <small>system medicines</small>
                </a>
                    <ul class="collapse list-unstyled" id="system_medicines">
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="9" y1="6" x2="20" y2="6" />
                                    <line x1="9" y1="12" x2="20" y2="12" />
                                    <line x1="9" y1="18" x2="20" y2="18" />
                                    <line x1="5" y1="6" x2="5" y2="6.01" />
                                    <line x1="5" y1="12" x2="5" y2="12.01" />
                                    <line x1="5" y1="18" x2="5" y2="18.01" />
                                </svg>
                                <div class="mx-2"><small>available medicines</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    <line x1="12" y1="11" x2="12" y2="17" />
                                    <line x1="9" y1="14" x2="15" y2="14" />
                                </svg>
                                <div class="mx-2"><small>add new medicine</small></div>
                            </a>
                        </li>
                    </ul>
                </a>
            </li>
            <li>
                <a href="#system_diagnoses" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stethoscope" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M6 4h-1a2 2 0 0 0 -2 2v3.5h0a5.5 5.5 0 0 0 11 0v-3.5a2 2 0 0 0 -2 -2h-1" />
                        <path d="M8 15a6 6 0 1 0 12 0v-3" />
                        <path  d="M11 3v2" />
                        <path  d="M6 3v2" />
                        <circle cx="20" cy="10" r="2" />
                    </svg>    
                    <small>system diagnoses</small>
                </a>
                    <ul class="collapse list-unstyled" id="system_diagnoses">
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="9" y1="6" x2="20" y2="6" />
                                    <line x1="9" y1="12" x2="20" y2="12" />
                                    <line x1="9" y1="18" x2="20" y2="18" />
                                    <line x1="5" y1="6" x2="5" y2="6.01" />
                                    <line x1="5" y1="12" x2="5" y2="12.01" />
                                    <line x1="5" y1="18" x2="5" y2="18.01" />
                                </svg>
                                <div class="mx-2"><small>available diagnoses</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    <line x1="12" y1="11" x2="12" y2="17" />
                                    <line x1="9" y1="14" x2="15" y2="14" />
                                </svg>
                                <div class="mx-2"><small>add new diagnose</small></div>
                            </a>
                        </li>
                    </ul>
                </a>
            </li>
            <li>
                <a href="#import_data" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-import" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <ellipse cx="12" cy="6" rx="8" ry="3" />
                        <path d="M4 6v8m5.009 .783c.924 .14 1.933 .217 2.991 .217c4.418 0 8 -1.343 8 -3v-6" />
                        <path d="M11.252 20.987c.246 .009 .496 .013 .748 .013c4.418 0 8 -1.343 8 -3v-6m-18 7h7m-3 -3l3 3l-3 3" />
                    </svg>
                    <small>import data</small>
                </a>
                    <ul class="collapse list-unstyled" id="import_data">
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart-broken" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    <path d="M12 7l-2 4l4 3l-2 4v3" />
                                </svg>
                                <div class="mx-2"><small>patients data</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-medical" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                    <rect x="9" y="3" width="6" height="4" rx="2" />
                                    <line x1="10" y1="14" x2="14" y2="14" />
                                    <line x1="12" y1="12" x2="12" y2="16" />
                                </svg>
                                <div class="mx-2"><small>doctors data</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tools" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M3 21h4l13 -13a1.5 1.5 0 0 0 -4 -4l-13 13v4" />
                                    <line x1="14.5" y1="5.5" x2="18.5" y2="9.5" />
                                    <polyline points="12 8 7 3 3 7 8 12" />
                                    <line x1="7" y1="8" x2="5.5" y2="9.5" />
                                    <polyline points="16 12 21 17 17 21 12 16" />
                                    <line x1="16" y1="17" x2="14.5" y2="18.5" />
                                </svg>
                                <div class="mx-2"><small>receptionists data</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                <div class="mx-2"><small>admins data</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-vaccine" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M17 3l4 4" />
                                    <path d="M19 5l-4.5 4.5" />
                                    <path d="M11.5 6.5l6 6" />
                                    <path d="M16.5 11.5l-6.5 6.5h-4v-4l6.5 -6.5" />
                                    <path d="M7.5 12.5l1.5 1.5" />
                                    <path d="M10.5 9.5l1.5 1.5" />
                                    <path d="M3 21l3 -3" />
                                </svg>
                                <div class="mx-2"><small>medical specialities data</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-activity" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M3 12h4l3 8l4 -16l3 8h4" />
                                </svg>
                                <div class="mx-2"><small>system diagnoses data</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-medical-cross" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M13 3a1 1 0 0 1 1 1v4.535l3.928 -2.267a1 1 0 0 1 1.366 .366l1 1.732a1 1 0 0 1 -.366 1.366l-3.927 2.268l3.927 2.269a1 1 0 0 1 .366 1.366l-1 1.732a1 1 0 0 1 -1.366 .366l-3.928 -2.269v4.536a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-4.536l-3.928 2.268a1 1 0 0 1 -1.366 -.366l-1 -1.732a1 1 0 0 1 .366 -1.366l3.927 -2.268l-3.927 -2.268a1 1 0 0 1 -.366 -1.366l1 -1.732a1 1 0 0 1 1.366 -.366l3.928 2.267v-4.535a1 1 0 0 1 1 -1h2z" />
                                </svg>
                                <div class="mx-2"><small>system medicines data</small></div>
                            </a>
                        </li>
                    </ul>
                </a>
            </li>
            <li>
                <a href="#export_data" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-export" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <ellipse cx="12" cy="6" rx="8" ry="3" />
                        <path d="M4 6v6c0 1.657 3.582 3 8 3a19.84 19.84 0 0 0 3.302 -.267m4.698 -2.733v-6" />
                        <path d="M4 12v6c0 1.599 3.335 2.905 7.538 2.995m8.462 -6.995v-2m-6 7h7m-3 -3l3 3l-3 3" />
                    </svg>
                    <small>export data</small>
                </a>
                    <ul class="collapse list-unstyled" id="export_data">
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart-broken" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    <path d="M12 7l-2 4l4 3l-2 4v3" />
                                </svg>
                                <div class="mx-2"><small>patients data</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-medical" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                    <rect x="9" y="3" width="6" height="4" rx="2" />
                                    <line x1="10" y1="14" x2="14" y2="14" />
                                    <line x1="12" y1="12" x2="12" y2="16" />
                                </svg>
                                <div class="mx-2"><small>doctors data</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tools" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M3 21h4l13 -13a1.5 1.5 0 0 0 -4 -4l-13 13v4" />
                                    <line x1="14.5" y1="5.5" x2="18.5" y2="9.5" />
                                    <polyline points="12 8 7 3 3 7 8 12" />
                                    <line x1="7" y1="8" x2="5.5" y2="9.5" />
                                    <polyline points="16 12 21 17 17 21 12 16" />
                                    <line x1="16" y1="17" x2="14.5" y2="18.5" />
                                </svg>
                                <div class="mx-2"><small>receptionists data</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                <div class="mx-2"><small>admins data</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-vaccine" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M17 3l4 4" />
                                    <path d="M19 5l-4.5 4.5" />
                                    <path d="M11.5 6.5l6 6" />
                                    <path d="M16.5 11.5l-6.5 6.5h-4v-4l6.5 -6.5" />
                                    <path d="M7.5 12.5l1.5 1.5" />
                                    <path d="M10.5 9.5l1.5 1.5" />
                                    <path d="M3 21l3 -3" />
                                </svg>
                                <div class="mx-2"><small>medical specialities data</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-activity" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M3 12h4l3 8l4 -16l3 8h4" />
                                </svg>
                                <div class="mx-2"><small>system diagnoses data</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-medical-cross" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M13 3a1 1 0 0 1 1 1v4.535l3.928 -2.267a1 1 0 0 1 1.366 .366l1 1.732a1 1 0 0 1 -.366 1.366l-3.927 2.268l3.927 2.269a1 1 0 0 1 .366 1.366l-1 1.732a1 1 0 0 1 -1.366 .366l-3.928 -2.269v4.536a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-4.536l-3.928 2.268a1 1 0 0 1 -1.366 -.366l-1 -1.732a1 1 0 0 1 .366 -1.366l3.927 -2.268l-3.927 -2.268a1 1 0 0 1 -.366 -1.366l1 -1.732a1 1 0 0 1 1.366 -.366l3.928 2.267v-4.535a1 1 0 0 1 1 -1h2z" />
                                </svg>
                                <div class="mx-2"><small>system medicines data</small></div>
                            </a>
                        </li>
                    </ul>
                </a>
            </li>