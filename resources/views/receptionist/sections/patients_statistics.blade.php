<div class="container">
    <div class="row my-4">
        <!------------------------ 8 row ----------------------------------->
        <div class="col-md-8">
            <div class="row mb-4">
                <div class="col-md-6 col-xs-6">
                    <div class="card shadow round w-100" style="width: 18rem;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">{{ __('lang.rec.patient_statistics.patients') }}</h5>
                            <ul class="px-3 my-2">
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ __('lang.rec.patient_statistics.number_of_patients, :number', ['number' => $patients_count]) }}</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div >
                                        <small class="card-text"><strong>{{ __('lang.rec.patient_statistics.number_of_males, :number', ['number' => $men_patients_count]) }}</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ __('lang.rec.patient_statistics.number_of_females, :number', ['number' => $men_patients_count]) }}</strong></small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-6">
                    <div class="card shadow round w-100" style="width: 18rem;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">{{ __('lang.rec.patient_statistics.patients_this_week') }}</h5>
                            <div class="px-2 my-2">
                                <h6 class="card-text mt-2"><strong>{{ __('lang.rec.patient_statistics.number_of_new_patients, :number', ['number' => $weekly_new_patients_count]) }}</strong></h6>
                            </div>

                            <div class="px-1 my-2 d-flex">
                                @if($weekly_patients_change_percentage > 0)
                                <div class="d-flex">
                                    <div class="">
                                        <img src="{{url('/images/dashboard/up-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" />
                                    </div>
                                    <div class="">
                                        <h3 class="card-text text-success">{{ __('lang.rec.welcome.percentage, :number', ['number' => $weekly_patients_change_percentage]) }}</h3>
                                    </div>
                                </div>
                                @elseif($weekly_patients_change_percentage == 0)
                                <div class="d-flex">
                                    <div class="">
                                        <img src="{{url('/images/dashboard/equal-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" />
                                    </div>
                                    <div class="">
                                        <h3 class="card-text text-primary">{{ __('lang.rec.welcome.percentage, :number', ['number' => $weekly_patients_change_percentage]) }}</h3>
                                    </div>
                                </div>
                                @else
                                <div class="d-flex">
                                    <div class="">
                                        <img src="{{url('/images/dashboard/down-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" />
                                    </div>
                                    <div class="">
                                        <h3 class="card-text text-danger">{{ __('lang.rec.welcome.percentage, :number', ['number' => $weekly_patients_change_percentage]) }}</h3>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>   
            </div> 
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="card shadow" style="border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('lang.rec.patient_statistics.patients_ages') }}</h5>
                            @if($patients_count < 0)
                            <h5 class="text-danger">{{ __('lang.rec.patient_statistics.no_patients') }}</h5>
                            @elseif(!checkdnsrr('php.net'))
                            <h5 class="text-danger">{{ __('lang.rec.patient_statistics.no_internet') }}</h5>
                            @else
                            <div>
                                <small class="card-text text-primary"><strong> {{ __('lang.rec.patient_statistics.average_age, :average', ['average' => $patients_ages_average]) }}  </strong></small>
                            </div>
                            <div id="patients_ages_chart" style="height:300px"> </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!------------------------ 4 row ----------------------------------->
        <div class="col-md-4">
            <div class="row">
                <div class="card shadow" style="border-radius:20px;height:280px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('lang.rec.patient_statistics.patients_genders') }}</h5>
                        @if($patients_count < 0 )
                            <h5 class="text-danger">{{ __('lang.rec.patient_statistics.no_patients') }}</h5>
                        @elseif(!checkdnsrr('php.net'))
                            <h5 class="text-danger">{{ __('lang.rec.patient_statistics.no_internet') }}</h5>
                        @else
                            <div id="patients_genders_chart"> </div>
                        @endif
                    </div>
                </div>
            </div>
            <!----
            <div class="row">
                <div class="card shadow my-3" style="border-radius:20px;height:280px;">
                    <div class="card-body">
                        <h5 class="card-title">Patients Diagnoses Percentages</h5>
                        <div id="patients_diagnoses_chart"> </div>
                    </div>
                </div>
            </div>
            --->
        </div>
    </div>
</div>

<script>
    const patientsAgesChart = new Chartisan({
        el: '#patients_ages_chart',
        url: "@chart('patients_ages_chart')",
        hooks: new ChartisanHooks()
            .colors(['#ECC94B', '#4299E1'])
            .responsive()
            .legend({ position: 'bottom' })
            .title('This is a sample chart using chartisan!')
            .datasets([{ type: 'bar', fill: false }, 'bar']),
            });
    const patientsGendersChart = new Chartisan({
        el: '#patients_genders_chart',
        url: "@chart('patients_genders_chart')",
        hooks: new ChartisanHooks()
        .datasets('doughnut')
        .pieColors(),
    });
    const diagnosesPercentageChart = new Chartisan({
        el: '#patients_diagnoses_chart',
        url: "@chart('patients_diagnoses_chart')",
        hooks: new ChartisanHooks()
        .datasets('doughnut')
        .pieColors(),
    });

</script>