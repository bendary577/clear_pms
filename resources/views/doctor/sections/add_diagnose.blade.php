@if($medical_specialities && count($medical_specialities) > 0)

<div class="my-2 border rounded p-3">
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

        <!----------------------------- medicines -------------------------------------->
        <div class="medicines" id="medicines">
            <div class="d-flex my-2">
                <h3 class="text-primary">Required medicines</h3>
                <a href="javascript:void(0);" id="add_medicine" class="ml-2 btn btn-info">add medicine</a>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="medicine">medicine</label>
                    <input type="text" name="medicine" class="form-control" id="medicine" placeholder="medicine">
                </div>
                <div class="form-group col-md-4">
                    <label for="dose">dose</label>
                    <input type="text" name="dose" class="form-control" id="dose" placeholder="dose">
                </div>
                <div class="form-group col-md-2">
                    <label for="duration">duration</label>
                    <input type="text" name="duration" class="form-control" id="duration" placeholder="duration">
                </div>
            </div>
        </div>

        <div class="">
            <button type="submit" class="btn btn-primary btn-block mt-2">{{__('lang.submit')}}</button>
        </div>

    </form>
</div>
@else
<div class="text-danger">{{__('lang.admin.no_medical_specialities')}}</div>
@endif

<script>
    $(document).ready(function(){
        //adding more medicine to the perscreption
        $('#add_medicine').click(function() {
           console.log("medicines")
        });
    });
</script>