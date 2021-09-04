<?php

namespace App\Http\Controllers;

use App\OpenInfo;
use App\OpenTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpenInfoController extends Controller
{
    public function index(Request $request)
    {
        $tables= OpenTable::join('open_infos', 'open_infos.table_id', '=', 'open_tables.id')
        ->where('user_id', auth()->guard('admin_users')->id()??1)
        ->select(['tables.id','table.name','table.fields','open_infos.row'])
        ->groupBy('tables.id', 'open_infos.row')
        ->simplePaginate(5);
        $tempTableId=0;
        $temps=[];
        $temp=[];
        foreach ($tables as $table) {
            $table->row=json_decode($table->row);
            $temp[]=$table;
            if ($table->id!=$tempTableId) {
                $temps[]=$temp;
                $temp=[];
            }
        }
        if ($temp!=[]) {
            $temps[]=$temp;
        }
        return view('pages.open', ['tables'=>$temps]);
    }
}
