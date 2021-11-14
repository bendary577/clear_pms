<?php

namespace App\Http\Controllers;

use App\Models\SystemDiagnoses;
use Illuminate\Http\Request;

class SystemDiagnosesController extends Controller
{
    public function index()
    {
        //
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

    public function edit(SystemDiagnoses $systemDiagnoses)
    {
        //
    }

    public function update(Request $request, SystemDiagnoses $systemDiagnoses)
    {
        //
    }

    public function destroy(SystemDiagnoses $systemDiagnoses)
    {
        //
    }
}
