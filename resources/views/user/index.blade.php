@include('layouts.partials.header');
    <div id="main-content">
        <?php
            // dd($all_post['title']);
            ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                        @foreach ($all_post as $data)
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php"><img src="{{ asset('images/'.$data['main_image']) }}" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php'>{{$data['title']}}</a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php'>PHP</a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php'>Admin</a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php $date= $data['created_at'];
                                                $old_date_timestamp = strtotime($date);
                                                $new_date = date('F d, Y', $old_date_timestamp);
                                                ?>
                                                {{$new_date}}
                                            </span>
                                        </div>
                                        <p class="description">
                                            <?php $disc= substr($data['description'],0,200)?>
                                            {{$disc}}
                                        </p>
                                        <a class='read-more pull-right' href='single.php'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                        <ul class='pagination'>
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                        </ul>
                    </div><!-- /post-container -->
                </div>
                @include('layouts.partials.sidebar');
            </div>
        </div>
    </div>
    @include('layouts.partials.footer');
