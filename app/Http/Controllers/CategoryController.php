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
}
