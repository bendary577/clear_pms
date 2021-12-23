
  
<div class="container" style="margin-top: 5rem;">
    
@if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <strong> {{ $message }}</strong>
        </div>
    @endif

    @if($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <strong> {{ $message }}</strong>
        </div>
    @endif
    
    {!! Session::forget('success') !!}
    <br />
    
    <div class="container">
        <div class="row">
              <h2>Before importing the file please make sure that</h2>
        </div>
        <div class="row">
            <div class="instructions_list">
                <ul class="mx-5">
                    <li>
                      <h6>please choose your patient's code policy from <a href="" class="" data-toggle="modal" data-target="#exampleModal">here</a></h6>
                    </li>
                    <li>
                      <h6>make sure that receptionists names recorded in the file are available in the system and associated with accounts with the same name</h6>
                    </li>
                    <li>
                      <h6>make sure your excel sheet has the right format</h6>
                      <img src="{{url('/images/dashboard/excel-format.jpg')}}" style="width:100%;height:90px" class="" alt="excel-format">
                    </li>

                </ul>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Imported Patients Code Policy</h5>
              </div>
              <div class="modal-body">
                  <form method="POST">
                      <h5>Please choose your desired policy for recording new patients codes</h5>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label mx-2" for="inlineRadio1">Random (generated randomely)</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label mx-2" for="inlineRadio2">Sequential (code numbers are consecutive)</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label mx-2" for="inlineRadio2">Custom (codes are available in the file)</label>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
            <h2 class="text-title mb-4">{{ __('lang.rec.import_data_desc')}}</h2>
        </div>
        <div class="row">   
          <!---------------------------------- access card 
            <div class="col-md-3 ml-4">
              <div class="card" style="width: 16rem; height:32rem;">
                <div class="d-flex justify-content-center align-items-center my-2">
                  <img src="{{url('/images/dashboard/access.png')}}" style="width:150px;height:150px" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ __('lang.rec.import_access_file')}}</h5>
                  <p class="card-text">transfer all your patients data from microsoft access database to clear pms system using database migration</p>
                  <form style="margin-top: 15px;padding: 10px;" action="{{ route('receptionist.import.access') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }} 
                      <input type="file" name="access_db" />
                      <button class="btn btn-primary mt-2">{{ __('lang.rec.import_file')}}</button>
                  </form>
                </div>
              </div>
          </div>
          ----------------------------->
          
          <!---------------------------------- excel card ----------------------------->

          <div class="col-md-3 ml-4">
              <div class="card" style="width: 16rem; height:32rem;">
                <div class="d-flex justify-content-center align-items-center my-2">
                  <img src="{{url('/images/dashboard/excel.png')}}" style="width:150px;height:150px" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ __('lang.rec.import_excel_file')}}</h5>
                  <p class="card-text">{{__('lang.rec.excel_file_desc')}}</p>
                  <form style="margin-top: 15px;padding: 10px;" action="{{ route('receptionist.import.excel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }} 
                      <input type="file" name="excel_file" />
                      <button type="submit" class="btn btn-primary mt-2">{{ __('lang.rec.import_file')}}</button>
                  </form>
                </div>
              </div>
          </div>

          <!---------------------------------- csv card 
          <div class="col-md-3 ml-4">
              <div class="card" style="width: 16rem; height:32rem;">
                <div class="d-flex justify-content-center align-items-center my-2">
                  <img src="{{url('/images/dashboard/csv.png')}}" style="width:150px;height:150px" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ __('lang.rec.import_csv_file')}}</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <form style="margin-top: 15px;padding: 10px;" action="{{ route('receptionist.import.excel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }} 
                      <input type="file" name="import_file" />
                      <button class="btn btn-primary mt-2">{{ __('lang.rec.import_file')}}</button>
                  </form>
                </div>
              </div>
          </div>
          ----------------------------->
        </div>
    </div>
</div>
   

