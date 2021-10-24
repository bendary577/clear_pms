@if($medical_specialities && count($medical_specialities) > 0)

<div class="my-2">
    <h4 class="text-primary">{{__('lang.doctor.add_diagnose')}}</h4>
    <form method="POST" action="{{route('doctor.add.diagnose', ['patient_id' => $patient->id])}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">{{__('lang.rec.diagnose_name')}}</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="{{__('lang.rec.diagnose_name')}}">
        </div>
        <div class="form-group">
            <label for="name">{{__('lang.rec.diagnose_description')}}</label>
            <input type="text" name="description" class="form-control" id="description" placeholder="{{__('lang.rec.diagnose_description')}}">
        </div>
        <div class="form-group">
            <label for="name">{{__('lang.doctor.treatment_protocol')}}</label>
            <input type="text" name="protocol" class="form-control" id="protocol" placeholder="{{__('lang.doctor.treatment_protocol')}}">
        </div>
        <div class="form-group">
            <label for="inputState">{{__('lang.dashboard.medical_specialities')}}</label>
            <select id="inputState" name="specialization" class="form-control">
                <option selected>Select</option>
                @foreach($medical_specialities as $medical_speciality)
                <option value="{{$medical_speciality->id}}">{{ $medical_speciality->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">{{__('lang.submit')}}</button>
    </form>
</div>
@else
<div class="text-danger">{{__('lang.admin.no_medical_specialities')}}</div>
@endif