<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\TransactionsExport;
use App\Imports\TransactionsImport;
use App\Models\DataOperations;


class DataOperationsController extends Controller
{
    //

    public function getImportExcelView(){
        return view('receptionist.dashboard.dashboard_import_excel');
    }

    public function importExcel(Request $request){
        \Excel::import(new DataOperations,$request->import_file);
        session()->flash('success', trans('lang.rec.import_data_success'));
        return redirect()->back();   
    }



}
