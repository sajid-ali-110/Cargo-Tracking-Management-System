<?php

namespace App\Models;

use App\Models\Office;
use App\Models\ShipmentItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShipmentTracking extends Model
{
    use HasFactory;

    protected $table= "shipment_tracking";
    protected $fillable= [
        "shipment_item_id",
        "current_office_id"
    ];



    public function office(){
        return $this->belongsTo(Office::class,"current_office_id","ID");
    }
}
