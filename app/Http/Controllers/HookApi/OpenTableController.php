<?php

namespace App\Http\Controllers\HookApi;

use App\Http\Controllers\Controller;
use App\OpenTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class OpenTableController extends Controller
{
    public function index(Request $request)
    {
        $table= OpenTable::where('user_id',$request->user_api->id)->get()->toArray();
        return response([
           'status'=>'ok',
           'table_fields'=>$table
       ]);
    }

    public function store(Request $request)
    {
        $table= OpenTable::create([
            'id'=>Str::uuid(),
           'user_id'=>$request->user_api->id,
           'name'=>$request->name,
           'fields'=>json_encode($request->fields),
           'page_id'=>$request->page_id,
           'priority_show'=>time(),
       ]);
        return response([
           'status'=>'ok',
           'table_fields'=>$table
       ]);
    }

    public function update(Request $request)
    {
        $table= OpenTable::where('id', $request->id)->where('user_id',$request->user_api->id)
            ->update([
           'name'=>$request->name,
           'fields'=>$request->fields,
           'page_id'=>$request->page_id??1,
       ]);
        return response([
           'status'=>'ok',
           'table_fields'=>$table
       ]);
    }
}
