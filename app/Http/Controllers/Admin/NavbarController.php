<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\MiniHeader;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function nav_setting()
    {
        $sec1_1=Category::where('status',1)->where('section',1)->where('order',1)->get();
        $sec1_2=Category::where('status',1)->where('section',1)->where('order',2)->get();
        $sec1_3=Category::where('status',1)->where('section',1)->where('order',3)->get();
        $sec1_4=Category::where('status',1)->where('section',1)->where('order',4)->get();
        $sec2_1=Category::where('status',1)->where('section',2)->where('order',1)->get();
        $sec2_2=Category::where('status',1)->where('section',2)->where('order',2)->get();
        $sec2_3=Category::where('status',1)->where('section',2)->where('order',3)->get();
        $sec2_4=Category::where('status',1)->where('section',2)->where('order',4)->get();
        $sec3_1=Category::where('status',1)->where('section',3)->where('order',1)->get();
        $sec3_2=Category::where('status',1)->where('section',3)->where('order',2)->get();
        $sec3_3=Category::where('status',1)->where('section',3)->where('order',3)->get();
        $sec3_4=Category::where('status',1)->where('section',3)->where('order',4)->get();

        // dd($sec1_1[0]->id);
        return view('admin.navbar',compact('sec1_1','sec1_2','sec1_3','sec1_4','sec2_1','sec2_2','sec2_3','sec2_4','sec3_1','sec3_2','sec3_3','sec3_4'));
    }

    public function main_header1_1(Request $request)
    {
        $new_cat=Category::where('id',$request->cat_id)->first();
        // dd($new_cat);
        Category::where('id',$request->old)->update([
            'section' => $new_cat->section,
            'order' => $new_cat->order,
         ]);
        Category::where('id',$request->cat_id)->update([
            'section' => $request->section,
            'order' => $request->order,
         ]);
        return redirect()->back();
    }
    public function main_header1_2(Request $request)
    {
        $new_cat=Category::where('id',$request->cat_id)->first();

        Category::where('id',$request->old)->update([
            'section' => $new_cat->section,
            'order' => $new_cat->order,
         ]);
        Category::where('id',$request->cat_id)->update([
            'section' => $request->section,
            'order' => $request->order,
         ]);
        return redirect()->back();
    }
    public function main_header1_3(Request $request)
    {
        $new_cat=Category::where('id',$request->cat_id)->first();

        Category::where('id',$request->old)->update([
            'section' => $new_cat->section,
            'order' => $new_cat->order,
         ]);
        Category::where('id',$request->cat_id)->update([
            'section' => $request->section,
            'order' => $request->order,
         ]);
        return redirect()->back();
    }
    public function main_header1_4(Request $request)
    {
        $new_cat=Category::where('id',$request->cat_id)->first();

        Category::where('id',$request->old)->update([
            'section' => $new_cat->section,
            'order' => $new_cat->order,
         ]);
        Category::where('id',$request->cat_id)->update([
            'section' => $request->section,
            'order' => $request->order,
         ]);
        return redirect()->back();
    }
    public function main_header2_1(Request $request)
    {
        $new_cat=Category::where('id',$request->cat_id)->first();

        Category::where('id',$request->old)->update([
            'section' => $new_cat->section,
            'order' => $new_cat->order,
         ]);
        Category::where('id',$request->cat_id)->update([
            'section' => $request->section,
            'order' => $request->order,
         ]);
        return redirect()->back();
    }
    public function main_header2_2(Request $request)
    {
        $new_cat=Category::where('id',$request->cat_id)->first();

        Category::where('id',$request->old)->update([
            'section' => $new_cat->section,
            'order' => $new_cat->order,
         ]);
        Category::where('id',$request->cat_id)->update([
            'section' => $request->section,
            'order' => $request->order,
         ]);
        return redirect()->back();
    }
    public function main_header2_3(Request $request)
    {
        $new_cat=Category::where('id',$request->cat_id)->first();

        Category::where('id',$request->old)->update([
            'section' => $new_cat->section,
            'order' => $new_cat->order,
         ]);
        Category::where('id',$request->cat_id)->update([
            'section' => $request->section,
            'order' => $request->order,
         ]);
        return redirect()->back();
    }
    public function main_header2_4(Request $request)
    {
        $new_cat=Category::where('id',$request->cat_id)->first();

        Category::where('id',$request->old)->update([
            'section' => $new_cat->section,
            'order' => $new_cat->order,
         ]);
        Category::where('id',$request->cat_id)->update([
            'section' => $request->section,
            'order' => $request->order,
         ]);
        return redirect()->back();
    }
    public function main_header3_1(Request $request)
    {
        $new_cat=Category::where('id',$request->cat_id)->first();

        Category::where('id',$request->old)->update([
            'section' => $new_cat->section,
            'order' => $new_cat->order,
         ]);
        Category::where('id',$request->cat_id)->update([
            'section' => $request->section,
            'order' => $request->order,
         ]);
        return redirect()->back();
    }
    public function main_header3_2(Request $request)
    {
        $new_cat=Category::where('id',$request->cat_id)->first();

        Category::where('id',$request->old)->update([
            'section' => $new_cat->section,
            'order' => $new_cat->order,
         ]);
        Category::where('id',$request->cat_id)->update([
            'section' => $request->section,
            'order' => $request->order,
         ]);
        return redirect()->back();
    }
    public function main_header3_3(Request $request)
    {
        $new_cat=Category::where('id',$request->cat_id)->first();

        Category::where('id',$request->old)->update([
            'section' => $new_cat->section,
            'order' => $new_cat->order,
         ]);
        Category::where('id',$request->cat_id)->update([
            'section' => $request->section,
            'order' => $request->order,
         ]);
        return redirect()->back();
    }
    public function main_header3_4(Request $request)
    {
        $new_cat=Category::where('id',$request->cat_id)->first();

        Category::where('id',$request->old)->update([
            'section' => $new_cat->section,
            'order' => $new_cat->order,
         ]);
        Category::where('id',$request->cat_id)->update([
            'section' => $request->section,
            'order' => $request->order,
         ]);
        return redirect()->back();
    }

}
