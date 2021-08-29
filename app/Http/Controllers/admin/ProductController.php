<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\MultiImgPath;
use App\Category;
use Str;
use Storage;
use DB;
use Illuminate\Support\Facades\Log;
class ProductController extends Controller
{
    //
        //
    public const IMG_PATH_NEWS_DEFAULT='storage/product/default.png';
    private $products;
    public function __construct(Product $products )
    {
    	$this->products=$products;
    }
    public function index()
    {
    	$products=$this->products->paginate(5);
    	return view('admin.product.index',['products'=>$products]);
    }
    public function create()
    {
    	$category=new Category();
    	$cats=$category->getDataTreeChild(0);
    	return view('admin.product.create',['cats'=>$cats]);
    }
    public function store(Request $request)
    {
    	try {
           DB::beginTransaction();
    	//dd($request->multi_img_path);
        $this->products->name=$request->name;
        $this->products->slug=Str::slug($request->name,'-');
        $this->products->category_id=$request->category_id;
        $this->products->video_link=$request->video_link;
        $this->products->description=$request->description;
        $this->products->content=$request->content;
        $this->products->description=$request->description;
        $this->products->user_id=auth()->guard('admin_users')->user()->id;
        $this->products->count_views=0;
        $this->products->price=$request->price;
        if($request->hasFile('img_path')){
        $imageName = 't'.time().rand(1,100).'.'.$request->img_path->getClientOriginalExtension();
        $img_path_public=$request->file('img_path')->storeAs('public/product',$imageName);    
        //$img_path_public=$request->file('img_path')->store('public/product');
        //chuyen public ve storrage;
       $this->products->img_path=Storage::url($img_path_public);
        }else $this->products->img_path=ProductController::IMG_PATH_NEWS_DEFAULT;
        if($request->hasFile('file_path')){
        $imageName = 'f'.time().rand(1,100).'.'.$request->file_path->getClientOriginalExtension();
        $img_path_public=$request->file('file_path')->storeAs('public/file',$imageName);    
       $this->products->file_path=Storage::url($img_path_public);
        }else $this->products->file_path='';
        $this->products->save();
        
		if($request->hasFile('multi_img_path')){
			$product_id=Product::select('id')->latest()->take(1)->get();
			foreach($request->multi_img_path as $key=>$itemImg){
			    $imageName = 'm'.time().rand(1,100).$key.'.'.$itemImg->getClientOriginalExtension();
        $img_path_public=$itemImg->storeAs('public/product',$imageName);
			//	$img_path_public=$itemImg->store('public/product');
        //chuyen public ve storrage;
				$productsImg=new MultiImgPath();
       			$productsImg->img_path=Storage::url($img_path_public);
       			$productsImg->product_id=$product_id[0]->id;
       		//	$productsImg->product_id=$products->img_path()->id;
       			$productsImg->save();
			}
        }
        DB::commit();
        return redirect('admin/product');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }
    }
    public function edit($id)
    {   
        $category=new Category();
        $cats=$category->getDataTreeChild(0);
        $product=$this->products->find($id);
        return view('admin.product.edit',['cats'=>$cats,'product'=>$product]);
    }
    public function update(Request $request,$id)
    {
        $product=$this->products->find($id);
        $product->name=$request->name;
        $product->slug=Str::slug($request->name,'-');
        $product->category_id=$request->category_id;
        $product->video_link=$request->video_link;
        $product->description=$request->description;
        $product->content=$request->content;
        $product->description=$request->description;
        $product->user_id=auth()->guard('admin_users')->user()->id;
        $product->count_views=0;
        $product->price=$request->price;
        if($request->hasFile('img_path')){
        $imageName = 't'.time().rand(1,100).'.'.$request->img_path->getClientOriginalExtension();
        $img_path_public=$request->file('img_path')->storeAs('public/product',$imageName);     
        //$img_path_public=$request->file('img_path')->store('public/product');
        //chuyen public ve storrage;
       $product->img_path=Storage::url($img_path_public);
        }else $product->img_path=$request->img_path_old;
        if($request->hasFile('file_path')){
        $imageName = 'f'.time().rand(1,100).'.'.$request->file_path->getClientOriginalExtension();
        $img_path_public=$request->file('file_path')->storeAs('public/file',$imageName);    
       $product->file_path=Storage::url($img_path_public);
        };
        $product->save();

        
		if($request->hasFile('multi_img_path')){
			MultiImgPath::where('product_id',$id)->delete();
			foreach($request->multi_img_path as $key=> $itemImg){
			    $imageName = 'm'.time().rand(1,100).$key.'.'.$itemImg->getClientOriginalExtension();
        $img_path_public=$itemImg->storeAs('public/product',$imageName);
				//$img_path_public=$itemImg->store('public/product');
        //chuyen public ve storrage;
				$productsImg=new MultiImgPath();
       			$productsImg->img_path=Storage::url($img_path_public);
       			$productsImg->product_id=$id;
       		//	$productsImg->product_id=$products->img_path()->id;
       			$productsImg->save();
			}
        }
        return redirect('admin/product');
    }
    public function destroy($id)
    {
        $product=$this->products->find($id);
        $MultiImgPath=MultiImgPath::select('img_path')->where('product_id',$id)->get();

        
       MultiImgPath::where('product_id',$id)->delete();
        $product->delete();
        foreach ($MultiImgPath as $path) {
            $path_absolute=substr($path->img_path,1);
            if (file_exists($path_absolute)) {
              unlink($path_absolute);
            }
        }
        $path_absolute=substr($product->img_path,1);
            if (file_exists($path_absolute)) {
              unlink($path_absolute);
            }
        return redirect('admin/product');
    }
}
