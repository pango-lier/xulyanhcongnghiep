<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatDes extends Model
{
    //
        protected $guarded=[];
        protected $table="cat_des";
        public function category(){
   return $this->belongsTo('App\Category','category_id','id');
}
}
