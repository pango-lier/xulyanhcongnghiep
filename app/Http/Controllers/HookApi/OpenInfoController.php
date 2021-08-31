<?php

namespace App\Http\Controllers\Hook;

use App\Http\Controllers\Controller;
use App\OpenInfo;
use App\OpenTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpenInfoController extends Controller
{
    public function store(Request $request)
    {
        $row=OpenInfo::create([
            'table_id'=>$request->table??1,
            'row'=>$request->row
        ]);
        return response([
            'status'=>'ok',
            'row'=>$row,
        ], 200);
    }

    public function update(Request $request)
    {
        $row=OpenInfo::where('id', $request->id)->update([
            'table_id'=>$request->table??1,
            'row'=>$request->row
        ]);
        return response([
            'status'=>'ok',
            'row'=>$row,
        ], 200);
    }
}
