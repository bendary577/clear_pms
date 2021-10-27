<div class="container">

    <!--- if any errors when deleting a receptionist profile ----------->
    @if (Session::has('success'))
        <div class="alert alert-danger">{{ Session::get('success') }}</div>
    @endif

    <!--- if any errors when deleting a receptionist profile ----------->
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif

    @if($clinic)
        <div class="my-5 title">
        <div class="d-flex ">
            <h2>{{ __('lang.doctor.clinic_title', ['name' => Auth::user()->name])}}</h2>
            <a href="{{route('doctor.delete.clinic_hours')}}" class="btn btn-danger ml-2">{{__('lang.doctor.delete_clinic')}}</a>
        </div>
    @if(isset(Auth::user()->profile->medicalSpeciality))
        <p class="mt-2">{{ Auth::user()->profile->medicalSpeciality->name }}</p>
    @else
        <p class="mt-2">{{__('lang.doctor.no_medical_speciality')}}</p>
    @endif

    <p class="mt-2">{{ Auth::user()->profile->clinic->department}} department</p>
    </div>

    <!------------------------------- clinic working hours ------------------>
    <div class="row">
        <h3>{{__('lang.doctor.working_hours')}}</h3>
        <table class="table table-hover w-100">
            <thead>
                <tr>
                    <th scope="col">{{__('lang.doctor.table.from')}}</th>
                    <th scope="col">{{__('lang.doctor.table.to')}}</th>
                    <th scope="col">{{__('lang.doctor.table.action')}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ date("g:i a", strtotime($clinic->available_from)) }}</td>
                    <td>{{ date("g:i a", strtotime($clinic->available_to)) }}</td>
                    <td><a href="{{route('doctor.edit.clinic_hours')}}" class="btn btn-info">{{__('lang.doctor.edit_working_hours')}}</a>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!---------------------------------- appointments -------------------------------->
    <div class="row">
        <div class="my-4 w-100">
            <div class="title my-4"><h3>{{ __('lang.doctor.appointment_list')}}</h3></div>
            @if(count($clinic->appointments)>0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{__('lang.doctor.table.name')}}</th>
                            <th>{{__('lang.doctor.table.date')}}</th>
                            <th>{{__('lang.doctor.table.hour')}}</th>
                            <th>{{__('lang.doctor.table.appointment_reason')}}</th>
                            <th>{{__('lang.doctor.table.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clinic->appointments as $appointment)
                            <tr>
                                <th>{{ $appointment->patient->name }}</th>
                                <td>{{ $appointment->date }}</td>
                                <td>{{ date("g:i a", strtotime($appointment->from ))  }}</td>
                                <td>{{ $appointment->reason}}</td>
                                <td><a href="{{route('doctor.clinic.patient_file', ['id' => $appointment->id ])}}" class="btn btn-success">start visit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4 class="text-success">{{__('lang.doctor.no_appointments')}}</h4>
            @endif
        </div>
    </div>

    @endif
</div>