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
						<h2 class="pt-3">Waiting for Approval</h2>
					</div>
                @if (!$posts->isEmpty())

					@foreach ($posts as $single)
					<a class="block block-rounded " href="javascript:void(0)">
						<div class="block-content" style="padding-top: 0">
							<div class="row">
								<div class="col-sm-3 customwork" >
									<div class="options-container fx-item-zoom-in">
										<img class="img-fluid options-item stl" src="{{asset('img/main_image/'. $single->main_image)}}" alt="">
										<div class="options-overlay bg-black-75">
											<div class="options-overlay-content">
                                                <a class="btn btn-sm btn-light" href="javascript:void(0)" data-toggle="modal" data-target="#modal-block-large{{ $single->id }}"><i class="fa fa-pencil-alt text-success mr-1"></i> Edit</a>
                                                <a class="btn btn-sm btn-light" href="javascript:void(0)" data-toggle="modal" data-target="#modal-block-small"><i class="fa fa-times text-danger mr-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9" style="margin-top:10px;">
                                    <h3 class="mt-1">{{ $single->title }}</h3>
                                    <?php
                                        $sd=strlen($single->short_description) > 850 ? substr($single->short_description,0,850)."..." : $single->short_description;

                                        //  $count=str_word_count($single->short_description);
                                    ?>
                                    {{-- @if ($count<8)
                                        <p  >{{ substr($single->short_description,0,1000) }} </p>
                                    @else
                                        <p  >{{ substr($single->short_description,0,1000) }}...  </p>
                                    @endif --}}
                                    <p>{{ $sd }}</p>
                                    <?php
                                        $var_1= $single->created_at;
                                        $var_2 = strtotime($var_1);
                                        $date = date('F d, Y', $var_2);
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-9">
                                    <small><i class="far fa-clock"> {{ $date }}</i></small>
                                        </div>
                                        <div class="col-sm-3">
                                            <form method="post" action="{{ route('saved_posts_publish') }}" id="upload_form" enctype="multipart/form-data">
                                                @csrf
                                            <input type="hidden" name="id" id="" value="{{ $single->id }}">
                                                <button type="submit" class="btn btn btn-danger" disabled> Pending..</button>
                                            </form>
                                        </div>
                                    </div>
                                    <br>
                                    {{-- <div><button type="submit" class="btn btn btn-success">Publish</button></div> --}}
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
									<div class="block-header bg-success">
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
                                                <input type="text" class="form-control" id="example-text-input" name="title" placeholder="Title" required value="{{ $single->title }}">
                                                <input type="hidden" class="form-control" id="example-text-input" name="post_id" value="{{ $single->id }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-select">Select Category</label>
                                                <select class="form-control" id="category" name="category" required>
                                                    <?php
                                                        $cat=App\Category::where('status',1)->get()->toArray();
                                                    ?>
                                                    <option value="0" selected hidden>Please select</option>
                                                    @foreach ($cat as $single_cat)
                                                    <option value="{{ $single_cat['id'] }}" {{ $single_cat['id'] == $single->cat_id ? 'selected' : '' }}>{{ $single_cat['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-textarea-input">Short Description</label>
                                                <textarea class="form-control" id="example-textarea-input" name="short_disc" rows="4" placeholder="Short Description" value="" required>{{ $single->short_description }}</textarea>
                                            </div>
                                        <div class="form-group">
                                            <label for="summernote">Description</label>
                                            <textarea id="summernote" name="disc" style="height: 150px;" value="">{{ $single->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                                <div class=" customwork" >
                                                    <img src="{{asset('img/list_image/'. $single->list_image)}}" alt="" class="sho" >
                                                    <button type="button" class="btn btn-sm  btn btn-success" id="img_btn">Edit Image</button>
                                                </div>
                                                <br>
                                                {{-- <div class="image">
                                                    <div class="actions">
                                                      <a href="">
                                                          <button type="button" class="btn btn-default delete-image-btn pull-right">
                                                              <span class="glyphicon glyphicon-trash">Delete</span>
                                                          </button>
                                                      </a>
                                                      <a href="">
                                                          <button type="button" class="btn btn-default edit-image-btn pull-right">
                                                               <span class="glyphicon glyphicon-pencil">Edit</span>
                                                           </button>
                                                       </a>
                                                     </div>
                                                     <img src="{{asset('img/thumb_image/'. $single->thumb_image)}}" class="img img-responsive">
                                                   </div> --}}
                                            <div class="custom-file  img_hide">
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="main_image" name="main_image"  onchange="validateImage()">
                                                <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="block-content block-content-full text-right border-top">
                                            <input type="button" name="submit" class="btn btn-sm  btn-outline-success" value="Close">
                                            <input type="submit" name="submit" class="btn btn-sm  btn-success" value="Save">
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
									<div class="block-header bg-danger">
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
                                    <form method="post" action="{{ route('saved_posts_delete') }}" id="upload_form" enctype="multipart/form-data">
                                        @csrf
                                    <input type="hidden" name="id" id="" value="{{ $single->id }}">
									<div class="block-content block-content-full text-right border-top">
                                        <input type="button" name="submit" class="btn btn-sm  btn-outline-danger" value="Close">
                                        <button type="submit" name="submit" class="btn btn-sm  btn-danger"><i class="fa fa-trash-alt mr-1"></i> Delete</button>
										{{-- <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button> --}}
										{{-- <button type="submit" class="btn btn-sm btn-danger" ><i class="fa fa-trash-alt mr-1"></i> Delete</button> --}}
									</div>
                                    </form>
								</div>
							</div>
						</div>
					</div>

					@endforeach
                @else
                    <div class="d-flex flex-column justify-content-center" style="text-align: center; margin-bottom: 20px;"><span class="d-block font-weight-bold ">You Don't Have Any Post For Approval Yet!</span></div>
                @endif
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
    .img-size{
         height: 180px;
    }
    .sho{
         width: 60px;
         height: 60px;
         border-radius: 8px;
    }
    .img_hide{
        display: none;
    }

</style>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();

        $("#img_btn").click(function() {
            $(".img_hide").css("display","block");
        });
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
