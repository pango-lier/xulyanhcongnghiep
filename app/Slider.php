<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    public function post(){
   return $this->belongsTo('App\Post','post_id','id');
}
}
