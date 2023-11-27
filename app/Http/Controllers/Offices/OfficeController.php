<?php

namespace App\Http\Controllers\Offices;

use App\Models\City;
use App\Models\State;
use App\Models\Office;
use App\Models\Country;
use Illuminate\Support\Str;
use App\Models\ShipmentItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class OfficeController extends Controller
{


    public function addOffice(Request $req){



        

        $all_offices= Office::all();
        $countries = Country::all();
        // $countries = Country::select('id', 'name')->get();
        return view("admin_super/add-office", ["all_offices"=>$all_offices, 'countries' => $countries]);
    }


    public function getStates($country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }

    public function getCities($state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }




    // public function getCountries()
    // {
    //     $data['countries'] = Country::get(['name', 'id']);
    //     return view("admin_super/add-office", $data);
    // }
    
    // public function getStates(Request $request)
    // {
    //     $data['states'] = State::where('country_id', $request->country_id)->get(['name', 'id']);
    //     return response()->json($data);
    // }

    // public function getCities(Request $request)
    // {
    //     $data['cities'] = City::where('state_id', $request->state_id)->get(['name', 'id']);
    //     return response()->json($data);
    // }


    public function ourOffices(Request $req){

        $all_offices= Office::all();

        return view("admin_super.offices",  ["all_offices"=>$all_offices]);
    }

    public function postOffice(Request $req){
        
        $formValidate = $req-> validate([
            "office_name" => "required",
            "ofice_adress" => "required",
            "phone" => "required|numeric",
            "email"=> "required|email",
            "zip_code" => "required",
            "country"=> "required",
            "province" => "required",
            "city" => "required",
            "office-image" => "required|image|mimes:jpeg,png,jpg,gif|max:10240"
        ]);

        

        $file = $req->file('office-image');
        $fileName = time() . '_' . $file->getClientOriginalName();
      

        $post= $req->post();

        $post['office_code']= Str::random(10);

        $post['password']= Hash::make($post['email']);

        $office= Office::create($post);

        return redirect()->back()->with(['message'=>"Office added successfully"]);
    }



    public function viewOffice($id){
        
        // $post= $req->post();

        // $post['office_code']= Str::random(10);

        // $post['password']= Hash::make($post['email']);

        // $office= Office::find($id);
        $all_offices= Office::where('ID',$id)->first();

        return view("admin_super.view-office", ['all_offices'=>$all_offices]);

    }


    public function editOffice(Request $req, $id){
        
        $post= $req->post();

        // $post['office_code']= Str::random(10);

        // $post['password']= Hash::make($post['email']);

        $office= Office::find($id);
        $all_offices= Office::all();

        return view("admin_super.edit-office", ['office'=>$office]);

    }


    public function updateOffice(Request $req, $id){

        $update_office_data=[
            'office_name'=> request('office_name'),
            'ofice_adress'=> request('ofice_adress'),
            'phone'=> request('phone'),
            'email'=> request('email'),
            'zip_code'=> request('zip_code')
        ];

        $office= Office::where('ID',$id)->update($update_office_data);

        return redirect()->back()->with(['message'=>"Office updated successfully"]);

    }


    public function deleteOffice(Request $request, $id) {
        
        $office = Office::where('ID',$id)->delete();
    
        return back()->with(["message" => "office    deleted Successfully!"]);
    }

    

//     public function search(Request $request)
// {
//     $searchTerm = $request->input('search');

//     $offices = Office::where('name', 'like', '%' . $searchTerm . '%')->get();

//     return view('layouts/searchedOffice', ['offices' => $offices]);
// }



public function search(Request $request)
{
    $searchTerm = $request->input('search');

    $offices = Office::where('city', 'like', '%' . $searchTerm . '%')->get();

    return view('layouts.searchedOffice', ['offices' => $offices]);
}


public function homePage(){

    $shipment=null;
    if(isset($_GET['tracking_id'])){

        $tracking_id= "#". $_GET['tracking_id'];

        $shipment= ShipmentItem::where("shipment_code", $tracking_id)->first();
    }
    
    $all_offices= Office::limit(4)->get();

    return view("welcome",  ["all_offices"=>$all_offices,"shipmnent"=> $shipment]);
}
}
