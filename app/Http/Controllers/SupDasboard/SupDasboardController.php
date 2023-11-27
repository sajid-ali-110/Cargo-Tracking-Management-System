<?php

namespace App\Http\Controllers\SupDasboard;

use App\Models\Office;
use App\Models\ShipmentItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupDasboardController extends Controller
{
    public function SupDasboard() {
        $totalOffices = Office::count();
        $totalShipments = ShipmentItem::count();
        $get_shipments= ShipmentItem::get();
        return view('admin_super.dashboard', compact('totalOffices', 'totalShipments', 'get_shipments'));
    }
}
