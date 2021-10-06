<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\MiniHeader;
use App\Post;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $user_all= User::where('approved',0)->paginate(5);
        $post_all= Post::where('approved',0)->where('status',1)->where('created_by','!=',null)->latest()->paginate(5);


        $this->data['user'] = $user;
        $this->data['user_all'] = $user_all;
        $this->data['post_all'] = $post_all;
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
        $posts= Post::where('created_by', '!=', null)->latest()->get();
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

        return view('admin.roles', compact('users'));
    }
    public function rolespermission()
    {
        $rp= Role::get();
        $this->data['rp'] = $rp;


        return view('admin.rolespermission',$this->data);
    }
    public function edit_role(Request $request)
    {
        // dd($request->all());
        $role= Role::find($request->role_id);
        $perm= Permission::find($request->edit_perm);
        $role->syncPermissions($perm);

        return redirect()->back();
    }
    public function delete_role(Request $request)
    {
        // dd($request->all());
        $role= Role::find($request->role_id);
        $permission=$role->getAllPermissions();
        $role->revokePermissionTo($permission);

        $roles = Role::findOrFail($role->id);
        $roles->delete();


        return redirect()->back();
    }
    public function add_role(Request $request)
    {
        try {
        $role =Role::create(['name' => $request->role_name]);
        $perm= Permission::find($request->add_perm);
        $role->syncPermissions($perm);
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
            // toastr()->error($e);
        }


        return redirect()->back();
    }

    public function permission()
    {
        $permission= Permission::get();
        $this->data['permission'] = $permission;
        // dd($permission);

        return view('admin.permission', $this->data);
    }

    public function edit_perm(Request $request)
    {
        $id= $request->id;
        $name= $request->name;
        $description= $request->short_disc;
        Permission::where('id',$id)->update([
            'name' =>$name,
            'description' => $description,
        ]);

        return redirect()->back();

    }

    public function delete_perm(Request $request)
    {
        // dd($request);
        $id= $request->id;
        Permission::find($id)->delete();
        return redirect()->back();
    }

    public function add_perm(Request $request)
    {
        // dd($request);
        $name= $request->name;
        $description= $request->short_disc;
        Permission::create([
            'name' =>$name,
            'description' => $description,
        ]);

        return redirect()->back();
    }

    public function post_approval()
    {
        $posts= Post::where('approved',0)->where('created_by','!=',null)->latest()->get();
        $this->data['posts'] = $posts;
        return view('admin.postapproval', $this->data);
    }
    public function post_accept($post_id)
    {
        Post::where('id',$post_id)->update([
            'status' =>1,
            'approved' => 1,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
    public function post_reject($post_id)
    {
        Post::where('id',$post_id)->update([
            'status' =>0,
            'approved' => 2,
        ]);
        return redirect()->back();
    }
    public function user_approval()
    {
        $user= User::where('approved',0)->get();
        $roles=Role::get();
        $this->data['user'] = $user;
        $this->data['roles'] = $roles;
        return view('admin.userapproval', $this->data);
    }
    public function user_accept($user_id)
    {
        User::where('id',$user_id)->update([
            'approved' => 1,
        ]);
        $user=User::find($user_id);
        $user->removeRole('guest');
        $user->assignRole($user->raw_role);
        return redirect()->back();
    }
    public function user_reject($user_id)
    {
        User::where('id',$user_id)->update([
            'approved' => 2,
        ]);
        return redirect()->back();
    }

    public function mini_header_setting()
    {
        $mini=MiniHeader::get();
        return view('admin.miniheader',compact('mini'));
    }
}
