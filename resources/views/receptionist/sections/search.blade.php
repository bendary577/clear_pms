<div class="search_page">
    <div class="go_back mb-4"><a href="{{ url()->previous() }}"><h6 class="text-primary">{{__('lang.go_back')}}</h6></a></div>

    @if(count($patients)>0)
        @foreach($patients as $patient)
            <div class="search_result">
                <h2>{{ $patient->name }}</h2>
                <div class="">
                    <span class="">
                        <a href="{{route('receptionist.patients.new.appointment', ['id' => $patient->id ])}}" class="btn btn-success">{{ __('lang.rec.add_appointment')}}</a>
                    </span>
                    <span class="">
                        <a href="{{route('receptionist.patients.patient.file', ['id' =>  $patient->id ])}}" class="btn btn-info">{{ __('lang.rec.check_history')}}</a>
                    </span>
                    <span class="">
                        <a href="{{route('receptionist.edit.patient', ['id' =>  $patient->id ])}}" class="btn btn-dark">{{ __('lang.rec.update_profile')}}</a>
                    </span>
                    <span class="">
                        <a href="{{route('receptionist.reserve.visit', ['patient_id' =>  $patient->id ])}}" class="btn btn-warning">specialist visit</a>
                    </span>
                    <span class="">
                        <a href="{{route('receptionist.start.visit.immediately', ['patient_id' =>  $patient->id ])}}" class="btn btn-primary">immediate specialist visit</a>
                    </span>
                </div>
            </div>
            <div class="line"></div>
        @endforeach
        <div class="d-flex justify-content-center align-items-center">
            <div>{!! $patients->links() !!}</div>
        </div>
    @else
        <h3 class="text-danger mt-4">{{__('lang.rec.no_search')}}</h3>
    @endif
</div>