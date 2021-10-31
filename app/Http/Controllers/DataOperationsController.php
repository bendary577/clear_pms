<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DataOperations;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PatientsImport;
use Illuminate\Support\Facades\Validator;

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

        $file = $request->file('excel_file');

        Excel::import(new PatientsImport, $file);
        session()->flash('success', trans('lang.rec.import_data_success'));
        return redirect()->back();   
    }

}
