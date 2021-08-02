@extends('index')
@section('content')
        <!-- Top News Start-->
        <div class="top-news">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 tn-left">
                        <div class="tn-img">
                            <img src="{{asset('img/main_image/'.$posts_most_viewed->main_image)}}" />
                            <div class="tn-content">
                                <div class="tn-content-inner">
                                    <?php
                                    $date_most_viewed= $posts_most_viewed['created_at'];
                                    $old_date_timestamp_most_viewed = strtotime($date_most_viewed);
                                    $new_date_most_viewed = date('F d, Y', $old_date_timestamp_most_viewed);
                                    ?>
                                    <a class="tn-date" href=""><i class="far fa-clock"></i>{{ $new_date_most_viewed }}</a>
                                    <a class="tn-title" href="{{ URL('single_post/'.$posts_most_viewed->id )}}">{{ $posts_most_viewed->title }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 tn-right">
                        <div class="row">
                            @foreach ($posts_most_viewed_2 as $post_most_viewed_2)
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="{{asset('img/main_image/'.$post_most_viewed_2['main_image'])}}" />
                                    <div class="tn-content">
                                        <?php
                                        $date_most_viewed_2= $post_most_viewed_2['created_at'];
                                        $old_date_timestamp_most_viewed_2 = strtotime($date_most_viewed_2);
                                        $new_date_most_viewed_2 = date('F d, Y', $old_date_timestamp_most_viewed_2);
                                        ?>
                                        <div class="tn-content-inner">
                                            <a class="tn-date" href=""><i class="far fa-clock"></i>{{ $new_date_most_viewed_2 }}</a>
                                            <a class="tn-title" href="{{ URL('single_post/'.$post_most_viewed_2['id'] )}}">{{ $post_most_viewed_2['title'] }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top News End-->


        <!-- Category News Start-->
        <div class="cat-news">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($post_count as $count)
                    <?php
                    $category_topFour= App\Category::where('status', 1)->where('id', $count)->first();
                    $category_post= App\Post::where('status', 1)->where('category_id', $count)->get();
                    ?>

                    <div class="col-md-6">
                        <h2><i class="fas fa-align-justify"></i>{{$category_topFour->name}}</h2>
                        <div class="row cn-slider">

                            @foreach ($category_post as $cat_data)
                            <?php
                                $date= $cat_data['created_at'];
                                $old_date_timestamp = strtotime($date);
                                $new_date = date('F d, Y', $old_date_timestamp);
                            ?>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="{{asset('img/main_image/'.$cat_data->main_image)}}" />
                                    <div class="cn-content">
                                        <div class="cn-content-inner">
                                            <a class="cn-date" href=""><i class="far fa-clock"></i>{{$new_date}}</a>
                                            <a class="cn-title" href="{{ URL('single_post/'.$cat_data->id )}}">{{$cat_data->title}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>

                    @endforeach


                </div>
            </div>
        </div>
        <!-- Category News End-->





        <!-- Main News Start-->
        <div class="main-news">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h2><i class="fas fa-align-justify"></i>Latest News</h2>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mn-img">
                                            <img src="{{asset('img/main_image/'.$posts_latest_first['main_image'])}}" />
                                        </div>
                                        <?php
                                            $date_latest_first= $posts_latest_first['created_at'];
                                            $old_date_timestamp_latest_first = strtotime($date_latest_first);
                                            $new_date_latest_first = date('F d, Y', $old_date_timestamp_latest_first);
                                        ?>
                                        <div class="mn-content">
                                            <a class="mn-title" href="{{ URL('single_post/'.$posts_latest_first['id'] )}}">{{ $posts_latest_first['title'] }}</a>
                                            <a class="mn-date" href=""><i class="far fa-clock"></i>{{ $new_date_latest_first }}</a>
                                            <p> {{ substr($posts_latest_first['short_description'],0,100) }} ...</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        @foreach ($posts_latest as $single)
                                        <div class="mn-list">
                                            <div class="mn-img">
                                                <img src="{{asset('img/main_image/'.$single['main_image'])}}" />
                                            </div>
                                            <?php
                                                $date_single= $single['created_at'];
                                                $old_date_single = strtotime($date_single);
                                                $new_date_single = date('F d, Y', $old_date_single);
                                            ?>
                                            <div class="mn-content">
                                                <a class="mn-title" href="{{ URL('single_post/'.$single['id'] )}}">{{$single['title'] }}</a>
                                                <a class="mn-date" href=""><i class="far fa-clock"></i>{{ $new_date_single }}</a>
                                            </div>
                                        </div>
                                        @endforeach


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
                                        @foreach ($category as $cat)
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="">{{ $cat->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i>Tags</h2>
                                <div class="tags">
                                    @foreach ($tags_ten as $one_tag)
                                    <a href="">{{$one_tag['name']}}</a>
                                    @endforeach
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main News End-->
@endsection
