@extends('index')

@section('css')
    <link href="{{asset('css/comment.css')}} "rel="stylesheet">
@endsection


@section('content')
    <div class="container mt-5">

        <div class="d-flex justify-content-center row">
            <div class="col-md-8 bg-white">

            <div class="bg-white p-2">
                <h2 class="d-flex flex-column justify-content-start ml-2">Your Comments</h2>
                @if ($comments!=null)


                    <!-- repaeat text -->
                @foreach ($comments as $comment)
                <?php
                $var_1= $comment->created_at;
                $var_2 = strtotime($var_1);
                $date = date('F d, Y', $var_2);
                 ?>

                <div class="d-flex flex-column comment-section">
                    <div class="bg-white p-2">
                        <div class="d-flex flex-row user-info pt-2">
                            <div class="d-flex flex-column justify-content-start ml-2"><a href="{{ url('single_post/'.$comment->commentable_id) }}"><span class="d-block font-weight-bold name">{{ $comment->post_title }}</span></a></div>
                        </div>
                        <div class="mt-2">
                            <p class="comment-text cmnt">{{ $comment->comment }}</p>
                        </div>
                    </div>
                    <div class="bg-white">
                        <div class="d-flex flex-row fs-12">
                            <div class="like p-2 "><b>Posted on <i class="fa fa-clock ml-1"></i><span class="ml-1">{{ $date }}</span></b></div>
                        </div>
                        <hr>
                    </div>
                </div>
                @endforeach
                @else
                     <div class="d-flex flex-column justify-content-center" style="text-align: center; margin-bottom: 20px;"><span class="d-block font-weight-bold ">You Don't Have Posted Any Comment Yet!</span></div>

                @endif
                <!-- end repeat -->
            </div>

        </div>
    </div>
    {{ $comments->links() }}
    </div>
@endsection

@section('js')
@endsection
