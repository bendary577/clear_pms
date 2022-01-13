<?php

namespace App\Http\Controllers;

use App\Models\Perscreption;
use Illuminate\Http\Request;
use App\Models\Diagnose;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Medicine;
use App\Models\MedicalSpeciality;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PerscreptionController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request, $appointment_id)
    {
        $validator = Validator::make($request->all(),
        [
            'diagnose_name' => 'required',
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        if(Appointment::where('id', $appointment_id)->exists()){
            $appointment = Appointment::where('id', $appointment_id)->first();
            $appointment->leaved_at = Carbon::now()->format('Y-m-d H:i:s');
            $appointment->save();

            $perscreption = new Perscreption();

            //save the diagnoses info
            $diagnose = new Diagnose();
            $diagnose->name = $request['diagnose_name'];
    
            if($request['description']){
            $diagnose->description = $request->get('description');
            }
            
            if($request['treatment_protocol']){
            $diagnose->treatment_protocol = $request->get('treatment_protocol');
            }
    
            $diagnose->save();
            $perscreption->save();
    
            $perscreption->diagnose()->save($diagnose);
            $diagnose->perscreption()->associate($perscreption)->save();
    
            if($request['medicines_number']){
                //save the perscreption info
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
    
            $appointment->perscreption()->save($perscreption);
            $perscreption->appointment()->associate($appointment)->save();
    
            session()->flash('success', 'appointment saved and perscreption added succesfuly');
            return redirect()->route('receptionist.patients.patient.file', ['id' => $appointment->patient->id]); 
        }else{
            session()->flash('error', 'no appointment registered with this id');
            return redirect()->route('receptionist.patients.patient.file', ['id' => $appointment->patient->id]);
        }        
    }


    public function show($appointment_id)
    {
        $perscreption = Perscreption::where('appointment_id', $appointment_id)->first();
        return view('receptionist.dashboard.dashboard_appointment_perscreptions', ['perscreption' => $perscreption]);
    }


    public function edit(Perscreption $perscreption)
    {
        //
    }


    public function update(Request $request, Perscreption $perscreption)
    {
        //
    }


    public function destroy(Perscreption $perscreption)
    {
        //
    }
}
