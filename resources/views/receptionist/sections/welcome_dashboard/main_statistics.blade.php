
<div class="my-4">
    <div class="row">
        <div class="col-md-4 col-xs-6">
            <div class="card shadow" style="width: 18rem;border-radius:20px">
                <div class="card-body">
                    <h5 class="card-title" style="color:gray">{{ __('lang.rec.welcome.this_week') }}</h5>
                    <ul class="px-4 my-2">
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ __('lang.rec.welcome.number_of_new_patients, :number', ['number' => $weekly_new_patients_count]) }}</strong></small>
                            </div>
                        </li>
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ __('lang.rec.welcome.number_of_new_appointments, :number', ['number' => $weekly_new_appointments_count]) }}</strong></small>
                            </div>
                        </li>
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ __('lang.rec.welcome.number_of_finished_appointments, :number', ['number' => $weekly_finished_appointments_count]) }}</strong></small>
                            </div>
                        </li>
                    </ul>
                    <!--
                    <div class="d-flex">
                        <div class=""><img src="{{url('/images/dashboard/down-arrow.png')}}" style="width:40px;height:35px" class="card-img-top" alt="welcome" /></div>
                    <div class=""><h3 class="card-text text-danger">20%</h3></div>
                    </div>
                    <div class="px-3"><p>since last month</p></div>
                    -->
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-6">
            <div class="card shadow" style="width: 18rem;border-radius:20px">
                <div class="card-body">
                    <h5 class="card-title" style="color:gray">{{ __('lang.rec.welcome.this_month') }}</h5>
                    <ul class="px-4 my-2">
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ __('lang.rec.welcome.number_of_new_patients, :number', ['number' => $monthly_new_patients_count]) }}</strong></small>
                            </div>
                        </li>
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ __('lang.rec.welcome.number_of_new_appointments, :number', ['number' => $monthly_new_appointments_count]) }}</strong></small>
                            </div>
                        </li>
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ __('lang.rec.welcome.number_of_finished_appointments, :number', ['number' => $monthly_finished_appointments_count]) }}</strong></small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-6">
            <div class="card shadow" style="width: 18rem;border-radius:20px">
                <div class="card-body">
                    <h5 class="card-title" style="color:gray">{{ __('lang.rec.welcome.this_year') }}</h5>
                    <ul class="px-4 my-2">
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ __('lang.rec.welcome.number_of_new_patients, :number', ['number' => $yearly_new_patients_count]) }}</strong></small>
                            </div>
                        </li>
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ __('lang.rec.welcome.number_of_new_appointments, :number', ['number' => $yearly_new_appointments_count]) }}</strong></small>
                            </div>
                        </li>
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ __('lang.rec.welcome.number_of_finished_appointments, :number', ['number' => $yearly_finished_appointments_count]) }}</strong></small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


