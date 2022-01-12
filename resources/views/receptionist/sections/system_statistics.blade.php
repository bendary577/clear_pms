<div class="container">
    <div class="row my-4">
        <!------------------------ 8 row ----------------------------------->
        <div class="col-md-12">
            <div class="row mb-4">
                <div class="col-md-3 col-xs-6">
                    <div class="card shadow round w-100" style="width:18rem;height:220px;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">{{ __('lang.rec.system_statistics.system_overview') }}</h5>
                            <ul class="px-3 my-2">
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ __('lang.rec.system_statistics.number_of_admins, :number', ['number' => $admins_count]) }}</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div >
                                        <small class="card-text"><strong>{{ __('lang.rec.system_statistics.number_of_doctors, :number', ['number' => $doctors_count]) }}</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ __('lang.rec.system_statistics.number_of_receptionists, :number', ['number' => $receptionists_count]) }}</strong></small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-------
                <div class="col-md-3 col-xs-6">
                    <div class="card shadow round w-100" style="width: 18rem;height:220px;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">Appointments Overview</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="card shadow round w-100" style="width: 18rem;height:220px;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">Clinics this Week</h5>
                        </div>
                    </div>
                </div>   
                <div class="col-md-3 col-xs-6">
                    <div class="card shadow round w-100" style="width: 18rem;height:220px;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">Clinics Departments</h5>
                            <div id="clinics_department_pie_chart"></div>
                        </div>
                    </div>
                </div>   
                ------------>  
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
