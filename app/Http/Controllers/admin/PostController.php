<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Str;
use Storage;
use App\Http\Requests\PostStoreRequest;
class PostController extends Controller
{
    //
    public const IMG_PATH_NEWS_DEFAULT='storage/post/default.png';
    private $posts;
    public function __construct(Post $posts )
    {
    	$this->posts=$posts;
    }
    public function index()
    {
    	$posts=$this->posts->paginate(5);
    	return view('admin.post.index',['posts'=>$posts]);
    }
    public function create()
    {
    	$category=new Category();
    	$cats=$category->getDataTreeChild(0);
    	return view('admin.post.create',['cats'=>$cats]);
    }
    public function store(PostStoreRequest $request)
    {

        $this->posts->name=$request->name;
        $this->posts->slug=Str::slug($request->name,'-');
        $this->posts->category_id=$request->category_id;
        $this->posts->video_link=$request->video_link;
        $this->posts->description=$request->description;
        $this->posts->content=$request->content;
        $this->posts->description=$request->description;
        $this->posts->user_id=auth()->guard('admin_users')->user()->id;
        $this->posts->count_views=0;
        $this->posts->type=$request->type;
        if($request->hasFile('img_path')){
        $imageName = 't'.time().rand(1,100).'.'.$request->img_path->getClientOriginalExtension();
        $img_path_public=$request->file('img_path')->storeAs('public/post',$imageName);
       // $img_path_public=$request->file('img_path')->store('public/post');
        //chuyen public ve storrage;
       $this->posts->img_path=Storage::url($img_path_public);
        }else $this->posts->img_path=PostController::IMG_PATH_NEWS_DEFAULT;
        $this->posts->save();
        return redirect('admin/post');
    }
    public function edit($id)
    {
        $category=new Category();
        $cats=$category->getDataTreeChild(0);
        $post=$this->posts->find($id);
        return view('admin.post.edit',['cats'=>$cats,'post'=>$post]);
    }
    public function update(PostStoreRequest $request,$id)
    {
        $post=$this->posts->find($id);
        $post->name=$request->name;
        $slug=Str::slug($request->name,'-');
        $post->category_id=$request->category_id;
        $post->video_link=$request->video_link;
        $post->description=$request->description;
        $post->content=$request->content;
        $post->description=$request->description;
        $post->user_id=auth()->guard('admin_users')->user()->id;
        //$post->count_views=0;
        $post->type=$request->type;
        if($request->hasFile('img_path')){
        $imageName = 't'.time().rand(1,100).'.'.$request->img_path->getClientOriginalExtension();
        $img_path_public=$request->file('img_path')->storeAs('public/post',$imageName);
       // $img_path_public=$request->file('img_path')->store('public/post');
        //chuyen public ve storrage;
       $post->img_path=Storage::url($img_path_public);
        }else $post->img_path=$request->img_path_old;
        $post->save();
        return redirect('admin/post');
    }
    public function destroy($id)
    {
        $post=$this->posts->find($id);
        $post->delete();
        $path_absolute=substr($post->img_path,1);
            if (file_exists($path_absolute)) {
              unlink($path_absolute);
            }
        return redirect('admin/post');
    }
}
