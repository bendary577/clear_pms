<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DataOperations;
use App\Models\Patient;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PatientsImport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DataOperationsController extends Controller
{

    public function getImportExcelView(){
        return view('receptionist.dashboard.dashboard_import_excel');
    }

    public function importExcel(Request $request){

        $validator = Validator::make($request->all(),
        [
            //'name' => 'required|mimes:xlsx,xls',
        ]);
        
        if ($validator->fails()){
            return  redirect()->back()->withErrors($validator)->withInput();   
        }

        if ($request->hasfile('excel_file')){
            $file = $request->file('excel_file');
            $path = $file->getRealPath();
            $data = Excel::toArray(new PatientsImport, $file->store('temp'));
            if(!empty($data) && count($data)){
                $arrays_counter = 0;
                $patient = new Patient();
                foreach ($data[0][$arrays_counter] as $key => $value) {
                    Patient::create([
                        'name' => $value,
                        'phone' => $value,
                        'age' => $value,
                        'code' => $value,
                        'gender' =>$value,
                        'birthdate' => date("Y-m-d H:i:s", strtotime($value)),
                        'attendance_date' => date("Y-m-d H:i:s", strtotime($value)),
                    ]);
                    $arrays_counter++;
                }
                $patient->save();
            }
        }
           /*
            Excel::import(new PatientsImport, $file);
    
            $patients = Excel::toArray(new PatientsImport(), $file);
    
    
            foreach($patients[0] as $row) {
                dd($row[1]);
                $patients_row_arr[] = [
                    'name'  => $row['name'],
                    'phone' => $row['phone'],
                    'age' => $row['age'],
                    'code' => $row['code'],
                    'gender' => $row['gender'],
                    'birthdate' => $row['birthdate'],
                    'attendance_date' => $row['attendance_date'],
                ];
            }
    
            if(!empty($patients_row_arr)){
                DB::table('patients')->insert($patients_row_arr);
            }
            */
    
            session()->flash('success', trans('lang.rec.import_data_success'));
            return redirect()->back();   

            /*
            }else{
                session()->flash('error', trans('lang.rec.please_import_file'));
                return redirect()->back(); 
            }
            */
        }
}
