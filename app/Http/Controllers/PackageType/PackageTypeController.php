<?php

namespace App\Http\Controllers\PackageType;

use App\Models\Setting;
use App\Models\PackageType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageTypeController extends Controller
{
    //
        public function allPackageTypes(){
            $all_packages= PackageType::all();

            return view("admin.package_type", ["all_packages"=>$all_packages]);
        }

      
        public function postPackageType(Request $request){

            $package_type= PackageType::create($request->post());

            return redirect()->back()->with( ["message"=>"Package Type Added Successfully!"] );

        }

        public function editPackageType($id){
        
            $package_type= PackageType::find($id);

            return view("admin.edit-package-type", ['package_type'=>$package_type]);
        }


        public function updatePackageType(Request $request, $id) {


            $update_data=[
                'package_type_name'=> request('package_type_name'),
                'package_description'=> request('package_description'),
                'max_weight'=> request('max_weight'),
                'price_per_km'=> request('price_per_km'),
                'urgent_price_per_km'=> request('urgent_price_per_km')
            ];

            $package_type= PackageType::where('ID',$id)->update($update_data);

            return redirect('/package-type')->with( ["message"=>"Package Type updated Successfully!"] );
        }



        public function deletePackage(Request $request, $id) {

            $package_type = PackageType::where('ID',$id)->delete();
        
            return back()->with(["message" => "Package Type deleted Successfully!"]);
        }




        public function editSettings()
    {
        $settings = Setting::pluck('value', 'key');
        return view('admin_super/settings', compact('settings'));
    }

    public function showsetting()
    {
        // Retrieve specific settings from the database
        $settings = Setting::table('settings')
            ->whereIn('key', ['title', 'footer', 'logo'])
            ->pluck('value', 'key');

        return view('layouts/super_admin', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        // Validate the incoming request data if needed
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'footer' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update settings in the database
        Setting::where('key', 'title')
            ->update(['value' => $validatedData['title']]);

        Setting::where('key', 'footer')
            ->update(['value' => $validatedData['footer']]);

        // Handle logo update if provided
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            Setting::where('key', 'logo')
                ->update(['value' => $logoPath]);
        }
return back()->with('success','setting updated successfully');
}
}
