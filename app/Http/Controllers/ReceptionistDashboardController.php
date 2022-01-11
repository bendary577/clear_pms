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
use Carbon\Carbon;
use App\Models\SystemMedicine;
use App\Models\SystemDiagnoses;
use App\Models\User;
use DateTime;
use Date;
use Charts;
use DateTimeZone;

class ReceptionistDashboardController extends Controller
{
       /* ------------------------------------------------- welcome ----------------------------------------------- */
       public function welcome()
        {
            $weekStartDate =  Carbon::now()->startOfWeek()->format('Y-m-d H:i:s');
            $weekEndDate =  Carbon::now()->endOfWeek()->format('Y-m-d H:i:s');

            $monthStartDate =  Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
            $monthEndDate =  Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

            $previousStartMonthDate = Carbon::now()->subDays(30)->startOfMonth()->format('Y-m-d H:i:s');
            $previousEndMonthDate = Carbon::now()->subDays(30)->endOfMonth()->format('Y-m-d H:i:s');

            $yearStartDate = new DateTime('first day of january '.date('Y'), new DateTimeZone('America/New_York'));
            $yearStartDate = $yearStartDate->format('Y-m-d H:i:s');

            $weekly_new_patients_count = Patient::whereBetween('created_at', [$weekStartDate, $weekEndDate])->count();
            $weekly_new_appointments_count = Appointment::whereBetween('created_at', [$weekStartDate, $weekEndDate])->where('leaved_at', '=', null)->count();
            $weekly_finished_appointments_count = Appointment::whereBetween('created_at', [$weekStartDate, $weekEndDate])->where('leaved_at', '!=', null)->count();

            $monthly_new_patients_count = Patient::whereBetween('created_at', [$monthStartDate, $monthEndDate])->count();
            $monthly_new_appointments_count = Appointment::whereBetween('created_at', [$monthStartDate, $monthEndDate])->where('leaved_at', '=', null)->count();
            $monthly_finished_appointments_count = Appointment::whereBetween('created_at', [$monthStartDate, $monthEndDate])->where('leaved_at', '!=', null)->count();

            $yearly_new_patients_count = Patient::whereBetween('created_at', [$yearStartDate, Carbon::now()])->count();
            $yearly_new_appointments_count = Appointment::whereBetween('created_at', [$yearStartDate, Carbon::now()])->where('leaved_at', '=', null)->count();
            $yearly_finished_appointments_count = Appointment::whereBetween('created_at', [$yearStartDate, Carbon::now()])->where('leaved_at', '!=', null)->count();

            //------------------- receptionists change percentage -------------------
            $receptionistsCount = ReceptionistProfile::all()->count();
            $receptionistsCount_last_month = ReceptionistProfile::whereBetween('created_at', [$previousStartMonthDate, $previousEndMonthDate])->count();
            $receptionists_percent = $this->calculatePercentageOfChange($receptionistsCount_last_month, $receptionistsCount);

            //------------------- doctors change percentages ---------------------
            $doctorsCount = DoctorProfile::all()->count();
            $doctorsCount_last_month = DoctorProfile::whereBetween('created_at', [$previousStartMonthDate, $previousEndMonthDate])->count();
            $doctors_percent = $this->calculatePercentageOfChange($doctorsCount_last_month, $doctorsCount);

            //------------------ clinics change percentages ---------------------
            $clinicsCount = Clinic::all()->count();
            $clinicsCount_last_month = Clinic::whereBetween('created_at', [$previousStartMonthDate, $previousEndMonthDate])->count();
            $clinics_percent = $this->calculatePercentageOfChange($clinicsCount_last_month, $clinicsCount);

            //------------------ medical specialities percentages ---------------------
            $medicalSpecialitiesCount = MedicalSpeciality::all()->count();
            $medicalSpecialities_last_month = MedicalSpeciality::whereBetween('created_at', [$previousStartMonthDate, $previousEndMonthDate])->count();
            $medicalSpecialities_percent = $this->calculatePercentageOfChange($medicalSpecialities_last_month, $medicalSpecialitiesCount);

            return view('receptionist.dashboard.dashboard_welcome', [
                'weekly_new_patients_count' => $weekly_new_patients_count,
                'weekly_new_appointments_count' => $weekly_new_appointments_count,
                'weekly_finished_appointments_count' => $weekly_finished_appointments_count,
                'monthly_new_patients_count' => $monthly_new_patients_count,
                'monthly_new_appointments_count' => $monthly_new_appointments_count,
                'monthly_finished_appointments_count' => $monthly_finished_appointments_count,
                'yearly_new_patients_count' => $yearly_new_patients_count,
                'yearly_new_appointments_count' => $yearly_new_appointments_count,
                'yearly_finished_appointments_count' => $yearly_finished_appointments_count,
                'receptionistsCount' => $receptionistsCount,
                'receptionistsPercent' => $receptionists_percent,
                'doctorsCount' => $doctorsCount,
                'doctorsPercent' => $doctors_percent,
                'clinicsCount' => $clinicsCount,
                'clinicsPercent' => $clinics_percent,
                'medicalSpecialitiesCount' => $medicalSpecialitiesCount,
                'medicalSpecialitiesPercent' => $medicalSpecialities_percent
            ]);
        }

       /* ------------------------------------------------- patient statistics -------------------------------------- */
       public function patientsStatistics() 
        {
            $weekStartDate =Carbon::now()->startOfWeek()->format('Y-m-d H:i');
            $weekEndDate = Carbon::now()->endOfWeek()->format('Y-m-d H:i');

            $lastWeekStartDate = Carbon::now()->subWeek()->startOfWeek()->format('Y-m-d H:i');
            $lastWeekEndDate = Carbon::now()->subWeek()->endOfWeek()->format('Y-m-d H:i');

            $patients_count = Patient::all()->count();
            $men_patients_count = Patient::where('gender', '=', 'male')->count();
            $women_patients_count = Patient::where('gender', '=', 'female')->count();

            //calculate average age of patients
            $patients_ages = Patient::all('age');
            $patients_ages_sum = 0;
            $patient_ages_count = 0;
            $patients_ages_average = 0;

            foreach($patients_ages as $patient_age){
                $patients_ages_sum += intval($patient_age->age);
                $patient_ages_count++;
            }

            if($patient_ages_count > 0){
                $patients_ages_average = round($patients_ages_sum / $patient_ages_count);
            }
            
            //calculate percentages of men and women patients
            $men_patients_percentage = ($men_patients_count/$patients_count)*100;
            $women_patients_percentage = ($women_patients_count/$patients_count)*100;

            //calculate percentage of change of incomming new patients weekely
            $current_week_new_patients_count = Patient::whereBetween('created_at', [$weekStartDate, $weekEndDate])->count();
            $last_week_new_patients_count = Patient::whereBetween('created_at', [$lastWeekStartDate, $lastWeekEndDate])->count();
            $weekly_patients_change_percentage = $this->calculatePercentageOfChange($last_week_new_patients_count, $current_week_new_patients_count);

            return view('receptionist.dashboard.dashboard_patients_statistics', [
                'patients_count' => $patients_count,
                'men_patients_count' => $men_patients_count,
                'women_patients_count' => $women_patients_count,
                'men_patients_percentage' => $men_patients_percentage,
                'women_patients_percentage' => $women_patients_percentage,
                'patients_ages_average' => $patients_ages_average,
                'weekly_new_patients_count' => $current_week_new_patients_count,
                'weekly_patients_change_percentage' => $weekly_patients_change_percentage
            ]);
        }

       /* ------------------------------------------------- clinics statistics -------------------------------------- */
       public function clinicsStatistics() 
        {
            $weekStartDate =Carbon::now()->startOfWeek()->format('Y-m-d H:i');
            $weekEndDate = Carbon::now()->endOfWeek()->format('Y-m-d H:i');
            $lastWeekStartDate = Carbon::now()->subWeek()->startOfWeek()->format('Y-m-d H:i');
            $lastWeekEndDate = Carbon::now()->subWeek()->endOfWeek()->format('Y-m-d H:i');
            //clinics
            $clinics = Clinic::all();
            $clinics_count = count($clinics);
            $adult_clinics_count = Clinic::where('department','=','adults')->count();
            $children_clinics_count = Clinic::where('department','=','children')->count();
            //appointments
            $new_appointments_count = Appointment::where('leaved_at', '=', null)->count();
            $finished_appointments_count = Appointment::where('leaved_at', '!=', null)->count();
            $weekly_new_appointments_count = Appointment::whereBetween('created_at', [$weekStartDate, $weekEndDate])->where('leaved_at', '=', null)->count();
            $weekly_finished_appointments_count = Appointment::whereBetween('created_at', [$weekStartDate, $weekEndDate])->where('leaved_at', '!=', null)->count();
            //top clinic
            $clinic_max_appointments_count = 0;
            $clinic_with_max_appointments = null;
            if($clinics_count > 0){
                foreach($clinics as $clinic){
                    if(count($clinic->doctorVisits) > $clinic_max_appointments_count){
                        $clinic_max_appointments_count = count($clinic->doctorVisits);
                        $clinic_with_max_appointments = $clinic;
                    }
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

        /* ------------------------------------------------- medical insights -------------------------------------- */
        public function medicalInsights()
        {
            $medical_specialities_count = MedicalSpeciality::all()->count();
            $system_diagnoses_count = SystemDiagnoses::all()->count();
            $system_medicines_count = SystemMedicine::all()->count();

            return view('receptionist.dashboard.dashboard_medical_insights', [
                'medical_specialities_count' => $medical_specialities_count,
                'system_diagnoses_count' => $system_diagnoses_count,
                'system_medicines_count' => $system_medicines_count
            ]);
        }

        /* ------------------------------------------------- system statistics -------------------------------------- */
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

        /* ------------------------------------------------- calculate percentage of change -------------------------------------- */
        public function calculatePercentageOfChange($past_value, $current_value) 
        {
            $percent = 100;
            if($past_value < $current_value){
                if($past_value > 0){
                    $past_value_percent_from = $current_value - $past_value;
                    $percent = $past_value_percent_from / $past_value * 100; //increase percent
                }
            }else if($past_value == $current_value){    
                $percent = 0;
            }else{
                if($past_value > 0){
                    $past_value_percent_from = $past_value - $current_value;
                    $percent = $past_value_percent_from / $past_value * 100; //decrease percent
                }
            }
            return $percent;
        }
}
