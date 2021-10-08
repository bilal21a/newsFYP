@extends('index')
@section('content')
<section class="block">
    <div class="block-content">
       <div class="" style="margin: 0px 12px;">
          <h2 class="georgia">{{ $data['articles'][0]['source']['name'] }} </h2>
       </div>
       <div class="row">
            @php
                // dd($data);
            @endphp
           @foreach ( $data['articles'] as $single_api )
               <?php
                   $var_1= $single_api['publishedAt'];
                   $var_2 = strtotime($var_1);
                   $date = date('F d, Y', $var_2);
               ?>
          <div class="col-md-4 col-sm-4">
             <div class="block-content pb-3 my_card " style="padding-top: 0">
                <div class="row round1">
                   <div class="col-sm-12 round" >
                      <img src="{{ $single_api['urlToImage'] }}" alt="" class="round">
                   </div>
                </div>
                <div class="row">
                   <div class="col-sm-12 pt-1" >
                         <h5 class="mt-3 mb-0">{{$single_api['title']}}</h5>
                         <p class="card-text short_disc mb-1" >{{ substr($single_api['description'],0,100) }} ... <a href="{{ $single_api['url'] }}" target="_blank">Read More</a></p>
                         <span class="short_disc"> {{$single_api['author']}}</span>
                         |<span class="short_disc"> {{$date}}</span>
                   </div>
                </div>
             </div>
          </div>
          @endforeach



       </div>

    </div>
 </section>
@endsection
@section('inline_css')
<style>
    .three_dots {
    overflow: hidden;
    width:150px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    }
    .three_dots2 {
    overflow: hidden;
    width: 214px;
    display: contents;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    }
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
