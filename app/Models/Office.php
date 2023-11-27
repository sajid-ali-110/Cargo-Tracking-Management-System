<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable= [
        "office_name",
        "ofice_adress",
        "office_code",
        "phone",
        "zip_code",
        "country",
        "province",
        "city",
        "email",
        "password"
    ];

    protected $table="office";
}
