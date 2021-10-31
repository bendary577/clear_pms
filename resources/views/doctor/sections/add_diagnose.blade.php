@if($medical_specialities && count($medical_specialities) > 0)

<div class="my-2 border rounded p-3">
    <h4 class="text-primary">{{__('lang.doctor.add_diagnose')}}</h4>
    <form method="POST" action="{{route('doctor.add.diagnose', ['appointment_id' => $appointment->id])}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">{{__('lang.rec.diagnose_name')}}</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="{{__('lang.rec.diagnose_name')}}" required>
        </div>
        <div class="form-group">
            <label for="name">{{__('lang.rec.diagnose_description')}}</label>
            <input type="text" name="description" class="form-control" id="description" placeholder="{{__('lang.rec.diagnose_description')}}" required>
        </div>
        <div class="form-group">
            <label for="name">{{__('lang.doctor.treatment_protocol')}}</label>
            <input type="text" name="protocol" class="form-control" id="protocol" placeholder="{{__('lang.doctor.treatment_protocol')}}" required>
        </div>
        <div class="form-group">
            <label for="inputState">{{__('lang.dashboard.medical_specialities')}}</label>
            <select id="inputState" name="specialization" class="form-control">
                <option selected>Select</option>
                @foreach($medical_specialities as $medical_speciality)
                <option value="{{$medical_speciality->id}}">{{ $medical_speciality->name }}</option>
                @endforeach
            </select>
        </div>

        <!----------------------------- medicines -------------------------------------->
        <div class="medicines" id="medicines">
            <div class="d-flex my-2" id="medicines_title">
                <h3 class="text-primary">Required medicines</h3>
                <input type="text" name="medicines_number" class="form-control mx-2" style="width:40px;" id="medicines_number" value="1" placeholder="1">
                <a href="javascript:void(0);" id="add_medicine" class="ml-2 btn btn-info">add medicine</a>
            </div>

            <div class="form-row" id="medicine_row_1">
                <div class="form-group col-md-6">
                    <label for="medicine">medicine</label>
                    <input type="text" name="medicine_1" class="form-control" id="medicine_1" placeholder="medicine">
                </div>
                <div class="form-group col-md-4">
                    <label for="dose">dose</label>
                    <input type="text" name="dose_1" class="form-control" id="dose_1" placeholder="dose">
                </div>
                <div class="form-group col-md-2">
                    <label for="duration">duration</label>
                    <input type="text" name="duration_1" class="form-control" id="duration_1" placeholder="duration">
                </div>
            </div>
        </div>

        <div class="">
            <button type="submit" class="btn btn-primary btn-block mt-2">{{__('lang.submit')}}</button>
        </div>

    </form>
</div>
@else
<div class="text-danger">{{__('lang.admin.no_medical_specialities')}}</div>
@endif

<script>
    $(document).ready(function(){
        //adding more medicine to the perscreption
        $('#add_medicine').click(function() {
           
           //increment number of medicines
           let medicines_number_input = document.getElementById("medicines_number");
           let number = parseInt(medicines_number_input.value);
           number = number+1;
           medicines_number_input.value = number;
           medicines_number_input.setAttribute("placeholder", number);

           //add cancel medicine div
           let cancel_medicine_btn = document.getElementById('cancel_medicine');
           if(cancel_medicine_btn === null){
                let medicines_title_div = document.getElementById("medicines_title");
                let cancel_medicine_btn = document.createElement('a');
                cancel_medicine_btn.setAttribute('href',"javascript:void(0);");
                cancel_medicine_btn.setAttribute('id',"cancel_medicine");
                cancel_medicine_btn.setAttribute('class',"ml-2 btn btn-danger");
                cancel_medicine_btn.innerHTML="cancel medicine";
                cancel_medicine_btn.onclick = function cancelMedicine(){
                                                let medicines_number_input = document.getElementById("medicines_number");
                                                let number = medicines_number_input.value;
                                                if(parseInt(number) !== 1){
                                                    //let deleted_div = document.getElementById("medicine_row_"+number);
                                                    let deleted_div = document.getElementById("medicines").lastChild;
                                                    let child = deleted_div.lastElementChild; 
                                                    console.log(deleted_div.innerHTML);
                                                    while (child) {
                                                        deleted_div.removeChild(child);
                                                        child = deleted_div.lastElementChild;
                                                    }
                                                    deleted_div.remove();
                                                    number = number-1;
                                                    medicines_number_input.value = number;
                                                    medicines_number_input.setAttribute("placeholder", number);
                                                }
                                            }
                medicines_title_div.appendChild(cancel_medicine_btn);
           }
           //create form div element and add attribute class to it with
           let medicines_parent_div = document.getElementById("medicines");
           let form_div = document.createElement("div");
           form_div.setAttribute("class", "form-row");
           form_div.setAttribute("id", "medicine_row_"+number);

           //create another 3 divs for inputs and add different ids for theme
            let medicine_div = document.createElement("div");
            medicine_div.setAttribute("class", "form-group col-md-6");
            medicine_div.setAttribute("id", "medicine_div");

            let dose_div = document.createElement("div");
            dose_div.setAttribute("class", "form-group col-md-4");
            dose_div.setAttribute("id", "dose_div");

            let duration_div = document.createElement("div");
            duration_div.setAttribute("class", "form-group col-md-2");
            duration_div.setAttribute("id", "duration_div");

           //for each input div, create label and input elements and add their Attributes
            //---------- labels ----------
            let medicine_label = document.createElement("label");
            medicine_label.setAttribute("for", "medicine");
            medicine_label.innerText = "medicine";

            let dose_label = document.createElement("label");
            dose_label.setAttribute("for", "dose");
            dose_label.innerText = "dose";

            let duration_label = document.createElement("label");
            duration_label.setAttribute("for", "duration");
            duration_label.innerText = "duration";

            //-------inputs--------------------------------
            let medicine_input = document.createElement("input");
            medicine_input.setAttribute("type", "text");
            medicine_input.setAttribute("name", "medicine_"+number);
            medicine_input.setAttribute("class", "form-control");
            medicine_input.setAttribute("id", "medicine_"+number);
            medicine_input.setAttribute("placeholder", "medicine");

            let dose_input = document.createElement("input");
            dose_input.setAttribute("type", "text");
            dose_input.setAttribute("name", "dose_"+number);
            dose_input.setAttribute("class", "form-control");
            dose_input.setAttribute("id", "dose_"+number);
            dose_input.setAttribute("placeholder", "dose");

            let duration_input = document.createElement("input");
            duration_input.setAttribute("type", "text");
            duration_input.setAttribute("name", "duration_"+number);
            duration_input.setAttribute("class", "form-control");
            duration_input.setAttribute("id", "duration_"+number);
            duration_input.setAttribute("placeholder", "duration");

           //add label and input elements to the 3 divs
           medicine_div.appendChild(medicine_label);
           medicine_div.appendChild(medicine_input);

           dose_div.appendChild(dose_label);
           dose_div.appendChild(dose_input);

           duration_div.appendChild(duration_label);
           duration_div.appendChild(duration_input);

           //add the 3 divs to the form div
           form_div.appendChild(medicine_div);
           form_div.appendChild(dose_div);
           form_div.appendChild(duration_div);
           medicines_parent_div.appendChild(form_div);
        });


    });
</script>