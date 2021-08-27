@extends('index')
@section('content')
<div class="pt-4">
   <!-- LATEST POST -->
   <section class="block">
      <div class="block-content">
         <div class="mt-5" style="margin: 0px 12px;">
            <h2 class="georgia">Hot News </h2>
         </div>
         <div class="row">
             @foreach ($hot_news as $single_hot)

             <?php
                $var_1= $single_hot->created_at;
                $var_2 = strtotime($var_1);
                $date = date('F d, Y', $var_2);
                // dd($single_hot);
             ?>

            <div class="col-md-3 col-sm-6">
               <div class="block-content pb-3 my_card " style="padding-top: 0">
                  <div class="row round1">
                     <div class="col-sm-12 round" >
                        <a href="{{ url('single_post/'.$single_hot->id) }}"><img src={{asset('img/main_image/'. $single_hot->main_image)}} alt="" class="round"></a>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12 pt-1" >
                        <a href="{{ url('categories/'.$single_hot->cat_id) }}"><span class="cat-name" >{{$single_hot->cat_name}}</span></a>
                        <a href="{{ url('single_post/'.$single_hot->id) }}" class="text-dark">
                           <h5 class="mt-3 mb-0">{{$single_hot->title}}</h5>
                           <p class="card-text short_disc mb-1" > {{ substr($single_hot->short_description,0,100) }} ...</p>
                        </a>
                        <a href="" class="text-dark"><span class="short_disc">{{$single_hot->name}}</span></a> | <a href="" class="text-dark"><span class="short_disc">{{$date}}</span></a>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach

         </div>
         <br>
         <a href="{{ url('hot_news') }}">
         <button type="button" class="btn btn-sm btn-light mr-1 mb-3 cat_btn" style="float: right;">
         View All<i class="fa fa-angle-double-right  ml-1"></i>
         </button>
        </a>
         <br><br>
      </div>
   </section>
   <!-- END LATEST POSTS -->


   <!-- DO NOT CHANGE IT -->
   <section class="block">
      <!-- 4 in 1 -->
      <section class="block">
         <div class="block-content">
            <div class="" style="margin: 0px 12px;">
               <h2 class="georgia">Latest News </h2>
            </div>
            <div class="row">

                @foreach ($latest_news as $latest_single)

                <?php
                    $var_1= $latest_single->created_at;
                    $var_2 = strtotime($var_1);
                    $date = date('F d, Y', $var_2);
                    // dd($latest_single);
                 ?>

               <div class="col-md-3 col-sm-6">
                  <div class="block-content pb-3 my_card " style="padding-top: 0">
                     <div class="row round1">
                        <div class="col-sm-12 round" >
                           <a href="{{ url('single_post/'.$latest_single->id) }}"><img src={{asset('img/main_image/'. $latest_single->main_image)}} alt="" class="round"></a>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12 pt-1" >
                           <a href="{{ url('categories/'.$latest_single->cat_id) }}"><span class="cat-name" >{{$latest_single->cat_name}}</span></a>
                           <a href="{{ url('single_post/'.$latest_single->id) }}" class="text-dark">
                              <h5 class="mt-3 mb-0">{{$latest_single->title}}</h5>
                           </a>
                           <a href="" class="text-dark"><span class="short_disc"> {{$latest_single->name}}</span></a> | <a href="" class="text-dark"><span class="short_disc"> {{$date}}</span></a>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach


            </div>
            <br>
            <a href="{{ url('latest_news') }}">
            <button type="button" class="btn btn-sm btn-light mr-1 mb-3 cat_btn" style="float: right;">
            View All<i class="fa fa-angle-double-right  ml-1"></i>
            </button>
            </a>
            <br><br>
         </div>
      </section>
      <!-- End 4 in 1 -->
      <hr style="margin: 0px 50px;">




      <!-- 3 in 1 -->
      <section class="block">
         <div class="block-content">
            <div class="" style="margin: 0px 12px;">
               <h2 class="georgia">Top Stories </h2>
            </div>
            <div class="row">

                @foreach ( $top_stories as $top_single )
                    <?php
                        $var_1= $top_single->created_at;
                        $var_2 = strtotime($var_1);
                        $date = date('F d, Y', $var_2);
                    ?>
               <div class="col-md-4 col-sm-4">
                  <div class="block-content pb-3 my_card " style="padding-top: 0">
                     <div class="row round1">
                        <div class="col-sm-12 round" >
                           <a href="{{ url('single_post/'.$top_single->id) }}"><img src={{asset('img/main_image/'. $top_single->main_image)}} alt="" class="round"></a>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12 pt-1" >
                           <a href="{{ url('categories/'.$top_single->cat_id) }}"><span class="cat-name" >{{$top_single->cat_name}}</span></a>
                           <a href="{{ url('single_post/'.$top_single->id) }}" class="text-dark">
                              <h5 class="mt-3 mb-0">{{$top_single->title}}</h5>
                              <p class="card-text short_disc mb-1" >{{ substr($top_single->short_description,0,100) }} ...</p>
                           </a>
                           <a href="" class="text-dark"><span class="short_disc">{{$top_single->name}}</span></a> | <a href="" class="text-dark"><span class="short_disc"> {{$date}}</span></a>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach



            </div>
            <br>
            <a href="{{ url('top_stories') }}">
            <button type="button" class="btn btn-sm btn-light mr-1 mb-3 cat_btn" style="float: right;">
            View All<i class="fa fa-angle-double-right  ml-1"></i>
            </button></a>
            <br><br>
         </div>
      </section>
      <!-- End 3 in 1 -->
      <hr style="margin: 0px 50px;">



      <!-- Top Categories -->
      <section class="block">
         <div class="block-content">
            <h2 style="margin-left: 12px;" class="georgia">Top Categories</h2>
            <div class="row" style="margin: 0px 12px;">

                @foreach ($post_count as $count)
                <?php
                $category_topFour= App\Category::where('status', 1)->where('id', $count->category_id)->first();
                $first_post= App\Post::where('status', 1)->where('category_id', $count->category_id)->first();
                $three_post= App\Post::where('status', 1)->where('category_id', $count->category_id)->take(4)->get()->toArray();
                array_shift($three_post);
                ?>


               <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                  <h3 class="long_cat" >{{$category_topFour->name}}</h3>
                  <a href="{{ url('single_post/'.$first_post['id']) }}">
                     <div class="row">
                        <div class="col-md-4 pad">
                           <img src={{asset('img/main_image/'. $first_post['main_image'])}} alt="" style="width: 100%;">
                        </div>
                        <div class="col-md-8">
                           <p class="s-ttl pt-1 text-dark" >{{$first_post['title']}}</p>
                        </div>
                     </div>
                  </a>
                  <hr>
                  @foreach ($three_post as $three)
                  <a href="{{ url('single_post/'.$three['id']) }}" class="text-dark">
                    <p class="s-ttl">{{$three['title']}}</p>
                 </a>
                 <hr>
                  @endforeach


               </div>

               @endforeach
            </div>
            <br>
            <a href="{{ url('all_categories') }}">
            <button type="button" class="btn btn-sm btn-light mr-1 mb-3 cat_btn" style="float: right;">
            View All<i class="fa fa-angle-double-right  ml-1"></i>
            </button></a>
            <br><br>
         </div>
      </section>



   </section>
   <!-- END DO NOT CHANGE IT -->





</div>
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
   .short_disc{
   font-size: 12px;
   }
   .my_card:hover,
   .my_card:focus,
   .my_card:active {
   transform: scale(1.1);
   transition: 0.5S;
   cursor: pointer;
   }
   .georgia {
   font-family: Georgia, serif;
   }
   .cat-name{
   text-transform: uppercase;
   padding:5px;
   background:#46c37b;
   color:white;
   display: inline-block;
   line-height: 10px; font-size: 12px;
   }
   .cat-name:hover{
   background:#14a800;
   }
   .cat_btn {
   color: #46c37b;
   }
   .cat_btn:hover {
   color: #14a800;
   }
   .long_cat{
   padding-left: 10px;
   border-left: 5px solid #14a800;
   }
   .s-ttl{
   line-height: 20px;
   font-size: 14px;
   }
   .k {
   overflow: hidden;
   display: -webkit-box;
   -webkit-line-clamp: 2;
   -webkit-box-orient: vertical;
   }
   @media only screen and (min-width: 767px)
   {
   .pad{
   padding-right: 0px;
   }
   }
</style>
@endsection
@section('css')
<link href="{{asset('css/single.css')}} "rel="stylesheet">
<link href="{{asset('css/comment.css')}} "rel="stylesheet">
@endsection
