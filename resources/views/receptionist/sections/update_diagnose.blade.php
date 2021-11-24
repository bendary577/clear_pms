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

    <div class=""><h2>update diagnose</h2></div>
    <form method="POST" action="{{route('receptionist.update.diagnose', ['id' => $id])}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="date">diagnose name</label>
            <input type="text" name="date" class="form-control" id="birth_date" placeholder="{{ __('lang.rec.table.birth_date')}}">
        </div>
        <button type="submit" class="btn btn-primary mt-2">{{ __('lang.submit')}}</button>
    </form>
</div>