@extends('admin.index')

@section('css')
@endsection

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Notifications <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
            </h1>
        </div>
    </div>
</div>
<!-- END Hero -->

{{-- Page Content --}}
<div style="background-color: #F8FBFC;">
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8 bg-white">
            <div class="bg-white p-2">
                    <!-- repaeat text -->
                @php
                    // dd($comments);
                @endphp

                @if (!$posts->isEmpty()||$comments->isEmpty()||$users->isEmpty())


                <div class="d-flex flex-column comment-section lh">
                        <div class="bg-white p-2">
                            {{-- posts unread notify 1 --}}
                            @foreach ($posts as $post)
                            @if ($post->notify==1)
                            <div class="row vl">
                                <div class="col-md-10 col-sm-8">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3">

                                            @if ($post->profile_pic==null)
                                            <img class="rounded-circle" src="{{asset('default.png')}}" width="50">
                                             @else
                                            <img class="rounded-circle" src="{{asset('img/profile_image/'. $post->profile_pic)}}" width="50">
                                             @endif
                                        </div>
                                        <div class="col-md-10 col-sm-9">

                                                <div class="d-flex flex-row user-info">
                                                    <div class="d-flex flex-column justify-content-start mt-2"><span class="d-block font-weight-bold name text-primary">{{ $post->name }} Posted a New Post</span></div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="comment-text"> <b> {{ $post->title }} </b></p>
                                                    <p class="comment-text"> <b> {{ date('F d, Y', strtotime($post->created_at)) }} </b></p>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-light circle" id="dropdown-default-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-dark"></i>
                                        </button>
                                        <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-light">
                                            <a class="dropdown-item" href="{{ route('admin.mark_unread_post',$post->post_id) }}">Mark as Read</a>
                                            <a class="dropdown-item" href="{{ route('admin.remove_unread_post',$post->post_id) }}">Remove Notification</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ url('admin/remove_all_unread_post/'.$post->post_id.'/'.$post->user_id) }}">Remove all Notification from {{ $post->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endif
                            @endforeach


                            {{-- comments unread notify 1 --}}
                            @foreach ($comments as $comment)
                            @if ($comment->notify==1)
                            <div class="row vl">
                                <div class="col-md-10 col-sm-8">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3">

                                            @if ($comment->profile_pic==null)
                                            <img class="rounded-circle" src="{{asset('default.png')}}" width="50">
                                             @else
                                            <img class="rounded-circle" src="{{asset('img/profile_image/'. $comment->profile_pic)}}" width="50">
                                             @endif
                                        </div>
                                        <div class="col-md-10 col-sm-9">

                                                <div class="d-flex flex-row user-info">
                                                    <div class="d-flex flex-column justify-content-start mt-2"><span class="d-block font-weight-bold name text-primary">{{ $comment->name }} Commented on {{ $comment->post_title }}</span></div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="comment-text"> <b> "{{ $comment->comment }}" </b></p>
                                                    <p class="comment-text"> <b> {{ date('F d, Y', strtotime($comment->created_at)) }} </b></p>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-light circle" id="dropdown-default-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-dark"></i>
                                        </button>
                                        <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-light">
                                            <a class="dropdown-item" href="{{ route('admin.mark_unread_comment',$comment->id) }}">Mark as Read</a>
                                            <a class="dropdown-item" href="{{ route('admin.remove_unread_comment',$comment->id) }}">Remove Notification</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ url('admin/remove_all_unread_comment/'.$comment->id.'/'.$comment->user_id) }}">Remove all Notification from {{ $comment->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endif
                            @endforeach

                            {{-- users unread notify 1 --}}
                            @foreach ($users as $user)
                            @if ($user->notify==1)
                            <div class="row vl">
                                <div class="col-md-10 col-sm-8">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3">

                                            @if ($user->profile_pic==null)
                                            <img class="rounded-circle" src="{{asset('default.png')}}" width="50">
                                             @else
                                            <img class="rounded-circle" src="{{asset('img/profile_image/'. $user->profile_pic)}}" width="50">
                                             @endif
                                        </div>
                                        <div class="col-md-10 col-sm-9">
                                                <div class="d-flex flex-row user-info">
                                                    <div class="d-flex flex-column justify-content-start mt-2"><span class="d-block font-weight-bold name text-primary">{{ $user->name }} joined World News</span></div>
                                                </div>
                                                <div class="mt-2">
                                                    {{-- <p class="comment-text"> <b> {{ $user->title }} </b></p> --}}
                                                    <p class="comment-text"> <b> {{ date('F d, Y', strtotime($user->created_at)) }} </b></p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-light circle" id="dropdown-default-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-dark"></i>
                                        </button>
                                        <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-light">
                                            <a class="dropdown-item" href="{{ route('admin.mark_unread_user',$user->id) }}">Mark as Read</a>
                                            <a class="dropdown-item" href="{{ route('admin.remove_unread_user',$user->id) }}">Remove Notification</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endif
                            @endforeach


                            {{-- -------------------------------read section=----------------- --}}
                            {{-- posts read notify 0 --}}
                            @foreach ($posts as $post)
                            @if ($post->notify==0)
                            <div class="row">
                                <div class="col-md-10 col-sm-8">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3">
                                            @if ($post->profile_pic==null)
                                            <img class="rounded-circle" src="{{asset('default.png')}}" width="50">
                                             @else
                                            <img class="rounded-circle" src="{{asset('img/profile_image/'. $post->profile_pic)}}" width="50">
                                             @endif
                                        </div>
                                        <div class="col-md-10 col-sm-9">
                                                <div class="d-flex flex-row user-info">
                                                    <div class="d-flex flex-column justify-content-start mt-2"><span class="d-block name text-info">{{ $post->name }} Posted a New Post</span></div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="comment-text"> <b> {{ $post->title }} </b></p>
                                                    <p class="comment-text"> <b> {{ date('F d, Y', strtotime($post->created_at)) }} </b></p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-light circle" id="dropdown-default-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-dark"></i>
                                        </button>
                                        <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-light">
                                            <a class="dropdown-item" href="{{ route('admin.remove_unread_post',$post->post_id) }}">Remove Notification</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ url('admin/remove_all_unread_post/'.$post->post_id.'/'.$post->user_id) }}">Remove all Notification from {{ $post->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endif
                            @endforeach

                            {{-- comments read notify 0 --}}
                            @foreach ($comments as $comment)
                            @if ($comment->notify==0)
                            <div class="row">
                                <div class="col-md-10 col-sm-8">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3">
                                            @if ($comment->profile_pic==null)
                                            <img class="rounded-circle" src="{{asset('default.png')}}" width="50">
                                             @else
                                            <img class="rounded-circle" src="{{asset('img/profile_image/'. $comment->profile_pic)}}" width="50">
                                             @endif                                        </div>
                                        <div class="col-md-10 col-sm-9">
                                                <div class="d-flex flex-row user-info">
                                                    <div class="d-flex flex-column justify-content-start mt-2"><span class="d-block name text-info">{{ $comment->name }} Commented on {{ $comment->post_title }}</span></div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="comment-text"> <b> "{{ $comment->comment }}" </b></p>
                                                    <p class="comment-text"> <b> {{ date('F d, Y', strtotime($comment->created_at)) }} </b></p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-light circle" id="dropdown-default-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-dark"></i>
                                        </button>
                                        <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-light">
                                            <a class="dropdown-item" href="{{ route('admin.remove_unread_comment',$comment->id) }}">Remove Notification</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ url('admin/remove_all_unread_comment/'.$comment->id.'/'.$comment->user_id) }}">Remove all Notification from {{ $comment->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endif
                            @endforeach

                            {{-- users read notify 0 --}}
                            @foreach ($users as $user)
                            @if ($user->notify==0)
                            <div class="row">
                                <div class="col-md-10 col-sm-8">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3">
                                            @if ($user->profile_pic==null)
                                            <img class="rounded-circle" src="{{asset('default.png')}}" width="50">
                                             @else
                                            <img class="rounded-circle" src="{{asset('img/profile_image/'. $user->profile_pic)}}" width="50">
                                             @endif                                        </div>
                                        <div class="col-md-10 col-sm-9">
                                                <div class="d-flex flex-row user-info">
                                                    <div class="d-flex flex-column justify-content-start mt-2"><span class="d-block name text-info">{{ $user->name }} joined World News</span></div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="comment-text"> <b> {{ date('F d, Y', strtotime($user->created_at)) }} </b></p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-light circle" id="dropdown-default-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-dark"></i>
                                        </button>
                                        <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-light">
                                            <a class="dropdown-item" href="{{ route('admin.remove_unread_user',$user->id) }}">Remove Notification</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endif
                            @endforeach
                        </div>
                <!-- end repeat -->

            </div>
            @else
            <div class="d-flex flex-column justify-content-center" style="text-align: center;"><span class="d-block font-weight-bold ">You Don't Have Notification Yet!</span></div>
            @endif

        </div>
    </div>
</div>
</div>
</div>
{{-- Page Content End --}}

@endsection

@section('js')
@endsection

@section('internal_css')
<style>
.vl{
    border-left: 7px solid #5c80d1!important;
    border-radius: 5px 0px 0px 5px;
}
.circle{
    border-radius: 50%;
}
.a-tag{
    text-decoration: none;
}
.lh{
    line-height: 12px;
}
.name{
    font-size: 14px !important;
}
.comment-text{
    font-size: 12px !important;
    color: black;
}
.duration{
    font-size: 12px !important;
    color: black;
}
</style>
@endsection
