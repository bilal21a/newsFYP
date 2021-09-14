@extends('admin.index')

@section('css')

        <link href="{{asset('js/plugins/datatables/dataTables.bootstrap4.css')}} "rel="stylesheet">
        <link href="{{asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}} "rel="stylesheet">
@endsection

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Users <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="">DataTables</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header" >
            <h3 class="block-title"> Users<small></small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 100px;">
                            <i class="far fa-user"></i>
                        </th>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                        <th style="width: 15%;">Registered</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $users)

                    <tr>
                        <td class="text-center">

                            @if ($users->profile_pic)
                            <img class="img-avatar img-avatar48" src="{{ asset ('img/profile_image/'.$users->profile_pic) }}" alt="">
                            @else
                            <img class="img-avatar img-avatar48" src="{{ asset ('media/avatars/avatar7.jpg') }}" alt="">
                            @endif

                        </td>
                        <td class="font-w600 font-size-sm">
                            <a href="be_pages_generic_blank.html">{{ $users->name }}</a>
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                           {{ $users->email }}
                        </td>
                        <td class="d-none d-sm-table-cell">
                        @php
                            $my_role=$users->getRoleNames();
                        @endphp
                            @if (isset($my_role[0]))
                            <span class="badge badge-info">{{ $my_role[0] }}</span>
                            @else
                            <span class="badge badge-danger">Guest</span>
                            @endif
                        </td>
                        <?php
                            $var_1= $users->created_at;
                            $var_2 = strtotime($var_1);
                            $date = date('F d, Y', $var_2);
                        ?>
                        <td>
                            <em class="text-muted font-size-sm">{{ $date }}</em>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#edit-modal{{ $users->id }}">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#delete-modal{{ $users->id }}" >
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                       <!-- Edit Modal -->
    <div class="modal fade" id="edit-modal{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.edit_users') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary">
                            <h3 class="block-title">
                                <i class="fa fa-pencil-alt mr-1"></i> Edit User
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="form-group">
                                <label for="message-email">Name</label>
                                <input class="form-control" type="text" id="message-email" value="{{ $users->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="message-email">Email</label>
                                <input class="form-control" type="email" id="message-email" name="email" value="{{ $users->email }}">
                                <input class="form-control" type="hidden" id="message-id" name="id" value="{{ $users->id }}">
                            </div>
                            <div class="form-group">
                                <label>Select Role</label>
                                <select class="custom-select" id="example-select-custom" name="role">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-link mr-2" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fa fa-pencil-alt mr-1"></i> Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Edit Modal -->
    <!-- Delete Modal -->
    <div class="modal fade" id="delete-modal{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.delete_users') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary">
                            <h3 class="block-title">
                                <i class="fa fa-trash mr-1"></i> Delete User
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <p>Do you want to delete...</p>
                        </div>
                        <input class="form-control" type="hidden" id="message-id" name="id" value="{{ $users->id }}">

                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-link mr-2" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fa fa-trash mr-1"></i> Delete
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Delte Modal -->

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
    <!-- END Dynamic Table Full -->



@endsection

@section('js')

        <script src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
        <script src="{{asset('js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
        <script src="{{asset('js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
        <script src="{{asset('js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>
        <script src="{{asset('js/pages/be_tables_datatables.min.js')}}"></script>


@endsection
