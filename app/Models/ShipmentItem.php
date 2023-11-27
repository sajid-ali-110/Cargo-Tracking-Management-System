<?php

namespace App\Models;

use App\Models\User;
use App\Models\Office;
use App\Models\PackageType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShipmentItem extends Model
{
    use HasFactory;

    protected $table = 'shipment_item';

    protected $fillable = [
        "shipment_name",
        "package_type",
        "weight",
        "origin_office_id",
        "destination_office_id",
        "weight",
        "sender_name",
        "sender_email",
        "sender_id",
        "receiver_name",
        "receiver_email",
        "receiver_id",
        "isUrgent",
        "hasImages",
        "shipment_code",
        "total_charges"
    ];
    

    public function get_package_type(){
        return $this->belongsTo(PackageType::class,"package_type","id");
    }

    public function get_destination_office(){
        return $this->belongsTo(Office::class,"destination_office_id","id");
    }

    public function get_origin_office(){
        return $this->belongsTo(Office::class,"origin_office_id","id");
    }

    public function sender(){
        return $this->belongsTo(User::class,"sender_id" );
    }

    public function receiver(){
        return $this->belongsTo(User::class,"receiver_id" );
    }

    public function urgent(){
        return $this->belongsTo(ShipmentItem::class,"isUrgent");
    }


    public function hasCrossedOffice($office_id){

         $count=  ShipmentTracking::where("shipment_item_id", $this->ID )->where("current_office_id", $office_id)->count();
        return  $count;
    }   


    public function tracking(){
        return $this->hasMany(ShipmentTracking::class,"shipment_item_id","ID");
    }
}
