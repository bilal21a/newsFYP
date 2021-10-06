@extends('admin.index')
@section('css')
@endsection
@section('content')
<!-- Hero -->
<div class="bg-image overflow-hidden" style="background-image: url('assets/media/photos/photo3@2x.jpg');">
   <div class="bg-primary-dark-op">
      <div class="content content-narrow content-full">
         <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
            <div class="flex-sm-fill">
               <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Dashboard</h1>
               <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Welcome Administrator</h2>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- END Hero -->
<!-- Page Content -->
<div class="content content-narrow">
<!-- Stats -->
<div class="row">
   <div class="col-6 col-md-3 col-lg-6 col-xl-3">
      <a class="block block-rounded block-link-pop border-left border-success border-4x" href="javascript:void(0)">
         <div class="block-content block-content-full">
            <div class="font-size-sm font-w600 text-uppercase text-muted">Active Users</div>
            <div class="font-size-h2 font-w400 text-dark">{{ $user }}</div>
         </div>
      </a>
   </div>
   <div class="col-6 col-md-3 col-lg-6 col-xl-3">
      <a class="block block-rounded block-link-pop border-left border-success border-4x" href="javascript:void(0)">
         <div class="block-content block-content-full">
            <div class="font-size-sm font-w600 text-uppercase text-muted">Active Categories</div>
            <div class="font-size-h2 font-w400 text-dark">{{ $categories }}</div>
         </div>
      </a>
   </div>
   <div class="col-6 col-md-3 col-lg-6 col-xl-3">
      <a class="block block-rounded block-link-pop border-left border-success border-4x" href="javascript:void(0)">
         <div class="block-content block-content-full">
            <div class="font-size-sm font-w600 text-uppercase text-muted">Total News</div>
            <div class="font-size-h2 font-w400 text-dark">{{ $total_news }}</div>
         </div>
      </a>
   </div>
   <div class="col-6 col-md-3 col-lg-6 col-xl-3">
      <a class="block block-rounded block-link-pop border-left border-success border-4x" href="javascript:void(0)">
         <div class="block-content block-content-full">
            <div class="font-size-sm font-w600 text-uppercase text-muted">Today News</div>
            <div class="font-size-h2 font-w400 text-dark">{{ $today_news }}</div>
         </div>
      </a>
   </div>
</div>
<!-- END Stats -->
<!-- Customers and Latest Orders -->
<div class="row row-deck">
   <!-- Latest Users -->
   <div class="col-lg-6">
      <div class="block block-mode-loading-oneui">
         <div class="block-header border-bottom">
            <h3 class="block-title">Quick Users Approval</h3>
            <div class="block-options">
               <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
               <i class="si si-refresh"></i>
               </button>
            </div>
         </div>
         <div class="block-content block-content-full">
            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
               <thead class="thead-dark">
                  <tr class="text-uppercase">
                     {{-- width 80px --}}
                     <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 100px;">Photo</th>
                     <th class="font-w700">Name</th>
                     <th class="font-w700">Status</th>
                     <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 80px;">Role</th>
                     <th class="font-w700 text-center" style="width: 60px;">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @if (!$user_all->isEmpty())
                  @foreach ($user_all as $users)
                  <tr>
                     <td class="d-none d-sm-table-cell text-center">
                        @if ($users->profile_pic)
                        <img class="img-avatar img-avatar48" src="{{ asset ('img/profile_image/'.$users->profile_pic) }}" alt="">
                        @else
                        <img class="img-avatar img-avatar48" src="{{ asset ('media/avatars/avatar7.jpg') }}" alt="">
                        @endif
                        {{-- <img class="img-avatar img-avatar32" src="{{ asset('default.png') }}" alt=""> --}}
                     </td>
                     <td class="font-w600">
                        {{ $users->name }}
                     </td>
                     <td>
                        <span class="font-w600 text-warning">Pending..</span>
                     </td>
                     <td class="d-none d-sm-table-cell text-center">
                        @php
                        $my_role=$users->getRoleNames();
                        @endphp
                        @if (isset($my_role[0]))
                        <a class="link-fx font-w600 badge badge-info" href="javascript:void(0)">{{  $my_role[0]  }}</a>
                        @else
                        <a class="link-fx font-w600 badge badge-danger" href="javascript:void(0)">Guest</a>
                        @endif
                     </td>
                     <td class="text-center">
                        <div class="btn-group">
                           <button type="button" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#accept-modal{{ $users->id }}">
                           <i class="fa fa-fw fa-check"></i>
                           </button>
                           <button type="button" class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#reject-modal{{ $users->id }}">
                           <i class="fa fa-fw fa-times"></i>
                           </button>
                           {{-- <button type="submit" class="btn btn-sm btn-success"  data-toggle="modal" data-target="" title="Accept" name="accept">
                           <i class="fa fa-fw fa-check"></i>
                           </button>
                           <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="" title="Reject" name="reject">
                           <i class="fa fa-fw fa-times"></i>
                           </button> --}}
                        </div>
                     </td>
                  </tr>
                  <!-- Accept Modal -->
                  <div class="modal fade" id="accept-modal{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-top" role="document">
                        <div class="modal-content">
                           {{--
                           <form action="{{ route('admin.delete_posts') }}" method="POST" enctype="multipart/form-data">
                              --}}
                              {{-- @csrf --}}
                              <div class="block block-themed block-transparent mb-0">
                                 <div class="block-header bg-success">
                                    <h3 class="block-title">
                                       <i class="fa fa-fw fa-check mr-1"></i> Accept User
                                    </h3>
                                    {{-- @php
                                    dd($post->id);
                                    @endphp --}}
                                    <input type="hidden" class="form-control" id="example-text-input" name="id" placeholder="" value="{{ $users->id }}">
                                    <div class="block-options">
                                       <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                       <i class="fa fa-fw fa-times"></i>
                                       </button>
                                    </div>
                                 </div>
                                 <div class="block-content">
                                    <p>Do you want to accept...</p>
                                 </div>
                                 <input class="form-control" type="hidden" id="message-id" name="id" value="">
                                 <div class="block-content block-content-full text-right border-top">
                                    <button type="button" class="btn btn-sm btn-outline-success mr-2" data-dismiss="modal">Cancel</button>
                                    <a href="{{ url('admin/user_accept/'.$users->id) }}"><button type="button" class="btn btn-sm btn-success"><i class="fa fa-fw fa-check mr-1"></i> Accept</button></a>
                                 </div>
                              </div>
                              {{--
                           </form>
                           --}}
                        </div>
                     </div>
                  </div>
                  <!-- END Accept Modal -->
                  <!-- Reject Modal -->
                  <div class="modal fade" id="reject-modal{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-top" role="document">
                        <div class="modal-content">
                           {{--
                           <form action="{{ route('admin.delete_posts') }}" method="POST" enctype="multipart/form-data">
                              --}}
                              {{-- @csrf --}}
                              <div class="block block-themed block-transparent mb-0">
                                 <div class="block-header bg-danger">
                                    <h3 class="block-title">
                                       <i class="fa fa-fw fa-times mr-1"></i> Reject User
                                    </h3>
                                    {{-- @php
                                    dd($post->id);
                                    @endphp --}}
                                    <input type="hidden" class="form-control" id="example-text-input" name="id" placeholder="" value="{{ $users->id }}">
                                    <div class="block-options">
                                       <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                       <i class="fa fa-fw fa-times"></i>
                                       </button>
                                    </div>
                                 </div>
                                 <div class="block-content">
                                    <p>Do you want to reject...</p>
                                 </div>
                                 <input class="form-control" type="hidden" id="message-id" name="id" value="">
                                 <div class="block-content block-content-full text-right border-top">
                                    <button type="button" class="btn btn-sm btn-outline-danger mr-2" data-dismiss="modal">Cancel</button>
                                    <a href="{{ url('admin/user_reject/'.$users->id)  }}"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-check mr-1"></i> Reject</button></a>
                                 </div>
                              </div>
                              {{--
                           </form>
                           --}}
                        </div>
                     </div>
                  </div>
                  <!-- END Reject Modal -->
                  @endforeach
                  @else
                  <tr>
                     <td colspan="5">
                        <center>
                           <h5>No New User Found for Approval</h5>
                        </center>
                     </td>
                  </tr>
                  @endif
               </tbody>
            </table>
            @if(count($user_all) > 6)
            <div class="p-2 border-top">
               <a class="btn btn-sm btn-light btn-block text-center" href="{{ route('admin.user_approval') }}">
               <i class="fa fa-fw fa-arrow-down mr-1"></i> Load More..
               </a>
            </div>
            @endif
         </div>
      </div>
   </div>
   <!-- END Latest USers -->
   <!-- Latest Posts -->
   <div class="col-lg-6">
      <div class="block block-mode-loading-oneui">
         <div class="block-header border-bottom">
            <h3 class="block-title">Quick Posts Approval</h3>
            <div class="block-options">
               <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
               <i class="si si-refresh"></i>
               </button>
            </div>
         </div>
         <div class="block-content block-content-full">
            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
               <thead class="thead-dark">
                  <tr class="text-uppercase">
                     <th class="d-none d-sm-table-cell font-w700 text-left" >Title</th>
                     <th class="font-w700">Author</th>
                     <th class="d-none d-sm-table-cell font-w700">Date</th>
                     <th class="font-w700 text-center" style="width: 60px;">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @if (!$post_all->isEmpty())
                  @foreach ($post_all as $post)
                  <tr>
                     <td class="d-none d-sm-table-cell text- ">
                        <div class="mt-2 font-w600 three_dots s-ttl"  data-toggle="popover" data-html="true" data-placement="top" data-content="<div class='text-center'>
                           <p>{{ $post->title }} ​</p></div">
                           {{ $post->title }}
                        </div>
                     </td>
                     <td>
                        <span class="font-w600">{{ App\User::find($post->created_by)['name'] }}</span>
                     </td>
                     <td class="d-none d-sm-table-cell">
                        <span class="font-size-sm text-muted">today</span>
                     </td>
                     <td class="text-center">
                        <div class="btn-group">
                           <button type="button" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#accept-modal{{ $post->id }}">
                           <i class="fa fa-fw fa-check"></i>
                           </button>
                           <button type="button" class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#reject-modal{{ $post->id }}">
                           <i class="fa fa-fw fa-times"></i>
                           </button>
                     </td>
                  </tr>
                  <!-- Accept Modal -->
                  <div class="modal fade" id="accept-modal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-top" role="document">
                  <div class="modal-content">
                  {{-- <form action="{{ route('admin.delete_posts') }}" method="POST" enctype="multipart/form-data"> --}}
                  {{-- @csrf --}}
                  <div class="block block-themed block-transparent mb-0">
                  <div class="block-header bg-success">
                  <h3 class="block-title">
                  <i class="fa fa-fw fa-check mr-1"></i> Accept Post
                  </h3>
                  {{-- @php
                  dd($post->id);
                  @endphp --}}
                  <input type="hidden" class="form-control" id="example-text-input" name="id" placeholder="" value="{{ $post->id }}">
                  <div class="block-options">
                  <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                  <i class="fa fa-fw fa-times"></i>
                  </button>
                  </div>
                  </div>
                  <div class="block-content">
                  <p>Do you want to accept...</p>
                  </div>
                  <input class="form-control" type="hidden" id="message-id" name="id" value="">
                  <div class="block-content block-content-full text-right border-top">
                  <button type="button" class="btn btn-sm btn-outline-success mr-2" data-dismiss="modal">Cancel</button>
                  <a href="{{ url('admin/post_accept/'.$post->id) }}"><button type="button" class="btn btn-sm btn-success"><i class="fa fa-fw fa-check mr-1"></i> Accept</button></a>
                  </div>
                  </div>
                  {{-- </form> --}}
                  </div>
                  </div>
                  </div>
                  <!-- END Accept Modal -->
                  <!-- Reject Modal -->
                  <div class="modal fade" id="reject-modal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-top" role="document">
                  <div class="modal-content">
                  {{-- <form action="{{ route('admin.delete_posts') }}" method="POST" enctype="multipart/form-data"> --}}
                  {{-- @csrf --}}
                  <div class="block block-themed block-transparent mb-0">
                  <div class="block-header bg-danger">
                  <h3 class="block-title">
                  <i class="fa fa-fw fa-times mr-1"></i> Reject Post
                  </h3>
                  {{-- @php
                  dd($post->id);
                  @endphp --}}
                  <input type="hidden" class="form-control" id="example-text-input" name="id" placeholder="" value="{{ $post->id }}">
                  <div class="block-options">
                  <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                  <i class="fa fa-fw fa-times"></i>
                  </button>
                  </div>
                  </div>
                  <div class="block-content">
                  <p>Do you want to reject...</p>
                  </div>
                  <input class="form-control" type="hidden" id="message-id" name="id" value="">
                  <div class="block-content block-content-full text-right border-top">
                  <button type="button" class="btn btn-sm btn-outline-danger mr-2" data-dismiss="modal">Cancel</button>
                  <a href="{{ url('admin/post_reject/'.$post->id)  }}"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-times mr-1"></i> Reject</button></a>
                  </div>
                  </div>
                  {{-- </form> --}}
                  </div>
                  </div>
                  </div>
                  <!-- END Reject Modal -->
                  @endforeach
                  @else
                  <tr>
                  <td colspan="4">
                  <center><h5>No New Post Found for Approval</h5></center>
                  </td>
                  </tr>
                  @endif
               </tbody>
            </table>
            @if(count($post_all) > 6)
            <div class="p-2 border-top">
            <a class="btn btn-sm btn-light btn-block text-center" href="{{ route('admin.post_approval') }}">
            <i class="fa fa-fw fa-arrow-down mr-1"></i> Load More..
            </a>
            </div>
            @endif
            </div>
         </div>
      </div>
      <!-- END Latest Posts -->
   </div>
   <!-- END Customers and Latest Orders -->
</div>
<!-- END Page Content -->
@endsection
@section('js')
@endsection
@section('internal_css')
<style>
   .srch {
   border: none;
   background-color: transparent;
   outline: none;
   }
   .srch:focus {
   border: none;
   }
   .three_dots {
   overflow: hidden;
   width:150px;
   display: -webkit-box;
   -webkit-line-clamp: 3;
   -webkit-box-orient: vertical;
   }
   .three_dots2 {
   overflow: hidden;
   width: 214px;
   display: contents;
   -webkit-line-clamp: 3;
   -webkit-box-orient: vertical;
   }
</style>
@endsection
