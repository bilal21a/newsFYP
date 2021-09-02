@extends('index')

@section('css')
@endsection

@section('content')

<div class="content">
    <div class="container">
        <div class="block">
            <div class="row">


                <div class="col-md-12">
                    <div class="block-content">
                    <h2 class="pt-3">Your Posts </h2>
                </div>
                    <a class="block block-rounded " href="javascript:void(0)">
                        <div class="block-content" style="padding-top: 0">
                            <div class="row">
                                <div class="col-sm-3 customwork" >
                                    <img src="assets/media/photos/photo14.jpg" alt="" class="stl">
                                </div>
                                <div class="col-sm-9" >
                                    <h3 class="mt-1">Title of the News Will be shown ple of the News Will be shown </h3>
                                    <p>Short Description Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam unde quisquam at eveniet temporibus dolorum cum nam tempora itaque omnis, molestias pariatur nisi iusto. Sit, assumenda magni. Vitae, sunt dolorem.</p>
                                    <small><i class="far fa-clock"> 12-09-2020</i></small>
                                </div>
                            </div>
                        </div>
                    </a>
                    <hr>

                </div>
            </div>

        </div>
    </div>
</div>


 @endsection



 @section('inline_css')
 <style>
    .round{
        width: 100%;
         border-radius: 10px 10px 0px 0px;
     }
     .stl{
        width: 250px !important;
        height: 160px !important;
     }
     .round1{
         border-radius: 15px 15px 0px 0px;
     }
 </style>
@endsection
 @section('js')
@endsection
