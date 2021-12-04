                <div class="row my-4">
                    <div class="col-md-3">
                        <a href="{{route('receptionist.patients.statistics')}}" class="badge badge-pill badge-light shadow d-flex justify-content-center upper_badge" style="width:200px;height:50px">
                            <div class="d-flex">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h6><span class="badge badge-danger mx-1">1</span>{{ __('lang.rec.dashboard.patient.statistics') }}</h6>
                                </div>
                                <div class="d-flex justify-content-center align-items-center text-center mb-4">
                                    <img src="{{url('/images/dashboard/patient.png')}}" class="mt-3 mx-2" width="20" height="20" alt="welcome" />
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{route('receptionist.clinics.statistics')}}" class="badge badge-pill badge-light shadow d-flex justify-content-center upper_badge" style="width:200px;height:50px">
                            <div class="d-flex">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h6><span class="badge badge-warning mx-1">2</span>{{ __('lang.rec.dashboard.clinics.statistics') }}</h6>
                                </div>
                                <div class="d-flex justify-content-center align-items-center text-center mb-4">
                                    <img src="{{url('/images/dashboard/clinic.png')}}" class="mt-3 mx-2" width="20" height="20" alt="welcome" />
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{route('receptionist.medical.insights')}}" class="badge badge-pill badge-light shadow d-flex justify-content-center upper_badge" style="width:200px;height:50px">
                            <div class="d-flex">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h6><span class="badge badge-success mx-1">3</span>{{ __('lang.rec.dashboard.medical.insights') }}</h6>
                                </div>
                                <div class="d-flex justify-content-center align-items-center text-center mb-4">
                                    <img src="{{url('/images/dashboard/specialities.png')}}" class="mt-3 mx-2" width="20" height="20" alt="welcome" />
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{route('receptionist.system.statistics')}}" class="badge badge-pill badge-light shadow d-flex justify-content-center upper_badge" style="width:200px;height:50px">
                            <div class="d-flex">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h6><span class="badge badge-primary mx-1">4</span>{{ __('lang.rec.dashboard.system.statistics') }}</h6>
                                </div>
                                <div class="d-flex justify-content-center align-items-center text-center mb-4">
                                    <img src="{{url('/images/dashboard/system_statistics.png')}}" class="mt-3 mx-2" width="20" height="20" alt="welcome" />
                                </div>
                            </div>
                        </a>
                    </div>
                </div>