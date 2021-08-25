@extends('index2')

@section('after_css')
    <link href="{{asset('css/categories.css')}}" rel="stylesheet">
@endsection

@section('content')


<!-- <div class="single-news"> -->
    <div class="sidebar">
    <div class="sidebar-widget">


    <h2 class="st"><i class="fas fa-align-justify jx"></i>{{$cat_name[0]['name']}}</h2>
</div>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">

                    @if ($posts_all==null)
                        <div  style="margin-left: 312px;">
                            <h3>No Post Available in {{$cat_name[0]['name']}} Category</h3>
                        </div>
                    @else
                    @foreach ( $posts_all as $single_post )
                <div class="col-sm-6">
                <div>
                    <div class="card">
                        <img class="card-img-top" src="{{asset('img/main_image/'. $single_post->main_image)}}" alt="Card image cap">
                        <div class="card-body">
                        <a class="mn-title" href="{{ URL('single_post/'.$single_post->id )}}">
                          <h5 class="card-title">{{$single_post->title}}</h5>
                        </a>
                          <i class="fa fa-user uu"><span class="us"> {{$single_post->name}}</span></i>
                          <?php
                          $date_latest_first= $single_post->created_at;
                          $old_date_timestamp_latest_first = strtotime($date_latest_first);
                          $new_date_latest_first = date('F d, Y', $old_date_timestamp_latest_first);
                            ?>
                              <i class="fa fa-calendar-alt cc"><span class="cal"> {{$new_date_latest_first}}</span></i>
                          <p> {{ substr($single_post->short_description,0,100) }} ...</p>


                          <div><i class="fas fa-comments"></i> <b>0 Comments</b></div>
                        </div>
                      </div>
                    </div>
                </div>
                @endforeach

                    @endif




                </div>
            </div>


        @include('layouts.partials.sidebar')


        </div>
</div>
<!-- </div> -->
@endsection

@section('after_js')






@endsection
