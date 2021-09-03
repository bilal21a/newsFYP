<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function filter_post(Request $request){
        return view('filter');
    }

    public function search_post(Request $request){
        // dd($request->category);

        $posts = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        ->join('users as user', 'p.created_by', '=', 'user.id')
        ->select('cat.name as cat_name','p.id','p.title','p.short_description','p.main_image','p.created_at','p.created_by','user.name')
        ->where('p.status', 1);


        if ($request->search!=null) {
            $posts->where('p.title', "like", "%" . $request->search . "%")
            ->orWhere('p.short_description', "like", "%" . $request->search . "%");
        }

        if ($request->from!=null) {
            $posts->whereBetween('p.created_at', [$request->from, $request->to]);
        }

        if ($request->category!="0") {
            $posts->Where('p.category_id', [$request->category]);
        }

         return $posts->get()->toArray();
    }


    public function publish_posts(){
        $user_id=Auth::id();

        $posts = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        ->join('users as user', 'p.created_by', '=', 'user.id')
        ->select('cat.name as cat_name','p.id','p.title','p.short_description','p.main_image','p.created_at','p.created_by','user.name','user.id')
        ->where('p.created_by', $user_id)
        ->where('p.status', 1)
        ->latest()->get()->toArray();

        $this->data['posts'] = $posts;
        // dd($this->data);
        return view('yourposts',$this->data);
    }

    public function saved_posts(){
        $user_id=Auth::id();

        $posts = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        ->join('users as user', 'p.created_by', '=', 'user.id')
        ->select('cat.name as cat_name','cat.id as cat_id','p.id','p.title','p.short_description','p.description','p.main_image','p.list_image','p.created_at','p.created_by','user.name')
        ->where('p.created_by', $user_id)
        ->where('p.status', '!=' , 1)
        ->latest()->get()->toArray();

        $this->data['posts'] = $posts;
        // dd($posts);
        return view('draft',$this->data);
    }

    public function saved_posts_fetch(Request $request){
        // dd($request->all());

            if ($request->file('main_image')) {
                $request->validate([
                    'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);

                $imageExtension = $request->main_image->extension();
                $imageName="image_".uniqid(rand(), true).".".$imageExtension;
                $request->main_image->move(public_path('img/main_image/'), $imageName);
                // dd(public_path('img/main_image/' . $imageName));

                // main img
                $image = Image::make(public_path('img/main_image/' . $imageName))->fit(920, 520);
                $image->save();

                // thumb img
                $image = Image::make(public_path('img/main_image/' . $imageName))->fit(340, 180);
                $image->save(public_path('img/thumb_image/' . $imageName));

                // list img
                $image = Image::make(public_path('img/main_image/' . $imageName))->fit(110, 60);
                $image->save(public_path('img/list_image/' . $imageName));


                Post::where('id', '=', $request->post_id)->update([
                    'main_image' => $imageName ,
                    'thumb_image' => $imageName ,
                    'list_image' => $imageName ,
            ]);
            }

            Post::where('id', '=', $request->post_id)->update([
                'title' => $request->title ,
                'category_id' => $request->category ,
                'short_description' => $request->short_disc ,
                'description' => $request->disc
        ]);

        return redirect()->back();
    }


    public function saved_posts_delete(Request $request){

        // dd((int)$request->id);
        $post = Post::find( (int)$request->id );
        $post->delete();
        return redirect()->back();
    }


    public function author_name($user_id){

        $posts = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        ->join('users as user', 'p.created_by', '=', 'user.id')
        ->select('cat.name as cat_name','p.id','p.title','p.short_description','p.main_image','p.created_at','p.created_by','user.name')
        ->where('p.created_by', $user_id)
        ->where('p.status', 1)
        ->latest()->get()->toArray();

        $this->data['posts'] = $posts;
        return view('author',$this->data);
        // dd($posts);
    }


    public function by_date($created_at){

        $var_1= $created_at;
        $var_2 = strtotime($var_1);
        $date = date('Y-m-d', $var_2);

        $posts = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        ->join('users as user', 'p.created_by', '=', 'user.id')
        ->select('cat.name as cat_name','p.id','p.title','p.short_description','p.main_image','p.created_at','user.name')
        ->where('p.created_at', 'like', $date.'%')
        ->where('p.status', 1)
        ->latest()->get()->toArray();

        $this->data['posts'] = $posts;
        return view('bydate',$this->data);

        dd($posts);
    }
}
