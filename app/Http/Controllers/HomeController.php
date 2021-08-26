<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tags;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;
use PDO;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //top stories
        $top_stories= Post::where('status', 1)->orderBy('view_count', 'desc')->take(3)->get()->toArray();

        //latest news
        $latest_news= Post::where('status', 1)->latest()->take(4)->get()->toArray();
        // dd($latest_news);

        //hot news
        $hot_news = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        ->join('users as user', 'p.created_by', '=', 'user.id')
        ->select('cat.name as cat_name','p.id','p.title','p.short_description','p.main_image','p.created_at','user.name')
        ->where('p.status', 1)
        ->latest()
        ->take(4)
        ->get()
        ->toArray();

        //show top 4 catogories with most posts
        $post_raw= Post::where('status', 1)
        ->select('category_id')->get()->toArray();
        //show top 4 catogories with most posts
        foreach($post_raw as $single){
            $post_items[] = $single['category_id'];
        }
        $post_count=array_count_values($post_items);
        $post_count_flip=array_flip($post_count);
        $post_count = array_slice($post_count_flip, 0, 4);

         //setting data
         $this->data['hot_news'] = $hot_news;
         $this->data['latest_news'] = $latest_news;
         $this->data['top_stories'] = $top_stories;
         $this->data['post_count'] = $post_count;

        //  dd($this->data);

        return view('user.home',$this->data);
    }








    public function single_post($post_id)
    {
        $post = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        ->select('cat.name','cat.status','cat.created_at','p.*')
        ->where('p.id', $post_id)
        ->first();

        $this->data['post'] = $post;
        return view('user.single-page',$this->data);
    }


    public function upload_post(Request $request)
    {
        // $userId = Auth::id();
        $title= $request->title;
        $short_description = $request->short_disc;
        $description = $request->disc;
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        $category_id= $request->category;
        $created_by= Auth::id();
        $main_image= $request-> main_image;
        $hot_news_raw= $request->input('hot_news');

        if ($hot_news_raw==null) {
            $hot_news=0;
        }
        else{
            $hot_news=1;
        }

        $status_raw = $request-> submit;
        if ($status_raw=="Publish") {
            $status=1;
        }
        else{
            $status=0;
        }

        $request->validate([
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageExtension = $request->main_image->extension();
        $imageName="main_image_".uniqid(rand(), true).".".$imageExtension;
        $request->main_image->move(public_path('img/main_image'), $imageName);
        /* Store $imageName name in DATABASE from HERE */

        $post = new Post();
        $post->title = $title;
        $post->short_description = $short_description;
        $post->description = $description;
        $post->slug = $slug;
        $post->category_id = $category_id;
        $post->created_by = $created_by;
        $post->main_image = $imageName;
        $post->hot_news = $hot_news;
        $post->status = $status;
        $post->save();

        return redirect()->route('home');
    }

}
