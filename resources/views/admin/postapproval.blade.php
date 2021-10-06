@extends('admin.index')
@section('css')
@endsection
@section('content')
<!-- Hero -->
<div class="bg-body-light">
   <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
         <h1 class="flex-sm-fill h3 my-2">
            Pending Posts
         </h1>
      </div>
   </div>
</div>
<!-- END Hero -->
<!-- Latest Posts -->
<div class="content">
<div class="col-lg-12">
   <div class="block block-mode-loading-oneui">
      <div class="block-header border-bottom">
      </div>
      <div class="block-content block-content-full">
         <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
            <thead class="thead-dark">
               <tr class="text-uppercase">
                  <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 50%;">Title</th>
                  <th class="font-w700" style="width: 20%;">Author</th>
                  <th class="d-none d-sm-table-cell font-w700" style="width: 10%;">Date</th>
                  <th class="font-w700 text-center" style="width: 20%;">Action</th>
               </tr>
            </thead>
            <tbody>
               @if (!$posts->isEmpty())
               @foreach ($posts as $post)
               <tr>
                  <td class="d-none d-sm-table-cell text- ">
                     <p> {{ $post->title }}</p>
                  </td>
                  <td>
                     <span class="font-w600">{{ App\User::find($post->created_by)->name }}</span>
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
                        {{-- <a href="{{ url('admin/post_accept/'.$post->id) }}">
                        <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-fw fa-check"></i>
                        </button>
                        </a>
                        <a href="{{ url('admin/post_reject/'.$post->id) }}">
                        <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fa fa-fw fa-times"></i>
                        </button>
                        </a> --}}
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
         </div>
      </div>
   </div>
</div>
<!-- END Latest Posts -->
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
