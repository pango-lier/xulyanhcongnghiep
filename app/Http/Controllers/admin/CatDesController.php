<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Catdes;
use App\Category;
class CatDesController extends Controller
{
    //
    private $Catdes;

    public function __construct(Catdes $Catdes)
    {
        $this->Catdes = $Catdes;
    }

    public function index()
    {
        $catdess = $this->Catdes->latest()->paginate(5);
        return view('admin.catdes.index', compact('catdess'));
    }

    public function create()
    {
        $category=new Category();
        $cats=$category->getDataTreeChild(0);
        return view('admin.catdes.create',['cats'=>$cats]);
    }

    public function store(Request $request)
    {
        $this->Catdes->create([
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);
        return redirect('admin/catdes');
    }
    public function edit($id)
    {
        $category=new Category();
        $cats=$category->getDataTreeChild(0);
        $catdes = $this->Catdes->find($id);
        return view('admin.catdes.edit', ['catdes'=>$catdes,'cats'=>$cats]);
    }

    public function update(Request $request, $id)
    {
        $this->Catdes->find($id)->update([
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);
        return redirect('admin/catdes');
    }

    public function destroy($id)
    {
        return $this->Catdes->find($id)->delete();
         return redirect('admin/catdes');
     }
}
