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
                            <b>doctorjon4412@gmail.com</b><br>
                        <a class="link-fx text-success" id="change_email" style="cursor: pointer;">Change email</a>
                        </div>

                        <div id="change_email_div">
                            <h4>Enter a new Email address</h4>
                            <div class="row" >
                                <div class="col-md-8">
                                    <input type="email" class="form-control" id="example-email-input" name="example-email-input" placeholder="Emai Input">
                                </div>

                                <div class="col-md-4">
                                    <button type="button" class="btn btn-success">Save</button>
                                    <button type="button" id="cancel_btn_change_email" class="btn btn-light">Cancel  </button>
                                 </div>

                            </div> <br>
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
                    <div class="password" style="width: 90%;">
                        <div class="form-group">
                            <label for="val-password">Current Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="val-password" name="val-password" placeholder="Enter your current password">
                        </div>
                        <div class="form-group">
                            <label for="val-password">New Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="val-password" name="val-password" placeholder="Enter your new password">
                        </div>
                        <div class="form-group">
                            <label for="val-confirm-password">Confirm New Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="Confirm your new password">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">

                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-light" id="cancel_btn_change_pass">Cancel  </button>
                        </div>
                    </div>
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
                <div class="col-sm-3">
                    <img class="img-avatar ml-2" src="https://dw3i9sxi97owk.cloudfront.net/homepage/user_stories/santamaria/santamaria-avatar_96x96.webp" alt="">
                </div>
                <div class="col-sm-9">
                    <button type="button" class="btn btn-success btn-photo"  id="add_photo" >Add Photo</button>

                </div>
            </div>
            </div>

            <div id="change_setting_div">
            <p>Upload or change your photo. Acceptable file types are .jpeg, .jpg or .png. All photos will be reduced to 50 x 50 pixels. If you already have a photo, uploading a new photo will overwrite your existing one.</p>
                <!-- <label>Bootstrap’s Custom File Input</label> -->
                <div class="custom-file">
                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                    <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="example-file-input-custom">
                    <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                </div>

                <div class="upload-photo">
                    <button type="button" class="btn btn-success">Upload</button>
                    <button type="button" class="btn btn-light" id="cancel_btn_change_setting">Cancel  </button>

                </div>
            </div>

                <div class="name">
                    <div class="form-group">
                        <label for="example-text-input">First Name</label>
                        <input type="text" class="form-control" id="example-text-input" name="first-name" placeholder="first name" >
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">Last Name</label>
                        <input type="text" class="form-control" id="example-text-input" name="last-name" placeholder="last name" >
                    </div>
                </div>

                <div>
                    <button type="button" class="btn btn-success" style="float: right">Save Changes</button>
                </div>

            </div>


    </div>
</div>

@endsection

@section('js')

    <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery-validation/additional-methods.js')}}"></script>

    <script>
        // $( document ).ready(function() {

        // });



        //for change email btn
        $( "#change_email" ).click(function() {
                $("#change_email_body").css("display","none")
                $("#change_email_div").css("display","block")
            });
        $( "#cancel_btn_change_email" ).click(function() {
                $("#change_email_body").css("display","block")
                $("#change_email_div").css("display","none")
            });


            //for change email btn
        $( "#change_pass" ).click(function() {
                $("#change_pass_body").css("display","none")
                $("#change_pass_div").css("display","block")
            });
        $( "#cancel_btn_change_pass" ).click(function() {
                $("#change_pass_body").css("display","block")
                $("#change_pass_div").css("display","none")
            });


            //for change email btn
        $( "#add_photo" ).click(function() {
                $("#change_setting_body").css("display","none")
                $("#change_setting_div").css("display","block")
            });
        $( "#cancel_btn_change_setting" ).click(function() {
                $("#change_setting_body").css("display","block")
                $("#change_setting_div").css("display","none")
            });
    </script>

@endsection
