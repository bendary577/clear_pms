<div class="container">
    <div class="row my-4">
        <!------------------------ 8 row ----------------------------------->
        <div class="col-md-8">
            <div class="row mb-4">
                <div class="col-md-6 col-xs-6">
                    <div class="card shadow round w-100" style="width: 18rem;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">Patients</h5>
                            <ul class="px-3 my-2">
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ $patients_count }} patients</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div >
                                        <small class="card-text"><strong>{{ $men_patients_count }} are men</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ $women_patients_count }} are women</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ $patients_ages_average }} average age</strong></small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-6">
                    <div class="card shadow round w-100" style="width: 18rem;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">Patients this Week</h5>
                            <div class="px-2 my-2">
                                <h6 class="card-text mt-2"><strong>{{ $weekly_new_patients_count }} new patients</strong></h6>
                            </div>

                            <div class="px-1 my-2 d-flex">
                                <!--<div class=""><img src="{{url('/images/dashboard/down-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" /></div>-->
                                <h6 class="card-text text-success mt-2"><strong>{{ $weekly_patients_change_percentage }}% increase</strong></h6>
                            </div>
                            <h6 class="px-2">from last week</h6>
                        </div>
                    </div>
                </div>   
            </div> 
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="card shadow" style="border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title">Patients Ages</h5>
                            <div id="patients_ages_chart" style="height:300px"> </div>
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
                        <h5 class="card-title">Patients Genders</h5>
                        <div id="patients_genders_chart"> </div>
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