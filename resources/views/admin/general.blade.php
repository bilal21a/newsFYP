@extends('admin.index')
@section('css')
@endsection
@section('content')
<!-- Hero -->
<div class="bg-body-light">
   <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
         <h1 class="flex-sm-fill h3 my-2">
            General Settings <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
         </h1>
         {{--
         <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
               <li class="breadcrumb-item">Tables</li>
               <li class="breadcrumb-item" aria-current="page">
                  <a class="link-fx" href="">DataTables</a>
               </li>
            </ol>
         </nav>
         --}}
      </div>
   </div>
</div>
<!-- END Hero -->
<div class="content container">
   <div class="block">
      <div class="block-content block-content-full">
         <div class="row push">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8 col-xl-8">
               <form action="{{ route('admin.system_name_setting') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                     <label for="example-text-input">System Name</label>
                     <input type="text" class="form-control" id="system_name" name="system_name" value="{{ $setting->system_name }}" placeholder="">
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-success" data-toggle="click-ripple">Submit</button>
                  </div>
               </form>
               <hr>
               {{-- ------------------------------------------------------------ --}}
               <div class="form-group">
                  <label for="example-text-input">Favicon</label>
                  <div class="row">
                     <div class="col-md-6 animated fadeIn">
                        <div class="options-container fx-item-zoom-in fx-overlay-zoom-out" >
                           <span id="fav_img_div">
                           <img class="img-fluid options-item" src="{{ asset('img/system_image/'.$setting->favicon) }}" alt="">
                           </span>
                           <div class="options-overlay bg-primary-dark-op">
                              <div class="options-overlay-content">
                                 <h3 class="h4 text-white mb-2">Favicon</h3>
                                 <a class="btn btn-sm btn-light" href="javascript:void(0)" id="favicon_id">
                                 <i class="fa fa-fw fa-pencil-alt text-success mr-1"></i> Edit
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 mt-7" id="right_favicon">
                        <form action="{{ route('admin.favicon_setting') }}" method="POST" enctype="multipart/form-data">
                           @csrf
                           <div class="custom-file form-group">
                              <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="favicon">
                              <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                              <span class="text-danger" id="image-input-error" hidden></span>
                           </div>
                           <br><br>
                           <div class="form-group">
                              <button type="submit" class="btn btn-success" data-toggle="click-ripple" id="favicon_submit">Submit</button>
                              <button type="button" class="btn btn-light"  id="favicon_cancel">Cancel  </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <hr>
               <div class="form-group">
                  <label for="example-text-input">Front Logo</label>
                  <div class="row">
                     <div class="col-md-6 animated fadeIn">
                        <div class="options-container fx-item-zoom-in fx-overlay-zoom-out">
                           <span id="front_logo_div">
                           <img class="img-fluid options-item" src="{{ asset('img/system_image/'.$setting->front_logo) }}" alt="">
                           </span>
                           <div class="options-overlay bg-primary-dark-op">
                              <div class="options-overlay-content">
                                 <h3 class="h4 text-white mb-2">Logo</h3>
                                 <a class="btn btn-sm btn-light" href="javascript:void(0)" id="front_logo_edit">
                                 <i class="fa fa-fw fa-pencil-alt text-success mr-1"></i> Edit
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 mt-7" id="right_front">
                        <form action="{{ route('admin.front_logo_setting') }}" method="POST" enctype="multipart/form-data">
                           @csrf
                           <div class="custom-file form-group">
                              <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                              <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="front_logo">
                              <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                           </div>
                           <br><br>
                           <div class="form-group">
                              <button type="submit" class="btn btn-success" data-toggle="click-ripple" id="front_logo_submit">Submit</button>
                              <button type="button" class="btn btn-light"  id="front_logo_cancel">Cancel  </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <hr>
               <div class="form-group">
                  <label for="example-text-input">Admin Logo</label>
                  <div class="row">
                     <div class="col-md-6 animated fadeIn">
                        <div class="options-container fx-item-zoom-in fx-overlay-zoom-out">
                           <span id="admin_logo_div">
                           <img class="img-fluid options-item" src="{{ asset('img/system_image/'.$setting->admin_logo) }}" alt="">
                           </span>
                           <div class="options-overlay bg-primary-dark-op">
                              <div class="options-overlay-content">
                                 <h3 class="h4 text-white mb-2">Admin Logo</h3>
                                 <a class="btn btn-sm btn-light" href="javascript:void(0)" id="admin_logo_edit">
                                 <i class="fa fa-fw fa-pencil-alt text-success mr-1"></i> Edit
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 mt-7" id="right_admin">
                        <form action="{{ route('admin.admin_logo_setting') }}" method="POST" enctype="multipart/form-data">
                           @csrf
                           <div class="custom-file form-group">
                              <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                              <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="admin_logo">
                              <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                           </div>
                           <br><br>
                           <div class="form-group">
                              <button type="submit" class="btn btn-success" data-toggle="click-ripple" id="admin_logo_submit">Submit</button>
                              <button type="button" class="btn btn-light" id="admin_logo_cancel">Cancel  </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-2">
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
<script>
   const Toast = Swal.mixin({
           toast: true,
           position: 'top-end',
           showConfirmButton: false,
           timer: 3000,
           timerProgressBar: true,
           didOpen: (toast) => {
               toast.addEventListener('mouseenter', Swal.stopTimer)
               toast.addEventListener('mouseleave', Swal.resumeTimer)
           }
           })
</script>
<script>
   $( document ).ready(function() {

    //for favicon edit
    $( "#favicon_id" ).click(function() {
               $("#right_favicon").css("display","block");
           });
       $( "#favicon_cancel" ).click(function() {
               $("#right_favicon").css("display","none");
               $('#favicon_cancel').click(fetchData);
               // fetchData();
           });

         //for front logo edit
       $( "#front_logo_edit" ).click(function() {
               $("#right_front").css("display","block");
           });
       $( "#front_logo_cancel" ).click(function() {
               $("#right_front").css("display","none");
               // fetchData();
           });

         //for admin logo edit
       $( "#admin_logo_edit" ).click(function() {
               $("#right_admin").css("display","block");
           });
       $( "#admin_logo_cancel" ).click(function() {
               $("#right_admin").css("display","none");
               // fetchData();
           });

   });


</script>
@endsection
@section('internal_css')
<style>
   .vl
   {
   border-left: 1px solid grey;
   height: 200px;
   }
   #right_favicon
   {
   display: none;
   }
   #right_front
   {
   display: none;
   }
   #right_admin
   {
   display: none;
   }
</style>
@endsection
