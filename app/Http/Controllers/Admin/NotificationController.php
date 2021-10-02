<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function notification()
    {
        $posts = DB::table('posts as p')
        ->where('p.notify', '!=', null)
        ->join('users as user', 'p.created_by', '=', 'user.id')
        ->select('p.title','p.notify','p.created_at','p.id as post_id','user.profile_pic','user.id as user_id','user.name')
        ->where('p.status', 1)
        ->latest()->get();

        $comments = DB::table('comments as c')
        ->where('c.notify', '!=', null)
        ->join('users as user', 'c.user_id', '=', 'user.id')
        ->join('posts as p', 'c.commentable_id', '=', 'p.id')
        ->select('c.id','c.user_id','c.comment','c.created_at','c.commentable_id','c.notify','user.name','user.profile_pic','p.title as post_title')
        ->latest()->get();


        $users = DB::table('users as u')
        ->where('u.notify', '!=', null)->latest()->get();

        $this->data['posts'] = $posts;
        $this->data['comments'] = $comments;
        $this->data['users'] = $users;

        return view('admin.notification',$this->data);
    }

    // ---------------post----------------------------
    public function mark_unread_post($post_id)
    {
        Post::find($post_id)->update([
            'notify' => 0,
        ]);
        return redirect()->back();
    }
    public function remove_unread_post($post_id)
    {
        Post::find($post_id)->update([
            'notify' => null,
        ]);
        return redirect()->back();
    }
    public function remove_all_unread_post($post_id,$user_id)
    {
        Post::where('created_by',$user_id)->update([
            'notify' => null,
        ]);
        return redirect()->back();
    }

    // -----------------comment-------------------
    public function mark_unread_comment($id)
    {
        Comment::where('id',$id)->update([
            'notify' => 0,
        ]);
        return redirect()->back();
    }
    public function remove_unread_comment($id)
    {
        Comment::where('id',$id)->update([
            'notify' => null,
        ]);
        return redirect()->back();
    }
    public function remove_all_unread_comment($id,$user_id)
    {
        Comment::where('user_id',$user_id)->update([
            'notify' => null,
        ]);
        return redirect()->back();
    }

// ------------------user-------------------
    public function mark_unread_user($id)
    {
        User::where('id',$id)->update([
            'notify' => 0,
        ]);
        return redirect()->back();
    }
    public function remove_unread_user($id)
    {
        User::where('id',$id)->update([
            'notify' => null,
        ]);
        return redirect()->back();
    }
}
