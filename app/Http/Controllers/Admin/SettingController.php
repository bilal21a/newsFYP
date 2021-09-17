<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function system_setting(Request $request)
    {
        // dd($request->all());
        $system_name= $request->system_name;
        $favicon= $request->favicon;
        $front_logo= $request->front_logo;
        $admin_logo= $request->admin_logo;

        $request->validate([
            'favicon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $request->validate([
            'front_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $request->validate([
            'admin_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $imageExtension = $request->favicon->extension();
        $faviconImage="favicon.".$imageExtension;
        $request->favicon->move(public_path('img/system_image/'), $faviconImage);
        // dd(public_path('img/main_image/' . $imageName));

        $imageExtension = $request->front_logo->extension();
        $frontImage="front_logo.".$imageExtension;
        $request->front_logo->move(public_path('img/system_image/'), $frontImage);
        // dd(public_path('img/main_image/' . $imageName));

        $imageExtension = $request->admin_logo->extension();
        $adminImage="admin_logo.".$imageExtension;
        $request->admin_logo->move(public_path('img/system_image/'), $adminImage);
        // dd(public_path('img/main_image/' . $imageName));
        // dd("here");



        $setting = new Setting();
        $setting->system_name = $system_name;
        $setting->favicon = $faviconImage;
        $setting->front_logo = $frontImage;
        $setting->admin_logo = $adminImage;

        $setting->save();

        return redirect()->route('home');
    }
}
