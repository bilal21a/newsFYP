<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DashBoardController extends Controller
{
    public function home()
    {
        $user= User::get();
        $user= count($user);

        $categories= Category::get();
        $categories= count($categories);

        $total_news= Post::where('status',1)->get();
        $total_news= count($total_news);

        $today_news= Post::whereDate('created_at', Carbon::today())->where('status',1)->get();
        $today_news= count($today_news);

        $this->data['user'] = $user;
        $this->data['categories'] = $categories;
        $this->data['total_news'] = $total_news;
        $this->data['today_news'] = $today_news;
        // dd($this->data);
        return view('admin.home',$this->data);
    }

    public function users()
    {
        $user= User::get();
        $this->data['user'] = $user;
        // dd($this->data);

        return view('admin.users',$this->data);

    }

    public function edit_users(Request $request)
    {
        // dd($request);
        $id= $request->id;
        $email=$request->email;
        $role=$request->role;
         User::where('id',$id)->update([
            'email' => $email,
         ]);
        return redirect()->back();

    }

    public function delete_users(Request $request)
    {
        $id= $request->id;
         User::where('id',$id)->delete();
        return redirect()->back();
    }

    public function posts()
    {
        $posts= Post::get();
        $this->data['posts'] = $posts;
        // dd($this->data);

        return view('admin.posts',$this->data);

    }
    public function categories()
    {
        $categories= Category::latest()->get();
        $this->data['categories'] = $categories;
        dd($categories);

        return view('admin.categories',$this->data);
    }
    public function edit_posts(Request $request)
    {
        $posts= Post::get();
        $this->data['posts'] = $posts;
        // dd($this->data);

        return view('admin.posts',$this->data);

    }
    public function delete_posts()
    {
        $posts= Post::get();
        $this->data['posts'] = $posts;
        // dd($this->data);

        return view('admin.posts',$this->data);

    }
    public function edit_cat(Request $request)
    {
        // dd($request);

        $id= $request->id;
        $name=$request->name;
        $status=$request->status;
        $api_name=$request->api_name;
         Category::find($id)->update([
            'name' => $name,
            'status' => $status,
            'api_name' => $api_name,
         ]);
        return redirect()->back();
    }
    public function delete_cat(Request $request)
    {
        $id= $request->id;
        Category::find($id)->delete();
        return redirect()->back();
    }
    public function add_cat(Request $request)
    {

        $id= $request->id;
        $name=$request->name;
        $status=$request->status;
        if ($request->api_name=="0") {
            $api_name=null;
        }
        else{
            $api_name=$request->api_name;
        }
         Category::create([
            'name' => $name,
            'status' => $status,
            'api_name' => $api_name,
            'del' => 0,
         ]);
        return redirect()->back();
    }
}
