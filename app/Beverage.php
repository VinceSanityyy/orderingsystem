<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beverage extends Model
{
    protected $fillable = [
    	'beverage_name', 'status', 'image', 'price',
    ];
}
