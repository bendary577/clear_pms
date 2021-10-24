<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{

    public function uploadPatientMedicalFiles(Request $request, $id){
        
        /*
        $validator = Validator::make($request->all(),
        [
            'patient_files' => 'required',
            'patient_files.*' => 'mimes:csv,txt,xlx,xls,pdf'
        ]);

        $validator = Validator::make($request->all(),
        [
            'sheet_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }
        */
        
        $patient = Patient::find($id);
        //uploading patient medical files
        if($request->has("patient_files")){
            if($request->hasfile('patient_files')){
                foreach($request->file('patient_files') as $file){
                    $patient_file = new File();
                    $file_name = $file->getClientOriginalName();
                    $patient_file->name = $file_name;
                    $patient_file->extension = $file->extension();
                    $path = '/patients/'.date('Y-m-d').'/'.$patient->id.'/';
                    $file->move(public_path().$path, $file_name);
                    $patient_file->path = $path.$file_name;
                    $patient_file->save();
                    $patient_file->patient()->associate($patient)->save();
                }
                return redirect()->back()->with('success', 'Files has been uploaded Successfully');
            }
            return redirect()->back()->with('error', 'please provide a valid file');
        //uploading patient sheet file
        }else if($request->has("patient_sheet")){
            $imageName = $request->sheet_image->getClientOriginalName();
            $path = '/patients_sheets/'.date('Y-m-d').'/'.$patient->name.'/';
            $request->sheet_image->move(public_path().$path, $imageName);
            $patient->sheet_image_path = $path.$imageName;
            $patient->save();

            session()->flash('success', trans('lang.patient_sheet_uploaded'));
            return redirect()->back(); 
        }

    }
  
}
