@extends('index')
@section('css')
<link href="{{asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}} "rel="stylesheet">
<link href="{{asset('js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}} "rel="stylesheet">
<link href="{{asset('js/plugins/select2/css/select2.min.css')}} "rel="stylesheet">
<link href="{{asset('js/plugins/ion-rangeslider/css/ion.rangeSlider.css')}} "rel="stylesheet">
<link href="{{asset('js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.css')}} "rel="stylesheet">
<link href="{{asset('js/plugins/dropzone/dist/min/dropzone.min.css')}} "rel="stylesheet">
@endsection
@section('content')
<section class="block">
   <div class="block-content">
      <h2 class="georgia" style="margin: 0px 12px;">Search News </h2>
   </div>
   <form id="post-form" method="post" action="javascript:void(0)">
      @csrf
      <div class="pb-5 pt-5 mt-2 mb-2" style="background-color: #f5f5f5;">
         <div class="container  ">
            <div class="row">
               <div class="form-group col-xl-11 col-md-11 col-sm-11">
                  <input type="text" class="form-control" id="search_bar" name="search_bar" placeholder="Search by Name">
               </div>
               <div class="form-group col-xl-1 col-md-1 col-sm-1">
                  <button class="btn btn-success" id="search_btn1" data-toggle="layout" data-action="header_loader_on">FILTER</button>
                  <button class="btn btn-danger" id="clear_btn" style="display: none">CLEAR</button>
                  <button class="btn btn-primary" id="loading_btn" style="display: none"  disabled>Loading<i class="fa fa-cog fa-spin loader"></i></button>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-8 col-xl-8 col-md-8 col-sm-8">
                  <div class="form-group">
                     <div class="input-daterange input-group" data-date-format="yyyy-mm-dd" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                        <input type="text" class="form-control" id="from_date" name="from_date" placeholder="From" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                        <div class="input-group-prepend input-group-append">
                           <span class="input-group-text font-w600">
                           <i class="fa fa-fw fa-arrow-right"></i>
                           </span>
                        </div>
                        <input type="text" class="form-control" id="to_date" name="to_date" placeholder="To" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                     </div>
                  </div>
               </div>
               <?php
               $cat=App\Category::where('status',1)->get()->toArray();
               ?>
               <div class="form-group col-xl-4 col-md-4 col-sm-4">
                  <select class="form-control" id="category" name="category">
                     <option value="0" hidden selected>Category</option>
                     @foreach ($cat as $category)
                     <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                     @endforeach
                  </select>
               </div>
            </div>
         </div>
      </div>
   </form>
   <div class="block-content">
      <div class="row" id="ajax_show">
        {{-- <div class="col-sm-12 col-md-12 no-result" id="ajax_show_2"></div> --}}
         {{-- appended to javascript --}}
      </div>

   </div>
</section>
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
   .no-result{
       text-align: center;
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
@section('js')
<script src="{{asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('js/plugins/dropzone/dropzone.min.js')}}"></script>
<script>jQuery(function(){ One.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']); });</script>
<script>
   $( document ).ready(function() {
    var ajaxData = $('#ajax_show');
        ajaxData.append(`<div class="no-result col-sm-12 col-md-12"><h5>No result found</h5></div>`);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

       $("#search_btn1").click(function(e){
       console.log("aa");

        $("#search_btn1").css("display","none");
        $("#loading_btn").css("display","block");
        $("#ajax_show").empty();

        e.preventDefault();

        var search = $("#search_bar").val();
        var from = $("#from_date").val();
        var to = $("#to_date").val();
        var category=$('#category').val();

       $.ajax({
           url: '/search_post' ,
           type: "get",
           data: {search:search, from:from, to:to , category:category},
           success: function( response ) {
                var ajaxData = $('#ajax_show');
                console.log(response);

                for (var i = 0; i < response.length; i++) {
                var date = new Date(response[i].created_at);
                var main_image='{{asset('img/main_image')}}'+'/'+ response[i].main_image;
                var single_link='{{ url('single_post') }}'+'/'+ response[i].id;


                ajaxData.append(`
                <div class="col-md-3 col-sm-6">
                    <div class="block-content pb-3 my_card " style="padding-top: 0">
                        <div class="row round1">
                            <div class="col-sm-12 round" >
                                <a href="${single_link}"><img src="${main_image}" alt="" class="round"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 pt-1" >
                                <a href="${single_link}" class="text-dark">
                                <h5 class="mt-3 mb-0">${response[i].title}</h5>
                                </a>
                                <a href="" class="text-dark"><span class="short_disc">${response[i].name}</span></a> | <a href="" class="text-dark"><span class="short_disc"> ${date.toDateString()}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                `);
            }
            $("#loading_btn").css("display","none");
            $("#clear_btn").css("display","block");
           }
       });

    });


    $("#clear_btn").click(function(e){
        $("#ajax_show").empty();
        $("#clear_btn").css("display","none");
        $("#search_btn1").css("display","block");
        var ajaxData = $('#ajax_show');
        ajaxData.append(`<div class="no-result col-sm-12 col-md-12"><h5>No result found</h5></div>`);

    });

   });


</script>
@endsection
