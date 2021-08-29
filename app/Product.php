<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
       public function img_paths()
    {
        return $this->hasMany('App\MultiImgPath', 'product_id','id');
    }
    protected function category()
    {
    	return $this->belongsTo('App\Category','category_id','id');
    }
    protected function user()
    {
    	return $this->belongsTo('App\AdminUser','user_id','id');
    }
}
