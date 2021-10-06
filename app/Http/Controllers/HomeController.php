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
use Intervention\Image\Facades\Image;
use App\Api;
use Illuminate\Support\Facades\Cache;
use jcobhams\NewsApi\NewsApi;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('auth',['except'=>['index','single_post']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //top category
        $post_count =DB::table('posts')
        ->select('category_id',DB::raw('count(*) as total'))
        ->orderBy('total','desc')
        ->take(4)
        ->groupBy('category_id')->get();

            // dd($post_count);



        //top stories
        $top_stories = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        // ->join('users as user', 'p.created_by', '=', 'user.id')
        ->select('cat.name as cat_name','cat.id as cat_id','p.*')
        ->where('p.status', 1)
        ->orderBy('view_count', 'desc')
        ->latest()->take(3)->get()->toArray();
        // dd($top_stories);

        //latest news
        $latest_news = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        // ->join('users as user', 'p.created_by', '=', 'user.id')
        ->select('cat.name as cat_name','cat.id as cat_id','p.*')
        ->where('p.status', 1)
        ->latest()->take(4)->get()->toArray();
        // dd($latest_news);

        //hot news
        $hot_news = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        // ->join('users as user', 'p.created_by', '=', 'user.id')
        ->select('cat.name as cat_name','cat.id as cat_id','p.*')
        ->where('p.status', 1)
        ->where('p.hot_news', 1)
        ->latest()->take(4)->get()->toArray();

         //setting data
         $this->data['hot_news'] = $hot_news;
         $this->data['latest_news'] = $latest_news;
         $this->data['top_stories'] = $top_stories;
         $this->data['post_count'] = $post_count;

        return view('user.home',$this->data);
    }

    public function single_post($post_id)
    {
       //single news
        $post = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        ->select('cat.id as cat_id','cat.name as cat_name','p.*')
        ->where('p.status', 1)
        ->where('p.id', $post_id)
        ->first();

        $cat_id=$post->cat_id;


        //increase view count by 1
        $view_count=$post->view_count;
        $view_count=$view_count+1;
        Post::where('id', $post_id)->update(['view_count' => $view_count]);
        // dd($cat_id);


        //latest news
        $latest_news = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        ->select('cat.name as cat_name','p.*')
        ->where('p.status', 1)
        ->latest()->take(20)->get()->toArray();

        //related posts
        $related_news = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        ->select('cat.name as cat_name','p.*')
        ->where('p.status', 1)
        ->where('p.category_id', $cat_id)
        ->take(4)
        ->get()
        ->toArray();

        //comments
        $comments = DB::table('comments as c')
        ->join('users as u', 'c.user_id', '=', 'u.id')
        // ->join('posts as p', 'c.commentable_id', '=', 'p.id')
        ->select('c.comment','c.created_at','c.commentable_id','u.name','u.profile_pic')
        ->where('c.commentable_id', $post_id)
        ->get()->toArray();
        // dd($comments);
        $this->data['post'] = $post;
        $this->data['latest_news'] = $latest_news;
        $this->data['related_news'] = $related_news;
        $this->data['comments'] = $comments;
        // dd($this->data);
        return view('user.singlepage',$this->data);
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
            $status=2;
        }
        else{
            $status=0;
        }

        $request->validate([
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // dd($main_image);

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
        $image = Image::make(public_path('img/main_image/' . $imageName))->fit(60, 60);
        $image->save(public_path('img/list_image/' . $imageName));

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
        $post->approved = 0;
        $post->save();

        return redirect()->route('home');
    }

    public function search(Request $request)
    {
        // dd($request);
        $search=$request->search;

        $endpoint = "https://newsapi.org/v2/top-headlines";
        $client = new \GuzzleHttp\Client();
        $apiKey = getenv('NEWS_API_KEY');

        $response = $client->request('GET', $endpoint, ['query' => [
            'q' => $search,
            'apiKey' => $apiKey,
        ]]);

        $statusCode = $response->getStatusCode();
        $data = json_decode($response->getBody(), true);
        $this->data['data'] = $data;
        // dd($this->data);
        if ($data['articles']) {
            return view('user.apisource',$this->data);
        }
        else
        {
            return "No Result According to your Search";
        }
    }
}
