@extends('index')
@section('content')


        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ $post->name }}</a></li>
                    <li class="breadcrumb-item active">{{ $post->title }}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->


        <!-- Single News Start-->
        <div class="single-news">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="sn-img">
                            <img src="{{asset('img/main_image/'.$post->main_image)}}" />
                        </div>\
                        <?php
                            $date= $post->created_at;
                            $old_date_timestamp = strtotime($date);
                            $new_date = date('F d, Y', $old_date_timestamp);
                        ?>
                        <div class="sn-content">
                            <a class="sn-title" href="">{{ $post->title }}</a>
                            <a class="sn-date" href=""><i class="far fa-clock"></i>{{ $new_date }}</a>
                            <p>{{ $post->short_description }}</p><br>
                            <h4>Description</h4>
                            <p>{!! $post->description !!}</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i>Category</h2>
                                <div class="category">
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">National</a></li>
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">International</a></li>
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Economics</a></li>
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Politics</a></li>
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Lifestyle</a></li>
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Technology</a></li>
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">Trades</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i>Tags</h2>
                                <div class="tags">
                                    <a href="">National</a>
                                    <a href="">International</a>
                                    <a href="">Economics</a>
                                    <a href="">Politics</a>
                                    <a href="">Lifestyle</a>
                                    <a href="">Technology</a>
                                    <a href="">Trades</a>
                                    <a href="">National</a>
                                    <a href="">International</a>
                                    <a href="">Economics</a>
                                    <a href="">Politics</a>
                                    <a href="">Lifestyle</a>
                                    <a href="">Technology</a>
                                    <a href="">Trades</a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i>Ads 1 column</h2>
                                <div class="image">
                                    <a href=""><img src="{{asset('img/adds-1.jpg')}}" alt="Image"></a>

                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i>Ads 2 column</h2>
                                <div class="image">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href=""><img src="{{asset('img/adds-2.jpg')}}" alt="Image"></a>

                                        </div>
                                        <div class="col-sm-6">
                                            <a href=""><img src="{{asset('img/adds-2.jpg')}}" alt="Image"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single News End-->


@endsection
