<?php

namespace App\Http\Controllers;

use App\Models\SystemMedicine;
use Illuminate\Http\Request;

class SystemMedicineController extends Controller
{
    public function index()
    {
        $system_medicines = SystemMedicine::paginate(10);
        return view('receptionist.dashboard.dashboard_system_medicines_list', ['system_medicines' => $system_medicines]);
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

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        return view('receptionist.dashboard.dashboard_update_medicine', ['id' => $id]);
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
        $medicine = SystemMedicine::where('id', $id)->first();
        if($request['name']){
            $medicine->name = $request['name'];
        }
        $medicine->save();
        session()->flash('success', 'system medicine updated succesfuly');
        return redirect()->back(); 
    }

    public function delete($id)
    {
        if(SystemMedicine::where('id', $id)->exists()) {
            $system_medicine = SystemMedicine::find($id);
            $system_medicine->delete();
            session()->flash('success', trans('lang.user_deleted'));
            return redirect()->back(); 
        }else{
            session()->flash('error', trans('lang.no_user'));
            return redirect()->back(); 
        }
    }
}
