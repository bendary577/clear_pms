<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Patient;
use ElasticScoutDriverPlus\Support\Query;

class SearchController extends Controller
{

    public function search(Request $request){
        $validator = Validator::make($request->all(),
        [
            'search_keyword' => 'required',
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }
        if(Patient::where('code', $request['search_keyword'])->exists()){
            $patient = Patient::where('code', $request['search_keyword'])->first();
            return view('receptionist.dashboard.dashboard_search', ['patient' => $patient]);
        }else{
            session()->flash('error', 'patient profile doesn\'t exist');
            return redirect()->back(); 
        }
    }

    public function elasticSearch(Request $request){
        //dd($request['search_keyword']);
        $results = Patient::searchByQuery(['match' => ['name' => $request['search_keyword']]])->paginate(10);       
        return view('receptionist.dashboard.dashboard_search', [
                                                                    'patients' => $results
                                                                    //'total' => $results->hits['total']
                                                                ]);
    }
    
}
