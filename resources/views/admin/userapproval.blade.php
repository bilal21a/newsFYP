@extends('admin.index')
@section('css')
@endsection
@section('content')
<!-- Hero -->
<div class="bg-body-light">
   <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
         <h1 class="flex-sm-fill h3 my-2">
            Pending Users
         </h1>
      </div>
   </div>
</div>
<!-- END Hero -->
<!-- Latest Users -->
<div class="container">
   <div class="col-lg-12">
      <div class="block block-mode-loading-oneui">
         <div class="block-header border-bottom">
            {{--
            <h3 class="block-title">Users Approval</h3>
            --}}
         </div>
      </div>
      <div class="block-content block-content-full">
         <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
            <thead class="thead-dark">
               <tr class="text-uppercase">
                  {{-- width 80px --}}
                  <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 10%;">Photo</th>
                  <th class="font-w700" style="width: 30%;">Name</th>
                  <th class="font-w700" style="width: 20%;">Status</th>
                  <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 20;">Role</th>
                  <th class="font-w700 text-center" style="width: 20%;">Action</th>
               </tr>
            </thead>
            <tbody>
               @if (!$user->isEmpty())
               @foreach ($user as $users)
               <tr>
                  <td class="d-none d-sm-table-cell text-center">
                     @if ($users->profile_pic)
                     <img class="img-avatar img-avatar48" src="{{ asset ('img/profile_image/'.$users->profile_pic) }}" alt="">
                     @else
                     <img class="img-avatar img-avatar48" src="{{ asset ('media/avatars/avatar7.jpg') }}" alt="">
                     @endif
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
                        {{-- <a href="{{ url('admin/user_accept/'.$users->id) }}">
                        <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-fw fa-check"></i>
                        </button>
                        </a>
                        <a href="{{ url('admin/user_reject/'.$users->id) }}">
                        <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fa fa-fw fa-times"></i>
                        </button>
                        </a> --}}
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
      </div>
   </div>
</div>
</div>
<!-- END Latest USers -->
@endsection
@section('js')
@endsection
@section('internal_css')
<style>
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
