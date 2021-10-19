<form method="POST" action="{{route('receptionist.patient.upload.files', ['id' => $patient->id ])}}" accept-charset="utf-8" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="my-2">
        <input type="file" id="patient_file" placeholder="Choose files"  name="patient_files[]" accept="image/*" multiple required>
    </div>
    @if(count($medical_specialities) > 0)
        <div class="form-group">
            <label for="inputState">Medical Speciality</label>
            <select id="inputState" class="form-control" name="department">
            @foreach($medical_specialities as $medical_speciality)
                <option value="{{$medical_speciality->id}}">{{ $medical_speciality->name }}</option>
            @endforeach
            </select>
        </div>
    @else
        <h5 class="text-danger">sorry, no medical specialities are registered in the system</h5>
    @endif
    <button type="submit" class="btn btn-primary mt-2">upload files</button>
<form>