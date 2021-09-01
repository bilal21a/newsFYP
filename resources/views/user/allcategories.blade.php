@extends('index')


@section('css')
<link href="{{asset('css/single.css')}} "rel="stylesheet">
<link href="{{asset('css/comment.css')}} "rel="stylesheet">
@endsection


@section('content')

<section class="block">
    @foreach ($allCats as $allCat)

   <section class="block">
      <div class="block-content">
         <div class="" style="margin: 0px 12px;">
            <h2 class="georgia">{{$allCat[0]->cat_name}}</h2>
         </div>
         <div class="row">

            @foreach ($allCat as $single_cat)

            <div class="col-md-3 col-sm-6">
               <div class="block-content pb-3 my_card " style="padding-top: 0">
                  <div class="row round1">
                     <div class="col-sm-12 round" >
                        <a href="{{ url('single_post/'.$single_cat->id) }}"><img src={{asset('img/main_image/'. $single_cat->main_image)}} alt="" class="round"></a>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12 pt-1" >
                        <a href="{{ url('single_post/'.$single_cat->id) }} " class="text-dark">
                           <h5 class="mt-3 mb-0">{{ $single_cat->title }}</h5>
                        </a>
                        <?php
                            $var_1= $single_cat->created_at;
                            $var_2 = strtotime($var_1);
                            $date = date('F d, Y', $var_2);
                        ?>
                        <a href="#" class="text-dark"><span class="short_disc"> {{ $single_cat->name }}</span></a> | <a href="#" class="text-dark"><span class="short_disc"> {{ $date }}</span></a>
                     </div>
                  </div>
               </div>
            </div>

            @endforeach

         </div><br><a href="{{ url('categories/'.$single_cat->cat_id) }}">
         <button type="button" class="btn btn-sm btn-light mr-1 mb-3 cat_btn" style="float: right;">
         View All<i class="fa fa-angle-double-right  ml-1"></i>
         </button><br><br></a>
      </div>
   </section>
   <hr style="margin: 0px 50px;">

   @endforeach
</section>
@endsection


@section('js')
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
