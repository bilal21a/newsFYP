<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>News 24 - Free News Website Templates</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap Ecommerce Template" name="keywords">
        <meta content="Bootstrap Ecommerce Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <!-- <link href="lib/slick/slick.css" rel="stylesheet"> -->
        <link href="{{asset('lib/slick/slick.css')}} "rel="stylesheet">

        <!-- <link href="lib/slick/slick-theme.css" rel="stylesheet"> -->
        <link href="{{asset('lib/slick/slick-theme.css')}}" rel="stylesheet">
        <!-- Template Stylesheet -->
        <!-- <link href="css/style.css" rel="stylesheet"> -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>

    <body>
        <!-- Top Header Start -->
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="logo">
                            <a href="">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook"></i></a>
                            <a href=""><i class="fab fa-linkedin"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Header End -->


        <!-- Header Start -->
        <div class="header">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav m-auto">
                            <a href="index.html" class="nav-item nav-link active">Home</a>

                            @foreach ($category as $cat)
                                <a href="#" class="nav-item nav-link">{{$cat->name}}</a>
                            @endforeach

                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Sub Item 1</a>
                                    <a href="#" class="dropdown-item">Sub Item 2</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Header End -->


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


        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Useful Links</h3>
                            <ul>
                                <li><a href="#">Pellentesque</a></li>
                                <li><a href="#">Aliquam</a></li>
                                <li><a href="#">Fusce placerat</a></li>
                                <li><a href="#">Nulla hendrerit</a></li>
                                <li><a href="#">Maecenas</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Quick Links</h3>
                            <ul>
                                <li><a href="#">Posuere egestas</a></li>
                                <li><a href="#">Sollicitudin</a></li>
                                <li><a href="#">Luctus non</a></li>
                                <li><a href="#">Duis tincidunt</a></li>
                                <li><a href="#">Elementum</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Get in Touch</h3>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>123 Terry Lane, New York, USA</p>
                                <p><i class="fa fa-envelope"></i>email@example.com</p>
                                <p><i class="fa fa-phone"></i>+123-456-7890</p>
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook"></i></a>
                                    <a href=""><i class="fab fa-linkedin"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Newsletter</h3>
                            <div class="newsletter">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed porta dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra inceptos
                                </p>
                                <form>
                                    <input class="form-control" type="email" placeholder="Your email here">
                                    <button class="btn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                    </div>

                    <div class="col-md-6 template-by">
                        <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->


        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- <script src="lib/easing/easing.min.js"></script> -->
        <script src="{{asset('lib/easing/easing.min.js')}}"></script>

        <script src="{{asset('lib/slick/slick.min.js')}}"></script>

        <!-- <script src="lib/slick/slick.min.js"></script> -->


        <!-- Template Javascript -->
        <script src="{{asset('js/main.js')}}"></script>

        <!-- <script src="js/main.js"></script> -->
    </body>
</html>
