<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    public function author_name($user_id){

        $posts = DB::table('posts as p')
        ->join('categories as cat', 'p.category_id', '=', 'cat.id')
        ->join('users as user', 'p.created_by', '=', 'user.id')
        ->select('cat.name as cat_name','p.id','p.title','p.short_description','p.main_image','p.created_at','p.created_by','user.name')
        ->where('p.created_by', $user_id)
        ->where('p.status', 1)
        ->latest()->get()->toArray();

        dd($posts);
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

        dd($posts);
    }
}
