<?php

namespace App\Http\Controllers\Shipment;

use App\Models\User;
use App\Models\Office;
use App\Models\PackageType;
use Illuminate\Support\Str;
use App\Models\ShipmentItem;
use Illuminate\Http\Request;
use App\Models\ShipmentTracking;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
 

class ShipmentController extends Controller
{
 
    public function addShipments(){
        $get_pkg_type= PackageType::all();
        $offices= Office::all();
        return view('admin.add_shipment',["pkg_data"=> $get_pkg_type,"offices"=>$offices]);
    }

    public function get_pkg_type() {
        $get_pkg_type= PackageType::all();
        return view('admin.add_shipment', ['pkg_data'=>$get_pkg_type]);
    }
   
    public function postShipment(Request $request){
     

        $validate= $request->validate([

            "shipment_name"=>"required",
            "package_type"=>"required",
            "weight"=> "required",
            "destination_office_id"=> "required", 
            "sender_name"=>"required",
            "sender_email"=>"required|email",
            "sender_phone"=> "required",
            "receiver_name"=>"required",
            "receiver_email"=>"required|email",
            "receiver_phone"=> "required",
        ]);


        $hasImages= false;
        if($request->hasFile("images")){
            $hasImages= true;
        } 

        $shipment_code= "#".rand(100000000,900000000);


        $package_type= PackageType::findOrFail($validate["package_type"]);
        $origin_office= session()->get("AuthUser");

        if(!$origin_office){
            abort(404);
        }

        $destination_office= Office::findOrFail($validate['destination_office_id']);
        $is_urgent= $request->is_urgent;

        $charges= $this->calculateCharges($package_type, $origin_office, $destination_office, $is_urgent);
        
        $sender= User::where("email",$request->sender_email)->first();

        if($sender==null){
            $sender= User::create([
                "name"=>$request->sender_name,
                "email"=>$request->sender_email,
                "phone"=>$request->sender_phone,
                "password"=>$shipment_code,
                'usertype'=> "sender"
            ]);
        }


        $receiver= User::where("email",$request->receiver_email)->first();

        if($receiver==null){
            $receiver= User::create([
                "name"=>$request->receiver_name,
                "email"=>$request->receiver_email,
                "phone"=>$request->receiver_phone,
                "password"=>$shipment_code,
                "usertype"=>"receiver"
            ]);
        }
        


        if(isset($request->isUrgent)){
            $request->isUrgent= 0;
        }
 

        $all_sshipments= ShipmentItem::create([
            'shipment_name'=>$request->shipment_name,
            'package_type'=>$request->package_type,
            "weight"=> $request->weight,
            "destination_office_id"=> $request->destination_office_id,
            "origin_office_id"=>$origin_office->ID,
            'sender_id'=>$sender->id,
            'receiver_id'=>$receiver->id, 
            'hasImages'=>$hasImages,
            'isUrgent'=>$request->is_urgent,
            "shipment_code"=>$shipment_code,
            "total_charges"=> intval($charges)
            
        ]);
 
        return redirect()->route("edit-shipment",['id'=>$all_sshipments->id])->with( ["message"=>"shipment Added Successfully!"] );
    }


    public function  get_shipments() {

        $office= session()->get("AuthUser");
        $get_shipments= ShipmentItem::where("origin_office_id", $office->ID)->get();
        return view('admin.all_shipments', ['all_shipments'=>$get_shipments]);
    }


    public function view_shipment($id){
        
        $get_shipments= ShipmentItem::where('ID',$id)->first();

        return view("admin/view_shipment", ['get_shipments'=>$get_shipments]);

    }

    
    public function edit_shipment($id){
        
        $get_shipments= ShipmentItem::find($id);
        $get_pkg_type= PackageType::all();
        return view("admin.edit_shipment", ['all_shipments'=>$get_shipments,"pkg_data"=>$get_pkg_type]);
    }


    public function update_shipment(Request $request, $id) {

        $hasImages= false;
        if($request->hasFile("images")){
            $hasImages= true;
        } 
        $update_ship_data=[
            'shipment_name'=> request('shipment_name'),
            'package_type'=> request('package_type'),
            'weight'=> request('weight'),
            'sender_name'=> request('sender_name'),
            'sender_email'=> request('sender_email'),
            'receiver_name'=> request('receiver_name'),
            'receiver_email'=> request('receiver_email'),
            'isUrgent'=> request('is_urgent'),
            'hasImages'=> $hasImages
        ];

        $get_shipments= ShipmentItem::where('ID',$id)->update($update_ship_data);

        return redirect('/all-shipment')->with( ["message"=>"Package Type updated Successfully!"] );
    }

    public function delete_shipment(Request $request, $id) {
        
        $get_shipments = ShipmentItem::where('ID',$id)->delete();
    
        return back()->with(["message" => "shipment deleted Successfully!"]);
    }


    public function  get_super_shipments() {

        $get_shipments= ShipmentItem::all();
        
        return view('admin_super.all-shipments', ['all_shipments'=>$get_shipments]);
    }


    public function updateLocation(){

        $tracking_id= isset($_GET['shipment_id']) ? $_GET['shipment_id'] : "";

        $shipmnent=null;
        if($tracking_id != "" ){
            $tracking_id= "#".$tracking_id;
            $shipmnent= ShipmentItem::where("shipment_code", $tracking_id)->first();
        }
 
        return view("admin.update-shipment-location", compact("shipmnent"));
    }


    public function confirmLocation(Request $request){

        $shipment_code= "#". $request->shipment_code;

        $shipment= ShipmentItem::where("shipment_code", $shipment_code)->first();
        $office= session()->get("AuthUser");
        $shipment= ShipmentTracking::create([
            "shipment_item_id"=> $shipment->ID,
            "current_office_id"=>  $office->ID
        ]);

        return redirect()->back()->with(['message'=>"Shipment Location Updated"]);

    }

    public function receive_shipments() {
        $office= session()->get("AuthUser");
        $get_shipments= ShipmentItem::where("destination_office_id", $office->ID)->orderBy("ID","desc")->get();
        return view("admin.receive_Shipments",['all_shipments'=>$get_shipments]);
    }


    public function deliveryShipment(Request $request){

        if(!isset($request->shipment_id)){
            return redirect()->back()->with(['message'=>"Shipment ID missing"]);
        }


        $shipment= ShipmentItem::where("ID",$request->shipment_id)->update([
            "status"=>"delivered"
        ]);

        return redirect()->back()->with(['message'=>"Shipment Marked Delivered"]);
    }



    public function calculateCharges($package_type, $origin_office, $destination_office, $is_urgent){

        $price_per_km= $is_urgent ? $package_type->urgent_price_per_km : $package_type->price_per_km;

        
        $origin_lon_lat= $this->getLonLat($origin_office);
        $destination_lon_lat= $this->getLonLat($destination_office);


        if(isset($origin_lon_lat[0]) && isset($destination_lon_lat[0])){

            $origin_= [
                $origin_lon_lat[0]['latitude'],
                $origin_lon_lat[0]['longitude']
            ];

            $destination_= [
                $destination_lon_lat[0]['latitude'],
                $destination_lon_lat[0]['longitude']
            ];


            $distance= $this->getDistanceBetweenTwoPoints($origin_ , $destination_ );

            
            $charges= $price_per_km * $distance;

            return $charges;

        }
        

    }


    public function getLonLat($office){
        $_city= $office->city;
        $_country= $office->country;
        $_state= $office->province;

        $city= DB::table('cities')->where("id", $_city)->first();

        $country= DB::table('countries')->where("id", $_country)->first();

        $state= DB::table('states')->where("id", $_state)->first();
 
        $api_url="https://api.api-ninjas.com/v1/geocoding?city={$city->name}&country={$country->name}&state={$state->name}";
 

        $response = Http::withHeaders([
                'X-Api-Key' => '9pWLVDAzSzscpFSSl2vPeA==bU2nWYJ31sAyHO5G', 
            ])->get($api_url);


        return $response->json();
    }


    public function getDistanceBetweenTwoPoints($point1 , $point2){
        // array of lat-long i.e  $point1 = [lat,long]
        $earthRadius = 6371;  // earth radius in km
        $point1Lat = $point1[0];
        $point2Lat =$point2[0];
        $deltaLat = deg2rad($point2Lat - $point1Lat);
        $point1Long =$point1[1];
        $point2Long =$point2[1];
        $deltaLong = deg2rad($point2Long - $point1Long);
        $a = sin($deltaLat/2) * sin($deltaLat/2) + cos(deg2rad($point1Lat)) * cos(deg2rad($point2Lat))
            * sin($deltaLong/2) * sin($deltaLong/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
    
        $distance = $earthRadius * $c;
        return $distance;    // in km
    }
}

