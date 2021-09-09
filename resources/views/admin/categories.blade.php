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
                Categories <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#add-modal">
                        <i class="fa fa-fw fa-plus"></i>
                    </button>
                </div></small>
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
        <div class="block-header">
            {{-- <h3 class="block-title">Dynamic Table <small>Full</small></h3> --}}
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Status</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">API Name</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $cat)

                    <tr>
                        <td class="font-w600 font-size-sm">
                            <a href="">{{ $cat->name }}</a>
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">

                            @if ($cat->status==1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif

                        </td>
                        <td class="d-none d-sm-table-cell">

                            @if ($cat->api_name==null)
                                <i class="si si-ban "></i>
                            @else
                                {{-- <span class="badge badge-success">{{ $cat->api_name }}</span> --}}
                                {{ $cat->api_name }}
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#edit-modal{{ $cat->id }}">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#delete-modal{{ $cat->id }}" >
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
     <!-- Edit Modal -->
    <div class="modal fade" id="edit-modal{{ $cat->id }}" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.edit_cat') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary">
                            <h3 class="block-title">
                                <i class="fa fa-pencil-alt mr-1"></i> Edit Category
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
                                <input class="form-control" type="text" id="message-email" value="{{ $cat->name }}" name="name" >
                                <input class="form-control" type="hidden" id="message-id" name="id" value="{{ $cat->id }}">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="custom-select" id="example-select-custom" name="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Api Name</label>
                                <select class="custom-select" id="example-select-custom" name="api_name">
                                    <option value="business">BUSSINESS</option>
                                    <option value="sports">SPORTS</option>
                                    <option value="entertainment">ENTERTAINMENT</option>
                                    <option value="health">HEALTH</option>
                                    <option value="science">SCI</option>
                                    <option value="general">GENERAL</option>
                                    <option value="technology">TECHNOLOGY</option>
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
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.delete_users') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary">
                            <h3 class="block-title">
                                <i class="fa fa-trash mr-1"></i> Delete Category
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
                        <input class="form-control" type="hidden" id="message-id" name="id" value="">

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
    <!-- END Dynamic Table Full -->

     <!-- add Modal -->
     <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.add_cat') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-success">
                            <h3 class="block-title">
                                <i class="fa fa-plus mr-1"></i> Add Category
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
                                <input class="form-control" type="text" id="message-email" value="" name="name" placeholder="Category Names">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="custom-select" id="example-select-custom" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Api Name</label>
                                <select class="custom-select" id="example-select-custom" name="api_name">
                                    <option value="0" selected>None of These</option>
                                    <option value="business">BUSSINESS</option>
                                    <option value="sports">SPORTS</option>
                                    <option value="entertainment">ENTERTAINMENT</option>
                                    <option value="health">HEALTH</option>
                                    <option value="science">SCI</option>
                                    <option value="general">GENERAL</option>
                                    <option value="technology">TECHNOLOGY</option>
                                </select>
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
