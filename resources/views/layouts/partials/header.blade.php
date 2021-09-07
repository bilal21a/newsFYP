<nav class="nv">
    <div class="wrapper">
      <div class="logo logo1"><a href="#">LOGO</a></div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="stylework close-btn"><i class="fas fa-times"></i></label>
        <li><a href="#">Home</a></li>
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
          <a href="#" class="desktop-item">Mega Menu</a>
          <input type="checkbox" id="showMega">
          <label for="showMega" class="mobile-item">Mega Menu</label>
          <div class="mega-box">
            <div class="content">
              <div class="row">
                <img class="imag" src="assets/img.jpg" alt="">
              </div>
                <div class="row">
                <header>Design Services</header>
                <ul class="mega-links">
                  <li><a href="#">Graphics</a></li>
                  <li><a href="#">Vectors</a></li>
                  <li><a href="#">Business cards</a></li>
                  <li><a href="#">Custom logo</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Email Services</header>
                <ul class="mega-links">
                  <li><a href="#">Personal Email</a></li>
                  <li><a href="#">Business Email</a></li>
                  <li><a href="#">Mobile Email</a></li>
                  <li><a href="#">Web Marketing</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Security services</header>
                <ul class="mega-links">
                  <li><a href="#">Site Seal</a></li>
                  <li><a href="#">VPS Hosting</a></li>
                  <li><a href="#">Privacy Seal</a></li>
                  <li><a href="#">Website design</a></li>
                </ul>
              </div>
            </div>
          </div>
        </li>
        <li><a href="#">Feedback</a></li>

<!-- Drop Down User -->
@php
    $user= Auth::user();
    // dd($user);
@endphp
        <div class="showdet dropdown d-inline-block ml-2">
          <button type="button" class="btn btn-work" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                @if ($user->profile_pic==null)
            <img class="rounded" src="{{asset('default.png')}}" alt="Header Avatar" style="width: 18px;">
             @else
            <img class="rounded" src="{{asset('img/profile_image/'. $user->profile_pic)}}" alt="Header Avatar" style="width: 18px;">
             @endif

              <span class="d-none d-sm-inline-block ml-1">Adam</span>
              <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
              <div class="p-3 text-center bg-primary">
                        @if ($user->profile_pic==null)
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('default.png')}}" alt="Header Avatar" >
                        @else
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('img/profile_image/'. $user->profile_pic)}}" alt="Header Avatar" >
                        @endif
                  {{-- <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/media/avatars/avatar10.jpg" alt=""> --}}
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
      <img class="sm-logo-work" src="https://www.pngitem.com/pimgs/m/555-5553390_cnn-icon-clipart-svg-freeuse-stock-cnn-international.png" alt="">
    </a>
    <a href="{{ url('api_source/cnn') }}">CNN
      <img class="sm-logo-work" src="https://www.pngitem.com/pimgs/m/555-5553390_cnn-icon-clipart-svg-freeuse-stock-cnn-international.png" alt="">
    </a>
    <a href="#home">Home
      <img class="sm-logo-work" src="https://www.pngitem.com/pimgs/m/555-5553390_cnn-icon-clipart-svg-freeuse-stock-cnn-international.png" alt="">
    </a>
    <a href="#home">Home
      <img class="sm-logo-work" src="https://www.pngitem.com/pimgs/m/555-5553390_cnn-icon-clipart-svg-freeuse-stock-cnn-international.png" alt="">
    </a>
    <a href="#home">Home
      <img class="sm-logo-work" src="https://www.pngitem.com/pimgs/m/555-5553390_cnn-icon-clipart-svg-freeuse-stock-cnn-international.png" alt="">
    </a>
    <a href="#home">Home
      <img class="sm-logo-work" src="https://www.pngitem.com/pimgs/m/555-5553390_cnn-icon-clipart-svg-freeuse-stock-cnn-international.png" alt="">
    </a>
    <a href="#home">Home
      <img class="sm-logo-work" src="https://www.pngitem.com/pimgs/m/555-5553390_cnn-icon-clipart-svg-freeuse-stock-cnn-international.png" alt="">
    </a>
    <a href="#home">Home
      <img class="sm-logo-work" src="https://www.pngitem.com/pimgs/m/555-5553390_cnn-icon-clipart-svg-freeuse-stock-cnn-international.png" alt="">
    </a>

    <span>
    <input class="search-work" type="text" value="" placeholder="Search">
    <button class="btn-info mr-2 searchbtn-work"><i class="fa fa-search"></i></button>
  </span>
  </div>
