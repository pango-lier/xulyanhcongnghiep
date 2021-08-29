<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class CommentController extends Controller
{
    //
     public function getCmt(Request $req)
    {
        $comments=DB::table('comments')->select('name','content','created_at')->where('post_id','=',$req->post_id)->orderBy('id','DESC')->limit(5)->get();
       
        foreach ($comments as $key=> $value) {
        	//dd($comments);
            $comments[$key]->time_ago=to_time_ago(time(),strtotime($value->created_at));
        }
        
        return response()->json($comments, 200);
    }
    public function storeCmt(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required',
        ],[
            'name.required'=>'Chưa nhập Tên .',
            'email.required'=>'Chưa nhập email .',
            'email.email'=>'Định dạng email không đúng .',
            'content.required'=>'Chưa nhập nội dung bình luận .'
        ]);
        if ($validator->fails()) {
            $data['status']=[
                'code' => 404,
                'error' => $validator->errors(),
            ];
            return response()->json($data, 200);
        }
        $comment=new Comment();
        $comment->name=sql_XSS($req->name);
        $comment->email=sql_XSS($req->email);
        $comment->content=sql_XSS($req->content);
        $comment->post_id=$req->post_id;
        $comment->save();
        $data['name']=$comment->name;
        $data['content']=$comment->content;
        $data['time_ago']=to_time_ago(0,0);
        $data['status']=[
                'code' => 200,
                'message' => 'success'
            ];
        return response()->json($data, 200);
    }
}
