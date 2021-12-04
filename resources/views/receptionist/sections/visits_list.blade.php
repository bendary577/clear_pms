<div class="container">
    <!--- if patient is added is added successfully ----------->
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <!--- if patient is not added successfully ----------->
        @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    @endif

    @if(count($appointments) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">{{ __('lang.rec.patients.visit.date') }}</th>
                    <th scope="col">{{ __('lang.rec.patients.visit.from') }}</th>
                    <th scope="col">{{ __('lang.rec.patients.visit.to') }}</th>
                    <th scope="col">{{ __('lang.rec.patients.visit.patient') }}</th>
                    <th scope="col">{{ __('lang.rec.patients.visit.action') }}</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <th>{{$appointment->date}}</th>
                            <td>{{ date("g:i a", strtotime($appointment->from)) }}</td>
                            <td>{{date("g:i a", strtotime($appointment->to)) }}</td>
                            <td>{{$appointment->patient->name}}</td>
                            <td>
                                <a href="{{route('receptionist.start.visit', ['patient_id' => $appointment->patient->id, 'appointment_id' => $appointment->id ])}}" class="btn btn-success ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                        <line x1="10" y1="14" x2="20" y2="4" />
                                        <polyline points="15 4 20 4 20 9" />
                                    </svg>
                                    <span>{{ __('lang.rec.patients.visit.start') }}</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center align-items-center">
            <div>{!! $appointments->links() !!}</div>
        </div>
    @else
        <h3 class="text-danger">{{ __('lang.rec.patients.no.visits') }}</h3>
    @endif
</div>