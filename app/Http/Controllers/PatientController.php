<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Medicine;
use App\Models\Diagnose;
use App\Models\Appointment;
use App\Models\MedicalSpeciality;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{

    public function index()
    {
        $patients = Patient::paginate(10);
        return view('admin.dashboard.dashboard_medical_specialities', ['patient' => $patients]);
    }


    public function create()
    {
        return view('receptionist.dashboard.dashboard_patients_add');
    }


    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:200',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        $patient = new Patient();
        $patient->name = $request['name'];
        $patient->code = $patient->generateCode();
        $patient->phone = $request['phone'];
        $patient->age = $request['age'];
        $patient->gender = $request['gender'];
        $patient->birthdate = $request['birthdate'];
        $patient->attendance_date = Carbon::now();

        if($request->image){
            $imageName = $request->image->getClientOriginalName();
            $path = '/patients_cards/'.date('Y-m-d').'/'.$patient->name.'/';
            $request->image->move(public_path().$path, $imageName);
            $patient->card_image_path = $path.$imageName;  
        }
        
        $patient->save();
        /*
        $medicine = new Medicine();
        $medicine->name="dawaa";
        $medicine->save();
        $patient->medicines()->attach($medicine);
        */
        
        session()->flash('success', trans('lang.patient_profile_added', ['code' => $patient->code]));
        return redirect()->back();   
    }


    public function show($id)
    {
        $patient = Patient::find($id);
        $medical_specialities = MedicalSpeciality::all();
        $diagnoses = Diagnose::all();
        return view('receptionist.dashboard.dashboard_patient_file', ['patient' => $patient,'medical_specialities' => $medical_specialities,'diagnoses' => $diagnoses]);
    }


    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('receptionist.dashboard.dashboard_patient_update_profile', ['patient' => $patient]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:200',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'string',
            'age' => '',
            'birthdate' => ''
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        $patient = Patient::find($id);

        if($request['name']){
            $patient->name = $request['name'];
        }

        if($request['age']){
            $patient->age = $request['age'];
        }

        if($request['phone']){
            $patient->phone = $request['phone'];
        }

        if($request['birthdate']){
            $patient->birthdate = $request['birthdate'];
        }

        if($request['image']){
            $imageName = $request->image->getClientOriginalName();
            $path = '/patients_cards/'.date('Y-m-d').'/'.$patient->name.'/';
            $request->image->move(public_path().$path, $imageName);
            $patient->card_image_path = $path.$imageName;
        }

        $patient->save();

        session()->flash('success', trans('lang.patient_profile_updated'));
        return redirect()->back();  
    }


    public function destroy($id)
    {
        if(Patient::where('id', $id)->exists()) {
            $patient = Patient::find($id);
            $patient->delete();
            session()->flash('success', trans('lang.patient_profile_deleted'));
            return redirect()->back(); 
        }else{
            session()->flash('error', 'user not found');
            return redirect()->back(); 
        }
    }


    public function downloadPatientCard($id){
        $patient = Patient::find($id);
        return response()->download(public_path().$patient->card_image_path);
    }

    public function downloadPatientSheet($id){
        $patient = Patient::find($id);
        return response()->download(public_path().$patient->sheet_image_path);
    }

    public function getClinicPatients($clinicId){
        return view('doctor.dashboard.dashboard_clinic_patients');
    }

    public function getPatientFileHistory($id){
        $appointment = Appointment::where('id', $id)->first();
        $patient = Patient::where('id', $appointment->patient->id)->first();
        if($patient) {
            $medical_specialities = MedicalSpeciality::all();
            $diagnoses = Diagnose::all();
            $add_diagnose_form = view('doctor.sections.add_diagnose', ['medical_specialities' => $medical_specialities, 'patient' => $patient])->render();
            return view('doctor.dashboard.dashboard_patient_file', ['patient' => $patient, 'diagnoses' => $diagnoses, 'medical_specialities' => $medical_specialities, 'appointment'=>$appointment, 'add_diagnose_form' => $add_diagnose_form ]);
        }else{
            session()->flash('error', trans('lang.no_patient'));
            return redirect()->back(); 
        }
    }

    public function indexReceptionist()
    {
        $patients = Patient::paginate(10);
        return view('receptionist.dashboard.dashboard_patients', ['patient' => $patients]);
    }

      // Generate PDF
    public function createPDFFile($id)
    {
        // retreive all records from db
        $data = Patient::find($id);
  
        // share data to view
        view()->share('employee',$data);
        //$pdf = PDF::loadView('pdf_view', $data);
  
        // download PDF file with download method
        //return $pdf->download('pdf_file.pdf');
    }
    
}
