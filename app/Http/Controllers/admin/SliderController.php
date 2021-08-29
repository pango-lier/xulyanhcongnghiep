<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use Str;
use Storage;
class SliderController extends Controller
{
    //
    public const IMG_PATH_NEWS_DEFAULT='storage/slider/default.png';
     public function index()
    {
    	$sliders=Slider::latest()->take(4)->get();
    	return view('admin.slider.index',['sliders'=>$sliders]);
    }
    public function create()
    {
    	return view('admin.slider.create');
    }
    public function store(Request $request)
    {
    	$slider=new Slider();
        $slider->post_id=$request->post_id;
        if($request->hasFile('img_path')){
         $imageName = 't'.time().rand(1,100).'.'.$request->img_path->getClientOriginalExtension();
        $img_path_public=$request->file('img_path')->storeAs('public/slider',$imageName);
        //chuyen public ve storrage;
       $slider->img_path=Storage::url($img_path_public);
        }else $slider->img_path=SliderController::IMG_PATH_NEWS_DEFAULT;
        $slider->save();
    	return redirect('admin/slider')->with('success','Thêm slider thành công .');
    }
    public function edit($id)
    {
    	$slider=Slider::where('id','=',$id)->first();//find($id);
    	return view('admin.slider.edit',['slider'=>$slider]);
    }
    public function update(Request $request,$id)
    {
    	$slider=Slider::find($id);
        $slider->post_id=$request->post_id;
        if($request->hasFile('img_path')){
        $imageName = 't'.time().rand(1,100).'.'.$request->img_path->getClientOriginalExtension();
        $img_path_public=$request->file('img_path')->storeAs('public/slider',$imageName);    
       // $img_path_public=$request->file('img_path')->store('public/slider');
        //chuyen public ve storrage;
       $slider->img_path=Storage::url($img_path_public);
        }else $slider->img_path=$request->img_path_old;
        $slider->save();
    	return redirect('admin/slider')->with('success','Thêm slider thành công .');
    }
    public function destroy($id)
    {
    	$Slider=Slider::find($id);
        $Slider->delete();
        delete_img_path($Slider->img_path);
    	return redirect('admin/slider')->with('success','Xóa tài khoản thành công .');
    }
}
