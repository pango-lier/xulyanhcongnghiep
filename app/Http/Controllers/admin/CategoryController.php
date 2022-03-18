<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Str;
use App\Http\Requests\CategoryStoreRequest;
class CategoryController extends Controller
{
    //
    private $cats;
    public function __construct( Category $cats)
    {
    	$this->cats=$cats;
    }
    public function index(){
    	    $cats=$this->cats->getDataTreeChild(0);
    return view('admin.category.index',['cats'=>$cats]);
    }
    public function create(){
    	$cats=$this->cats->getDataTreeChild(0);
    return view('admin.category.create',['cats'=>$cats]);
    }
    public function store(CategoryStoreRequest $request){
    	$this->cats->name=$request->name;
        $this->cats->meta_title=$request->meta_title;
    	$this->cats->slug=Str::slug(empty($request->meta_title)?$request->name:$request->meta_title,'-');
    	$this->cats->parent_id=$request->parent_id;
        $this->cats->description=$request->description;
        $this->cats->type=$request->type;
    	$this->cats->save();
    return redirect('admin/category');
    }
    public function edit($id){
    	$cat=$this->cats->find($id);
    	$cats=$this->cats->getDataTreeChild(0);
    	foreach ($cats as $key => $value) {
    		if($value['id']==$id) unset($cats[$key]);
    	}
    return view('admin.category.edit',['cat'=>$cat,'cats'=>$cats]);
    }
    public function update(CategoryStoreRequest $request,$id){
    $cat=$this->cats->find($id);
    $cat->name=$request->name;
    $cat->type=$request->type;
    $cat->description=$request->description;
    $cat->meta_title=$request->meta_title;
    $cat->slug=Str::slug(empty($request->meta_title)?$request->name:$request->meta_title,'-');
   if($id!=$request->parent_id) $cat->parent_id=$request->parent_id;
    $cat->save();
    return redirect('admin/category');
    }
    public function destroy($id){
    	$cat=$this->cats->find($id);
    	$cat->delete();
    return redirect('admin/category');
    }
}
