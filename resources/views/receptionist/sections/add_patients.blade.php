<div class="container">

    @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <strong> {{ $message }}</strong>
          <div class="mx-2 d-flex">
            <a href="{{route('receptionist.start.visit.immediately', ['patient_id'=> Session::get('patient_id')])}}" class="btn btn-success mx-1">start visit now with a specialist</a>
            <a href="{{route('receptionist.reserve.visit', ['patient_id'=> Session::get('patient_id')])}}" class="btn btn-primary">reserve for a visit with a specialist</a>
          </div>
        </div>
        @php 
            Illuminate\Support\Facades\Session::forget('patient_id');  
        @endphp
    @endif
    
    {!! Session::forget('success') !!}

    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class=""><h2>{{ __('lang.rec.add_patient')}}</h2></div>
    <form method="POST" action="{{route('receptionist.store.patient')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">{{ __('lang.rec.table.name')}}</label>
            <input type="name" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="{{ __('lang.rec.table.name')}}">
        </div>

        <div class="form-group">
            <label for="phone">{{ __('lang.rec.table.phone')}}</label>
            <input type="phone" name="phone" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="{{ __('lang.rec.table.phone')}}">
        </div>

        <div class="form-group">
            <label for="another_phone">another phone number</label>
            <input type="phone" name="another_phone" class="form-control" id="another_phone" aria-describedby="emailHelp" placeholder="Another Phone">
        </div>

        <div class="form-group">
            <label for="phone">{{ __('lang.rec.table.age')}}</label>
            <input type="number" name="age" class="form-control" id="number" aria-describedby="emailHelp" placeholder="{{ __('lang.rec.table.age')}}">
        </div>
        <div class="form-group">
            <label for="birth_date">{{ __('lang.rec.table.birth_date')}}</label>
            <input type="date" name="birthdate" class="form-control" id="birth_date" placeholder="{{ __('lang.rec.table.birth_date')}}">
        </div>

        @if(count($receptionistProfiles) > 0)
            <div class="form-group">
                <label for="receptionist_profile_id">Associated Receptionist</label>
                <select id="receptionist_profile_id" name="receptionist_profile_id" class="form-control">
                    @foreach($receptionistProfiles as $receptionistProfile)
                        <option value="{{$receptionistProfile->id}}">{{ $receptionistProfile->user->name }}</option>
                    @endforeach
                </select>
            </div>
        @else
            <h2 class="">sorry, no receptionist</h2>
        @endif

        <div class="form-group">
            <label for="attendance_date">Attendance Date</label>
            <input type="date" name="attendance_date" class="form-control" id="attendance_date" placeholder="Attendance Date">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" checked>
            <label class="form-check-label" for="exampleRadios1">
            {{ __('lang.rec.table.male')}}
            </label>
        </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
            <label class="form-check-label" for="exampleRadios2">
            {{ __('lang.rec.table.female')}}
            </label>
        </div>

        <div class="my-2"><h4>{{ __('lang.rec.add_patient_card')}}</h4></div>
        <div class="my-2">
            <input type="file" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary mt-2">{{ __('lang.submit')}}</button>
    </form>
</div>