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


    @if(count($patients) > 0)
        <div class="">
            <a href="javascript:void(0);" class="btn btn-sm btn-danger mb-4" id="delete_records_btn" data-toggle="modal" data-target="#delete_records_modal">{{ __('lang.rec.patients.delete.all') }}</a>
        </div>

        <div class="modal fade" id="delete_records_modal"  tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('lang.rec.patients.delete.paitients.warning') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('lang.rec.patients.sure.to.delete.all') }}</p>
                    </div>
                    <div class="modal-footer">
                        <a type="button" href="{{route('receptionist.delete.all.patient')}}" type="button" class="btn btn-primary">{{ __('lang.rec.patients.delete.paitients.agree') }}</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('lang.rec.patients.delete.paitients.cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>

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

<!--
<script>
    $(document).ready(function(){
        $("#delete_records_btn").click(function(){
            alert("The paragraph was clicked.");
        });
    });
</script>
-->