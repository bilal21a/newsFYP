<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function general_setting()
    {
        $setting= Setting::first();
        return view('admin.general',compact('setting'));
    }

    public function system_name_setting(Request $request)
    {
        $system_name= $request->system_name;
        Setting::find(1)->update([
            'system_name' =>$system_name,
        ]);
        return redirect()->back();
    }

    public function favicon_setting(Request $request)
    {
        // dd($request->all());
        $favicon= $request->favicon;
        $request->validate([
            'favicon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageExtension = $request->favicon->extension();
        $faviconImage="favicon.".$imageExtension;
        $request->favicon->move(public_path('img/system_image/'), $faviconImage);
        Setting::find(1)->update([
            'favicon' =>$faviconImage,
        ]);

        return redirect()->back();

    }

    public function front_logo_setting(Request $request)
    {
        $front_logo= $request->front_logo;
        $request->validate([
            'front_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageExtension = $request->front_logo->extension();
        $frontImage="front_logo.".$imageExtension;
        $request->front_logo->move(public_path('img/system_image/'), $frontImage);
        Setting::find(1)->update([
            'front_logo' =>$frontImage,
        ]);
        return redirect()->back();

    }

    public function admin_logo_setting(Request $request)
    {
        $admin_logo= $request->admin_logo;
        $request->validate([
            'admin_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageExtension = $request->admin_logo->extension();
        $adminImage="admin_logo.".$imageExtension;
        $request->admin_logo->move(public_path('img/system_image/'), $adminImage);
        Setting::find(1)->update([
            'admin_logo' =>$adminImage,
        ]);
        return redirect()->back();
    }

}
