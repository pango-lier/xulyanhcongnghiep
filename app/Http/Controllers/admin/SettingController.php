<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    //
    private $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index(Request $request)
    {
        $settings = $this->setting;
        if ($request->config_key) {
            $settings =  $settings->where('config_key', 'like', $request->config_key . '%');
        }
        $settings = $settings->latest()->paginate(50);
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.setting.create');
    }

    public function store(Request $request)
    {
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
        ]);
        return redirect('admin/setting');
    }
    public function edit($id)
    {
        $setting = $this->setting->find($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value
        ]);
        return redirect('admin/setting');
    }

    public function destroy($id)
    {
        return $this->setting->find($id)->delete();
        return redirect('admin/setting');
    }
}
