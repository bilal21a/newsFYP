@extends('index2')

@section('after_css')
    <link href="{{asset('css/bydate.css')}}" rel="stylesheet">
@endsection

@section('content')

<!-- cards -->
<div class="work">
<div class="main-news">
    <div class="container-fluid" >
                        <div class="row">
                            <div class="col-md-8 case">
                                    <div class="row">
                                        <div class="col-sm-3">
                                    <div class="mn-img mn-img1">
                                        <img src="img/latest-news.jpg">
                                    </div>
                                    </div>
                                    <div class="col-sm-9">
                                    <div class="mn-content">
                                        <a class="mn-title mn-title2" href=""><b>Pellentesque sit amet huhas njinas ninas jsa rutrum lacus</b></a>
                                        <p class="mn-des" href="">Pellentesque sit amet rutrum lacus Pellentesque sit amet rutrum lacus Pellentesque sit amet rutrum lacus</p>
                                        <a class="mn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                    </div>
                                </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                <div class="mn-img mn-img1">
                                    <img src="img/latest-news.jpg">
                                </div>
                                </div>
                                <div class="col-sm-9">
                                <div class="mn-content">
                                    <a class="mn-title mn-title2" href=""><b>Pellentesque sit amet huhas njinas ninas jsa rutrum lacus</b></a>
                                    <p class="mn-des" href="">Pellentesque sit amet rutrum lacus Pellentesque sit amet rutrum lacus Pellentesque sit amet rutrum lacus</p>
                                    <a class="mn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                </div>
                            </div>
                            </div>
                            </div>
                                <div class="col-md-4 case">
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


                                              <!-- Main News Start-->
                      <div class="main-news">
                        <div class="container-fluid">
                                            <h2><i class="fas fa-align-justify"></i>Latest News</h2>

                                                    <div class="mn-list">
                                                        <div class="mn-img">
                                                            <img src="img/latest-news.jpg" />
                                                        </div>
                                                        <div class="mn-content">
                                                            <a class="mn-title" href="">Pellentesque sit amet rutrum lacus</a>
                                                            <a class="mn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                                        </div>
                                                    </div>
                                                    <div class="mn-list">
                                                        <div class="mn-img">
                                                            <img src="img/latest-news.jpg" />
                                                        </div>
                                                        <div class="mn-content">
                                                            <a class="mn-title" href="">Proin id pretium orci, quis rhoncus eros</a>
                                                            <a class="mn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                                        </div>
                                                    </div>
                                                    <div class="mn-list">
                                                        <div class="mn-img">
                                                            <img src="img/latest-news.jpg" />
                                                        </div>
                                                        <div class="mn-content">
                                                            <a class="mn-title" href="">Curabitur viverra scelerisque tempor</a>
                                                            <a class="mn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                                        </div>
                                                    </div>
                                                    <div class="mn-list">
                                                        <div class="mn-img">
                                                            <img src="img/latest-news.jpg" />
                                                        </div>
                                                        <div class="mn-content">
                                                            <a class="mn-title" href="">Integer nec lorem facilisis interdum lorem non</a>
                                                            <a class="mn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                                        </div>
                                                    </div>
                                                    <div class="mn-list">
                                                        <div class="mn-img">
                                                            <img src="img/latest-news.jpg" />
                                                        </div>
                                                        <div class="mn-content">
                                                            <a class="mn-title" href="">Interdum et malesuada fames</a>
                                                            <a class="mn-date" href=""><i class="far fa-clock"></i>05-Feb-2020</a>
                                                        </div>
                                                    </div>
                        </div>
                    </div>
                    <!-- Main News End-->
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
            </div>



<!-- Cards End -->



 @endsection

 @section('after_js')
