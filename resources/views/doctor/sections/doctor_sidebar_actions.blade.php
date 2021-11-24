<!------------------------------------------------------- clinic -------------------------------------->
<li>
    <a href="#clinic" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-hospital" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <line x1="3" y1="21" x2="21" y2="21" />
            <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" />
            <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
            <line x1="10" y1="9" x2="14" y2="9" />
            <line x1="12" y1="7" x2="12" y2="11" />
        </svg>
        <small>{{ __('lang.dashboard.clinic')}}</small>
    </a>
        <ul class="collapse list-unstyled" id="clinic">
            @if(isset(Auth::user()->profile->clinic))
                <li>
                    <a href="{{route('doctor.clinic')}}" class="text-dark">{{ __('lang.dashboard.clinic')}}</a>
                </li>
            @else
                <li>
                    <p class="text-danger" >{{ __('lang.dashboard.no_clinic')}}</p>
                </li>
            @endif

        </ul>
    </a>
</li>   

<!----------------------------------------------------- file history ---------------------------------------->

<li>
    <a href="#file_history" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-invoice" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
            <line x1="9" y1="7" x2="10" y2="7" />
            <line x1="9" y1="13" x2="15" y2="13" />
            <line x1="13" y1="17" x2="15" y2="17" />
        </svg>
        <small>{{ __('lang.dashboard.file_history')}}</small>
    </a>
        <ul class="collapse list-unstyled" id="file_history">
            <li>
                <a href="{{route('doctor.clinic')}}" class="text-dark">{{ __('lang.dashboard.file_history')}}</a>
            </li>
        </ul>
    </a>
</li>  
