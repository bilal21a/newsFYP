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
        //section 1
        $posts_most_viewed= Post::where('status', 1)->orderBy('view_count', 'desc')->first();

        //section 1.1
        $posts_most_viewed_2= Post::where('status', 1)->orderBy('view_count', 'desc')->take(5)->get()->toArray();
        array_shift($posts_most_viewed_2);

        //section tags
        $tags_ten=Tags::take(10)->get();

        //latest news
        $posts_latest_first= Post::where('status', 1)->latest()->first()->toArray();
        $posts_latest= Post::where('status', 1)->latest()->take(6)->get()->toArray();
        array_shift($posts_latest);
        // dd($posts_latest);

        //section 2
        $category= Category::where('status', 1)->get();
        $posts= Post::where('status', 1)->get();

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
         $this->data['category'] = $category;
         $this->data['posts'] = $posts;
         $this->data['post_count'] = $post_count;
         $this->data['posts_most_viewed'] = $posts_most_viewed;
         $this->data['posts_most_viewed_2'] = $posts_most_viewed_2;
         $this->data['tags_ten'] = $tags_ten;
         $this->data['posts_latest_first'] = $posts_latest_first;
         $this->data['posts_latest'] = $posts_latest;

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
        $request->input('hot_news');
        $title= $request->title;

       dd($request);
    }

}
