<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Burger extends Model
{
    protected $fillable = [
    	'burger_name', 'status', 'image', 'price',
    ];
}
