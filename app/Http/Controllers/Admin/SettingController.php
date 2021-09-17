<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function system_setting(Request $request)
    {
        // dd($request->all());
        $name= $request->system_name;
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
        $imageName="favicon.".$imageExtension;
        $request->favicon->move(public_path('img/system_image/'), $imageName);
        // dd(public_path('img/main_image/' . $imageName));

        $imageExtension = $request->front_logo->extension();
        $imageName="front_logo.".$imageExtension;
        $request->front_logo->move(public_path('img/system_image/'), $imageName);
        // dd(public_path('img/main_image/' . $imageName));

        $imageExtension = $request->admin_logo->extension();
        $imageName="admin_logo.".$imageExtension;
        $request->admin_logo->move(public_path('img/system_image/'), $imageName);
        // dd(public_path('img/main_image/' . $imageName));
        dd("here");



        $post = new Post();
        $post->title = $title;
        $post->short_description = $short_description;
        $post->description = $description;
        $post->slug = $slug;
        $post->category_id = $category_id;
        $post->created_by = $created_by;
        $post->main_image = $imageName;
        $post->thumb_image = $imageName;
        $post->list_image = $imageName;
        $post->hot_news = $hot_news;
        $post->status = $status;
        $post->save();

        return redirect()->route('home');
    }
}
