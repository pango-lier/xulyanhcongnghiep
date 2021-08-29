<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected function category()
    {
    	return $this->belongsTo('App\Category','category_id','id');
    }
    protected function user()
    {
    	return $this->belongsTo('App\AdminUser','user_id','id');
    }
    public function comments()
    {
    	return $this->hasMany('App\Comment','post_id','id');
    }
}
