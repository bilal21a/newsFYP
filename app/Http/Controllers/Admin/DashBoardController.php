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
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        $roles=Role::get();
        $this->data['user'] = $user;
        $this->data['roles'] = $roles;
        // dd($this->data);

        return view('admin.users',$this->data);

    }

    public function edit_users(Request $request)
    {
        // dd($request);
        $id= $request->id;
        $email=$request->email;
        $role=$request->role;

        $role=Role::findById($role);
        $user=User::find($id);
        $user->assignRole($role);
        // dd($role);

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
        $posts= Post::latest()->get();
        $this->data['posts'] = $posts;
        // dd($this->data);

        return view('admin.posts',$this->data);

    }
    public function categories()
    {
        $categories= Category::latest()->get();
        $this->data['categories'] = $categories;
        // dd($categories);

        return view('admin.categories',$this->data);
    }
    public function edit_posts(Request $request)
    {
        $id= $request->id;
         Post::where('id',$id)->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'status' => $request->status
         ]);
        return redirect()->back();

    }
    public function delete_posts($id)
    {
        // dd($id);

        Post::where('id',$id)->delete();
       return redirect()->back();

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

    public function roles()
    {
        $users = User::orderBy('name','desc')->get();
        // $role = Role::create(['guard_name' => 'web', 'name' => 'reader']);
        // $user=User::find(30);
        // $role=Role::findById(1);
        // $user->assignRole($role);
        // dd($user->getRoleNames());

        return view('admin.roles', compact('users'));
    }
    public function rolespermission()
    {
        // $rp= Category::latest()->get();
        $rp= Role::get();
        $this->data['rp'] = $rp;
        // dd($rp);


        return view('admin.rolespermission',$this->data);
    }

    public function permission()
    {
        // $rp= Category::latest()->get();
        $permission= Permission::get();
        $this->data['permission'] = $permission;
        // dd($permission);

        return view('admin.permission', $this->data);
    }

    public function edit_perm(Request $request)
    {
        // dd($request);
        $id= $request->id;
        // $email=$request->email;
        // $role=$request->role;

        // $role=Role::findById($role);
        $user=User::find($id);
        $user->assignRole($role);
        // dd($role);

         User::where('id',$id)->update([
            // 'email' => $email,
         ]);
        return redirect()->back();

    }
}
