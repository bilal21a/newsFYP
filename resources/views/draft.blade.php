@extends('index')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection

@section('content')

<div class="content">
    <div class="container">
        <div class="block">
            <div class="row">


                <div class="col-md-12">
                    <div class="block-content">
                    <h2 class="pt-3">Saved </h2>
                </div>
                    <a class="block block-rounded " href="javascript:void(0)">
                        <div class="block-content" style="padding-top: 0">
                            <div class="row">
                                <div class="col-sm-3 customwork" >
                                    <div class="options-container fx-item-zoom-in">
                                        <img class="img-fluid options-item stl" src="assets/media/photos/photo2.jpg" alt="">
                                        <div class="options-overlay bg-black-75">
                                            <div class="options-overlay-content">
                                                <a class="btn btn-sm btn-light" href="javascript:void(0)" data-toggle="modal" data-target="#modal-block-large">
                                                    <i class="fa fa-pencil-alt text-primary mr-1"></i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-light" href="javascript:void(0)" data-toggle="modal" data-target="#modal-block-small">
                                                    <i class="fa fa-times text-danger mr-1"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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
                    <a class="block block-rounded " href="javascript:void(0)">
                        <div class="block-content" style="padding-top: 0">
                            <div class="row">
                                <div class="col-sm-3 customwork" >
                                    <div class="options-container fx-item-zoom-in">
                                        <img class="img-fluid options-item stl" src="assets/media/photos/photo2.jpg" alt="">
                                        <div class="options-overlay bg-black-75">
                                            <div class="options-overlay-content">
                                                <a class="btn btn-sm btn-light" href="javascript:void(0)" data-toggle="modal" data-target="#modal-block-large">
                                                    <i class="fa fa-pencil-alt text-primary mr-1"></i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-light" href="javascript:void(0)" data-toggle="modal" data-target="#modal-block-small">
                                                    <i class="fa fa-times text-danger mr-1"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9" >
                                    <h3 class="mt-1">Title of the News Will be shown Title of the News Will be shown </h3>
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
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

 <script>
     $(document).ready(function() {
         $('#summernote').summernote();
     });
   </script>
@endsection
