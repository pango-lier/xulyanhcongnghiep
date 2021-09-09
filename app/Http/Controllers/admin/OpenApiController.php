<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OpenTable;
use App\OpenInfo;
use Illuminate\Support\Facades\Auth;


class OpenApiController extends Controller
{
    public function index(Request $request)
    {
        $tables= OpenTable::join('open_infos', 'open_infos.table_id', '=', 'open_tables.id')
        ->join('page_tables', 'open_tables.page_table_id', '=', 'page_tables.id')
        ->where('page_tables.admin_user_id', auth()->guard('admin_users')->id())
        ->select(['open_infos.created_at','open_infos.id','open_infos.table_id','open_tables.name','open_tables.fields','open_infos.row'])
        ->orderBy('open_infos.created_at','desc')
        ->limit(20)
        ->get();
        $temps=[];
        foreach ($tables as $table) {
            $table->row=json_decode($table->row);
            $table->fields=json_decode($table->fields);
            $temps[$table->table_id][]=$table;
        }
        return view('admin.open.index', ['tables'=>$temps]);
    }

    public function destroy($uuid)
    {
        $row=OpenInfo::where('id', $uuid)->delete();
        return redirect('admin/open');
    }
}
