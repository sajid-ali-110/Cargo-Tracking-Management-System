<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function getCountries() {
        $countries = Country::select('id', 'name')->get();
        return view('admin_super/add-office', ['countries' => $countries]);
        
    
    }
    

    public function getState(Request $request) {
        $data ['states'] = State::where('country_id', $request->country_id)->get(['name', 'id']);
        return response()->json($data);
    }


    public function getCities(Request $request) {
        $data ['cities'] = State::where('state_id', $request->state_id)->get(['name', 'id']);
        return response()->json($data);
    }

}
