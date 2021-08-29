<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use Storage;
use App\Intercooperation;
class IntercooperationController extends Controller
{
    private const IMG_PATH_DEFAULT='storage/partner/default.png';
     public function index()
    {
    	$intercooperations=Intercooperation::latest()->take(4)->get();
    	return view('admin.intercooperation.index',['intercooperations'=>$intercooperations]);
    }
    public function create()
    {
    	return view('admin.intercooperation.create');
    }
    public function store(Request $request)
    {
    	$intercooperation=new Intercooperation();
        $intercooperation->name=$request->name;
        if($request->hasFile('img_path')){
        $imageName = 't'.time().rand(1,100).'.'.$request->img_path->getClientOriginalExtension();
        $img_path_public=$request->file('img_path')->storeAs('public/partner',$imageName);    
       // $img_path_public=$request->file('img_path')->store('public/partner');
        //chuyen public ve storrage;
       $intercooperation->img_path=Storage::url($img_path_public);
        }else $intercooperation->img_path=IntercooperationController::IMG_PATH_NEWS_DEFAULT;
        $intercooperation->save();
    	return redirect('admin/intercooperation')->with('success','Thêm intercooperation thành công .');
    }
    public function edit($id)
    {
    	$intercooperation=Intercooperation::where('id','=',$id)->first();//find($id);
    	return view('admin.intercooperation.edit',['intercooperation'=>$intercooperation]);
    }
    public function update(Request $request,$id)
    {
    	$intercooperation=Intercooperation::find($id);
        $intercooperation->name=$request->name;
        if($request->hasFile('img_path')){
        $imageName = 't'.time().rand(1,100).'.'.$request->img_path->getClientOriginalExtension();
        $img_path_public=$request->file('img_path')->storeAs('public/partner',$imageName);    
        //$img_path_public=$request->file('img_path')->store('public/partner');
        //chuyen public ve storrage;
       $intercooperation->img_path=Storage::url($img_path_public);
        }else $intercooperation->img_path=$request->img_path_old;
        $intercooperation->save();
    	return redirect('admin/intercooperation')->with('success','Thêm intercooperation thành công .');
    }
    public function destroy($id)
    {
    	$user=Intercooperation::find($id)->delete();
    	return redirect('admin/admin_user')->with('success','Xóa tài khoản thành công .');
    }
}
