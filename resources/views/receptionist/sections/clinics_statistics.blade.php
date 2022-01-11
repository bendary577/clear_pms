<div class="container">
    <div class="row my-4">
        <!------------------------ 8 row ----------------------------------->
        <div class="col-md-12">
            <div class="row mb-4">
                <div class="col-md-3 col-xs-6">
                    <div class="card shadow round w-100" style="width:18rem;height:220px;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">{{ __('lang.rec.clinics_statistics.clinics_overview') }}</h5>
                            <ul class="px-3 my-2">
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ __('lang.rec.clinics_statistics.number_of_clinics_registered, :number', ['number' => $clinics_count]) }}</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div >
                                        <small class="card-text"><strong>{{ __('lang.rec.clinics_statistics.number_of_adults_clinics, :number', ['number' => $adult_clinics_count]) }}</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ __('lang.rec.clinics_statistics.number_of_children_clinics, :number', ['number' => $children_clinics_count]) }}</strong></small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="card shadow round w-100" style="width: 18rem;height:220px;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">{{ __('lang.rec.clinics_statistics.appointments_overview') }}</h5>
                            <ul class="px-3 my-2">
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ __('lang.rec.clinics_statistics.number_of_new_appointments, :number', ['number' => $new_appointments_count]) }}</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div >
                                        <small class="card-text"><strong>{{ __('lang.rec.clinics_statistics.number_of_finished_appointments, :number', ['number' => $finished_appointments_count]) }}</strong></small>
                                    </div>
                                </li>
                                <li>
                                    @if(!is_null($clinic_with_max_appointments))
                                    <div>
                                        <small class="card-text">
                                        <strong>
                                            {{ __('lang.rec.clinics_statistics.clinic_record, :name,number', ['name' => $clinic_with_max_appointments->doctorProfile->user->name, 'number' => $clinic_max_appointments_count]) }}
                                        </strong></small>
                                    </div>
                                    @else
                                    <div>
                                        <small class="card-text text-danger"><strong>{{ __('lang.rec.clinics_statistics.no_clinic_records') }}</strong></small>
                                    </div>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="card shadow round w-100" style="width: 18rem;height:220px;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">{{ __('lang.rec.clinics_statistics.clinics_this_week') }}</h5>
                            <ul class="px-3 my-2">
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ __('lang.rec.clinics_statistics.number_of_new_appointments, :number', ['number' => $weekly_new_appointments_count]) }}</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div >
                                        <small class="card-text"><strong>{{ __('lang.rec.clinics_statistics.number_of_finished_appointments, :number', ['number' => $weekly_finished_appointments_count]) }}</strong></small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>   
                <div class="col-md-3 col-xs-6">
                    <div class="card shadow round w-100" style="width: 18rem;height:220px;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">{{ __('lang.rec.clinics_statistics.clinics_departments') }}</h5>
                            @if($clinics_count > 0)
                            <div id="clinics_department_pie_chart"></div>
                            @else
                            <h5 class="text-danger">{{ __('lang.rec.clinics_statistics.no_clinics') }}</h5>
                            @endif
                        </div>
                    </div>
                </div>     
            </div> 
        </div>
    </div>
</div>

<script>

    const clinicsDepartmentsPieChart = new Chartisan({
        el: '#clinics_department_pie_chart',
        url: "@chart('clinics_department_pie_chart')",
        hooks: new ChartisanHooks()
        .datasets('doughnut')
        .pieColors(),
    });

</script>
