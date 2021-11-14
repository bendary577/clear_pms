<?php

namespace App\Http\Controllers;

use App\Models\SystemMedicine;
use Illuminate\Http\Request;

class SystemMedicineController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('receptionist.dashboard.dashboard_add_medicine');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:200',
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        $medicine = new SystemMedicine();
        $medicine->name = $request['name'];
        $medicine->save();

        session()->flash('success', 'system medicine added succesfuly');
        return redirect()->back();  
    }

    public function show(SystemMedicine $systemMedicine)
    {
        //
    }

    public function edit(SystemMedicine $systemMedicine)
    {
        //
    }

    public function update(Request $request, SystemMedicine $systemMedicine)
    {
        //
    }

    public function destroy(SystemMedicine $systemMedicine)
    {
        //
    }
}
