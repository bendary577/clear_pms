
<div class="row my-4">
    <div class="col-md-8">
        <div class="row mb-2">
            <div class="col-md-6 col-xs-6">
                <div class="card shadow" style="width: 18rem;border-radius:20px">
                    <div class="card-body">
                        <h5 class="card-title" style="color:gray">{{ __('lang.rec.welcome.number.receptionists') }}</h5>
                        <div class="px-3 my-2">
                            <h3 class="card-text">{{ __('lang.rec.welcome.number_of_receptionists, :number', ['number' => $receptionistsCount]) }}</h3>
                        </div>
                        @if($receptionistsPercent > 0)
                        <div class="d-flex">
                            <div class="">
                                <img src="{{url('/images/dashboard/up-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" />
                            </div>
                            <div class="">
                                <h3 class="card-text text-success">{{ __('lang.rec.welcome.percentage, :number', ['number' => $receptionistsPercent]) }}</h3>
                            </div>
                        </div>
                        @elseif($receptionistsPercent == 0)
                        <div class="d-flex">
                            <div class="">
                                <img src="{{url('/images/dashboard/equal-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" />
                            </div>
                            <div class="">
                                <h3 class="card-text text-primary">{{ __('lang.rec.welcome.percentage, :number', ['number' => $receptionistsPercent]) }}</h3>
                            </div>
                        </div>
                        @else
                        <div class="d-flex">
                            <div class="">
                                <img src="{{url('/images/dashboard/down-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" />
                            </div>
                            <div class="">
                                <h3 class="card-text text-danger">{{ __('lang.rec.welcome.percentage, :number', ['number' => $receptionistsPercent]) }}</h3>
                            </div>
                        </div>
                        @endif
                        <div class="px-3"><p>{{ __('lang.rec.welcome.since_last_month') }}</p></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-6">
                <div class="card shadow round" style="width: 18rem;border-radius:20px">
                    <div class="card-body">
                        <h5 class="card-title" style="color:gray">{{ __('lang.rec.welcome.number.doctors') }}</h5>
                        <div class="px-3 my-2">
                            <h3 class="card-text">{{ __('lang.rec.welcome.number_of_doctors, :number', ['number' => $doctorsCount]) }}</h3>
                        </div>
                        @if($doctorsPercent > 0)
                        <div class="d-flex">
                            <div class="">
                                <img src="{{url('/images/dashboard/up-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" />
                            </div>
                            <div class="">
                                <h3 class="card-text text-success">{{ __('lang.rec.welcome.percentage, :number', ['number' => $doctorsPercent]) }}</h3>
                            </div>
                        </div>
                        @elseif($doctorsPercent == 0)
                        <div class="d-flex">
                            <div class="">
                                <img src="{{url('/images/dashboard/equal-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" />
                            </div>
                            <div class="">
                                <h3 class="card-text text-primary">{{ __('lang.rec.welcome.percentage, :number', ['number' => $doctorsPercent]) }}</h3>
                            </div>
                        </div>
                        @else
                        <div class="d-flex">
                            <div class="">
                                <img src="{{url('/images/dashboard/down-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" />
                            </div>
                            <div class="">
                                <h3 class="card-text text-danger">{{ __('lang.rec.welcome.percentage, :number', ['number' => $doctorsPercent]) }}</h3>
                            </div>
                        </div>
                        @endif
                        <div class="px-3"><p>{{ __('lang.rec.welcome.since_last_month') }}</p></div>
                    </div>
                </div>
            </div>   
        </div>

        <div class="row">
            <div class="col-md-6 col-xs-6">
                <div class="card shadow round" style="width: 18rem;border-radius:20px">
                    <div class="card-body">
                        <h5 class="card-title" style="color:gray">{{ __('lang.rec.welcome.number.clinics') }}</h5>
                        <div class="px-3 my-2">
                            <h3 class="card-text">{{ __('lang.rec.welcome.number_of_clinics, :number', ['number' => $clinicsCount]) }}</h3>
                        </div>
                        @if($clinicsPercent > 0)
                        <div class="d-flex">
                            <div class="">
                                <img src="{{url('/images/dashboard/up-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" />
                            </div>
                            <div class="">
                                <h3 class="card-text text-success">{{ __('lang.rec.welcome.percentage, :number', ['number' => $clinicsPercent]) }}</h3>
                            </div>
                        </div>
                        @elseif($clinicsPercent == 0)
                        <div class="d-flex">
                            <div class="">
                                <img src="{{url('/images/dashboard/equal-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" />
                            </div>
                            <div class="">
                                <h3 class="card-text text-primary">{{ __('lang.rec.welcome.percentage, :number', ['number' => $clinicsPercent]) }}</h3>
                            </div>
                        </div>
                        @else
                        <div class="d-flex">
                            <div class="">
                                <img src="{{url('/images/dashboard/down-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" />
                            </div>
                            <div class="">
                                <h3 class="card-text text-danger">{{ __('lang.rec.welcome.percentage, :number', ['number' => $clinicsPercent]) }}</h3>
                            </div>
                        </div>
                        @endif
                        <div class="px-3"><p>{{ __('lang.rec.welcome.since_last_month') }}</p></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-6">
                <div class="card shadow round" style="width: 18rem;border-radius:20px">
                    <div class="card-body">
                        <h5 class="card-title" style="color:gray">{{ __('lang.rec.welcome.number.specialities') }}</h5>
                        <div class="px-3 my-2">
                            <h3 class="card-text">{{ __('lang.rec.welcome.number_of_medical_specialities, :number', ['number' => $medicalSpecialitiesCount]) }}</h3>
                        </div>
                        @if($medicalSpecialitiesPercent > 0)
                        <div class="d-flex">
                            <div class="">
                                <img src="{{url('/images/dashboard/up-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" />
                            </div>
                            <div class="">
                                <h3 class="card-text text-success">{{ __('lang.rec.welcome.percentage, :number', ['number' => $medicalSpecialitiesPercent]) }}</h3>
                            </div>
                        </div>
                        @elseif($medicalSpecialitiesPercent == 0)
                        <div class="d-flex">
                            <div class="">
                                <img src="{{url('/images/dashboard/equal-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" />
                            </div>
                            <div class="">
                                <h3 class="card-text text-primary">{{ __('lang.rec.welcome.percentage, :number', ['number' => $medicalSpecialitiesPercent]) }}</h3>
                            </div>
                        </div>
                        @else
                        <div class="d-flex">
                            <div class="">
                                <img src="{{url('/images/dashboard/down-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" />
                            </div>
                            <div class="">
                                <h3 class="card-text text-danger">{{ __('lang.rec.welcome.percentage, :number', ['number' => $medicalSpecialitiesPercent]) }}</h3>
                            </div>
                        </div>
                        @endif
                        <div class="px-3"><p>{{ __('lang.rec.welcome.since_last_month') }}</p></div>
                    </div>
                </div>
            </div>   
        </div>   
    </div>
    <div class="col-md-4">
        <div class="card shadow" style="height:100%;width: 18rem;border-radius:20px">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <div class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</div>
             </div>
        </div>
    </div>
</div>


