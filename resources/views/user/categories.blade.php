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


        @include('layouts.partials.sidebar')


        </div>
</div>
<!-- </div> -->
@endsection

@section('after_js')






@endsection
