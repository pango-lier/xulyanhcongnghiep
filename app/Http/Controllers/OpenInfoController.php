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
        ->where('user_id', Auth::id())
        ->select(['tables.id','table.name','table.fields','open_infos.row'])
        ->groupBy('tables.id', 'open_infos.row')
        ->simplePaginate(5);
        foreach ($tables as $table) {
            $data['table']=  $table;
        }
        return view('pages.open', ['tables'=>$data]);
    }
}
