<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $fillable= [
        "ID",
         	"image_url",
             	"belongs_to",
                 	"parent_id"
    ];
}
