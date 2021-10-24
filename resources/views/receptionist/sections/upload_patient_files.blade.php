<form class="border p-3 " method="POST" action="{{route('receptionist.patient.upload.files', ['id' => $patient->id ])}}" accept-charset="utf-8" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h3 for="">{{ __('lang.rec.upload_patient_files')}}</h3>
    <div class="my-2">
        <input type="file" id="patient_file" placeholder="Choose files"  name="patient_files[]" accept="image/*" multiple >
    </div>
    @if(count($medical_specialities) > 0)
        <div class="form-group">
            <label for="inputState">{{ __('lang.dashboard.medical_specialities')}}</label>
            <select id="inputState" class="form-control" name="department">
            @foreach($medical_specialities as $medical_speciality)
                <option value="{{$medical_speciality->id}}">{{$medical_speciality->name}}</option>
            @endforeach
            </select>
        </div>
    @else
        <h5 class="text-danger">{{ __('lang.admin.no_medical_specialities')}} </h5>
    @endif
    <button type="submit" name="patient_files" value="patient_files" class="btn btn-primary mt-2">{{ __('lang.rec.upload_files')}}</button>
<form>