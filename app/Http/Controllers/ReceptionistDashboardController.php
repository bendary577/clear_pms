<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SampleChart;
use Charts;

class ReceptionistDashboardController extends Controller
{
       //admin account can return a welcome dashboard view
       public function welcome()
       {
           //doughnut
           $borderColors = [
               "rgba(255, 99, 132, 1.0)",
               "rgba(22,160,133, 1.0)",
               "rgba(255, 205, 86, 1.0)",
               "rgba(51,105,232, 1.0)",
               "rgba(244,67,54, 1.0)",
               "rgba(34,198,246, 1.0)",
               "rgba(153, 102, 255, 1.0)",
               "rgba(255, 159, 64, 1.0)",
               "rgba(233,30,99, 1.0)",
               "rgba(205,220,57, 1.0)"
           ];
           $fillColors = [
               "rgba(255, 99, 132, 0.2)",
               "rgba(22,160,133, 0.2)",
               "rgba(255, 205, 86, 0.2)",
               "rgba(51,105,232, 0.2)",
               "rgba(244,67,54, 0.2)",
               "rgba(34,198,246, 0.2)",
               "rgba(153, 102, 255, 0.2)",
               "rgba(255, 159, 64, 0.2)",
               "rgba(233,30,99, 0.2)",
               "rgba(205,220,57, 0.2)"
   
           ];
           $usersChart = new SampleChart;
           $usersChart->minimalist(true);
           $usersChart->labels(['Jan', 'Feb', 'Mar']);
           $usersChart->dataset('Users by trimester', 'doughnut', [10, 25, 13])
               ->color($borderColors)
               ->backgroundcolor($fillColors);
   
           //get receptionists chart
           $receptionistsChart = new AdminViewReceptionistsChart;
           $receptionistsChart->labels(['Jan', 'Feb', 'Mar']);
           $receptionistsChart->dataset('Users by trimester', 'line', [10, 25, 13])
           ->color("rgb(255, 99, 132)")
           ->backgroundcolor("rgb(255, 99, 132)");
           //get number of receptionists
           $receptionistsCount = ReceptionistProfile::all()->count();
           //get number of doctors
           $doctorsCount = DoctorProfile::all()->count();
           //get number of clinics
           $clinicsCount = Clinic::all()->count();
           //get number of meical specialities
           $medicalSpecialitiesCount = MedicalSpeciality::all()->count();
           return view('receptionist.dashboard.dashboard_welcome', [
               'usersChart' => $usersChart,
               'receptionistsChart' => $receptionistsChart,
               'receptionistsCount' => $receptionistsCount,
               'doctorsCount' => $doctorsCount,
               'clinicsCount' => $clinicsCount,
               'medicalSpecialitiesCount' => $medicalSpecialitiesCount,
           ]);
       }
}
