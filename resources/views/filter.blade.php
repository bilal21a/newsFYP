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
    <div class="pb-5 pt-5 mt-2 mb-2" style="background-color: #f5f5f5;">
        <div class="container  ">
            <div class="row">
                <div class="form-group col-xl-11 col-md-11 col-sm-11">
                    <input type="text" class="form-control" id="" name="example-datepicker-x" placeholder="">
                </div>
                <div class="form-group col-xl-1 col-md-1 col-sm-1">
                    <button class="btn btn-success">Search</button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-xl-8 col-md-8 col-sm-8">
                    <div class="form-group">
                        <div class="input-daterange input-group" data-date-format="mm/dd/yyyy" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                            <input type="text" class="form-control" id="example-daterange1" name="example-daterange1" placeholder="From" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                            <div class="input-group-prepend input-group-append">
                                <span class="input-group-text font-w600">
                                    <i class="fa fa-fw fa-arrow-right"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="example-daterange2" name="example-daterange2" placeholder="To" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-4 col-md-4 col-sm-4">
                            <select class="form-control" id="example-select" name="example-select">
                                <option value="0" hidden selected>Category</option>
                                <option value="1">Option #1</option>
                                <option value="2">Option #2</option>
                                <option value="3">Option #3</option>
                                <option value="4">Option #4</option>
                                <option value="5">Option #5</option>
                                <option value="6">Option #6</option>
                                <option value="7">Option #7</option>
                                <option value="8">Option #8</option>
                                <option value="9">Option #9</option>
                                <option value="10">Option #10</option>
                            </select>
                </div>
            </div>
        </div>
    </div>
    <div class="block-content">
    <div class="row">
        <div class="col-md-3 col-sm-6">
                <div class="block-content pb-3 my_card " style="padding-top: 0">
                    <div class="row round1">
                        <div class="col-sm-12 round" >
                            <a href=""><img src={{asset('media/photos/photo14.jpg')}} alt="" class="round"></a>
                        </div>
                    </div>

                        <div class="row">
                        <div class="col-sm-12 pt-1" >

                            <a href="https://www.google.com" class="text-dark">
                                <h5 class="mt-3 mb-0">Design Responsive, SEO friendly & Fast Loading WordPress website</h5>
                            </a>
                            <a href="" class="text-dark"><span class="short_disc"> BY FRIEZE</span></a> | <a href="" class="text-dark"><span class="short_disc"> 04 AUG 21</span></a>

                        </div>
                        </div>
                </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="block-content pb-3 my_card " style="padding-top: 0">
                <div class="row round1">
                    <div class="col-sm-12 round" >
                        <a href=""><img src={{asset('media/photos/photo14.jpg')}} alt="" class="round"></a>
                    </div>
                </div>

                    <div class="row">
                    <div class="col-sm-12 pt-1" >

                        <a href="https://www.google.com" class="text-dark">
                            <h5 class="mt-3 mb-0">Design Responsive, SEO friendly & Fast Loading WordPress website</h5>
                        </a>
                        <a href="" class="text-dark"><span class="short_disc"> BY FRIEZE</span></a> | <a href="" class="text-dark"><span class="short_disc"> 04 AUG 21</span></a>

                    </div>
                    </div>
            </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="block-content pb-3 my_card " style="padding-top: 0">
            <div class="row round1">
                <div class="col-sm-12 round" >
                    <a href=""><img src={{asset('media/photos/photo14.jpg')}} alt="" class="round"></a>
                </div>
            </div>

                <div class="row">
                <div class="col-sm-12 pt-1" >

                    <a href="https://www.google.com" class="text-dark">
                        <h5 class="mt-3 mb-0">Design Responsive, SEO friendly & Fast Loading WordPress website</h5>
                    </a>
                    <a href="" class="text-dark"><span class="short_disc"> BY FRIEZE</span></a> | <a href="" class="text-dark"><span class="short_disc"> 04 AUG 21</span></a>

                </div>
                </div>
        </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="block-content pb-3 my_card " style="padding-top: 0">
        <div class="row round1">
            <div class="col-sm-12 round" >
                <a href=""><img src={{asset('media/photos/photo14.jpg')}} alt="" class="round"></a>
            </div>
        </div>

            <div class="row">
            <div class="col-sm-12 pt-1" >

                <a href="https://www.google.com" class="text-dark">
                    <h5 class="mt-3 mb-0">Design Responsive, SEO friendly & Fast Loading WordPress website</h5>
                </a>
                <a href="" class="text-dark"><span class="short_disc"> BY FRIEZE</span></a> | <a href="" class="text-dark"><span class="short_disc"> 04 AUG 21</span></a>

            </div>
            </div>
    </div>
</div>
<div class="col-md-3 col-sm-6">
<div class="block-content pb-3 my_card " style="padding-top: 0">
    <div class="row round1">
        <div class="col-sm-12 round" >
            <a href=""><img src={{asset('media/photos/photo14.jpg')}} alt="" class="round"></a>
        </div>
    </div>

        <div class="row">
        <div class="col-sm-12 pt-1" >

            <a href="https://www.google.com" class="text-dark">
                <h5 class="mt-3 mb-0">Design Responsive, SEO friendly & Fast Loading WordPress website</h5>
            </a>
            <a href="" class="text-dark"><span class="short_disc"> BY FRIEZE</span></a> | <a href="" class="text-dark"><span class="short_disc"> 04 AUG 21</span></a>

        </div>
        </div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="block-content pb-3 my_card " style="padding-top: 0">
<div class="row round1">
    <div class="col-sm-12 round" >
        <a href=""><img src={{asset('media/photos/photo14.jpg')}} alt="" class="round"></a>
    </div>
</div>

    <div class="row">
    <div class="col-sm-12 pt-1" >

        <a href="https://www.google.com" class="text-dark">
            <h5 class="mt-3 mb-0">Design Responsive, SEO friendly & Fast Loading WordPress website</h5>
        </a>
        <a href="" class="text-dark"><span class="short_disc"> BY FRIEZE</span></a> | <a href="" class="text-dark"><span class="short_disc"> 04 AUG 21</span></a>

    </div>
    </div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="block-content pb-3 my_card " style="padding-top: 0">
<div class="row round1">
<div class="col-sm-12 round" >
    <a href=""><img src={{asset('media/photos/photo14.jpg')}} alt="" class="round"></a>
</div>
</div>

<div class="row">
<div class="col-sm-12 pt-1" >

    <a href="https://www.google.com" class="text-dark">
        <h5 class="mt-3 mb-0">Design Responsive, SEO friendly & Fast Loading WordPress website</h5>
    </a>
    <a href="" class="text-dark"><span class="short_disc"> BY FRIEZE</span></a> | <a href="" class="text-dark"><span class="short_disc"> 04 AUG 21</span></a>

</div>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="block-content pb-3 my_card " style="padding-top: 0">
<div class="row round1">
<div class="col-sm-12 round" >
<a href=""><img src={{asset('media/photos/photo14.jpg')}} alt="" class="round"></a>
</div>
</div>

<div class="row">
<div class="col-sm-12 pt-1" >

<a href="https://www.google.com" class="text-dark">
    <h5 class="mt-3 mb-0">Design Responsive, SEO friendly & Fast Loading WordPress website</h5>
</a>
<a href="" class="text-dark"><span class="short_disc"> BY FRIEZE</span></a> | <a href="" class="text-dark"><span class="short_disc"> 04 AUG 21</span></a>

</div>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="block-content pb-3 my_card " style="padding-top: 0">
<div class="row round1">
    <div class="col-sm-12 round" >
        <a href=""><img src={{asset('media/photos/photo14.jpg')}} alt="" class="round"></a>
    </div>
</div>

    <div class="row">
    <div class="col-sm-12 pt-1" >

        <a href="https://www.google.com" class="text-dark">
            <h5 class="mt-3 mb-0">Design Responsive, SEO friendly & Fast Loading WordPress website</h5>
        </a>
        <a href="" class="text-dark"><span class="short_disc"> BY FRIEZE</span></a> | <a href="" class="text-dark"><span class="short_disc"> 04 AUG 21</span></a>

    </div>
    </div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="block-content pb-3 my_card " style="padding-top: 0">
<div class="row round1">
<div class="col-sm-12 round" >
    <a href=""><img src={{asset('media/photos/photo14.jpg')}} alt="" class="round"></a>
</div>
</div>

<div class="row">
<div class="col-sm-12 pt-1" >

    <a href="https://www.google.com" class="text-dark">
        <h5 class="mt-3 mb-0">Design Responsive, SEO friendly & Fast Loading WordPress website</h5>
    </a>
    <a href="" class="text-dark"><span class="short_disc"> BY FRIEZE</span></a> | <a href="" class="text-dark"><span class="short_disc"> 04 AUG 21</span></a>

</div>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="block-content pb-3 my_card " style="padding-top: 0">
<div class="row round1">
<div class="col-sm-12 round" >
<a href=""><img src={{asset('media/photos/photo14.jpg')}} alt="" class="round"></a>
</div>
</div>

<div class="row">
<div class="col-sm-12 pt-1" >

<a href="https://www.google.com" class="text-dark">
    <h5 class="mt-3 mb-0">Design Responsive, SEO friendly & Fast Loading WordPress website</h5>
</a>
<a href="" class="text-dark"><span class="short_disc"> BY FRIEZE</span></a> | <a href="" class="text-dark"><span class="short_disc"> 04 AUG 21</span></a>

</div>
</div>
</div>
</div>
<div class="col-md-3 col-sm-6">
<div class="block-content pb-3 my_card " style="padding-top: 0">
<div class="row round1">
<div class="col-sm-12 round" >
<a href=""><img src={{asset('media/photos/photo14.jpg')}} alt="" class="round"></a>
</div>
</div>

<div class="row">
<div class="col-sm-12 pt-1" >

<a href="https://www.google.com" class="text-dark">
<h5 class="mt-3 mb-0">Design Responsive, SEO friendly & Fast Loading WordPress website</h5>
</a>
<a href="" class="text-dark"><span class="short_disc"> BY FRIEZE</span></a> | <a href="" class="text-dark"><span class="short_disc"> 04 AUG 21</span></a>

</div>
</div>
</div>
</div>
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



@endsection
