@extends('index')

@section('css')

    <link href="{{asset('css/profile.css')}} "rel="stylesheet">

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="section1">
                        <h4>Account settings</h4>

                        <div id="change_email_body">
                            {{-- email address here --}}
                            <b id="email"></b><br>
                        <a class="link-fx text-success" id="change_email" style="cursor: pointer;">Change email</a>
                        </div>

                        <div id="change_email_div">
                            <h4>Enter a new Email address</h4>
                            <form id="email-form" method="post" action="javascript:void(0)">
                                @csrf
                            <div class="row" >

                                <div class="col-md-8">
                                    <input type="email" class="form-control" id="email_edit" name="email" placeholder="Emai Input">
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success" id="email_save">Save</button>
                                    <button type="button" id="cancel_btn_change_email" class="btn btn-light">Cancel  </button>
                                 </div>
                            </div> <br>
                        </form>
                        </div>

                        <p>Use this email to sign in. This is also where we'll send email communication and newsletters.</p>

                        <h4>Ways to sign in</h4>
                    <div id="change_pass_body">
                        <b>Password </b>&nbsp;
                    <span>
                        <i class="fa fa-circle dot"></i>
                        <i class="fa fa-circle dot"></i>
                        <i class="fa fa-circle dot"></i>
                        <i class="fa fa-circle dot"></i>
                        <i class="fa fa-circle dot"></i>
                        <i class="fa fa-circle dot"></i>
                        <i class="fa fa-circle dot"></i>
                        <i class="fa fa-circle dot"></i>
                    </span>&nbsp;&nbsp;
                    <a class="link-fx text-success" id="change_pass" style="cursor: pointer;">Change Password</a>
                    </div>

                    <div id="change_pass_div">
                    <form id="pass-form" method="post" action="javascript:void(0)">
                        @csrf
                    <div class="password" style="width: 90%;">
                        <div class="form-group">
                            <label for="val-password">Current Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="curr_pass" name="val-password" placeholder="Enter your current password">
                        </div>
                        <div class="form-group">
                            <label for="val-password">New Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="new1_pass" name="val-password" placeholder="Enter your new password">
                        </div>
                        <div class="form-group">
                            <label for="val-confirm-password">Confirm New Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="new2_pass" name="val-confirm-password" placeholder="Confirm your new password">
                        </div>
                        <p class="text-danger" id="pass_error"></p>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">

                        </div>
                        <div class="col-sm-4">
                            <button type="submit" id="pass_save" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-light" id="cancel_btn_change_pass">Cancel  </button>
                        </div>
                    </div>
                    </form>
                    </div>

            </div>


            <div class="section2">
                <h4>Your Recent Comments</h4>
                <a class="link-fx text-success" href="">View All Comments</a>
            </div>
        </div>


        <!-- Section 2 Start     -->

        <div class="col-sm-6 section-3">

            <h4>Profile settings</h4>
            <!-- <img class="img-avatar" src="assets/media/avatars/avatar4.jpg" alt=""> -->
            <div id="change_setting_body" >
            <div class="row" >
                <div class="col-sm-3" id="profile_img">
                    {{-- <img class="img-avatar ml-2" src="https://dw3i9sxi97owk.cloudfront.net/homepage/user_stories/santamaria/santamaria-avatar_96x96.webp" alt=""> --}}
                </div>
                <div class="col-sm-9">
                    <button type="button" class="btn btn-success btn-photo"  id="add_photo" >Add Photo</button>

                </div>
            </div>
            </div>

            <div id="change_setting_div">
            <p>Upload or change your photo. Acceptable file types are .jpeg, .jpg or .png. All photos will be reduced to 50 x 50 pixels. If you already have a photo, uploading a new photo will overwrite your existing one.</p>
                <!-- <label>Bootstrap’s Custom File Input</label> -->
                <form method="post" id="upload-image-form" enctype="multipart/form-data">
                    @csrf
                <div class="custom-file">
                    <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="file" >
                    <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                    <span class="text-danger" id="image-input-error"></span>
                </div>

                <div class="upload-photo">
                    <button type="submit" class="btn btn-success">Upload</button>
                    <button type="button" class="btn btn-light" id="cancel_btn_change_setting">Cancel  </button>
                </div>
                </form>
            </div>

            <form method="post" id="upload-name-form" enctype="multipart/form-data">
                @csrf
                <div class="name">
                    <div class="form-group">
                        <label for="example-text-input">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="first name" >
                    </div>
                    {{-- <div class="form-group">
                        <label for="example-text-input">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="last name" >
                    </div> --}}
                    <span class="text-danger" id="image-name-error"></span>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" style="float: right">Save Changes</button>
                </div>
            </form>
            </div>


    </div>
</div>

@endsection

@section('js')

    <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery-validation/additional-methods.js')}}"></script>
    {{-- <script src="assets/js/plugins/sweetalert2/sweetalert2.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

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
        fetchData();
        function fetchData() {
            $.ajax({
            url: 'profile_page',
            type: 'get',
            dataType: 'json',
            success: function(data){
                console.log(data);

                var id = data.id;
                var first_name = data.name;
                var last_name = data.last_name;
                var email = data.email;
                var profile_pic='{{asset('img/profile_image')}}'+'/'+ data.profile_pic;


                $("#email").html(email);
                $("#email_edit").val(email);
                $("#profile_img").html(`<img class="img-avatar ml-2" src="${profile_pic}" alt="">`);
                $("#first_name").val(first_name);
                $("#last_name").val(last_name);
                }
            });
        }



    $("#email_save").click(function(){
        var email=$("#email_edit").val();

        $.ajax({
        type: "GET",
        enctype: 'multipart/form-data',
        url: "/profile_email_change",
        data: {email:email },
        success: function (data) {
            console.log("SUCCESS : ", data);

            $("#change_email_body").css("display","block");
            $("#change_email_div").css("display","none");
            fetchData();

            Toast.fire({
            icon: 'success',
            title: data,
            })
        }
        });
    });

    $("#pass_save").click(function(){
        var curr_pass=$("#curr_pass").val();
        var new1_pass=$("#new1_pass").val();
        var new2_pass=$("#new2_pass").val();

        if (new1_pass==new2_pass) {
        $.ajax({
        type: "GET",
        enctype: 'multipart/form-data',
        url: "/profile_pass_change",
        data: {curr_pass:curr_pass ,new1_pass:new1_pass ,new2_pass:new2_pass},
        success: function (data) {
            console.log("SUCCESS : ", data);

            if (data=='Current Password is Incorrect') {
                Toast.fire({
                icon: 'warning',
                title: data,
                })
            }
            else{
                $("#change_pass_body").css("display","block");
                $("#change_pass_div").css("display","none");
                fetchData();

                Toast.fire({
                icon: 'success',
                title: data,
                })
            }


        }
        });
        }
        else{
            $("#pass_error").html("password didn't match");
        }
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $('#upload-image-form').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: `/profile_image_change`,
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             if (response) {
               this.reset();

               $("#change_setting_body").css("display","block");
                $("#change_setting_div").css("display","none");
                fetchData();

               Toast.fire({
                icon: 'success',
                title: response,
                })

             }
           },
           error: function(response){
              console.log(response);
                $('#image-input-error').text(response.responseJSON.errors.file);
           }
       });
  });


   $('#upload-name-form').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);
       $('#image-name-error').text('');

       $.ajax({
          type:'POST',
          url: `/profile_name_change`,
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             if (response) {
               this.reset();

               fetchData();

               Toast.fire({
                icon: 'success',
                title: response,
                })


             }
           },
           error: function(response){
              console.log(response);
                $('#image-name-error').text(response.responseJSON.errors.file);
           }
       });
  });











        //for change email btn
        $( "#change_email" ).click(function() {
                $("#change_email_body").css("display","none");
                $("#change_email_div").css("display","block");
            });
        $( "#cancel_btn_change_email" ).click(function() {
                $("#change_email_body").css("display","block");
                $("#change_email_div").css("display","none");
                fetchData();
            });


            //for change pass btn
        $( "#change_pass" ).click(function() {
                $("#change_pass_body").css("display","none")
                $("#change_pass_div").css("display","block")
            });
        $( "#cancel_btn_change_pass" ).click(function() {
                $("#change_pass_body").css("display","block");
                $("#change_pass_div").css("display","none");
                fetchData();
            });


            //for change setting btn
        $( "#add_photo" ).click(function() {
                $("#change_setting_body").css("display","none")
                $("#change_setting_div").css("display","block")
            });
        $( "#cancel_btn_change_setting" ).click(function() {
                $("#change_setting_body").css("display","block");
                $("#change_setting_div").css("display","none");
                fetchData();
            });

});
    </script>

@endsection
