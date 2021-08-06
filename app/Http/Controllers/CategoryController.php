<?php

namespace App\Http\Controllers;

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
        ->select('cat.name as cat_name','p.title','p.short_description','p.main_image','p.created_at','user.name')
        ->where('p.status', 1)
        ->where('p.category_id', $cat_id)
        ->get()
        ->toArray();



        $most_posts_cat_raw = DB::table('posts as p')
                 ->select('category_id', DB::raw('count(*) as total'))
                 ->groupBy('category_id')
                 ->orderby('total', 'DESC')
                 ->where('status', 1)
                 ->get();

        $most_posts_cat=array();

        foreach ($most_posts_cat_raw as $key => $value) {
            // dd($value->total);
            $cat=DB::table('categories as cat')
            ->join('posts as p', 'p.category_id', '=', 'cat.id')
            ->select('cat.name as cat_name')
            ->where('p.status', 1)
            ->where('p.category_id', $value->category_id)
            ->distinct()
            ->get()
            ->toArray();
            $most_posts_cat[] = $cat;
        }


        $this->data['posts_all'] = $posts_all;
        // dd($this->data);

        return view('user.categories',$this->data);

    }
}
