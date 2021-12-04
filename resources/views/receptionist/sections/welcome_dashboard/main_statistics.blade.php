
<div class="my-4">
    <div class="row">
        <div class="col-md-4 col-xs-6">
            <div class="card shadow" style="width: 18rem;border-radius:20px">
                <div class="card-body">
                    <h5 class="card-title" style="color:gray">{{ __('lang.rec.welcome.this_week') }}</h5>
                    <ul class="px-4 my-2">
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ $weekly_new_patients_count }} new patients</strong></small>
                            </div>
                        </li>
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ $weekly_new_appointments_count }} new appointments</strong></small>
                            </div>
                        </li>
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ $weekly_finished_appointments_count }} finished appointments</strong></small>
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
                                <small class="card-text"><strong>{{ $monthly_new_patients_count }} new patients</strong></small>
                            </div>
                        </li>
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ $monthly_new_appointments_count }} new appointments</strong></small>
                            </div>
                        </li>
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ $monthly_finished_appointments_count }} finished appointments</strong></small>
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
                                <small class="card-text"><strong>{{ $yearly_new_patients_count }} new patients</strong></small>
                            </div>
                        </li>
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ $yearly_new_appointments_count }} new appointments</strong></small>
                            </div>
                        </li>
                        <li>
                            <div class="my-2">
                                <small class="card-text"><strong>{{ $yearly_finished_appointments_count }} finished appointments</strong></small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


