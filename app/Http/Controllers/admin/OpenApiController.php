<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OpenTable;
use Illuminate\Support\Facades\Auth;

class OpenApiController extends Controller
{
    public function index(Request $request)
    {
        $tables= OpenTable::join('open_infos', 'open_infos.table_id', '=', 'open_tables.id')
        ->where('open_tables.user_id', auth()->guard('admin_users')->id())
        ->select(['open_tables.id','open_tables.name','open_tables.fields','open_infos.row'])
        ->orderBy('open_tables.id','desc')
        ->get();
        $temps=[];
        foreach ($tables as $table) {
            $table->row=json_decode($table->row);
            $table->fields=json_decode($table->fields);
            $temps[$table->id][]=$table;
        }
        return view('admin.open.index', ['tables'=>$temps]);
    }
}
