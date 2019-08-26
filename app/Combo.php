<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    protected $fillable = [
    	'combo_meal_name', 'image', 'status', 'price',
    ];
}
