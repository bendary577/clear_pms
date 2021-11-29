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

        $appointment = Appointment::where('id', $appointment_id)->first();
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

        session()->flash('success', 'perscreption added succesfuly');
        return redirect()->back();   
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
