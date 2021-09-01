<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        $comment = new Comment();

        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());

        $post = Post::find($request->post_id);

        $post->comments()->save($comment);

        return back();
    }

    // public function replyStore(Request $request)
    // {
    //     dd($request);

    //     $reply = new Comment();

    //     $reply->comment = $request->get('comment');

    //     $reply->user()->associate($request->user());

    //     $reply->parent_id = $request->get('comment_id');

    //     $post = Post::find($request->get('post_id'));

    //     $post->comments()->save($reply);

    //     return back();

    // }

    public function your_comments()
    {
        $user_id=Auth::id();

         //comments
         $comments = DB::table('comments as c')
         ->join('users as user', 'c.user_id', '=', 'user.id')
         ->join('posts as p', 'c.commentable_id', '=', 'p.id')
         ->select('user.name','c.comment','c.created_at','c.commentable_id','user.profile_pic','p.title as post_title')
         ->where('c.user_id', $user_id)
         ->get()->toArray();

         $this->data['comments'] = $comments;
        // dd($this->data);
        return view('showcomment',$this->data);
    }

}
