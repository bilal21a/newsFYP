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
          <a href="#" class="desktop-item">Dropdown Menu</a>
          <input type="checkbox" id="showDrop">
          <label for="showDrop" class="mobile-item">Dropdown Menu</label>
          <ul class="drop-menu">
            <li><a href="#">Drop menu 1</a></li>
            <li><a href="#">Drop menu 2</a></li>
            <li><a href="#">Drop menu 3</a></li>
            <li><a href="#">Drop menu 4</a></li>
          </ul>
        </li>
        <li>

            @php
                //header
                $cats_1 =App\Category::where('status',1)->take(4)->get()->toArray();
                $cats_2 =App\Category::where('status',1)->take(8)->get()->toArray();
                $cats_2 = array_slice($cats_2, 4);
                $cats_3 =App\Category::where('status',1)->take(12)->get()->toArray();
                $cats_3 = array_slice($cats_3, 8);
            @endphp
          <a href="#" class="desktop-item">Categories</a>
          <input type="checkbox" id="showMega">
          <label for="showMega" class="mobile-item">Categories</label>
          <div class="mega-box">
            <div class="content">
              <div class="row">
                {{-- <img class="imag" src="assets/img.jpg" alt=""> --}}
              </div>
                <div class="row">
                <header></header>
                <ul class="mega-links">
                    @foreach ($cats_1 as $cat1)
                        <li><a href="{{ url('categories/'.$cat1['id']) }}">{{ $cat1['name'] }}</a></li>
                    @endforeach
                </ul>
              </div>
              <div class="row">
                <header></header>
                <ul class="mega-links">
                    @foreach ($cats_2 as $cat2)
                        <li><a href="{{ url('categories/'.$cat2['id']) }}">{{ $cat2['name'] }}</a></li>
                    @endforeach
                </ul>
              </div>
              <div class="row">
                <header></header>
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
        <div class="showdet dropdown d-inline-block ml-2">
          <button type="button" class="btn btn-work" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                {{-- @if ($user->profile_pic==null)
            <img class="rounded" src="{{asset('default.png')}}" alt="Header Avatar" style="width: 18px;">
             @else
            <img class="rounded" src="{{asset('img/profile_image/'. $user->profile_pic)}}" alt="Header Avatar" style="width: 18px;">
             @endif --}}

              <span class="d-none d-sm-inline-block ml-1">Adam</span>
              <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
              <div class="p-3 text-center bg-primary">
                        {{-- @if ($user->profile_pic==null)
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('default.png')}}" alt="Header Avatar" >
                        @else
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('img/profile_image/'. $user->profile_pic)}}" alt="Header Avatar" >
                        @endif --}}
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
                  <a class="heightwork dropdown-item d-flex align-items-center justify-content-between" href="{{ url('/profile') }}">
                      <span>Settings</span>
                      <i class="si si-settings"></i>
                  </a>
                  <div role="separator" class="dropdown-divider"></div>
                  <h5 class="dropdown-header text-uppercase">Actions</h5>
                  <a class="heightwork dropdown-item d-flex align-items-center justify-content-between" href="op_auth_lock.html">
                      <span>Lock Account</span>
                      <i class="si si-lock ml-1"></i>
                  </a>
                  <a class="heightwork dropdown-item d-flex align-items-center justify-content-between" href="{{ url('/logout') }}">
                      <span>Log Out</span>
                      <i class="si si-logout ml-1"></i>
                  </a>
              </div>
          </div>
        </div>
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
      <img class="sm-logo-work" src="{{ asset('img/nbc.png') }}" alt="" style="width:23px; height:13px;>
    </a>

    <span>
    <input class="search-work" type="text" value="" placeholder="Search">
    <button class="btn-info mr-2 searchbtn-work"><i class="fa fa-search"></i></button>
  </span>
  </div>
  <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center breaking-news bg-white">
                <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-2 text-white px-1 news"><span class="d-flex align-items-center">&nbsp;Top Headlines</span></div>
                <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> <a href="#">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </a> <span class="dot"></span> <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </a> <span class="dot"></span> <a href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse </a> </marquee>
            </div>
        </div>
    </div>
</div>
