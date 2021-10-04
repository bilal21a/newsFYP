<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MiniHeader;
use App\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


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
        $image = Image::make(public_path('img/system_image/' . $faviconImage))->fit(32,32);
        $image->save();
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
        $image = Image::make(public_path('img/system_image/' . $frontImage))->fit(220, 43);
        $image->save();
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
        $image = Image::make(public_path('img/system_image/' . $adminImage))->fit(220, 43);
        $image->save();
        Setting::find(1)->update([
            'admin_logo' =>$adminImage,
        ]);
        return redirect()->back();
    }

    public function miniheader_setting(Request $request)
    {
        $source_name = $request->source_name;
        $source_api_name = $request->source_api_name;
        $order = $request->order;
        $icon = $request->icon;

        $request->validate([
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageExtension = $request->icon->extension();
        $imageName="image_".uniqid(rand(), true).".".$imageExtension;
        $request->icon->move(public_path('img/miniheader_img/'), $imageName);

        // miniheader_img img
        $image = Image::make(public_path('img/miniheader_img/' . $imageName))->resize(40, 15);
        $image->save();

        $setting = new MiniHeader();
        $setting->source_name = $source_name;
        $setting->source_api_name = $source_api_name;
        $setting->order = $order;
        $setting->icon=$imageName;
        $setting->save();

        return redirect()->back();

    }

    public function delete_source(Request $request)
    {
        $id=$request->id;
        MiniHeader::find($id)->delete();
        return redirect()->back();
    }

}
