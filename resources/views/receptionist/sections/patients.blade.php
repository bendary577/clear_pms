<div class="container">
    <div class="d-flex justify-content-around">
        <div class="">
            <a class="btn btn-primary" href="{{route('receptionist.patients.list')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <line x1="9" y1="6" x2="20" y2="6" />
                    <line x1="9" y1="12" x2="20" y2="12" />
                    <line x1="9" y1="18" x2="20" y2="18" />
                    <line x1="5" y1="6" x2="5" y2="6.01" />
                    <line x1="5" y1="12" x2="5" y2="12.01" />
                    <line x1="5" y1="18" x2="5" y2="18.01" />
                </svg>
                <span>see patients list</span>
            </a>
       </div>
       <div class="">
            <a class="btn btn-success" href="{{route('receptionist.add.patient')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="9" cy="7" r="4" />
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    <path d="M16 11h6m-3 -3v6" />
               </svg>
               <span>{{ __('lang.rec.add_patient')}}</span>
            </a>
       </div>
        <div class="btn-group">
            <div class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-search" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="15" cy="15" r="4" />
                    <path d="M18.5 18.5l2.5 2.5" />
                    <path d="M4 6h16" />
                    <path d="M4 12h4" />
                    <path d="M4 18h4" />
                </svg>
                <span>search patients</span>
            </div>
            <div class="dropdown-menu ">
                <a class="dropdown-item" href="#">Search by Name</a>
                <a class="dropdown-item" href="#">Search by Code</a>
                <a class="dropdown-item" href="#">Filter by Dates</a>
            </div>
        </div>
    </div>
    <hr class="mt-5">
    <div class="row mt-2">
        <div class="col-12">
            <h2>{{ __('lang.rec.search_patient')}}</h2>
        </div>
        <!----------- search --------------->
        <div class="col-12">
            <!--- if patient is added is added successfully ----------->
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

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
            <form method="POST" action="{{route('receptionist.patients.search')}}">
            {{ csrf_field() }}
                <div class="input-group rounded">
                    <input type="text" class="form-control rounded" placeholder="search for patient using code or name" aria-label="Search"
                        aria-describedby="search-addon" required name="search_keyword"/>
                    <input class="input-group-text border-0" id="search-addon" type="submit" value="{{ __('lang.rec.search')}}" />
                </div>
            </form>
        </div>
    </div>
</div>