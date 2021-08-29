<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    //
            public function index()
    {
    	$comments=Comment::paginate(10);
    	return view('admin.comment.index',['comments'=>$comments]);
    }
        public function destroy($id)
    {
    	Comment::find($id)->delete();
    	return redirect('admin/comment');
    }
}
