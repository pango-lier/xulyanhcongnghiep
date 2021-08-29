<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable=['email','content'];
    public function news()
    {
    	return $this->belongsTo('App\Post','post_id','id');
    }
    public function child()
    {
    	return $this->hasMany('App\Comment','parent_id','id');
    }
    public function parent()
    {
    	return $this->belongsTo('App\Comment','parent_id','id');
    }
}
