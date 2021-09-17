@extends('admin.index')

@section('css')
@endsection

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Notifications <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
            </h1>
            {{-- <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="">DataTables</a>
                    </li>
                </ol>
            </nav> --}}
        </div>
    </div>
</div>
<!-- END Hero -->

{{-- Page Content --}}
<div style="background-color: #F8FBFC;">
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8 bg-white">
            <div class="bg-white p-2">
                {{-- <h2 class="d-flex flex-column justify-content-start ml-2">Notifications</h2> --}}
                    <!-- repaeat text -->
                <div class="d-flex flex-column comment-section lh">
                        <div class="bg-white p-2">
                            <div class="row vl">
                                <div class="col-md-10 col-sm-8">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3">
                                            <img class="rounded-circle" src="https://dw3i9sxi97owk.cloudfront.net/homepage/user_stories/santamaria/santamaria-avatar_96x96.webp" width="60">
                                        </div>
                                        <div class="col-md-10 col-sm-9">
                                            <a href="">
                                                <div class="d-flex flex-row user-info">
                                                    <div class="d-flex flex-column justify-content-start mt-2"><span class="d-block font-weight-bold name text-primary">Manii Posted a New Post</span></div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="comment-text"> <b> Title Will Be Shown Here! </b></p>
                                                    <p class="comment-text"> <b> 11 Hours Ago </b></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-light circle" id="dropdown-default-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-dark"></i>
                                        </button>
                                        <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-light">
                                            <a class="dropdown-item" href="javascript:void(0)">Mark as Read</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Remove Notification</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void(0)">Remove all Notification from Manii</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-10 col-sm-8">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3">
                                            <img class="rounded-circle" src="https://dw3i9sxi97owk.cloudfront.net/homepage/user_stories/santamaria/santamaria-avatar_96x96.webp" width="60">
                                        </div>
                                        <div class="col-md-10 col-sm-9">
                                            <a href="">
                                                <div class="d-flex flex-row user-info">
                                                    <div class="d-flex flex-column justify-content-start mt-2"><span class="d-block name text-info">Manii Posted a New Post</span></div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="comment-text">  Title Will Be Shown Here! </p>
                                                    <p class="comment-text"> 11 Hours Ago </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-light circle" id="dropdown-default-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-dark"></i>
                                        </button>
                                        <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-light">
                                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                <!-- end repeat -->

            </div>
            <div class="d-flex flex-column justify-content-center" style="text-align: center;"><span class="d-block font-weight-bold ">You Don't Have Posted Any News Yet!</span></div>
        </div>
    </div>
</div>
</div>
</div>
{{-- Page Content End --}}

@endsection

@section('js')
@endsection

@section('internal_css')
<style>
.vl{
    border-left: 7px solid #5c80d1!important;
    border-radius: 5px 0px 0px 5px;
}
.circle{
    border-radius: 50%;
}
.a-tag{
    text-decoration: none;
}
.lh{
    line-height: 12px;
}
.name{
    font-size: 14px !important;
}
.comment-text{
    font-size: 12px !important;
    color: black;
}
.duration{
    font-size: 12px !important;
    color: black;
}
</style>
@endsection
