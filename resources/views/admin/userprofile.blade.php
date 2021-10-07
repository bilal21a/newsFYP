@extends('admin.index')

@section('css')
@endsection

@section('content')
 <!-- Hero -->
 <div class="bg-image" style="background-image: url({{ asset('media/photos/bg123.png') }});">
    <div class="bg-black-50">
        <div class="content content-full text-center">
            <div class="my-3">
                <img class="img-avatar img-avatar-thumb" src="{{ asset('media/avatars/avatar13.jpg') }}" alt="">
            </div>
            <h1 class="h2 text-white mb-0">John Parker</h1>
            <span class="text-white-75">UI Designer</span>
        </div>
    </div>
</div>
<!-- END Hero -->
<!-- Stats -->
<div class="bg-white border-bottom">
    <div class="content content-boxed">
        <div class="row items-push text-center">
            <div class="col-6 col-md-3">
                <div class="font-size-sm font-w600 text-muted text-uppercase">Published Posts</div>
                <div class="link-fx font-size-h3 text-primary">17980</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="font-size-sm font-w600 text-muted text-uppercase">Saved Posts</div>
                <div class="link-fx font-size-h3 text-primary">27</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="font-size-sm font-w600 text-muted text-uppercase">Comments</div>
                <div class="link-fx font-size-h3 text-primary">1360</div>
            </div>
            <div class="col-6 col-md-3">
                <div class="font-size-sm font-w600 text-muted text-uppercase">Member Since</div>
                <div class="link-fx font-size-h3 text-primary">Oct 25, 1999</div>
            </div>
        </div>
    </div>
</div>
<!-- END Stats -->

<!-- Page Content -->
<div class="content content-boxed">
    <div class="row">
        <div class="col-md-7 col-xl-8">
            <!-- Updates -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <i class="far fa-list-alt text-muted mr-1"></i> Posts
                    </h3>
                </div>
                <div class="block-content">
                    <div class="font-size-sm push">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('media/photos/photo14.jpg') }}" alt="" class="stl" >
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between mb-2">
                                    <div>
                                        <a class="font-w600" href="">Fayazul Hasan Chohan appointed Punjab govt spokesperson</a>
                                    </div>
                                </div>
                                <p class="mb-0">Flawless design execution! I'm really impressed with the product, it really helped me build my app so fast! Thank you!</p>
                                <div class="d-flex flex-row fs-12">
                                    <div class="like p-2 "><b><i class="fa fa-clock"></i><span class="ml-1">12 Jan 2020</span></b></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="font-size-sm push">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('media/photos/photo14.jpg') }}" alt="" class="stl" >
                            </div>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between mb-2">
                                    <div>
                                        <a class="font-w600" href="">Fayazul Hasan Chohan appointed Punjab govt spokesperson</a>
                                    </div>
                                </div>
                                <p class="mb-0">Flawless design execution! I'm really impressed with the product, it really helped me build my app so fast! Thank you!</p>
                                <div class="d-flex flex-row fs-12">
                                    <div class="like p-2 "><b><i class="fa fa-clock"></i><span class="ml-1">12 Jan 2020</span></b></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="text-center push">
                        <button type="button" class="btn btn-sm btn-light">Read More..</button>
                    </div>
                </div>
            </div>

            <!-- END Updates -->
        </div>
        <div class="col-md-5 col-xl-4">

            <!-- Ratings -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <i class="far fa-comments text-muted mr-1"></i> Comments
                    </h3>
                </div>
                <div class="block-content">
                    <div class="font-size-sm push">
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <a class="font-w600" href="">Fayazul Hasan Chohan appointed Punjab govt spokesperson</a>
                            </div>
                        </div>
                        <p class="mb-0">Flawless design execution! I'm really impressed with the product, it really helped me build my app so fast! Thank you!</p>
                        <div class="d-flex flex-row fs-12">
                            <div class="like p-2 "><b><i class="fa fa-clock"></i><span class="ml-1">12 Jan 2020</span></b></div>
                        </div>
                        <hr>
                    </div>
                    <div class="font-size-sm push">
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <a class="font-w600" href="">Fayazul Hasan Chohan appointed Punjab govt spokesperson</a>
                            </div>
                        </div>
                        <p class="mb-0">Flawless design execution! I'm really impressed with the product, it really helped me build my app so fast! Thank you!</p>
                        <div class="d-flex flex-row fs-12">
                            <div class="like p-2 "><b><i class="fa fa-clock"></i><span class="ml-1">12 Jan 2020</span></b></div>
                        </div>
                        <hr>
                    </div>
                    <div class="font-size-sm push">
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <a class="font-w600" href="">Fayazul Hasan Chohan appointed Punjab govt spokesperson</a>
                            </div>
                        </div>
                        <p class="mb-0">Flawless design execution! I'm really impressed with the product, it really helped me build my app so fast! Thank you!</p>
                        <div class="d-flex flex-row fs-12">
                            <div class="like p-2 "><b><i class="fa fa-clock"></i><span class="ml-1">12 Jan 2020</span></b></div>
                        </div>
                        <hr>
                    </div>
                    <div class="text-center push">
                        <button type="button" class="btn btn-sm btn-light">Read More..</button>
                    </div>
                </div>
            </div>
            <!-- END Ratings -->
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection

@section('js')
@endsection

@section('internal_css')
<style>
    .stl{
        width: 150px;
        height: 100px;
    }
</style>
@endsection
