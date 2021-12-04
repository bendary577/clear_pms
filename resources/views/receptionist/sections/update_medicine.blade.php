<div class="container">

    <!--- if patient is added is added successfully ----------->
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <!--- if patient is not added successfully ----------->
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class=""><h2>{{ __('lang.rec.medicines.update.screen') }}</h2></div>
    <form method="POST" action="{{route('receptionist.update.medicine', ['id' => $system_medicine->id ])}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="date">{{ __('lang.rec.medicines.name') }}</label>
            <input type="text" name="name" class="form-control" id="medicine_name" placeholder="{{$system_medicine->name}}">
        </div>
        <div class="form-group">
            <label for="date">{{ __('lang.rec.medicines.code') }}</label>
            <input type="text" name="code" class="form-control" id="medicine_name" placeholder="{{$system_medicine->code}}">
        </div>
        <button type="submit" class="btn btn-primary mt-2">{{ __('lang.submit')}}</button>
    </form>
</div>