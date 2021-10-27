<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    //trans('lang.forgotPassword.sent_successfully'
    public function contactus(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }
        
        $data = ['content' => $request['message']];
        Mail::to($request['email'])->send(new ContactUsMail($data, $request['email']));
        return redirect()->back()->with('success', 'thanks a lot for contacting us');
    }
}
