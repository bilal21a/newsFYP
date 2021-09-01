@extends('index')
@section('css')

<link href="{{asset('css/single.css')}} "rel="stylesheet">


<link href="{{asset('css/comment.css')}} "rel="stylesheet">

@endsection
@section('inline_css')
<style>
   .round{
   width: 100%;
   border-radius: 10px 10px 0px 0px;
   }
   .round1{
   border-radius: 15px 15px 0px 0px;
   }
</style>
@endsection
@section('content')

<div class="content">
   <div class="">
      <div class="block">
         <div class="row">
            <div class="col-md-8">
               <div class="block-content">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb breadcrumb-alt push">
                        <li class="breadcrumb-item">
                           <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                           <a href="{{ url('categories/' .$post->cat_id) }}">{{$post->cat_name}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                     </ol>
                  </nav>
                  <h1 class="font-w700" style="line-height: 35px;">{{$post->title}}</h1>
                  <img src="{{asset('img/main_image/'. $post->main_image)}}" alt="" style="width: 100%;">
                  <div class="pt-2 pb-3">
                     <span>
                     <a href="#" class="text-dark pr-4"><i class="fa fa-user">   {{$post->name}}</i></a>
                            <?php
                                $var_1= $post->created_at;
                                $var_2 = strtotime($var_1);
                                $date = date('F d, Y', $var_2);
                            ?>

                     <a href="#" class="text-dark pr-4"><i class="fa fa-clock"> {{$date}}</i></a>
                     </span>
                  </div>
                  <div class="block block-rounded block-link-pop" style="background-color: #f5f5f5;">
                     <div class="block-content">
                        <p><i>{{ $post->short_description  }}</i></p>
                     </div>
                  </div>
                  <div >{!! $post->description !!}
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="blog-comment">
                           <h3 class="text-success mt-2">Comments</h3>
                           <hr>

                           <div class="container mt-3">
                              <div class="d-flex justify-content-center row">
                                 <div class="col-md-12">
                                    <div class="d-flex flex-column comment-section">

                                    @if ($comments!=null)

                                    @foreach ($comments as $comment)
                                    <?php
                                    $var_1= $comment->created_at;
                                    $var_2 = strtotime($var_1);
                                    $date = date('F d, Y', $var_2);
                                    ?>
                                       <div class="bg-white p-2">
                                          <div class="d-flex flex-row user-info">
                                             <img class="rounded-circle" src="{{asset('img/profile_image/'. $comment->profile_pic)}}" style="width: 6%;height: 6%;">
                                             <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{ $comment->name }}</span><span class="date text-black-50">Shared publicly - {{ $date }}</span></div>
                                          </div>
                                          <div class="mt-2">
                                             <p class="comment-text">{{ $comment->comment }}</p>
                                          </div>
                                       </div>
                                    @endforeach

                                    @else
                                    <h4>No Comments Posted</h4>

                                    @endif

                                       {{-- <div class="bg-white">
                                          <div class="d-flex flex-row fs-12">
                                             <div class="like p-2 cursor"><i class="far fa-thumbs-up"></i><span class="ml-1">Like</span></div>
                                             <div class="like p-2 cursor"><i class="far fa-comment-dots"></i><span class="ml-1">Comment</span></div>
                                             <div class="like p-2 cursor"><i class="fa fa-share-alt"></i><span class="ml-1">Share</span></div>
                                          </div>
                                       </div> --}}


                                       <div class="bg-light p-2">
                                        <form method="post" action="{{ route('comment.add') }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-start">
                                            <img class="rounded-circle" src="{{asset('img/profile_image/'.Auth::user()->profile_pic)}}" style="width: 6%;height: 6%;">
                                            <textarea class="form-control ml-1 shadow-none textarea" name="comment" placeholder="Type your comment" required></textarea>
                                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                        </div>
                                        <div class="mt-2 text-right">
                                             <button type="submit" class="btn  btn-success">Post Comment</button>
                                             {{-- <button type="button" class="btn btn-sm btn-outline-success">Cancel</button> --}}
                                        </div>
                                        </form>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>


                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="block-content">
                  <h2 class="pt-3">Latest News </h2>
               </div>


               @foreach ( $latest_news as $news_lat)

               <a class="block block-rounded block-link-pop" href="{{ url('single_post/'.$news_lat->id) }}">
                  <div class="block-content" style="padding-top: 0">
                     <div class="row">
                        <div class="col-sm-3 customwork" >
                            <?php
                                // dd($news_lat);
                            ?>
                           <img src="{{asset('img/list_image/'. $news_lat->list_image)}}" alt="" style="width: 100%;">
                        </div>
                        <div class="col-sm-9" >
                            <?php
                                $count=str_word_count($news_lat->title);
                            ?>
                            @if ($count<8)
                           <h5 class="mt-1 mb-0" >{{ substr($news_lat->title,0,30) }} </h5>
                            @else
                           <h5 class="mt-1 mb-0" >{{ substr($news_lat->title,0,30) }}...  </h5>
                            @endif

                           <?php
                                    $var_1= $news_lat->created_at;
                                    $var_2 = strtotime($var_1);
                                    $date = date('F d, Y', $var_2);
                            ?>

                           <small><i class="far fa-clock"> {{$date}}</i></small>
                        </div>
                     </div>
                  </div>
               </a>

               @endforeach

            </div>
         </div>
         <div class="block-content">
            <div class="row">
               <div class="col-md-12">
                  <h2 class="pt-3">Related News </h2>
               </div>
               <div class="row mt-2">
                  @foreach ($related_news as $news_rel)


                  <div class="col-md-3 col-sm-6">
                     <a class="block block-rounded block-link-pop" href="{{ url('single_post/'.$news_rel->id) }}">
                        <div class="block-content pb-3" style="padding-top: 0">
                           <div class="row round1">
                              <div class="col-sm-12 pt-3 round" >
                                 <img src="{{asset('img/main_image/'. $news_rel->main_image)}}" alt="" class="round">
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-12 " >
                                 <h5 class="mt-1">{{$news_rel->title}}</h5>
                                 <?php
                                    $var_1= $news_rel->created_at;
                                    $var_2 = strtotime($var_1);
                                    $date = date('F d, Y', $var_2);
                                ?>
                                 <small><i class="far fa-clock"> {{$date}}</i></small>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>

                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
<script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery-validation/additional-methods.js')}}"></script>
@endsection
