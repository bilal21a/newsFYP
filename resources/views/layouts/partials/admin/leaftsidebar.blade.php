<!-- Sidebar -->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="index.html">
            <i class="fa fa-circle-notch text-primary"></i>
            <span class="smini-hide">
                <span class="font-w700 font-size-h5">ne</span> <span class="font-w400">4.0</span>
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
                <a class="nav-main-link" href="{{ url('admin/users') }}">
                    <i class="nav-main-link-icon si si-user"></i>
                    <span class="nav-main-link-name">User</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{ url('admin/posts') }}">
                    <i class="nav-main-link-icon far fa-newspaper"></i>
                    <span class="nav-main-link-name">Post</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{ url('admin/categories') }}">
                    <i class="nav-main-link-icon si si-list"></i>
                    <span class="nav-main-link-name">Categories</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>
<!-- END Sidebar -->
