 <!-- Header -->
 <header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Toggle Mini Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>
            <!-- END Toggle Mini Sidebar -->

            <!-- Apps Modal -->
            <!-- Opens the Apps modal found at the bottom of the page, after footer’s markup -->
            <button type="button" class="btn btn-sm btn-dual mr-2" data-toggle="modal" data-target="#one-modal-apps">
                <i class="si si-grid"></i>
            </button>
            <!-- END Apps Modal -->

            <!-- Open Search Section (visible on smaller screens) -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-dual d-sm-none" data-toggle="layout" data-action="header_search_on">
                <i class="si si-magnifier"></i>
            </button>
            <!-- END Open Search Section -->

            <!-- Search Form (visible on larger screens) -->
            <form class="d-none d-sm-inline-block" action="be_pages_generic_search.html" method="POST">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control form-control-alt" placeholder="Search.." id="page-header-search-input2" name="page-header-search-input2">
                    <div class="input-group-append">
                        <span class="input-group-text bg-body border-0">
                            <i class="si si-magnifier"></i>
                        </span>
                    </div>
                </div>
            </form>
            <!-- END Search Form -->
        </div>
        <!-- END Left Section -->
        @php
            $find=App\Admin::first();
            // dd($find);
        @endphp
        <!-- Right Section -->
        <div class="d-flex align-items-center">
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if ($find->profile_pic==null)
                        <img class="rounded" src="{{asset('adminDefault.jpg')}}" alt="Header Avatar" style="width: 18px;">
                        @else
                        <img class="rounded" src="{{asset('img/profile_image/'.$find->profile_pic)}}" alt="Header Avatar" style="width: 18px;">
                        @endif
                    {{-- <img class="rounded" src="{{asset('adminDefault.jpg')}}" alt="Header Avatar" style="width: 18px;"> --}}
                    <span class="d-none d-sm-inline-block ml-1">{{ $find->name }}</span>
                    <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                    <div class="p-3 text-center bg-primary">
                        @if ($find->profile_pic==null)
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('adminDefault.jpg')}}" >
                        @else
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('img/profile_image/'.$find->profile_pic)}}" >
                        @endif
                        {{-- <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('adminDefault.jpg')}}" alt=""> --}}
                    </div>
                    <div class="p-2">
                        <h5 class="dropdown-header text-uppercase">User Options</h5>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
                            <span>Inbox</span>
                            <span>
                                <span class="badge badge-pill badge-primary">3</span>
                                <i class="si si-envelope-open ml-1"></i>
                            </span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_profile.html">
                            <span>Profile</span>
                            <span>
                                <span class="badge badge-pill badge-success">1</span>
                                <i class="si si-user ml-1"></i>
                            </span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                            <span>Settings</span>
                            <i class="si si-settings"></i>
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <h5 class="dropdown-header text-uppercase">Actions</h5>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="op_auth_lock.html">
                            <span>Lock Account</span>
                            <i class="si si-lock ml-1"></i>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="">
                            <span>Log Out</span>
                            <i class="si si-logout ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END User Dropdown -->

            @php
        $posts = Illuminate\Support\Facades\DB::table('posts as p')
        ->where('p.notify', 1)
        ->join('users as user', 'p.created_by', '=', 'user.id')
        ->select('p.title','p.notify','p.created_at','p.id as post_id','user.profile_pic','user.id as user_id','user.name')
        ->where('p.status', 1)
        ->latest()->take(3)->get();

        $comments = Illuminate\Support\Facades\DB::table('comments as c')
        ->where('c.notify', 1)
        ->join('users as user', 'c.user_id', '=', 'user.id')
        ->join('posts as p', 'c.commentable_id', '=', 'p.id')
        ->select('c.id','c.user_id','c.comment','c.created_at','c.commentable_id','c.notify','user.name','user.profile_pic','p.title as post_title')
        ->latest()->take(3)->get();


        $users = Illuminate\Support\Facades\DB::table('users as u')
        ->where('u.notify', 1)->latest()->take(3)->get();
        // dd($posts);

        $count = count($posts) + count($comments) + count($users);
        // dd($count);
            @endphp
            <!-- Notifications Dropdown -->
            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="si si-bell"></i>
                    <span class="badge badge-success badge-pill">{{ $count }}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-2 bg-primary text-center">
                        <h5 class="dropdown-header text-uppercase text-white">Notifications</h5>
                    </div>
                    <ul class="nav-items mb-0">
                        @foreach ($posts as $post)

                        <li>
                            <a class="text-dark media py-2" href="javascript:void(0)">
                                <div class="mr-2 ml-3">
                                    <i class="far fa-list-alt text-success"></i>
                                </div>
                                <div class="media-body pr-2">
                                    <div class="font-w600">{{ $post->name }} Posted a New Post</div>
                                    <small class="text-muted">{{ date('F d, Y', strtotime($post->created_at)) }}</small>
                                </div>
                            </a>
                        </li>
                        @endforeach

                        @foreach ($comments as $comment)

                        <li>
                            <a class="text-dark media py-2" href="javascript:void(0)">
                                <div class="mr-2 ml-3">
                                    <i class="far fa-comments text-success"></i>
                                </div>
                                <div class="media-body pr-2">
                                    <div class="font-w600">{{ $comment->name }} Commented on the Post</div>
                                    <small class="text-muted">22 min ago</small>
                                </div>
                            </a>
                        </li>
                        @endforeach

                        @foreach ($users as $user)
                        <li>
                            <a class="text-dark media py-2" href="javascript:void(0)">
                                <div class="mr-2 ml-3">
                                    <i class="fa fa-fw fa-user-plus text-success"></i>
                                </div>
                                <div class="media-body pr-2">
                                    <div class="font-w600">{{ $user->name }} joined World News</div>
                                    <small class="text-muted">{{ date('F d, Y', strtotime($user->created_at)) }}</small>
                                </div>
                            </a>
                        </li>
                        @endforeach

                    </ul>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-light btn-block text-center" href="{{ route('admin.notification') }}">
                            <i class="fa fa-fw fa-arrow-down mr-1"></i> Load More..
                        </a>
                    </div>
                </div>
            </div>
            <!-- END Notifications Dropdown -->

            <!-- Toggle Side Overlay -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-dual ml-2" data-toggle="layout" data-action="side_overlay_toggle">
                <i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
            </button>
            <!-- END Toggle Side Overlay -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header bg-white">
        <div class="content-header">
            <form class="w-100" action="be_pages_generic_search.html" method="POST">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-danger" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                </div>
            </form>
        </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-white">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-circle-notch fa-spin"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
<!-- END Header -->
