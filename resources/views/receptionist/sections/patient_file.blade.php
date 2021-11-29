<div class="container">

    <!--- if patient files are added is added successfully ----------->
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <!--- if patient files are not added successfully ----------->
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if($patient)
        <div class="title my-4">
            <h2>{{ __('lang.rec.file_title' , ['name' => $patient->name])}}</h2>
            <!-- <a href="" class="btn btn-primary">{{ __('lang.doctor.print_pdf')}}</a> -->
        </div>

        <!----------------------------------------------- personal info -------------------------->
        <div class="row">
            <div class="personal_info col-md-6 my-4">
                <div class="card" style="height:450px;">
                    <div class="card-header">
                        <div class="clearfix">
                            <h5 class="card-title float-left">{{ __('lang.doctor.personal_info') }}</h5>
                            <a href="{{route('receptionist.edit.patient', ['id' => $patient->id ])}}" class="text-primary float-right">{{ __('lang.acc.edit_profile')}}</a>
                        </div>
                        <p><small>list of all patient's personal info </small></p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $patient->name }}</p>
                        <p class="card-text">{{ $patient->receptionistProfile->user->name }}</p>
                        @if($patient->phone)
                            <p class="card-text">{{ $patient->phone }}</p>
                        @endif
                        <p class="card-text">{{ $patient->gender }}</p>
                        <p class="card-text">{{ __('lang.rec.birthdate_at' , [ 'date' => $patient->birthdate])}}</p>
                        <p class="card-text">{{ __('lang.rec.registered_at' , [ 'date' => $patient->attendance_date])}}</p>
                        <p class="card-text">{{ __('lang.rec.age', ['age' => $patient->age])}}</p>
                    </div>
                </div>
            </div>

        <!----------------------------------------------- past visits info -------------------------->
            <div class="past_visits_info col-md-6 my-4">
                <div class="card" style="height:450px;">
                    <div class="card-header">
                        <h5 class="">{{ __('lang.doctor.clinic_info')}}</h5>
                        <p><small>list of doctors that patient has visited</small></p>
                    </div>  
                    <div class="card-body" style="overflow-y: scroll;">
                            @if(count($doctor_visits) > 0)
                            @foreach($doctor_visits as $appointment)
                                <p>{{ $appointment->visit->clinic->doctorProfile->user->name }}</p>
                                @if($appointment->visit->clinic->doctorProfile->medicalSpeciality)
                                    <p>{{ $appointment->visit->clinic->doctorProfile->medicalSpeciality->name }}</p>
                                @else
                                    <p>no medical speciality</p>
                                @endif
                            @endforeach
                        @else
                            <h3 class="text-danger">{{ __('lang.rec.no_clinic')}}</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!---------------------------------------------- patient card ------------------------->
        <div class="row my-4">
            <div class="personal_info col-md-6">
                <div class="card" style="height:500px;">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('lang.rec.patient_card')}}</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="" style="height:85%;">
                            <img  style="width:100%;height:100%" src="{{url($patient->card_image_path)}}" alt="Card image">
                        </div>
                        <a href="{{route('receptionist.patient.download.card', ['id' => $patient->id])}}" class="btn btn-info mt-2">{{__('lang.download')}}</a>
                    </div>
                </div>
            </div>

            <!---------------------------------------------- patient sheet ------------------------->
            <div class="personal_info col-md-6">
                <div class="card" style="height:500px;">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('lang.rec.patient_sheet')}}</h5>
                    </div>
                    @if($patient->sheet_image_path)
                        <div class="card-body text-center">
                            <div class="" style="height:85%;">
                                <img  style="width:100%;height:100%" src="{{url($patient->sheet_image_path)}}" alt="Card image">
                            </div>
                            <a href="{{ route('receptionist.patient.download.sheet', ['id' => $patient->id ]) }}" class="btn btn-info mt-2">download</a>
                        </div>
                    @else
                        <div class="card-body">
                            <h4 class="text-danger">{{ __('lang.rec.no_patient_sheet')}}</h4>
                            <form method="POST" action="{{route('receptionist.patient.upload.files', ['id' => $patient->id ]) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="my-2">
                                    <input type="file" id="sheet_image" name="sheet_image" accept="image/*" >
                                </div>
                                <button type="submit" name="patient_sheet" value="patient_sheet" class="btn btn-primary mt-2">{{ __('lang.upload')}}</button>
                            <form>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!------------------------------------------- patient files -------------------->

        <div class="row">
            <div class="my-2 w-100">
                <div class="title my-4"><h3>{{ __('lang.rec.patient_files')}}</h3></div>
                @if(count($patient->files) > 0)
                    @include('receptionist.sections.patient_files_list')
                    @include('receptionist.sections.upload_patient_files')
                @else
                    <h4 class="text-danger">{{ __('lang.rec.no_attached_files')}}</h4>
                    @include('receptionist.sections.upload_patient_files')
                @endif
            </div>
            <hr> 
        </div> 


        <!------------------------------------------- patient diagnoses -------------------->
        
        <div class="row mt-4">
            <div class="my-4 w-100">
                <h3>{{ __('lang.rec.diagnoses')}}</h3>
                @if(count($diagnoses) > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('lang.rec.diagnose_name')}}</th>
                                <th scope="col">{{ __('lang.rec.diagnose_description')}}</th>
                                <th scope="col">{{ __('lang.doctor.treatment_protocol')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($diagnoses as $diagnose)
                                <tr>
                                    <th>{{ $diagnose->name }}</th>
                                    <td>{{ $diagnose->description }}</td>
                                    <td>{{ $diagnose->treatment_protocol }}</td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h4 class="text-danger mt-2">{{ __('lang.rec.no_diagnose')}}</h4>
                @endif
            </div>
        </div>

        <!---------------------------------- appointments -------------------------------->
        <div class="row">
            <div class="my-4 w-100">
                <div class="title my-4"><h3>{{ __('lang.rec.appointment_list')}}</h3></div>
                @if(count($patient->appointments) > 0)
                    <h4 class="my-2">patient has <strong class="text-success">{{ count($patient->appointments) }}</strong> appointments </h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">visit type</th>
                                <th scope="col">visit owner</th>
                                <th scope="col">{{ __('lang.rec.appointment_date')}}</th>
                                <th scope="col">{{ __('lang.rec.appointment_from')}}</th>
                                <th scope="col">{{ __('lang.rec.appointment_to')}}</th>
                                <th scope="col">{{ __('lang.rec.appointment_reason')}}</th>
                                <th scope="col">{{ __('lang.appointment.leaved_at')}}</th>
                                <th scope="col">{{ __('lang.rec.table.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patient->appointments as $appointment)
                                    <tr>
                                        @if($appointment->getHasReceptionistVisitAttribute())
                                            <td>receptionist visit</td>
                                            <td>{{$appointment->visit->receptionist->user->name}}</td>
                                        @elseif($appointment->getHasDoctorVisitAttribute())
                                            <td>doctor visit</td>
                                            <td>{{$appointment->visit->clinic->doctorProfile->user->name}}</td>
                                        @endif
                                        <th scope="row">{{$appointment->date}}</th>
                                        <td>{{ date("g:i a", strtotime($appointment->from))}}</td>
                                        <td>{{ date("g:i a", strtotime($appointment->to))}}</td>
                                        @if($appointment->getHasDoctorVisitAttribute())
                                            <td>{{$appointment->visit->reason}}</td>
                                        @else
                                            <td>--</td>
                                        @endif
                                        @if($appointment->leaved_at == null)
                                            <td><h6 class="text-danger">{{ __('lang.rec.still_pending')}}</h6></td>
                                            @if($appointment->getHasReceptionistVisitAttribute())
                                                @if($appointment->visit->receptionist->id == Auth::user()->profile->id)
                                                    <td><a href="{{route('receptionist.start.visit', ['patient_id' => $patient->id, 'appointment_id'=> $appointment->id])}}" class="btn btn-warning">start visit</h6></td>
                                                @else
                                                <td><h6 class="text-danger">{{ __('lang.rec.no_action')}}</h6></td>
                                                @endif
                                            @else
                                                <td><h6 class="text-danger">{{ __('lang.rec.no_action')}}</h6></td>
                                            @endif
                                        @else
                                            <td>{{ date("g:i a", strtotime($appointment->leaved_at)) }}</td>
                                            <td><a href="{{route('receptionist.appointment.check.perscreption', ['appointment_id' => $appointment->id ])}}" class="btn btn-success">{{ __('lang.rec.check_perscreption')}}</a></td>
                                        @endif
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h4 class="text-danger">{{ __('lang.rec.no_appointment')}}</h4>
                @endif
            </div>
        </div>

    @endif
</div>