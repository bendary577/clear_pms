<?php

namespace App\Http\Controllers;

use App\Models\MedicalSpeciality;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\DoctorProfile;
use App\Models\Clinic;
use App\Models\ReceptionistProfile;
use Illuminate\Http\Request;
use App\Charts\SampleChart;
use Charts;
use Carbon\Carbon;

class ReceptionistDashboardController extends Controller
{
       //admin account can return a welcome dashboard view
       public function welcome()
       {
            $now = Carbon::now();
            $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
            $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');

            $weekly_new_patients_count = Patient::whereBetween('created_at', [$weekStartDate, $weekEndDate])->count();
            $weekly_new_appointments_count = Appointment::whereBetween('created_at', [$weekStartDate, $weekEndDate])->where('leaved_at', '=', 'null')->count();
            $weekly_finished_appointments_count = Appointment::whereBetween('created_at', [$weekStartDate, $weekEndDate])->where('leaved_at', '!=', 'null')->count();

            $receptionistsCount = ReceptionistProfile::all()->count();
            $doctorsCount = DoctorProfile::all()->count();
            $clinicsCount = Clinic::all()->count();
            $medicalSpecialitiesCount = MedicalSpeciality::all()->count();
            return view('receptionist.dashboard.dashboard_welcome', [
                'weekly_new_patients_count' => $weekly_new_patients_count,
                'weekly_new_appointments_count' => $weekly_new_appointments_count,
                'weekly_finished_appointments_count' => $weekly_finished_appointments_count,
                'receptionistsCount' => $receptionistsCount,
                'doctorsCount' => $doctorsCount,
                'clinicsCount' => $clinicsCount,
                'medicalSpecialitiesCount' => $medicalSpecialitiesCount,
            ]);
       }

       public function patientsStatistics() 
       {
            $patients_count = Patient::all()->count();
            $men_patients_count = Patient::where('gender', '=', 'male')->count();
            $women_patients_count = Patient::where('gender', '=', 'female')->count();

            $men_patients_percentage = ($men_patients_count/$patients_count)*100;
            $women_patients_percentage = ($women_patients_count/$patients_count)*100;

            return view('receptionist.dashboard.dashboard_patients_statistics', [
                'patients_count' => $patients_count,
                'men_patients_count' => $men_patients_count,
                'women_patients_count' => $women_patients_count,
                'men_patients_percentage' => $men_patients_percentage,
                'women_patients_percentage' => $women_patients_percentage,
            ]);
       }
}
