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
                                    <div >
                                        <small class="card-text"><strong>{{ $patients_count }} patients</strong></small>
                                    </div>
                                </li>
                                <li >
                                    <div >
                                        <small class="card-text"><strong>{{ $men_patients_count }} are men</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ $women_patients_count }} are women</strong></small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-6">
                    <div class="card shadow round w-100" style="width: 18rem;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">Number of Doctors</h5>
                            <div class="px-3 my-2">
                                <small class="card-text"><strong>{{ $patients_count }} doctor</strong></small>
                            </div>
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
                <div class="card shadow" style="border-radius:20px;height:50%">
                    <div class="card-body">
                        <h5 class="card-title">Patients Genders</h5>
                        <div id="patients_genders_chart"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card shadow my-3" style="border-radius:20px;height:50%">
                    <div class="card-body">
                        <h5 class="card-title">Patients Diagnoses Percentages</h5>
                        <div id="diagnoses_percentage_chart"> </div>
                    </div>
                </div>
            </div>
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
            .beginAtZero()
            .legend({ position: 'bottom' })
            .title('This is a sample chart using chartisan!')
            .datasets([{ type: 'line', fill: false }, 'bar']),
            });
    const patientsGendersChart = new Chartisan({
        el: '#patients_genders_chart',
        url: "@chart('patients_genders_chart')",
        hooks: new ChartisanHooks()
        .datasets('doughnut')
        .pieColors(),
    });
    const diagnosesPercentageChart = new Chartisan({
        el: '#diagnoses_percentage_chart',
        url: "@chart('patients_diagnoses_chart')",
        hooks: new ChartisanHooks()
        .datasets('doughnut')
        .pieColors(),
    });
</script>