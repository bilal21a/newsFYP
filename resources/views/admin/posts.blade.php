@extends('admin.index')

@section('css')

        <link href="{{asset('js/plugins/datatables/dataTables.bootstrap4.css')}} "rel="stylesheet">
        <link href="{{asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}} "rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection

@section('content')

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                DataTables <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Tables transformed with dynamic features.</small>
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
            <h3 class="block-title">Dynamic Table <small>Full</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 100px;">
                            <i class="far fa-image fa-2x"></i>
                        </th>
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Title</th>
                        <th style="width: 15%;">Source</th>
                        <th style="width: 15%;">Status</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Published At</th>
                        <th class="text-center" style="width: 100px;">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">

                            @if (5>9)
                            <img class="img-avatar img-avatar48" src="{{ asset ('img/profile_image/') }}" alt="">
                            @else
                            <img class="img-avatar img-avatar48" src="{{ asset ('media/avatars/avatar7.jpg') }}" alt="">
                            @endif

                        </td>
                        <td class="font-w600 font-size-sm">
                            <a href="">Megan Fuller</a>
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            <a href="">Megan Fuller</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-info">Business</span>
                        </td>
                        <td>
                            <em class="text-muted font-size-sm">2 days ago</em>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#view-modal">
                                    <i class="fa fa-fw fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#edit-modal">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#delete-modal" >
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </td>
     <!-- View Modal -->
    <div class="modal fade" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.edit_users') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary">
                            <h3 class="block-title">
                                <i class="fa fa-eye mr-1"></i> View Post
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="block-content font-size-sm container">
                                <div class="form-group">
                                    <label for="example-text-input">Title</label>
                                    <p>Enter Title here</p>
                                </div>
                                <div class="form-group">

                            <img src="https://i.pinimg.com/originals/73/2e/cf/732ecf284eacc02133c69774b7be7dde.jpg" alt="" style="width: 100%;">

                                <span>
                                    <a href="" class="text-dark pr-4"><i class="fa fa-user"> Reporter Name</i></a>
                                    <a href="" class="text-dark pr-4"><i class="fa fa-clock"> 14-08-2021</i></a>
                                </span>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input">Category</label>
                                    <p>shown Cat here</p>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input">Short Description</label>
                                    <p>shown Short description here</p>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input">Description</label>
                                    <p>shown description here</p>
                                </div>




                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END View Modal -->
     <!-- Edit Modal -->
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.edit_users') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary">
                            <h3 class="block-title">
                                <i class="fa fa-pencil-alt mr-1"></i> Edit Post
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="block-content font-size-sm container">
                                <div class="form-group">
                                    <label for="example-text-input">Title</label>
                                    <input type="text" class="form-control" id="example-text-input" name="example-text-input" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="example-select">Select Category</label>
                                    <select class="form-control" id="example-select" name="example-select">
                                        <option value="0" selected hidden>Please select</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        <option value="4">Option #4</option>
                                        <option value="5">Option #5</option>
                                        <option value="6">Option #6</option>
                                        <option value="7">Option #7</option>
                                        <option value="8">Option #8</option>
                                        <option value="9">Option #9</option>
                                        <option value="10">Option #10</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-textarea-input">Short Description</label>
                                    <textarea class="form-control" id="example-textarea-input" name="example-textarea-input" rows="4" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="form-group container">
                                <label for="summernote">Description</label>
                                <textarea id="summernote" name="editordata" style="height: 150px;"></textarea>
                            </div>
                            <div class="form-group container">
                                <div class="custom-file">
                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                    <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="example-file-input-custom">
                                    <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group container">
                                <label for="example-select">Status</label>
                                <select class="form-control" id="example-select" name="example-select">
                                    <option value="0" selected hidden>Please select</option>
                                    <option value="1">Active</option>
                                    <option value="2">inactive</option>
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
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->


</div>
<!-- END Page Content -->

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
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
      </script>


@endsection
