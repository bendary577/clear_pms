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
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                <div class="mx-2"><small>{{ __('lang.rec.manage.patients') }}</small></div>
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
                                <div class="mx-2"><small>{{ __('lang.rec.available.patients') }}</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('receptionist.add.patient')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 11h6m-3 -3v6" />
                                </svg>
                                <div class="mx-2"><small>{{ __('lang.rec.add.patient') }}</small></div>
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
                                <div class="mx-2"><small>{{ __('lang.rec.available.doctors') }}</small></div>
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
                                <div class="mx-2"><small>{{ __('lang.rec.available.patients') }}</small></div>
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
                    <small>{{ __('lang.rec.system.medicines') }}</small>
                </a>
                    <ul class="collapse list-unstyled" id="system_medicines">
                        <li>
                            <a href="{{route('receptionist.medicines.list')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="9" y1="6" x2="20" y2="6" />
                                    <line x1="9" y1="12" x2="20" y2="12" />
                                    <line x1="9" y1="18" x2="20" y2="18" />
                                    <line x1="5" y1="6" x2="5" y2="6.01" />
                                    <line x1="5" y1="12" x2="5" y2="12.01" />
                                    <line x1="5" y1="18" x2="5" y2="18.01" />
                                </svg>
                                <div class="mx-2"><small>{{ __('lang.rec.available.medicines') }}</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('receptionist.add.medicine')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    <line x1="12" y1="11" x2="12" y2="17" />
                                    <line x1="9" y1="14" x2="15" y2="14" />
                                </svg>
                                <div class="mx-2"><small>{{ __('lang.rec.add.medicine') }}</small></div>
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
                    <small>{{ __('lang.rec.system.diagnoses') }}</small>
                </a>
                    <ul class="collapse list-unstyled" id="system_diagnoses">
                        <li>
                            <a href="{{route('receptionist.system.diagnoses.list')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="9" y1="6" x2="20" y2="6" />
                                    <line x1="9" y1="12" x2="20" y2="12" />
                                    <line x1="9" y1="18" x2="20" y2="18" />
                                    <line x1="5" y1="6" x2="5" y2="6.01" />
                                    <line x1="5" y1="12" x2="5" y2="12.01" />
                                    <line x1="5" y1="18" x2="5" y2="18.01" />
                                </svg>
                                <div class="mx-2"><small>{{ __('lang.rec.available.diagnoses') }}</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('receptionist.add.diagnose')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    <line x1="12" y1="11" x2="12" y2="17" />
                                    <line x1="9" y1="14" x2="15" y2="14" />
                                </svg>
                                <div class="mx-2"><small>{{ __('lang.rec.add.diagnose') }}</small></div>
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
                    <small>{{ __('lang.rec.import_data') }}</small>
                </a>
                    <ul class="collapse list-unstyled" id="import_data">
                        <li>
                            <a href="{{route('receptionist.import.excel.view')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart-broken" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    <path d="M12 7l-2 4l4 3l-2 4v3" />
                                </svg>
                                <div class="mx-2"><small>{{ __('lang.rec.import_data') }}</small></div>
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
                    <small>{{ __('lang.rec.export_data') }}</small>
                </a>
                    <ul class="collapse list-unstyled" id="export_data">
                        <li>
                            <a href="{{route('receptionist.export.excel')}}" class="text-dark d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart-broken" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    <path d="M12 7l-2 4l4 3l-2 4v3" />
                                </svg>
                                <div class="mx-2"><small>{{ __('lang.rec.export_data') }}</small></div>
                            </a>
                        </li>
                    </ul>
                </a>
            </li>