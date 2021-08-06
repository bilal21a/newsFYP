<?php
            //for header
            $most_posts_cat_raw = DB::table('posts as p')
                 ->select('category_id', DB::raw('count(*) as total'))
                 ->groupBy('category_id')
                 ->orderby('total', 'DESC')
                 ->where('status', 1)
                 ->take(10)
                 ->get();

        $most_posts_cat=array();

        foreach ($most_posts_cat_raw as $key => $value) {
            // dd($value->total);
            $cat=DB::table('categories as cat')
            ->join('posts as p', 'p.category_id', '=', 'cat.id')
            ->select('cat.name as cat_name','cat.id')
            ->where('p.status', 1)
            ->where('p.category_id', $value->category_id)
            ->distinct()
            ->take(10)
            ->get()
            ->toArray();
            $most_posts_cat[] = $cat;
        }
?>


<div class="col-md-4">
    <div class="sidebar">
        <div class="sidebar-widget">
            <h2><i class="fas fa-align-justify"></i>Category</h2>
            <div class="category">
                <ul class="fa-ul">
                    @foreach ($most_posts_cat as $cat_single)
                    <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="{{ route('show_categories',$cat_single[0]->id) }}">{{$cat_single[0]->cat_name}}</a></li>
                    @endforeach
                </ul>
            </div>


              <!-- Main News Start-->

            <?php
            $posts_latest = DB::table('posts as p')
                    ->select('p.id','p.title','p.main_image','p.created_at')
                    ->where('p.status', 1)
                    ->latest()->take(8)->get();
            ?>


            <div class="main-news">
            <div class="container-fluid">
            <h2><i class="fas fa-align-justify"></i>Latest News</h2>

                    @foreach ($posts_latest as $single_post_latest)
                    <?php
                    $date_most_viewed= $single_post_latest->created_at;
                    $old_date_timestamp_most_viewed = strtotime($date_most_viewed);
                    $new_date_most_viewed = date('F d, Y', $old_date_timestamp_most_viewed);
                    ?>


                    <div class="mn-list">
                        <div class="mn-img">
                            <img src="{{asset('img/main_image/'.$single_post_latest->main_image)}}" />
                        </div>
                        <div class="mn-content">
                            <a class="mn-title" href="{{ URL('single_post/'.$single_post_latest->id )}}">{{ $single_post_latest->title }}</a>
                            <a class="mn-date" href=""><i class="far fa-clock"></i>{{ $new_date_most_viewed }}</a>
                        </div>
                    </div>
                    @endforeach


                    </div>
                </div>
        </div>
    </div>
</div>
