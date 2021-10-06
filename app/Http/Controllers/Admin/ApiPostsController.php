<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class ApiPostsController extends Controller
{
    public function posts_api()
    {
        $posts= Post::where('created_by', '=', null)->latest()->get();
        $this->data['posts'] = $posts;
        // dd($this->data);

        return view('admin.api_posts',$this->data);

    }
}
