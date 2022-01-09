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
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="{{ __('lang.rec.table.name')}}">
        </div>

        <div class="form-group">
            <label for="phone">{{ __('lang.rec.table.phone')}}</label>
            <input type="phone" name="phone" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="{{ __('lang.rec.table.phone')}}">
        </div>

        <div class="form-group">
            <label for="another_phone">{{ __('lang.rec.patients.another_phone')}}</label>
            <input type="phone" name="another_phone" class="form-control" id="another_phone" aria-describedby="emailHelp" placeholder="{{ __('lang.rec.patients.another_phone')}}">
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
                <label for="receptionist_profile_id">{{ __('lang.rec.patients.associated_receptionist')}}</label>
                <select id="receptionist_profile_id" name="receptionist_profile_id" class="form-control">
                    @foreach($receptionistProfiles as $receptionistProfile)
                        <option value="{{$receptionistProfile->id}}">{{ $receptionistProfile->user->name }}</option>
                    @endforeach
                </select>
            </div>
        @else
            <h2 class="">{{ __('lang.rec.patients.no_rec')}}</h2>
        @endif

        <div class="form-group">
            <label for="attendance_date">{{ __('lang.rec.patients.attendance_date')}}</label>
            <input type="date" name="attendance_date" class="form-control" id="attendance_date" placeholder="{{ __('lang.rec.patients.attendance_date')}}">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" checked>
            <label class="form-check-label" for="exampleRadios1">{{ __('lang.rec.table.male')}}</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
            <label class="form-check-label" for="exampleRadios2">{{ __('lang.rec.table.female')}}</label>
        </div>

        <div class="form-group mt-2" id="code_div">
            <label for="code">{{ __('lang.rec.patients.code')}}</label>
            <input type="text" name="code" class="form-control" id="code" aria-describedby="code" placeholder="code">
        </div>

        <div class="row">
            <div class="col form-group">
                <label for="province">{{ __('lang.rec.patients.province')}}</label>
                <select class="form-control" id="province" name="province" aria-label="Default select example">
                    <option value="1">القاهرة</option>
                    <option value="1">الجيزة</option>
                    <option value="1">الإسكندرية</option>
                    <option value="1">الدقهلية</option>
                    <option value="1">الشرقية</option>
                    <option value="1">المنوفية</option>
                    <option value="1">القليوبية</option>
                    <option value="1">البحيرة</option>
                    <option value="1">الغربية</option>
                    <option value="1">بورسعيد</option>
                    <option value="1">دمياط</option>
                    <option value="1">الاسماعيلية</option>
                    <option value="1">السويس</option>
                    <option value="1">كفر الشيخ</option>
                    <option value="1">الفيوم</option>
                    <option value="1">بني سويف</option>
                    <option value="1">مطروح</option>
                    <option value="1">شمال سيناء</option>
                    <option value="1">جنوب سيناء</option>
                    <option value="1">المنيا</option>
                    <option value="1">اسيوط</option>
                    <option value="1">سوهاج</option>
                    <option value="1">قنا</option>
                    <option value="1">البحر الاحمر</option>
                    <option value="1">الاقصر</option>
                    <option value="1">اسوان</option>
                </select>
            </div>
            <div class="col form-group">
                <label for="city">{{ __('lang.rec.patients.city')}}</label>
                <input type="text" name="city" class="form-control" id="city" aria-describedby="code" placeholder="{{ __('lang.rec.patients.city')}}">
            </div>
        </div>

        <div class="form-group mt-2" id="code_div">
            <label for="code">{{ __('lang.rec.patients.parent_name')}}</label>
            <input type="text" name="parent_name" class="form-control" id="code" aria-describedby="code" placeholder="{{ __('lang.rec.patients.parent_name')}}">
        </div>

        <div class="form-group mt-2" id="code_div">
            <label for="code">{{ __('lang.rec.patients.parent_workplace')}}</label>
            <input type="text" name="parent_workplace" class="form-control" id="code" aria-describedby="code" placeholder="{{ __('lang.rec.patients.parent_workplace')}}">
        </div>

        <div class="form-group mt-2" id="code_div">
            <label for="code">{{ __('lang.rec.patients.mother_name')}}</label>
            <input type="text" name="mother_name" class="form-control" id="code" aria-describedby="code" placeholder="{{ __('lang.rec.patients.mother_name')}}">
        </div>

        <div class="form-group mt-2" id="code_div">
            <label for="code">{{ __('lang.rec.patients.mother_workplace')}}</label>
            <input type="text" name="mother_workplace" class="form-control" id="code" aria-describedby="code" placeholder="{{ __('lang.rec.patients.mother_workplace')}}">
        </div>

        <div class="my-2"><h4>{{ __('lang.rec.add_patient_card')}}</h4></div>
        
        <div class="my-2">
            <input type="file" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary mt-2">{{ __('lang.submit')}}</button>
    </form>
</div>

