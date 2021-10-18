<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{

    public function uploadPatientMedicalFiles(Request $request, $id){
        
        $validator = Validator::make($request->all(),
        [
            'patient_file' => 'required',
            'patient_file.*' => 'mimes:csv,txt,xlx,xls,pdf'
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }
        
        $patient = Patient::find($id);
     
        if($request->hasfile('patient_file')){
            foreach($request->file('patient_file') as $key => $file){
                $patient_file = new File();
                $file_name = $file->getClientOriginalName();
                $patient_file->name = $file_name;
                $patient_file->extension = $file->extension();
                $path = '/patients/'.date('Y-m-d').'/'.$patient->id.'/';
                $file->move(public_path().$path, $file_name);
                $patient_file->path = $path.$file_name;
                $patient_file->save();
            }
        }
        return redirect()->back()->with('success', 'Files has been uploaded Successfully');
    }
  
}
