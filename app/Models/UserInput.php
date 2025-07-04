<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInput extends Model
{
     protected $fillable=[
        "brand","shade","image_path","fabric","color","yards","status"
    ];
}

