<div class="container">
    <div class="row my-4">
        <!------------------------ 8 row ----------------------------------->
        <div class="col-md-12">
            <div class="row mb-4">
                <div class="col-md-6 col-xs-6">
                    <div class="card shadow round w-100" style="width: 18rem;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">{{ __('lang.rec.medical_insights.medical_insights') }}</h5>
                            <ul class="px-3 my-2">
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ __('lang.rec.medical_insights.number_of_medical_specialities, :number', ['number' => $medical_specialities_count]) }}</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div >
                                        <small class="card-text"><strong>{{ __('lang.rec.medical_insights.number_of_system_diagnoses, :number', ['number' => $system_diagnoses_count]) }}</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ __('lang.rec.medical_insights.number_of_system_medicines, :number', ['number' => $system_medicines_count]) }}</strong></small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> 
                <div class="col-md-6 col-xs-6">
                    <div class="card shadow round w-100" style="width: 18rem;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">{{ __('lang.rec.medical_insights.diagnoses_pie_chart') }}</h5>
                            @if(!checkdnsrr('php.net'))
                                <h5 class="text-danger">{{ __('lang.rec.patient_statistics.no_internet') }}</h5>
                            @elseif($diagnoses_count == 0)
                                <h5 class="text-danger">{{ __('lang.rec.medical_insights.no_diagnoses') }}</h5>
                            @else 
                               <div id="patients_diagnoses_chart"></div>
                            @endif
                        </div>
                    </div>
                </div>    
            </div> 
        </div>
    </div>
</div>

<script>
    const PatientsDiagnosesChart = new Chartisan({
        el: '#patients_diagnoses_chart',
        url: "@chart('patients_diagnoses_chart')",
        hooks: new ChartisanHooks()
        .datasets('doughnut')
        .pieColors(),
    });
</script>
