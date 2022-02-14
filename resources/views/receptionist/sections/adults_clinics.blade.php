<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('receptionist.patients.adults.search')}}">
            {{ csrf_field() }}
                <div class="input-group rounded">
                    <input type="text" class="form-control rounded" placeholder="{{__('lang.rec.search_code_name')}}" aria-label="Search"
                        aria-describedby="search-addon" required name="search_keyword"/>
                    <input class="input-group-text border-0" id="search-addon" type="submit" value="{{ __('lang.rec.search')}}" />
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-4">
    @if(count($patients) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">{{ __('lang.rec.patients.name') }}</th>
                    <th scope="col">{{ __('lang.rec.patients.code') }}</th>
                    <th scope="col">{{ __('lang.rec.patients.age') }}</th>
                    <th scope="col">{{ __('lang.rec.patients.gender') }}</th>
                    <th scope="col">{{ __('lang.rec.patients.phone') }}</th>
                    <th scope="col">{{ __('lang.rec.patients.action') }}</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($patients as $patient)
                        <tr>
                            <th>{{$patient->name}}</th>
                            <td>{{$patient->code}}</td>
                            <td>{{$patient->age}}</td>
                            <td>{{$patient->gender}}</td>
                            <td>{{$patient->phone}}</td>
                            <td class="d-flex">
                                <a href="{{route('receptionist.patients.patient.file', ['id'=>$patient->id])}}" class="d-flex mx-1 btn btn-sm btn-success ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                        <line x1="10" y1="14" x2="20" y2="4" />
                                        <polyline points="15 4 20 4 20 9" />
                                    </svg>
                                    <span>{{ __('lang.rec.patients.check.file') }}</span>
                                </a>
                                <a href="{{route('receptionist.reserve.visit', ['patient_id'=>$patient->id])}}" class="d-flex mx-1 btn btn-sm btn-warning ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                        <line x1="10" y1="14" x2="20" y2="4" />
                                        <polyline points="15 4 20 4 20 9" />
                                    </svg>
                                    <span>{{ __('lang.rec.patients.specialist.visit') }}</span>
                                </a>
                                <a href="{{route('receptionist.patients.new.appointment', ['id'=>$patient->id])}}" class="d-flex mx-1 btn btn-sm btn-info ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                        <line x1="10" y1="14" x2="20" y2="4" />
                                        <polyline points="15 4 20 4 20 9" />
                                    </svg>
                                    <span>{{ __('lang.rec.patients.doctor.visit') }}</span>
                                </a>
                                <a href="{{route('receptionist.delete.patient', ['id'=>$patient->id])}}" class="d-flex mx-1 btn btn-sm btn-danger ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                        <line x1="10" y1="14" x2="20" y2="4" />
                                        <polyline points="15 4 20 4 20 9" />
                                    </svg>
                                    <span>{{ __('lang.rec.patients.delete') }}</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center align-items-center">
            <div>{!! $patients->links() !!}</div>
        </div>
    @else
        <h3 class="text-danger">{{ __('lang.rec.no.patients.available') }}</h3>
    @endif
    </div>
    <div class="row">
        @if($clinics && count($clinics) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">{{ __('lang.rec.table.department')}}</th>
                    <!-- <th scope="col">{{ __('lang.specialization')}}</th> -->
                    <th scope="col">{{ __('lang.rec.table.doctor_name')}}</th>
                    <th scope="col">{{ __('lang.rec.table.available_from')}}</th>
                    <th scope="col">{{ __('lang.rec.table.available_to')}}</th>
                    <th scope="col">{{ __('lang.rec.table_exam_price')}}</th>
                    <th scope="col">{{ __('lang.rec.table_follow_price')}}</th>
                  <!--  <th scope="col">{{ __('lang.rec.table.action')}}</th> -->
                </tr>
            </thead>
            <tbody>
            @foreach ($clinics as $clinic)
                <tr>
                    @if($clinic->department === 'adults')
                    <td>{{ __('lang.doctor.adults') }}</td>
                    @else if($clinic->department === 'children')
                    <td>{{ __('lang.doctor.children') }}</td>
                    @endif
                    <td>{{ $clinic->doctorProfile->user->name }}</td>
                    <td>{{ date("g:i a", strtotime($clinic->available_from)) }}</td>
                    <td>{{ date("g:i a", strtotime($clinic->available_to)) }}</td>
                    <td>{{ __('lang.egyptian_pound', ['price' => $clinic->examination_price ]) }}</td>
                    <td>{{ __('lang.egyptian_pound', ['price' => $clinic->follow_up_price ]) }}</td>
                    <!-- <td><button class="btn btn-info">{{ __('lang.rec.new_appointment')}}</button></td> -->
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center align-items-center">
            {!! $clinics->links() !!}
        </div>
    @else
        <h3 class="text-danger mt-4">{{ __('lang.rec.no_clinics')}}</h3>
    @endif
    </div>
</div>