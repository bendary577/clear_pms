<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppointmentController extends Controller
{

    public function index()
    {
        return view('receptionist.dashboard.dashboard_appointments');
    }


    public function create($id)
    {
        return view('receptionist.dashboard.dashboard_new_appointment', ['id' => $id]);
    }


    public function store(Request $request, $clinicId, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'date' => 'required',
            'from' => 'required',
            'to' => 'required',
            'reason' => 'required',
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        $clinic = Clinic::find($clinicId);
        $patient = Patient::find($id);

        $appointment = new Appointment();
        $appointment->date = $request['date'];
        $appointment->from = $request['from'];
        $appointment->to = $request['to'];
        $appointment->reason = $request['reason'];

        $appointment->save();
        
        $appointment->clinic()->associate($clinic)->save();
        $appointment->patient()->associate($patient)->save();


        session()->flash('success', trans('lang.appointment.added'));
        return redirect()->back();  
    }


    public function show(Appointment $appointment)
    {
        //
    }


    public function edit(Appointment $appointment)
    {
        //
    }


    public function update(Request $request, $id)
    {
        
    }


    public function destroy(Appointment $appointment)
    {
        //
    }

    public function getAdultsClinicsAppointments($id)
    {
        $clinics = Clinic::where('department', 'adults')->with('doctorProfile')->get();
        return view('receptionist.dashboard.dashboard_udults_clinics_appointments', ['clinics' => $clinics, 'id' => $id]);
    }

    public function getChildrenClinicsAppointments($id)
    {
        $clinics = Clinic::where('department', 'children')->with('doctorProfile')->get();
        return view('receptionist.dashboard.dashboard_children_clinics_appointments', ['clinics' => $clinics, 'id' => $id]);
    }

    public function getAppointmentForm($clinicId, $id)
    {
        return view('receptionist.dashboard.dashboard_add_appointment', ['id'=>$id, 'clinicId' => $clinicId]);
    }

    public function registerPatientLeavingTime($appointment_id)
    {
        $appointment = Appointment::find($appointment_id);
        $appointment->leaved_at = Carbon::now()->toDateTimeString();

        $appointment->save();
    
        session()->flash('success', "appointment leaving time updated successfully");
        return redirect('doctor_dashboard/clinic');
    }
}
