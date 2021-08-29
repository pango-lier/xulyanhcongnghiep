<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
     protected function customer()
    {
    	return $this->belongsTo('App\Customer','customer_id','id');
    }
}
