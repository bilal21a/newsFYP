@extends('index2')

@section('after_css')
    <link href="{{asset('css/categories.css')}}" rel="stylesheet">
@endsection

@section('content')


<!-- <div class="single-news"> -->
    <div class="sidebar">
    <div class="sidebar-widget">
    <h2 class="st"><i class="fas fa-align-justify jx"></i>Category Name</h2>
</div>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                <div class="col-sm-6">
                <div>
                    <div class="card">
                        <img class="card-img-top" src="img/cat-news-4.jpg" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">US Dollar decreases by Rs 0.23 Agai...</h5>
                          <i class="fa fa-user uu"><span class="us"> User Name</span></i>
                              <i class="fa fa-calendar-alt cc"><span class="cal"> 04 August 2021</span></i>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. up the bulk of the card's content.</p>

                          <div><i class="fas fa-comments"></i> <b>0 Comments</b></div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div>
                        <div class="card">
                            <img class="card-img-top" src="img/cat-news-4.jpg" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">US Dollar decreases by Rs 0.23 Agai...</h5>
                              <i class="fa fa-user uu"><span class="us"> User Name</span></i>
                              <i class="fa fa-calendar-alt cc"><span class="cal"> 04 August 2021</span></i>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. up the bulk of the card's content.</p>

                              <div><i class="fas fa-comments"></i> <b>0 Comments</b></div>
                            </div>
                          </div>
                        </div>
                </div>
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
<!-- </div> -->
@endsection

@section('after_js')






@endsection
