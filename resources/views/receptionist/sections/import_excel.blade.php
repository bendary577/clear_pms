
  
<div class="container" style="margin-top: 5rem;">
    @if($message = Session::get('success'))
        <div class="alert alert-info alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <strong> {{ $message }}</strong>
        </div>
    @endif
    
    {!! Session::forget('success') !!}
    <br />
    <h2 class="text-title mb-4">{{ __('lang.rec.import_data_desc')}}</h2>
    <div class="container">
      <div class="row">   

        <!---------------------------------- access card ----------------------------->
        <div class="col-md-6">
            <div class="card" style="width: 18rem;">
              <div class="d-flex justify-content-center align-items-center my-2">
                <img src="{{url('/images/dashboard/access.png')}}" style="width:150px;height:150px" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <form style="margin-top: 15px;padding: 10px;" action="{{ route('receptionist.import.excel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }} 
                    <input type="file" name="import_file" />
                    <button class="btn btn-primary mt-2">{{ __('lang.rec.import_file')}}</button>
                </form>
              </div>
            </div>
        </div>

        <!---------------------------------- excel card ----------------------------->
        <div class="col-md-6">
            <div class="card" style="width: 18rem;">
              <div class="d-flex justify-content-center align-items-center my-2">
                <img src="{{url('/images/dashboard/excel.png')}}" style="width:150px;height:150px" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <form style="margin-top: 15px;padding: 10px;" action="{{ route('receptionist.import.excel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }} 
                    <input type="file" name="import_file" />
                    <button class="btn btn-primary mt-2">{{ __('lang.rec.import_file')}}</button>
                </form>
              </div>
            </div>
        </div>
        
      </div>
    </div>
</div>
   

