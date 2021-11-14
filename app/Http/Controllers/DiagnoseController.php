<?php

namespace App\Http\Controllers;

use App\Models\Diagnose;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Perscreption;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Models\MedicalSpeciality;
use Illuminate\Support\Facades\Validator;

class DiagnoseController extends Controller
{
    public function index()
    {
        /*
        $diagnoses = Diagnose::paginate(10);
        return view('admin.dashboard.dashboard_medical_specialities', ['medicalSpecialities' => $medicalSpecialities]);
        */
    }


    public function create()
    {
        //return view('admin.dashboard.dashboard_add_medical_speciality');
    }


    public function store(Request $request, $appointment_id)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        $appointment = Appointment::where('id', $appointment_id)->first();
        $patient = Patient::where('id', $appointment->patient->id)->first();
        //save the diagnoses info
        $diagnose = new Diagnose();
        $diagnose->name = $request->get('name');
        $description = $request['description'];
        $protocol = $request['protocol'];

        if($request['specialization']){
            $medical_speciality = MedicalSpeciality::find(intval($request['specialization']));
            $diagnose->medicalSpeciality()->associate($medical_speciality)->save();
        }

        $diagnose->save();
        $patient->diagnoses()->attach($diagnose, ['description' => $description, 'treatment_protocol' => $protocol]);

        if($request['medicines_number']){
            //save the perscreption info
            $perscreption = new Perscreption();
            $perscreption->save();
            $appointment->perscreption()->save($perscreption);
            $perscreption->appointment()->associate($appointment)->save();
            $medicines_number = $request['medicines_number'];
            for($medicines_counter = 1; $medicines_counter <= $medicines_number; $medicines_counter++){
                $medicine = new Medicine();
                $medicine->name = $request['medicine_'.$medicines_counter];
                $medicine->dose = $request['dose_'.$medicines_counter];
                $medicine->duration = $request['duration_'.$medicines_counter];
                $medicine->save();
                $perscreption->medicines()->save($medicine);
                $medicine->perscreption()->associate($perscreption)->save();
            }
        }

        session()->flash('success', 'diagnose added succesfuly');
        return redirect()->back();   
        
    }


    public function show(MedicalSpeciality $medicalSpeciality)
    {
        //
    }


    public function edit($id)
    {
        /*
        $medicalSpeciality = medicalSpeciality::find($id);
        return view('admin.dashboard.dashboard_update_medical_speciality', ['medicalSpeciality' => $medicalSpeciality]);
        */
    }


    public function update(Request $request, $id)
    {
        /*
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:200',
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        $medicalSpeciality = medicalSpeciality::find($id);

        if($request['name']){
            $medicalSpeciality->name = $request['name'];
        }

        $medicalSpeciality->save();

        session()->flash('success', 'medical speciality profile updated succesfuly');
        return redirect()->back(); 
        */
    }


    public function destroy($id)
    {
        /*
        if(MedicalSpeciality::where('id', $id)->exists()) {
            $medicalSpeciality = MedicalSpeciality::find($id);
            $medicalSpeciality->delete();
            session()->flash('success', 'medical speciality deleted succesfuly');
            return redirect()->back(); 
        }else{
            session()->flash('error', 'medical speciality receptionist profile');
            return redirect()->back(); 
        }
        */
    }
}
