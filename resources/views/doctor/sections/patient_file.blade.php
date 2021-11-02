<div class="container">

    <div class="go_back mb-4">
        <a href="{{ url()->previous() }}" style="text-decoration:inherit">
            <h4 class="text-primary">{{ __('lang.go_back')}}</h4>
        </a>
    </div>

    @if($patient)

        <div class="title my-4 d-flex justify-content-between">
            <h2>{{ __('lang.rec.file_title' , ['name' => $patient->name])}}</h2>
            <!-- <a href="" class="btn btn-primary">{{ __('lang.doctor.print_pdf')}}</a> -->
            <a class="btn btn-danger" href="{{route('doctor.end.visit', ['appointment_id' => $appointment->id])}}">{{ __('lang.doctor.end_visit')}}</a>
        </div>

        <!------------------------------------- add new diagnose --------------------------->
        <div>
            <a href="javascript:void(0);" id="add_diagnose" class="ml-2 btn btn-success">{{ __('lang.doctor.add_diagnose')}}</a>
        </div>
        <div id="add_diagnose_div" class="col-md-12 my-4">
                    <!--- if diagnose is added successfully ----------->
                    @if (Session::has('success'))
                        <div class="alert alert-success my-2">{{ Session::get('success') }}</div>
                    @endif

                    <!--- if diagnose is not added successfully ----------->
                    @if($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
            </div>
            <script>
                $(document).ready(function(){
                    //opening and closing diagnosing area
                    $('#add_diagnose').click(function() {
                        let div = document.getElementById("add_diagnose_div");
                        let btn = document.getElementById("add_diagnose");
                        console.log(btn)
                        if(div.childElementCount > 0){
                            console.log("closing")
                            $("#add_diagnose_div").empty();
                            btn.innerHTML = "add new diagnose";
                            btn.setAttribute("class", "btn btn-success");
                        }else{
                            console.log("opening")
                            btn.innerHTML = "close current diagnosing";
                            btn.setAttribute("class", "btn btn-warning");
                            let add_diagnose_form = {!! json_encode($add_diagnose_form, JSON_HEX_TAG) !!};
                            if(div.childElementCount === 0){
                                $('#add_diagnose_div').append(add_diagnose_form); 
                            }
                        }
                    });
                });
            </script>
            
        <div class="row">
            <div class="personal_info col-md-6 my-4">
                <div class="card" style="height:340px;">
                    <div class="card-header">
                        <div class="clearfix">
                        <h5 class="card-title">{{ __('lang.doctor.personal_info') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                    <p class="card-text">{{ $patient->name }}</p>
                        <p class="card-text">{{ $patient->phone }}</p>
                        <p class="card-text">{{ $patient->gender }}</p>
                        <p class="card-text">{{ __('lang.rec.birthdate_at' , [ 'date' => $patient->birthdate])}}</p>
                        <p class="card-text">{{ __('lang.rec.registered_at' , [ 'date' => $patient->attendance_date])}}</p>
                        <p class="card-text">{{ __('lang.rec.age', ['age' => $patient->age])}}</p>
                    </div>
                </div>
            </div>
            <div class="personal_info col-md-6 my-4">
                <div class="card" style="height:340px;">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('lang.doctor.clinic_info')}}</h5>
                    </div>
                    <div class="card-body">
                        <!--
                        <p class="card-text">Clinic Name</p>
                        <p class="card-text">Doctor Name</p>
                        <p class="card-text">Diagnoses info</p>
                        -->
                        <h5 class="card-title">{{ __('lang.rec.no_clinic')}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="personal_info col-md-6">
                <div class="card" style="height:340px;">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('lang.rec.patient_card')}}</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="" style="height:85%;">
                            <img  style="width:100%;height:100%" src="{{url($patient->card_image_path)}}" alt="Card image">
                        </div>
                        <a href="{{route('receptionist.patient.download.card', ['id' => $patient->id])}}" class="btn btn-info mt-2">download</a>
                    </div>
                </div>
            </div>
            <div class="personal_info col-md-6">
                <div class="card" style="height:340px;">
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
                            <h4 class="text-success">{{ __('lang.rec.no_patient_sheet')}}</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        


        <!-------------------------- diagnoses ----------------------------------->
        <div class="row">
            @if(count($diagnoses) >0)
                <div class="title my-5"><h3>{{ __('lang.rec.diagnoses')}}</h3></div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('lang.rec.diagnose_name')}}</th>
                            <th scope="col">{{ __('lang.rec.diagnose_description')}}</th>
                            <th scope="col">{{ __('lang.doctor.treatment_protocol')}}</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diagnoses as $diagnose)
                            @foreach($diagnose->patients as $patient)
                                <tr>
                                    <th scope="row">{{ $diagnose->name }}</th>
                                    <td>{{ $patient->pivot->description }}</td>
                                    <td>{{ $patient->pivot->treatment_protocol }}</td>
                                    <td><a href="{{route('doctor.appointment.check.perscreption', ['appointment_id' => $appointment->id ])}}" class="btn btn-success">{{ __('lang.rec.check_perscreption')}}</a></td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="d-flex col-md-12">
                <div>
                    <h4 class="text-success" style="text-transform:capitalize">{{ __('lang.rec.no_diagnose')}}</h4>
                </div>
            </div>
            @endif
        </div>
    @else
        <h3 class="text-danger">{{ __('lang.rec.no_patient')}}</h3>
    @endif
</div>

