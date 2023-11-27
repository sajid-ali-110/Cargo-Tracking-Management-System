<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{
    use HasFactory;


    protected $fillable= [
        "package_type_name",
        "package_description",
        "max_weight",
        "price_per_km",
        "urgent_price_per_km"];
}
