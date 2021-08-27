<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show_categories($cat_id)
    {
        $posts_all = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        ->join('users as user', 'p.created_by', '=', 'user.id')
        ->select('cat.name as cat_name','p.id','p.title','p.short_description','p.main_image','p.created_at','user.name')
        ->where('p.status', 1)
        ->where('p.category_id', $cat_id)
        ->paginate(12);
        // ->get()
        // ->toArray();

        $cat_name=Category::where('id', $cat_id)->get()->toArray();




        $this->data['posts_all'] = $posts_all;
        $this->data['cat_name'] = $cat_name;
        // dd($this->data);
        return view('user.unicategories',$this->data);

    }
    public function hot_news()
    {
         //hot news
         $hot_news = DB::table('posts as p')
         ->join('categories as cat', 'p.category_id', '=', 'cat.id')
         ->join('users as user', 'p.created_by', '=', 'user.id')
         ->select('cat.name as cat_name','cat.id as cat_id','p.id','p.title','p.short_description','p.main_image','p.created_at','user.name')
         ->where('p.status', 1)
         ->where('p.hot_news', 1)
         ->latest()->paginate(12);



        $this->data['hot_news'] = $hot_news;
        return view('user.all.hotnews',$this->data);

    }
    public function latest_news()
    {
           //latest news
        $latest_news = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        ->join('users as user', 'p.created_by', '=', 'user.id')
        ->select('cat.name as cat_name','cat.id as cat_id','p.id','p.title','p.short_description','p.main_image','p.created_at','user.name')
        ->where('p.status', 1)
        ->latest()->paginate(12);



        $this->data['latest_news'] = $latest_news;
        return view('user.all.latestnews',$this->data);

    }
    public function top_stories()
    {
          //top stories
        $top_stories = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        ->join('users as user', 'p.created_by', '=', 'user.id')
        ->select('cat.name as cat_name','cat.id as cat_id','p.id','p.title','p.short_description','p.main_image','p.created_at','user.name')
        ->where('p.status', 1)
        ->orderBy('view_count', 'desc')
        ->latest()->paginate(12);
        // ->take(3)->get()->toArray();



        $this->data['top_stories'] = $top_stories;
        return view('user.all.topstories',$this->data);

    }
    public function all_categories()
    {




        $this->data['top_stories'] = $top_stories;
        return view('user.all.topstories',$this->data);

    }
}
