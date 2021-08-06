
        <!-- Top Header Start -->
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="logo">
                            <a href="">
                                <img src="{{asset('img/logo.png')}}" alt="Logo">
                                <!-- <link href="{{asset('img/logo.png')}}"> -->

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

        // dd($most_posts_cat);
?>
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
                            <a href="{{route('home')}}" class="nav-item nav-link" >Home</a>
                            @foreach ($most_posts_cat as $cat_single)
                                <a href="{{ route('show_categories',$cat_single[0]->id) }}" class="nav-item nav-link">{{$cat_single[0]->cat_name}}</a>
                            @endforeach

                            {{-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Sub Item 1</a>
                                    <a href="#" class="dropdown-item">Sub Item 2</a>
                                </div>
                            </div> --}}
                            <a href="{{route('contact_us')}}" class="nav-item nav-link">Contact Us</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Header End -->


