        <li>
            <a href="#doctor_actions" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-dark"><small>{{ __('lang.dashboard.actions')}}</small></a>
                <ul class="collapse list-unstyled" id="doctor_actions">
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
                </ul>
            </a>
        </li>   