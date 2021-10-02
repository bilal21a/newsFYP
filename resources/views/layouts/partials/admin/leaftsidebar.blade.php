<!-- Sidebar -->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <!-- Logo -->
        @php
            $logo = App\Setting::first();
        @endphp
        <a class="font-w600 text-dual" href="index.html">
            <i class="fa fa-circle-notch text-primary"></i>
            <span class="smini-hide">
                <img src="{{ $logo->admin_logo }}" alt="">
                {{-- <span class="font-w700 font-size-h5">{{ $logo->admin_logo }}</span> <span class="font-w400"></span> --}}
            </span>
        </a>
        <!-- END Logo -->
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link active" href="{{ url('admin/home') }}">
                    <i class="nav-main-link-icon si si-speedometer"></i>
                    <span class="nav-main-link-name">Dashboard</span>
                </a>
            </li>
            <li class="nav-main-heading"><hr></li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false">
                    <i class="nav-main-link-icon fa fa-user"></i>
                    <span class="nav-main-link-name">User</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ url('admin/users') }}">
                            <i class="nav-main-link-icon fa fa-users"></i>
                            <span class="nav-main-link-name">All Users</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ url('admin/user_approval') }}">
                            <i class="nav-main-link-icon fa fa-users-cog"></i>
                            <span class="nav-main-link-name">User Approval</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-newspaper"></i>
                    <span class="nav-main-link-name">Posts</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ url('admin/posts') }}">
                            <i class="nav-main-link-icon fa fa-newspaper"></i>
                            <span class="nav-main-link-name">All Posts</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ url('admin/post_approval') }}">
                            <i class="nav-main-link-icon fa fa-file-alt"></i>
                            <span class="nav-main-link-name">Post Request</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-main-item">
                <a class="nav-main-link" href="{{ url('admin/categories') }}">
                    <i class="nav-main-link-icon fa fa-list-ul"></i>
                    <span class="nav-main-link-name">Categories</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{ url('admin/rolespermission') }}">
                    <i class="nav-main-link-icon fa fa-tasks"></i>
                    <span class="nav-main-link-name">Roles & Permissions</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{ url('admin/permission') }}">
                    <i class="nav-main-link-icon fa fa-tasks"></i>
                    <span class="nav-main-link-name">Permissions</span>
                </a>
            </li>


            <li class="nav-main-item">
                <a class="nav-main-link" href="{{ url('admin/notification') }}">
                    <i class="nav-main-link-icon fa fa-bell"></i>
                    <span class="nav-main-link-name">Notifications</span>
                </a>
            </li>


        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                <i class="nav-main-link-icon si si-settings"></i>
                <span class="nav-main-link-name">Setting</span>
            </a>
            <ul class="nav-main-submenu">
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ url('admin/general_setting') }}">
                        <span class="nav-main-link-name">General Setting</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ url('admin/nav_setting') }}">
                        <span class="nav-main-link-name">Nav Bar Setting</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ url('admin/mini_header_setting') }}">
                        <span class="nav-main-link-name">MiniHeader Setting</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    </div>
    <!-- END Side Navigation -->
</nav>
<!-- END Sidebar -->
