<div class="container">
    <div class="row my-4">
        <!------------------------ 8 row ----------------------------------->
        <div class="col-md-4">
            <div class="row mb-4">
                <div class="col-md-12 col-xs-6">
                    <div class="card shadow round w-100" style="width: 18rem;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">Medical Insights</h5>
                            <ul class="px-3 my-2">
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ $medical_specialities_count }} clinics registered</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div >
                                        <small class="card-text"><strong>{{ $system_diagnoses_count }} adults clinics</strong></small>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <small class="card-text"><strong>{{ $system_medicines_count }} children clinics</strong></small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>   
            </div> 
            <div class="row mb-4">
                <div class="col-md-12 col-xs-6">
                    <div class="card shadow round w-100" style="width: 18rem;border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title" style="color:gray">Diagnoses Pie Chart</h5>
                            <div id="clinics_department_pie_chart"></div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow round w-100" style="width: 18rem;height:410px;border-radius:20px">
                <div class="card-body">
                    <h5 class="card-title" style="color:gray">Diagnoses Insights</h5>
                    <div id="system_diagnoses_bar_chart"></div>
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

   /* const diagnosesBarChart = new Chartisan({
        el: '#system_diagnoses_bar_chart',
        url: "@chart('system_diagnoses_bar_chart')",
        hooks: new ChartisanHooks()
            .colors(['#ECC94B', '#4299E1'])
            .responsive()
            .legend({ position: 'bottom' })
            .title('This is a sample chart using chartisan!')
            .datasets([{ type: 'bar', fill: false }, 'bar']),
            });
    });
*/
</script>
