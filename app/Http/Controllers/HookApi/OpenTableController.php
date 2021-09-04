<?php

namespace App\Http\Controllers\HookApi;

use App\Http\Controllers\Controller;
use App\OpenTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpenTableController extends Controller
{
    public function store(Request $request)
    {
        $table= OpenTable::create([
           'user_id'=>$request->user_api->id,
           'name'=>$request->name,
           'fields'=>json_encode($request->fields),
           'page_id'=>$request->page_id??1,
           'priority_pos'=>time(),
       ]);
        return response([
           'status'=>'ok',
           'table_fields'=>$table
       ]);
    }

    public function update(Request $request)
    {
        $table= OpenTable::where('id', $request->id)->update([
           'user_id'=>$request->user_api->id,
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
