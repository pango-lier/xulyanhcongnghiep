<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
  public function getDataTreeChild($parentID)
    {
    	return $this->dataTree($this->all(),$parentID);
    }
  //public function catdes(){
  // return $this->belongsTo('App\CatDes','id','category_id');
//}  
protected function dataTree($data,$parentID=0,$level=0){
			$result=[];
			foreach ($data as $key=> $item) {
				if($item['parent_id']==$parentID){
					$item['level']=$level;
					$result[]=$item;
					unset($data[$key]);
					$child=$this->dataTree($data,$item['id'],$level+1);
					$result=array_merge($result,$child);
				}
				# code...
			}
			return $result;
		}
}
