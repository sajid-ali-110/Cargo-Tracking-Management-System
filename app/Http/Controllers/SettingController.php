<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{

public function landing_page_setting(){
 
        // Retrieve specific settings from the database
        $settings = Setting::table('settings')
            ->whereIn('key', ['title','logo','footer'])
            ->pluck('value', 'key');
           
        return view('welcome', compact('settings'));
    }

}



