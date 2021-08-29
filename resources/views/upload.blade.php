@extends('index')

@section('css')
    <link rel="stylesheet" href="{{asset('js/plugins/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/simplemde/simplemde.min.css')}}">
@endsection

@section('content')
    <!--Create Upload Post Start-->
    <div class="container">
        <form method="post" action="{{ route('upload_post') }}" enctype="multipart/form-data">
            @csrf
            <div class="content block">
                <div class="block">
                    <div class="block-content">
                        <h1>Upload New Post</h1>
                        <div class="form-group">
                            <label for="example-text-input">Title</label>
                            <input type="text" class="form-control" id="example-text-input" name="example-text-input" placeholder="Title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="example-select">Select Category</label>
                            <select class="form-control" id="example-select" name="category">
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
                            <label for="example-textarea-input">Short Description</label>
                            <textarea class="form-control" id="example-textarea-input"  rows="4" name="short_disc" placeholder="Short Description"></textarea>
                        </div>
                        <label for="example-text-input">Description</label>
                        {{-- <form action="be_forms_editors.html" method="POST" onsubmit="return false;"> --}}
                            <div class="form-group">
                    <!-- CKEditor Container -->
                             <textarea id="js-ckeditor" name="disc"></textarea>
                            </div>
                        {{-- </form> --}}
                        <div class="form-group">
                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="main_image">
                                <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="" id="example-checkbox-inline1" name="hot_news">
                                <label class="form-check-label" for="example-checkbox-inline1">Hot News</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" name="submit" class="btn btn-success" value="Publish">Publish</button>
                                <button type="button" name="submit" class="btn btn-outline-success" value="Save as Draft">Save as Draft</button>
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
    <script src="{{asset('js/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('js/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/plugins/simplemde/simplemde.min.js')}}"></script>
    <script>jQuery(function(){ One.helpers(['summernote', 'ckeditor', 'simplemde']); });</script>

    @endsection
