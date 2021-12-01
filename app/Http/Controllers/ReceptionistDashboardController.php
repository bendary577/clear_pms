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
use App\Models\SystemMedicine;
use App\Models\SystemDiagnoses;
use App\Models\User;

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
            $now = Carbon::now();
            $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
            $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');

            $lastWeekStartDate = Carbon::now()->subWeek()->startOfWeek()->format('Y-m-d H:i');
            $lastWeekEndDate = Carbon::now()->subWeek()->endOfWeek()->format('Y-m-d H:i');

            $patients = Patient::all();
            $patients_count = count($patients);
            $men_patients_count = Patient::where('gender', '=', 'male')->count();
            $women_patients_count = Patient::where('gender', '=', 'female')->count();
            $patients_ages_sum = 0;
            $patient_ages_count = 0;
            foreach($patients as $patient){
                $patients_ages_sum += $patient->age;
                $patient_ages_count++;
            }
            $patients_ages_average = round($patients_ages_sum / $patient_ages_count);
            $men_patients_percentage = ($men_patients_count/$patients_count)*100;
            $women_patients_percentage = ($women_patients_count/$patients_count)*100;

            $weekly_new_patients_count = Patient::whereBetween('created_at', [$weekStartDate, $weekEndDate])->count();
            $last_week_new_patients_count = Patient::whereBetween('created_at', [$lastWeekStartDate, $lastWeekEndDate])->count();
        
            $weekely_patients_difference = $weekly_new_patients_count - $last_week_new_patients_count;
            $weekly_patients_change_percentage = null;
            if($last_week_new_patients_count != 0){
                $weekly_patients_change_percentage = ($weekely_patients_difference/10)*100 ;
            }else{
                $weekly_patients_change_percentage = ($weekly_new_patients_count/10)*100;
            }
            //dd($weekly_patients_change_percentage);

            return view('receptionist.dashboard.dashboard_patients_statistics', [
                'patients_count' => $patients_count,
                'men_patients_count' => $men_patients_count,
                'women_patients_count' => $women_patients_count,
                'men_patients_percentage' => $men_patients_percentage,
                'women_patients_percentage' => $women_patients_percentage,
                'patients_ages_average' => $patients_ages_average,
                'weekly_new_patients_count' => $weekly_new_patients_count,
                'weekly_patients_change_percentage' => $weekly_patients_change_percentage
            ]);
        }

       public function clinicsStatistics() 
        {
            $now = Carbon::now();
            $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
            $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');
            $lastWeekStartDate = Carbon::now()->subWeek()->startOfWeek()->format('Y-m-d H:i');
            $lastWeekEndDate = Carbon::now()->subWeek()->endOfWeek()->format('Y-m-d H:i');
            //clinics
            $clinics = Clinic::all();
            $clinics_count = count($clinics);
            $adult_clinics_count = Clinic::where('department','=','adults')->count();
            $children_clinics_count = Clinic::where('department','=','children')->count();
            //appointments
            $new_appointments_count = Appointment::where('leaved_at', '=', 'null')->count();
            $finished_appointments_count = Appointment::where('leaved_at', '!=', 'null')->count();
            $weekly_new_appointments_count = Appointment::whereBetween('created_at', [$weekStartDate, $weekEndDate])->where('leaved_at', '=', 'null')->count();
            $weekly_finished_appointments_count = Appointment::whereBetween('created_at', [$weekStartDate, $weekEndDate])->where('leaved_at', '!=', 'null')->count();
            //top clinic
            $clinic_max_appointments_count = -INF;
            $clinic_with_max_appointments = null;
            foreach($clinics as $clinic){
                if(count($clinic->doctorVisits) > $clinic_max_appointments_count){
                    $clinic_max_appointments_count = count($clinic->doctorVisits);
                    $clinic_with_max_appointments = $clinic;
                }
            }
            return view('receptionist.dashboard.dashboard_clinics_statistics', [
                    'clinics_count' => $clinics_count,
                    'adult_clinics_count' => $adult_clinics_count,
                    'children_clinics_count' => $children_clinics_count,
                    'new_appointments_count' => $new_appointments_count,
                    'finished_appointments_count' => $finished_appointments_count,
                    'clinic_with_max_appointments' => $clinic_with_max_appointments,
                    'clinic_max_appointments_count' => $clinic_max_appointments_count,
                    'weekly_new_appointments_count' => $weekly_new_appointments_count,
                    'weekly_finished_appointments_count' => $weekly_finished_appointments_count
            ]);
        }

        public function medicalInsights()
        {
            $medical_specialities = MedicalSpeciality::all();
            $system_diagnoses = SystemDiagnoses::all();
            $system_medicines = SystemMedicine::all();

            $medical_specialities_count = count($medical_specialities);
            $system_diagnoses_count = count($system_diagnoses);
            $system_medicines_count = count($system_medicines);

            return view('receptionist.dashboard.dashboard_medical_insights', [
                'medical_specialities_count' => $medical_specialities_count,
                'system_diagnoses_count' => $system_diagnoses_count,
                'system_medicines_count' => $system_medicines_count
            ]);
        }

        public function systemStatistics()
        {
            $admins_count = User::where('profile_type', '=', 'App\Models\AdminProfile')->where('activated', true)->count();
            $doctors_count = User::where('profile_type', '=', 'App\Models\DoctorProfile')->where('activated', true)->count();
            $receptionists_count = User::where('profile_type', '=', 'App\Models\ReceptionistProfile')->where('activated', true)->count();
            return view('receptionist.dashboard.dashboard_system_statistics', [
                    'admins_count' => $admins_count,
                    'doctors_count' => $doctors_count,
                    'receptionists_count' => $receptionists_count
            ]);
        }
}
