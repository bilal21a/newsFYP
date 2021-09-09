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
        $categories= Category::get();
        $this->data['categories'] = $categories;
        // dd($categories);

        return view('admin.categories',$this->data);

    }

}
