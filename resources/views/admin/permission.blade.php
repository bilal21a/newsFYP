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
                Permissions
            </h1>
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#add-modal">
                    <i class="fa fa-fw fa-plus"></i>
                </button>
            </div>
            {{-- <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href=""> Permissions
                        </a>
                    </li>
                </ol>
            </nav> --}}
        </div>

    </div>
</div>
<!-- END Hero -->
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header">
            {{-- <h3 class="block-title">Permissions</h3> --}}

        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 10%;">#</th>
                        <th style="width: 40%;"> Permissions</th>
                        <th class="d-none d-sm-table-cell" style="width: 40%;">Description</th>
                        {{-- <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th> --}}
                        <th style="width: 10%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permission as $permissions)

                    <tr>
                        <td class="text-center font-size-sm">{{ $permissions->id }}</td>
                        <td class="font-w600 font-size-sm">
                            {{ $permissions->name }}
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            <p>{{ $permissions->description }}</p>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#edit-modal{{ $permissions->id }}">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#delete-modal{{ $permissions->id }}" >
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                            {{-- <span class="badge badge-info">Business</span> --}}
                        </td>
                    </tr>
                    <!-- Edit Modal -->
    <div class="modal fade" id="edit-modal{{ $permissions->id }}" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.edit_perm') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-success">
                            <h3 class="block-title">
                                <i class="fa fa-pencil-alt mr-1"></i> Edit Permission
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
                                <input class="form-control" type="text" id="message-email" name="name" value="{{ $permissions->name }}">
                                <input class="form-control" type="hidden" id="message-id" name="id" value="{{ $permissions->id }}">

                            </div>
                            <div class="form-group">
                                <label for="short_disc">Short Description</label>
                                <textarea class="form-control" id="short_disc" rows="4" name="short_disc" placeholder="Short Description" >{{ $permissions->description }}</textarea>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-outline-success mr-2" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-success">
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
    <div class="modal fade" id="delete-modal{{ $permissions->id }}" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.delete_perm') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-danger">
                            <h3 class="block-title">
                                <i class="fa fa-trash mr-1"></i> Delete Permmission
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
                        <input class="form-control" type="hidden" id="message-id" name="id" value="{{ $permissions->id }}">

                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-outline-danger mr-2" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-danger">
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
       <!-- add Modal -->
       <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.add_perm') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-success">
                            <h3 class="block-title">
                                <i class="fa fa-plus mr-1"></i> Add Permission
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
                                <input class="form-control" type="text" id="message-email" value="" name="name" placeholder="Permission Name">
                            </div>
                            <div class="form-group">
                                <label for="short_disc">Short Description</label>
                                <textarea class="form-control" id="short_disc" rows="4" name="short_disc" placeholder="Short Description" ></textarea>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-outline-success mr-2" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fa fa-plus mr-1"></i> Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END add Modal -->
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
