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
					@foreach ($posts as $single)
					<a class="block block-rounded " href="javascript:void(0)">
						<div class="block-content" style="padding-top: 0">
							<div class="row">
								<div class="col-sm-3 customwork" >
									<div class="options-container fx-item-zoom-in">
										<img class="img-fluid options-item stl" src="assets/media/photos/photo2.jpg" alt="">
										<div class="options-overlay bg-black-75">
											<div class="options-overlay-content">
                                                <a class="btn btn-sm btn-light" href="javascript:void(0)" data-toggle="modal" data-target="#modal-block-large{{ $single->id }}"><i class="fa fa-pencil-alt text-primary mr-1"></i> Edit</a>
                                                <a class="btn btn-sm btn-light" href="javascript:void(0)" data-toggle="modal" data-target="#modal-block-small"><i class="fa fa-times text-danger mr-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9" >
                                    <h3 class="mt-1">{{ $single->title }}</h3>
                                    <p>Short Description Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam unde quisquam at eveniet temporibus dolorum cum nam tempora itaque omnis, molestias pariatur nisi iusto. Sit, assumenda magni. Vitae, sunt dolorem.</p>
                                    <small><i class="far fa-clock"> 12-09-2020</i></small>
                                </div>
                            </div>
                        </div>
                    </a>
                    <hr>
					{{-- ---------------edit button model------------ --}}
					<div class="modal" id="modal-block-large{{ $single->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="block block-themed block-transparent mb-0">
									<div class="block-header bg-primary-dark">
										<h3 class="block-title">Edit Post</h3>
										<div class="block-options">
											<button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
											<i class="fa fa-fw fa-times"></i>
											</button>
										</div>
									</div>
								    <div class="block-content font-size-sm container">
                                        <form method="post" action="{{ route('saved_posts_fetch') }}" id="upload_form" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="example-text-input">Title</label>
                                                <input type="text" class="form-control" id="example-text-input" name="title" placeholder="" value="{{ $single->title }}">
                                                <input type="hidden" class="form-control" id="example-text-input" name="post_id" value="{{ $single->id }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-select">Select Category</label>
                                                <select class="form-control" id="example-select" name="category">
                                                    <option value="0" selected hidden>Please select</option>
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
                                            <div class="form-group">
                                                <label for="example-textarea-input">Short Description</label>
                                                <textarea class="form-control" id="example-textarea-input" name="short_disc" rows="4" placeholder=""></textarea>
                                            </div>
                                        <div class="form-group">
                                            <label for="summernote">Description</label>
                                            <textarea id="summernote" name="disc" style="height: 150px;"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="main_image" name="main_image"  onchange="validateImage()" required>
                                                <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="block-content block-content-full text-right border-top">
                                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Save</button>
                                        </div>
                                        </form>
								    </div>

								</div>
							</div>
						</div>
					</div>
					{{-----------------delete button model--------------}}
					<div class="modal" id="modal-block-small" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true">
						<div class="modal-dialog modal-sm" role="document">
							<div class="modal-content">
								<div class="block block-themed block-transparent mb-0">
									<div class="block-header bg-primary-dark">
										<h3 class="block-title">Delete Post</h3>
										<div class="block-options">
											<button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
											<i class="fa fa-fw fa-times"></i>
											</button>
										</div>
									</div>
									<div class="block-content font-size-sm">
										<p>Do You Want To Delete This Post?</p>
									</div>
									<div class="block-content block-content-full text-right border-top">
										<button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-trash-alt mr-1"></i> Delete</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
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
@endsection
