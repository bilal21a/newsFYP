@extends('index')

@section('css')
    <link rel="stylesheet" href="{{asset('js/plugins/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/simplemde/simplemde.min.css')}}">
@endsection

@section('content')
<br> <br> <br>
    <!--Create Upload Post Start-->
    <div class="container">
        <form method="post" action="{{ route('upload_post') }}" id="upload_form" enctype="multipart/form-data">
            @csrf
            <div class="content block">
                <div class="block">
                    <div class="block-content">
                        <h1>Upload New Post</h1>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Select Category</label>
                            <select class="form-control" id="category" name="category" required>
                                <?php
                                    $cat=App\Category::where('status',1)->get()->toArray();
                                ?>
                                <option value="0" selected hidden>Please select</option>
                                @foreach ($cat as $single_cat)
                                    <option value="{{ $single_cat['id'] }}">{{ $single_cat['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="short_disc">Short Description</label>
                            <textarea class="form-control" id="short_disc"  rows="4" name="short_disc" placeholder="Short Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="summernote"><b>Description</b></label>
                        <textarea id="summernote" name="disc" style="height: 150px;" required></textarea>
                    </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="main_image" name="main_image"  onchange="validateImage()" required>
                                <label class="custom-file-label" for="main_image">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="hot_news" id="hot_news">
                                <label class="form-check-label" for="hot_news">Hot News</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9">
                            </div>
                            <div class="col-sm-3">
                                <input type="submit" name="submit" class="btn btn-success" value="Publish">
                                <input type="submit" name="submit" class="btn btn-outline-success" value="Save as Draft">
                                {{-- <button type="button" name="submit" id="publish" class="btn btn-success" value="publish">Publish</button>
                                <button type="button" name="submit" id="save_draft" class="btn btn-outline-success" value="save_draft">Save as Draft</button> --}}
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
     <!--Create Upload Post End-->
@endsection



@section('js')
    {{-- <script src="{{asset('js/plugins/summernote/summernote-bs4.min.js')}}"></script> --}}
    {{-- <script src="{{asset('js/plugins/ckeditor/ckeditor.js')}}"></script> --}}
    <script src="{{asset('js/plugins/simplemde/simplemde.min.js')}}"></script>
    {{-- <script>jQuery(function(){ One.helpers(['summernote', 'ckeditor', 'simplemde']); });</script> --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });


            // For Choose File
            $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
</script>
<script>
     function validateImage() {
        var formData = new FormData();
        var file = document.getElementById("main_image").files[0];
        // console.log(file);
        formData.append("Filedata", file);
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
            alert('Please select a valid image file');
            document.getElementById("main_image").value = '';
            return false;
        }
        return true;
     }
</script>

    <script>
  $( document ).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });








    // $( "#publish" ).on( "click", notify );
    // $( "#save_draft" ).on( "click", notify );


    // function notify() {
    //     var btn_name = $(this).val();

    //     var title = $("#title").val();
    //     var short_disc = $("#short_disc").val();
    //     var category=$('#category').val();
    //     var disc = $("#summernote").val();
    //     var main_image=$('#main_image').val();
    //     // var formData = new FormData(this);
    //     var file = document.getElementById("main_image").files[0];
    //     // var main_image=$('#main_image').val().split('\\').pop();

    //     var fd = new FormData();
    //     fd.append("file", file);

    //     console.log(disc);
    //     if ($('#hot_news').is(":checked")){
    //         var hot_news=1;
    //     }
    //     else{var hot_news=0;}

    //     if (main_image=='') {
    //         alert('Please Select image file');
    //     }
    //     else{
    //     console.log(fd);

    //     $.ajax({
    //        url: '/upload_post' ,
    //        type: "post",
    //     //    data: {btn_name:btn_name, title:title, short_disc:short_disc , category:category ,disc:disc , main_image:main_image , hot_news:hot_news},
    //        data: fd,

    //        success: function( response ) {
    //             console.log(response);

    //        }
    //     });
    //     }
    // }



   });
    </script>

    @endsection
