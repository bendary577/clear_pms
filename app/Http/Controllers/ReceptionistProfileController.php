<?php

namespace App\Http\Controllers;

use App\Models\ReceptionistProfile;
use App\Models\SystemDiagnoses;
use App\Models\SystemMedicine;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceptionistProfileController extends Controller
{

    public function index()
    {
        $receptionists = User::where('profile_type', '=', 'App\Models\ReceptionistProfile')->where('activated', true)->paginate(10);
        return view('admin.dashboard.dashboard_receptionists', ['receptionists' => $receptionists]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit()
    {
        return view('profile.dashboard.dashboard_receptionist_edit_profile');
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'nullable',
            'shift_start' => 'nullable',
            'shift_end' => 'nullable',
            'about' => 'nullable'
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        $id = Auth::user()->id;
        $receptionist = User::find($id);

        if($request['name']){
            $receptionist->name = $request['name'];
        }

        if($request['image']){
            $imageName = $request->image->getClientOriginalName();
            $path = '/avatars/'.'/'.$receptionist->id.'/';
            $request->image->move(public_path().$path, $imageName);
            $receptionist->avatar_path = $path.$imageName;
        }

        if($request['phone']){
            $receptionist->phone = $request['phone'];
        }

        if($request['shift_start']){
            $receptionist->profile->shift_start = $request['shift_start'];
        }

        if($request['shift_end']){
            $receptionist->profile->shift_end = $request['shift_end'];
        }

        if($request['about']){
            $receptionist->about = $request['about'];
        }

        $receptionist->save();
        $receptionist->profile->save();

        session()->flash('success', trans('lang.rec.profile_updated'));
        return redirect()->back();   
    }


    public function destroy($id)
    {
        if(ReceptionistProfile::where('id', $id)->exists()) {
            $receptionist = ReceptionistProfile::find($id);
            $receptionist->user->delete();
            $receptionist->delete();
            session()->flash('success', trans('lang.rec.profile_deleted'));
            return redirect()->back(); 
        }else{
            session()->flash('error', trans('lang.rec.error_deleting_profile'));
            return redirect()->back(); 
        }
    }

    public function welcome()
    {
        return view('receptionist.dashboard.dashboard_welcome');
    }

}
