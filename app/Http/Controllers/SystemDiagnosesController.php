<?php

namespace App\Http\Controllers;

use App\Models\SystemDiagnoses;
use Illuminate\Http\Request;

class SystemDiagnosesController extends Controller
{
    public function index()
    {
        $system_diagnoses = SystemDiagnoses::paginate(10);
        return view('receptionist.dashboard.dashboard_system_diagnoses_list', ['system_diagnoses' => $system_diagnoses]);
    }

    public function create()
    {
        return view('receptionist.dashboard.dashboard_add_diagnose');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
        ]);
        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }
        $diagnose = new SystemDiagnoses();
        $diagnose->name = $request->get('name');
        $diagnose->save();
        session()->flash('success', 'system diagnose added succesfuly');
        return redirect()->back();    
    }

    public function show(SystemDiagnoses $systemDiagnoses)
    {
        //
    }

    public function edit($id)
    {
        return view('receptionist.dashboard.dashboard_update_diagnose', ['id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:200',
        ]);
        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }
        $diagnose = SystemDiagnoses::where('id', $id)->first();
        if($request['name']){
            $diagnose->name = $request['name'];
        }
        $diagnose->save();
        session()->flash('success', 'system diagnose updated succesfuly');
        return redirect()->back(); 
    }

    public function destroy(SystemDiagnoses $systemDiagnoses)
    {
        if(SystemDiagnoses::where('id', $id)->exists()) {
            $system_diagnose = SystemDiagnoses::find($id);
            $system_diagnose->delete();
            session()->flash('success', trans('lang.user_deleted'));
            return redirect()->back(); 
        }else{
            session()->flash('error', trans('lang.no_user'));
            return redirect()->back(); 
        }
    }
}
