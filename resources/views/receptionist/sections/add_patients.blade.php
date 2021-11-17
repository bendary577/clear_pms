<div class="container">

    <!--- if patient is added is added successfully ----------->

    @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <strong> {{ $message }}</strong>
        </div>
    @endif
    
    {!! Session::forget('success') !!}

    <!--- if patient is not added successfully ----------->
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

        <div class="form-group my-3">
            <label for="name">{{__('lang.rec.diagnose_name')}}</label>
            <select class="form-control" id="diagnose" name="diagnose">
                <option selected>Select Diagnose</option>
                @foreach($system_diagnoses as $diagnose)    
                    <option value="{{ $diagnose->name }}">{{ $diagnose->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group my-3">
            <label for="medication">{{__('lang.doctor.medicine')}}</label>
            <select id="medication" name="medication" class="form-control">
                <option selected>Select Medicine</option>
                @foreach($system_medicines as $system_medicine)
                    <option value="{{$system_medicine->id}}">{{ $system_medicine->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="my-2"><h4>{{ __('lang.rec.add_patient_card')}}</h4></div>
        <div class="my-2">
            <input type="file" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">{{ __('lang.submit')}}</button>
    </form>
</div>