@extends('index2')

@section('after_css')
    <link href="{{asset('css/upload.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    <!--Create Upload Post Start-->
  <div class="uploadbody">

    <div class="container contain">
        <form method="post" action="{{ route('upload_post') }}" accept-charset="UTF-8">
        @csrf
        <h2>Upload New Post</h2>
            <div class="form-group">
              <label for="title"><b>Title</b></label>
              <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
              <label for="category"><b>Select Category</b></label>
              <select class="form-control" id="category" name="category">
                  <?php $cat=App\Category::where('status', 1)->get()->toArray(); ?>
                <option selected disabled>Select Category</option>
                @foreach ($cat as $single_cat)
                    <option value="{{ $single_cat['id'] }}">{{ $single_cat['name'] }}</option>
                @endforeach

              </select>
            </div>
            <div class="form-group">
              <label for="textarea1"><b>Short Description</b></label>
              <textarea class="form-control" name="short_disc" id="textarea1" rows="2"></textarea>
            </div>
            <div class="form-group">
                <label for="summernote"><b>Description</b></label>
            <textarea id="summernote" name="disc" style="height: 150px;"></textarea>
        </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="hot_news" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1"><b>Hot News</b></label>
          </div>
          <div class="row">
            <div class="col-md-8">
            </div>
            <div class="col-md-4">
                <button type="submit" value="Publish" name="submit" class="btn btn-warning btn-custom">Publish</button>
                <button type="submit" value="Save as Draft" name="submit" class="btn btn-outline-warning">Save as Draft</button>
            </div>
        </div>
          </form>
    </div>
</div>
     <!--Create Upload Post End-->
@endsection



@section('after_js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });


// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

@endsection
