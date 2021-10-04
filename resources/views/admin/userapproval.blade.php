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
            {{-- <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="">Pending Posts</a>
                    </li>
                </ol>
            </nav> --}}
        </div>
    </div>
</div>
<!-- END Hero -->
 <!-- Latest Users -->
 <div class="container">
 <div class="col-lg-12">
    <div class="block block-mode-loading-oneui">
        <div class="block-header border-bottom">
            {{-- <h3 class="block-title">Users Approval</h3> --}}
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
                        <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 10%;">Photo</th>
                        <th class="font-w700" style="width: 30%;">Name</th>
                        <th class="font-w700" style="width: 20%;">Status</th>
                        <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 20;">Role</th>
                        <th class="font-w700 text-center" style="width: 20%;">Action</th>
                    </tr>
                </thead>
                <tbody>
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
                                <button type="submit" class="btn btn-sm btn-success"  data-toggle="modal" data-target="" title="Accept" name="accept">
                                    <i class="fa fa-fw fa-check"></i>
                                </button>
                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="" title="Reject" name="reject">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>

                        </td>
                    </tr>
                    @endforeach
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

