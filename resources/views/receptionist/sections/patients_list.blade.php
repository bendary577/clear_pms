<div class="container">
    <!--- if patient is added is added successfully ----------->
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <!--- if patient is not added successfully ----------->
        @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    @endif

    @if(count($patients) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($patients as $patient)
                        <tr>
                            <th>{{$patient->name}}</th>
                            <td>{{$patient->code}}</td>
                            <td>{{$patient->age}}</td>
                            <td>{{$patient->gender}}</td>
                            <td>{{$patient->phone}}</td>
                            <td>
                                <a href="{{route('receptionist.patients.patient.file', ['id'=>$patient->id])}}" class="btn btn-success ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                        <line x1="10" y1="14" x2="20" y2="4" />
                                        <polyline points="15 4 20 4 20 9" />
                                    </svg>
                                    <span>see file history</span>
                                </a>
                                <a href="{{route('receptionist.reserve.visit', ['patient_id'=>$patient->id])}}" class="btn btn-warning ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                        <line x1="10" y1="14" x2="20" y2="4" />
                                        <polyline points="15 4 20 4 20 9" />
                                    </svg>
                                    <span>specialist visit</span>
                                </a>
                                <a href="{{route('receptionist.patients.new.appointment', ['id'=>$patient->id])}}" class="btn btn-info ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                        <line x1="10" y1="14" x2="20" y2="4" />
                                        <polyline points="15 4 20 4 20 9" />
                                    </svg>
                                    <span>doctor visit</span>
                                </a>
                                <a href="{{route('receptionist.delete.patient', ['id'=>$patient->id])}}" class="btn btn-danger ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-external-link" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" />
                                        <line x1="10" y1="14" x2="20" y2="4" />
                                        <polyline points="15 4 20 4 20 9" />
                                    </svg>
                                    <span>delete</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center align-items-center">
            <div>{!! $patients->links() !!}</div>
        </div>
    @else
        <h3 class="text-danger">sorry, no patients are available in the system</h3>
    @endif
</div>