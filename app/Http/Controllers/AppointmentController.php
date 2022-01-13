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
use App\Models\SystemDiagnoses;
use App\Models\SystemMedicine;
use App\Models\ReceptionistVisit;
use App\Models\DoctorVisit;
use App\Models\ReceptionistProfile;

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
        $appointment->save();
        $appointment->patient()->associate($patient)->save();

        $doctorVisit = new DoctorVisit();
        $doctorVisit->reason = $request['reason'];
        $doctorVisit->clinic()->associate($clinic)->save();
        $doctorVisit->save();
        $doctorVisit->appointment()->save($appointment);

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
        $clinics = Clinic::where('department', 'adults')->with('doctorProfile')->paginate(10);
        return view('receptionist.dashboard.dashboard_udults_clinics_appointments', ['clinics' => $clinics, 'id' => $id]);
    }

    public function getChildrenClinicsAppointments($id)
    {
        $clinics = Clinic::where('department', 'children')->with('doctorProfile')->paginate(10);
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
    
        session()->flash('success', trans('lang.appointment.leaving_time_updated'));
        return redirect('doctor_dashboard/clinic');
    }

    //-------------------------------------------------------------------- rec section ----------------------------------------

    public function listReceptionistVisits(){
        $visits = Appointment::where('visit_type', 'App\Models\ReceptionistVisit')->whereHas('visit', function($query) {
            $query->where('receptionist_id', '=', Auth::user()->profile->id);
        })->paginate(10);
        return view('receptionist.dashboard.dashboard_visits_list', ['visits' => $visits]);
    }

    public function startReceptionistVisitImmediately($patient_id)
    {
        $appointment = new Appointment();
        $appointment->date = Carbon::now()->toDateTimeString();
        $appointment->from = Carbon::now()->toDateTimeString();
        $appointment->to = Carbon::now()->toDateTimeString();
        $appointment->save();
        if(Auth::user()->getHasReceptionistProfileAttribute()){
            $receptionist_profile = Auth::user()->profile;
            $receptionistVisit = new ReceptionistVisit();
            $receptionistVisit->save();
            $receptionistVisit->receptionist()->associate($receptionist_profile)->save();
            $receptionistVisit->appointment()->save($appointment);
        }else{
            return redirect()->back()->with('sorry, you aren\'nt authorized for this action');
        }
        $patient = Patient::where('id', $patient_id)->first();
        $appointment->patient()->associate($patient)->save();

        $system_diagnoses = SystemDiagnoses::all();
        $system_medicines = SystemMedicine::all();
        $system_medicines_names = [];
        foreach ($system_medicines as $system_medicine){
            array_push($system_medicines_names, $system_medicine->name);
        }
        return view('receptionist.dashboard.dashboard_specialist_patient_visit', 
                                                [
                                                    'immediate'=>true, 
                                                    'patient_id' => $patient_id, 
                                                    'appointment_id'=>$appointment->id,
                                                    'system_diagnoses' => $system_diagnoses,
                                                    'system_medicines' => $system_medicines,
                                                    'system_medicines_names' => $system_medicines_names
                                                ]);
    }

    public function startReceptionistVisit($patient_id, $appointment_id)
    {
        $system_diagnoses = SystemDiagnoses::all();
        $system_medicines = SystemMedicine::all();
        $system_medicines_names = [];
        foreach ($system_medicines as $system_medicine){
            array_push($system_medicines_names, $system_medicine->name);
        }
        return view('receptionist.dashboard.dashboard_specialist_patient_visit', 
                                                    [
                                                        'immediate'=>false, 
                                                        'patient_id' => $patient_id, 
                                                        'appointment_id' => $appointment_id, 
                                                        'system_diagnoses' => $system_diagnoses, 
                                                        'system_medicines' => $system_medicines,
                                                        'system_medicines_names' => $system_medicines_names
                                                    ]);
    }

    /*
    public function endReceptionistVisit($appointment_id){
        if(Appointment::where('id', $appointment_id)->exists()){
            dd($appointment_id);
            $appointment = Appointment::where('id', $appointment_id)->first();
            $appointment->leaved_at = Carbon::now()->format('Y-m-d H:i:s');
            $appointment->save();
            session()->flash('success', trans('lang.appointment.leaving_time_updated'));
            return redirect('receptionist_dashboard/patients/list');
        }else{
            session()->flash('success', trans('lang.appointment.leaving_time_updated'));
            return redirect()->back();
        }

    }
    */

    public function reserveReceptionistVisit($patient_id){
        return view('receptionist.dashboard.dashboard_reserve_receptionist_patient_visit', ['patient_id' => $patient_id]);
    }

    public function registerReceptionistVisit(Request $request, $patient_id){
        $validator = Validator::make($request->all(),
        [
            'date' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        if($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        $patient = Patient::find($patient_id);

        $appointment = new Appointment();
        $appointment->date = $request['date'];
        $appointment->from = $request['from'];
        $appointment->to = $request['to'];
        $appointment->save();
        if(Auth::user()->getHasReceptionistProfileAttribute()){
            $receptionist_profile = Auth::user()->profile;
            $receptionistVisit = new ReceptionistVisit();
            $receptionistVisit->receptionist()->associate($receptionist_profile)->save();
            $receptionistVisit->save();
            $receptionistVisit->appointment()->save($appointment);
        }else{
            return redirect()->back()->with('sorry, you aren\'nt authorized for this action');
        }

        $appointment->patient()->associate($patient)->save();

        session()->flash('success', trans('lang.appointment.added'));
        return redirect()->back(); 
    }

}
