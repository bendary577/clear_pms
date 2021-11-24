<!----------------------------------------------------------------- registration requests -------------------------------------------->
<li>
    <a href="#registration_requests" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mailbox" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M10 21v-6.5a3.5 3.5 0 0 0 -7 0v6.5h18v-6a4 4 0 0 0 -4 -4h-10.5" />
            <path d="M12 11v-8h4l2 2l-2 2h-4" />
            <path d="M6 15h1" />
            </svg>
        <small>{{ __('lang.dashboard.registration_requests')}}</small>
    </a>
    <ul class="collapse list-unstyled" id="registration_requests">
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
    </ul>
    </a>
</li>

<!----------------------------------------------------------------- receptionists -------------------------------------------->
<li>
    <a href="#receptionists" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-man" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <circle cx="12" cy="5" r="2" />
            <path d="M10 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5" />
        </svg>
        <small>{{ __('lang.dashboard.receptionists')}}</small>
    </a>
    <ul class="collapse list-unstyled" id="receptionists">
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
    </ul>
    </a>
</li>

<!----------------------------------------------------------------- doctors -------------------------------------------->
<li>
    <a href="#doctors" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="9" cy="7" r="4" />
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                </svg>
        <small>{{ __('lang.dashboard.doctors')}}</small>
    </a>
    <ul class="collapse list-unstyled" id="doctors">
        <li>
            <a href="{{route('admin.receptionists')}}" class="text-dark d-flex">
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
    </ul>
    </a>
</li>

<!----------------------------------------------------------------- medical specialites -------------------------------------------->
<li>
    <a href="#medical_specialities" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">
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
        <small>{{ __('lang.dashboard.medical_specialities')}}</small>
    </a>
    <ul class="collapse list-unstyled" id="medical_specialities">
        <li>
            <a href="{{route('admin.receptionists')}}" class="text-dark d-flex">
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
                <div class="mx-2">{{ __('lang.dashboard.medical_specialities')}}</div>
            </a>
        </li>
    </ul>
    </a>
</li>