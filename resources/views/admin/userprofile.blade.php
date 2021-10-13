@extends('admin.index')

@section('css')
@endsection

@section('content')
 <!-- Hero -->
 <div class="bg-image" style="background-image: url({{ asset('media/photos/bg123.png') }});">
    <div class="bg-black-50">
        <div class="content content-full text-center">
            <div class="my-3">
                @if ($user->profile_pic)
                <img class="img-avatar img-avatar-thumb" src="{{ asset ('img/profile_image/'.$user->profile_pic) }}" alt="">
                @else
                <img class="img-avatar img-avatar-thumb" src="{{ asset ('media/avatars/avatar7.jpg') }}" alt="">
                @endif
            </div>
            <h1 class="h2 text-white mb-0">{{ $user->name }}</h1>
            @if (isset($user->getRoleNames()[0]))
            <span class="text-white-75">{{ $user->getRoleNames()[0] }}</span>
            @endif
        </div>
    </div>
</div>
<!-- END Hero -->
<!-- Stats -->
<div class="bg-white border-bottom">
    <div class="content content-boxed">
        <div class="row items-push text-center">
            <div class="col-6 col-md-3">
                <div class="font-size-sm font-w600 text-muted text-uppercase">Published Posts</div>
                <div class="link-fx font-size-h3 text-primary">{{ count($publish_posts) }}</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="font-size-sm font-w600 text-muted text-uppercase">Saved Posts</div>
                <div class="link-fx font-size-h3 text-primary">{{ count($saved_posts) }}</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="font-size-sm font-w600 text-muted text-uppercase">Comments</div>
                <div class="link-fx font-size-h3 text-primary">{{ count($comments) }}</div>
            </div>
            <?php
            $var_1= $user->created_at;
            $var_2 = strtotime($var_1);
            $date = date('F d, Y', $var_2);
        ?>
            <div class="col-6 col-md-3">
                <div class="font-size-sm font-w600 text-muted text-uppercase">Member Since</div>
                <div class="link-fx font-size-h3 text-primary">{{ $date }}</div>
            </div>
        </div>
    </div>
</div>
<!-- END Stats -->

<!-- Page Content -->
<div class="content content-boxed">
    <div class="row">
        <div class="col-md-7 col-xl-8">
            <!-- Updates -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <i class="far fa-list-alt text-muted mr-1"></i> Posts
                    </h3>
                </div>

                <div class="block-content">
                @if (!$news->isEmpty())

                @foreach ($news as $single_news)
                    <div class="font-size-sm push">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{asset('img/main_image/'. $single_news->main_image)}}" alt="" class="stl" >
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between mb-2">
                                    <div>
                                        <a class="font-w600" href="">{{ $single_news->title }}</a>
                                    </div>
                                </div>
                                <p class="mb-0">{{ $single_news->short_description }}</p>
                                <?php
                                $var_1= $single_news->created_at;
                                $var_2 = strtotime($var_1);
                                $date = date('F d, Y', $var_2);
                            ?>
                                <div class="d-flex flex-row fs-12">
                                    <div class="like p-2 "><b><i class="fa fa-clock"></i><span class="ml-1">{{ $date }}</span></b></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                @endforeach
                {{ $news->links() }}

                @else
                    <div class="text-center"><h4 >There is no Post for this User</h4></div>
                @endif

                </div>
            </div>

            <!-- END Updates -->
        </div>
        <div class="col-md-5 col-xl-4">

            <!-- Ratings -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <i class="far fa-comments text-muted mr-1"></i> Comments
                    </h3>
                </div>
                <div class="block-content">
                    @if (!$comments->isEmpty())

                    @foreach ($comments as $comment)

                    <div class="font-size-sm push">
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <a class="font-w600" href="">{{ App\Post::where('id', $comment->commentable_id)->first()->title }}</a>
                            </div>
                        </div>
                        <p class="mb-0">{{ $comment->comment }}</p>
                        <?php
                                        $var_1= $comment->created_at;
                                        $var_2 = strtotime($var_1);
                                        $date = date('F d, Y', $var_2);
                                    ?>
                        <div class="d-flex flex-row fs-12">
                            <div class="like p-2 "><b><i class="fa fa-clock"></i><span class="ml-1">{{ $date }}</span></b></div>
                        </div>
                        <hr>
                    </div>
                    @endforeach
                    {{ $comments->links() }}


                    @else
                    <div class="text-center"><h6 >There is no Comment for this User</h6></div>
                    @endif

                </div>
            </div>
            <!-- END Ratings -->
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection

@section('js')
@endsection

@section('internal_css')
<style>
    .stl{
        width: 150px;
        height: 100px;
    }
</style>
@endsection
