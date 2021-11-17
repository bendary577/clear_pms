<?php

namespace App\Http\Controllers;

use App\Models\MedicalSpeciality;
use App\Models\DoctorProfile;
use App\Models\Clinic;
use App\Models\ReceptionistProfile;
use Illuminate\Http\Request;
use App\Charts\SampleChart;
use Charts;

class ReceptionistDashboardController extends Controller
{
       //admin account can return a welcome dashboard view
       public function welcome()
       {
           //get number of receptionists
           $receptionistsCount = ReceptionistProfile::all()->count();
           //get number of doctors
           $doctorsCount = DoctorProfile::all()->count();
           //get number of clinics
           $clinicsCount = Clinic::all()->count();
           //get number of meical specialities
           $medicalSpecialitiesCount = MedicalSpeciality::all()->count();
           return view('receptionist.dashboard.dashboard_welcome', [
               'receptionistsCount' => $receptionistsCount,
               'doctorsCount' => $doctorsCount,
               'clinicsCount' => $clinicsCount,
               'medicalSpecialitiesCount' => $medicalSpecialitiesCount,
           ]);
       }
}
