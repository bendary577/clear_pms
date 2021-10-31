<?php

namespace App\Http\Controllers;

use App\Models\Perscreption;
use Illuminate\Http\Request;

class PerscreptionController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($appointment_id)
    {
        $perscreption = Perscreption::where('appointment_id', $appointment_id)->first();
        return view('receptionist.dashboard.dashboard_appointment_perscreptions', ['perscreption' => $perscreption]);
    }


    public function edit(Perscreption $perscreption)
    {
        //
    }


    public function update(Request $request, Perscreption $perscreption)
    {
        //
    }


    public function destroy(Perscreption $perscreption)
    {
        //
    }
}
