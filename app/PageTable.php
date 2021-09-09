<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageTable extends Model
{
    public $incrementing = false;
    protected $guarded=[];

    public function openTables()
    {
        return $this->hasMany('App\OpenTable','page_table_id','id');
    }
}
