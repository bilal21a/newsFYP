<nav class="nv">
    <div class="wrapper">
      <div class="logo logo1"><a href="#">LOGO</a></div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="stylework close-btn"><i class="fas fa-times"></i></label>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="#">About</a></li>
        <li>
          <a href="#" class="desktop-item">Menu</a>
          <input type="checkbox" id="showDrop">
          <label for="showDrop" class="mobile-item">Menu</label>
          <ul class="drop-menu">
            <li><a href="{{ url('upload') }}">Upload Post</a></li>
            <li><a href="{{ url('filter_post') }}">Filter News</a></li>
          </ul>
        </li>
        @php
        //header
        $cats_1 =App\Category::where('status',1)->take(4)->get()->toArray();
        $cats_2 =App\Category::where('status',1)->take(8)->get()->toArray();
        $cats_2 = array_slice($cats_2, 4);
        $cats_3 =App\Category::where('status',1)->take(12)->get()->toArray();
        $cats_3 = array_slice($cats_3, 8);
        @endphp
        <li>
          <a href="#" class="desktop-item">Categories</a>
          <input type="checkbox" id="showMega">
          <label for="showMega" class="mobile-item">Categories</label>
          <div class="mega-box">
            <div class="content">

              <div class="row">

                <ul class="mega-links">
                    @foreach ($cats_1 as $cat1)
                    <li><a href="{{ url('categories/'.$cat1['id']) }}">{{ $cat1['name'] }}</a></li>
                @endforeach
                </ul>
              </div>
              <div class="row">

                <ul class="mega-links">
                    @foreach ($cats_2 as $cat2)
                    <li><a href="{{ url('categories/'.$cat2['id']) }}">{{ $cat2['name'] }}</a></li>
                @endforeach
                </ul>
              </div>
              <div class="row">

                <ul class="mega-links">
                    @foreach ($cats_3 as $cat3)
                    <li><a href="{{ url('categories/'.$cat3['id']) }}">{{ $cat3['name'] }}</a></li>
                @endforeach
                </ul>
              </div>
            </div>
          </div>
        </li>
        <li><a href="#">Feedback</a></li>


<!-- Drop Down User -->
@php
    // $user= Auth::user();
    // dd($user);
@endphp

@if (Auth::user())

        <div class="showdet dropdown d-inline-block ml-2">
          <button type="button" class="btn btn-work" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               @if (Auth::user()->profile_pic==null)
            <img class="rounded" src="{{asset('default.png')}}" alt="Header Avatar" style="width: 18px;">
             @else
            <img class="rounded" src="{{asset('img/profile_image/'. Auth::user()->profile_pic)}}" alt="Header Avatar" style="width: 18px;">
             @endif
              <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->name }}</span>
              <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
              <div class="p-3 text-center bg-primary">
                   @if (Auth::user()->profile_pic==null)
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('default.png')}}" alt="Header Avatar" >
                        @else
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('img/profile_image/'.Auth::user()->profile_pic)}}" alt="Header Avatar" >
                        @endif
              </div>
              <div class="p-2">
                  <h5 class="dropdown-header text-uppercase">User Options</h5>
                  <a class="heightwork dropdown-item d-flex align-items-center justify-content-between" href="{{ url('your_comments') }}">
                      <span>Comments</span>
                      <span>
                          <span class="badge badge-pill badge-primary"></span>
                          <i class="si si-envelope-open ml-1"></i>
                      </span>
                  </a>
                  <a class="heightwork dropdown-item d-flex align-items-center justify-content-between" href="{{ url('your_comments') }}">
                      <span>Post</span>
                      <span>
                          <span class="badge badge-pill badge-primary"></span>
                          <i class="fa fa-newspaper ml-1"></i>
                      </span>
                  </a>
                  {{-- <a class="heightwork dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_profile.html">
                      <span>Profile</span>
                      <span>
                          <span class="badge badge-pill badge-success">1</span>
                          <i class="si si-user ml-1"></i>
                      </span>
                  </a> --}}
                  <a class="heightwork dropdown-item d-flex align-items-center justify-content-between" href="{{ route('profile') }}">
                      <span>Settings</span>
                      <i class="si si-settings"></i>
                  </a>
                  <div role="separator" class="dropdown-divider"></div>
                  <h5 class="dropdown-header text-uppercase">Actions</h5>
                  {{-- <a class="heightwork dropdown-item d-flex align-items-center justify-content-between" href="op_auth_lock.html">
                      <span>Lock Account</span>
                      <i class="si si-lock ml-1"></i>
                  </a> --}}
                  <a class="heightwork dropdown-item d-flex align-items-center justify-content-between" href="{{ url('logout') }}">
                      <span>Log Out</span>
                      <i class="si si-logout ml-1"></i>
                  </a>
              </div>
          </div>
        </div>

@else
<li><a href="{{ route('login') }}">Login</a></li>
<li><a href="{{ route('register') }}">Signup</a></li>

@endif
<!-- Drop Down User End -->
      </ul>

      <label for="menu-btn" class="stylework menu-btn"><i class="fas fa-bars"></i></label>

      <div class="logo logo2"><a href="#">LOGO</a></div>

      <!-- Drop Down User Hamberger -->
      <div class="showdet2 dropdown d-inline-block">
        <button type="button" class="btn btn-sm btn-work" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="rounded" src="assets/media/avatars/avatar10.jpg" alt="Header Avatar" style="width: 18px;">
            <span class="d-none d-sm-inline-block ml-1">Adam</span>
            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
            <div class="p-3 text-center bg-primary">
                <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/media/avatars/avatar10.jpg" alt="">
            </div>
            <div class="p-2">
                <h5 class="dropdown-header text-uppercase">User Options</h5>
                <a class="heightwork dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
                    <span>Inbox</span>
                    <span>
                        <span class="badge badge-pill badge-primary">3</span>
                        <i class="si si-envelope-open ml-1"></i>
                    </span>
                </a>
                <a class="heightwork dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_profile.html">
                    <span>Profile</span>
                    <span>
                        <span class="badge badge-pill badge-success">1</span>
                        <i class="si si-user ml-1"></i>
                    </span>
                </a>
                <a class="heightwork dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span>Settings</span>
                    <i class="si si-settings"></i>
                </a>
                <div role="separator" class="dropdown-divider"></div>
                <h5 class="dropdown-header text-uppercase">Actions</h5>
                <a class="heightwork dropdown-item d-flex align-items-center justify-content-between" href="op_auth_lock.html">
                    <span>Lock Account</span>
                    <i class="si si-lock ml-1"></i>
                </a>
                <a class="heightwork dropdown-item d-flex align-items-center justify-content-between" href="op_auth_signin.html">
                    <span>Log Out</span>
                    <i class="si si-logout ml-1"></i>
                </a>
            </div>
        </div>
      </div>
<!-- Drop Down User End Hamberger -->


  </div>
  </nav>
  <!-- header end -->
  <div class="scrollmenu">

    <a href="{{ url('api_source/bbc-news') }}">BBC News
        <img class="" src="{{ asset('img/bbc.png') }}" alt="" style="width:37px; height:14px;">
      </a>
      <a href="{{ url('api_source/cnn') }}">CNN
        <img class="sm-logo-work" src="{{ asset('img/cnn.png') }}" alt="" style="width:35px; height:14px;">
      </a>
      <a href="{{ url('api_source/espn') }}">ESPN
        <img class="sm-logo-work" src="{{ asset('img/espn.png') }}" alt="" style="width:34px; height:14px;">
      </a>
      <a href="{{ url('api_source/the-washington-post') }}">Washington Post
        <img class="sm-logo-work" src="{{ asset('img/washington post.png') }}" alt="" >
      </a>
      <a href="{{ url('api_source/usa-today') }}">USA
        <img class="sm-logo-work" src="{{ asset('img/usa.png') }}" alt="" style="width:35px; height:14px;">
      </a>
      <a href="{{ url('api_source/google-news') }}">Google News
        <img class="sm-logo-work" src="{{ asset('img/google.png') }}" alt="" style="width:21px; height:15px;">
      </a>
      <a href="{{ url('api_source/ary-news') }}">ARY News
        <img class="sm-logo-work" src="{{ asset('img/arynews.png') }}" alt="" style="width:27px; height:19px;">
      </a>
      <a href="{{ url('api_source/nbc-news') }}">NBC News
        <img class="sm-logo-work" src="{{ asset('img/nbc.png') }}" alt="" style="width:23px; height:13px;">
      </a>


    <div class="sea">
        <form action="{{ route('search') }}" method="POST" enctype="multipart/form-data">
            @csrf
      <div class="input-group" id="search_bar">
        <input type="radio" name="slider" id="s-btn-click" class="rd">
        <label for="s-btn-click" class="btn s-btn-close"><i class="si si-close"></i></label>
        <input type="text" for="s-btn-click" class="form-control s-btn-close" placeholder="Search" name="search" aria-label="Search" aria-describedby="basic-addon2" required>
        <button type="submit" class="srch btn s-btn-close"><i class="fa fa-arrow-right" style="color: white"></i></button>
      </div>
    </form>
    <div class="input-group" id="search_btn">
    <input type="radio" name="slider" id="s-btn-click1" class="rd">
    <label for="s-btn-click1" class="btn s-btn-open"><i class="fa fa-search" ></i></label>
    </div>


  </div>
  </div>

@php


            $endpoint = "https://newsapi.org/v2/top-headlines";
            $client = new \GuzzleHttp\Client();
            $apiKey = getenv('NEWS_API_KEY');
            $source = "us";

            $response = $client->request('GET', $endpoint, ['query' => [
                'country' => $source,
                'apiKey' => $apiKey,
            ]]);

            $statusCode = $response->getStatusCode();
            $top_headlines = json_decode($response->getBody(), true);
@endphp

  <div class=" mt-0">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center breaking-news bdr" >
                <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center py-2 bg-danger text-white px-1 news"><span class="d-flex align-items-center">&nbsp;Headlines</span></div>
                <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                    @foreach ( $top_headlines['articles'] as $headlines)

                     <a href="{{ $headlines['url'] }}" class="a-bg-clr" target="_blank"><span class="dot ml-2"></span> {{ $headlines['title'] }}</a>
                     @endforeach
                </marquee>

                    </div>
        </div>
    </div>
</div>
