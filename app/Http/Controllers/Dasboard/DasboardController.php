<?php

namespace App\Http\Controllers\Dasboard;

use App\Models\Office;
use App\Models\ShipmentItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DasboardController extends Controller
{
    public function Dasboard() {
        $totalOffices = Office::count();
        

        $office= session()->get("AuthUser");
        
        if($office){
            $totalShipments = ShipmentItem::where("origin_office_id", $office->ID)->count();
            $get_shipments= ShipmentItem::where("origin_office_id", $office->ID)->get();
            $income=  ShipmentItem::where("origin_office_id", $office->ID)->sum("total_charges");
        }
        else{
            $totalShipments = ShipmentItem::count();
            $get_shipments= ShipmentItem::get();
            $income=  ShipmentItem::sum("total_charges");
        }
        return view('admin.dashboard', compact('totalOffices', 'totalShipments', 'get_shipments', "income"));

    }
}
