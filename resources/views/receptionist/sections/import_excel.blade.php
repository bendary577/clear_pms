
  
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
      <!---------------------------- system importing policy section ------------------------------->
          <div class="choose_policies">
            <div class="row">
                  <h2>{{ __('lang.rec.importing_policies_title')}}</h2>
            </div>
            <div class="row">
                <div class="instructions_list">
                    <ul class="mx-5">
                        <li>
                          <h6>{{ __('lang.rec.importing_policies_rec_names')}}</h6>
                        </li>
                        <li>
                          <h6>{{ __('lang.rec.importing_policies_excel_format')}}</h6>
                          <img src="{{url('/images/dashboard/excel-format.jpg')}}" style="width:100%;height:90px" class="" alt="excel-format">
                        </li>
                    </ul>
                    <div class="form-check mx-5">
                        <input class="form-check-input" type="checkbox" value="" id="instructions_checkbox">
                        <label class="form-check-label" for="instructions_checkbox">{{ __('lang.rec.importing_policies_read_instructions')}}</label>
                    </div>
                </div>
            </div>
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
          
          <div class="col-md-3 ml-4 mt-4" id="import_excel_file_div">
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
   

<script>
    jQuery("#select_all_checkbox").on("change", function() {
            if($("#select_all_checkbox").is(":checked")){
                $(".check_").prop('checked', true);
            }else{
                $(".check_").prop('checked', false);
            }
        }).change();

    jQuery("#instructions_checkbox").on("change", function() {
            if($("#instructions_checkbox").is(":checked")){
              $("#import_excel_file_div").show();
            }else{
              $("#import_excel_file_div").hide();
            }
        }).change();
</script>