      <!-- Footer Start -->
      <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Categories</h3>
                        <ul>
                            <li><a href="#">Pellentesque</a></li>
                            <li><a href="#">Aliquam</a></li>
                            <li><a href="#">Fusce placerat</a></li>
                            <li><a href="#">Nulla hendrerit</a></li>
                            <li><a href="#">Maecenas</a></li>
                        </ul>
                    </div>
                </div>

                <?php
                $category_topFour= App\Category::where('status', 1)->where('id', $count->category_id)->first();
                $first_post= App\Post::where('status', 1)->where('category_id', $count->category_id)->latest()->first();
                $three_post= App\Post::where('status', 1)->where('category_id', $count->category_id)->take(4)->latest()->get()->toArray();
                array_shift($three_post);
                // dd($three_post);
                ?>


                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Posts </h3>
                        <ul>
                            @foreach ($category_topFour as $categories)

                            <li><a href="#">{{ $categories->name }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Get in Touch</h3>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker-alt"><a class="text-success"  href="https://www.google.com/maps/dir/31.5695028,74.4189131/pen+and+web/@31.5176833,74.3351558,12z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x3919091c8399592b:0xcaf9db2858a4a5bd!2m2!1d74.4133071!2d31.4621124" style="font-weight: 100;" >
                                  123 Terry Lane, New York, USA</a></i></p>
                            <p><i class="far fa-envelope"><a class="text-success" href="mailto:webmaster@example.com" style="font-weight: 100;">     info@worldnews.com</a></i></p>
                            <p><i class="fa fa-phone">
                            <a class="text-success" href="callto:+123-456-7890" style="font-weight: 100;">  +123-456-7890</a>
                            </i></p>
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
                                An email newsletter is a recurring email sent to subscribed contacts containing curated informational content from news articles to resources and tips. The goal is to provide ongoing value while surfacing important industry- or niche-related topics.
                            </p>
                            <form>
                                <div class="row">
                                    <div class="col-md-8">
                                <input class="form-control" type="email" placeholder="Your email here">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-block btn-success">Submit</button>
                            </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <a href="#" class="back-to-top"><i class="fa fa-chevron-up" ></i></a>

        </div>
    </div>
    <!-- Footer End -->

