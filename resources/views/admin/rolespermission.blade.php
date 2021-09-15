@extends('admin.index')

@section('before_css')
    <link rel="stylesheet" href="{{asset('js/plugins/select2/css/select2.min.css')}}">
@endsection
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
                Roles & Permissions
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href=""> Roles & Permissions
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Roles & Permissions</h3>
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#add-modal">
                    <i class="fa fa-fw fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 10%;">#</th>
                        <th style="width: 40%;"> Roles</th>
                        <th class="d-none d-sm-table-cell" style="width: 40%;">Permissions</th>
                        {{-- <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th> --}}
                        <th style="width: 10%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center font-size-sm">1</td>
                        <td class="font-w600 font-size-sm">
                            <a href="be_pages_generic_blank.html">Megan Fuller</a>
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            <ul><li>Front End Developer</li>
                            <li>Backend Developer</li>
                            <li>Abstraction</li>
                            <li>Polymorphism</li></ul>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#edit-modal">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#delete-modal" >
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                            {{-- <span class="badge badge-info">Business</span> --}}
                        </td>
                    </tr>
                    <!-- Edit Modal -->
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary">
                            <h3 class="block-title">
                                <i class="fa fa-pencil-alt mr-1"></i> Edit Role & Permission
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
                                <input class="form-control" type="text" id="message-email" value="">
                            </div>
                            <div class="row">
                                {{-- <div class="col-lg-4">
                                    <p class="font-size-sm text-muted">
                                        Default multiple select input turns into a tags input
                                    </p>
                                </div> --}}
                                {{--  --}}
                                <div class="col-lg-12">
                                    <label for="example-text-input" class="main_label">Skills</label>
                                    <select class="js-select2 form-control " id="example-select2-multiple" name="example-select2-multiple" style="width: 100%;" data-placeholder="Choose Skills" multiple>
                                        <option></option>
                                        <option value="1">HTML</option>
                                        <option value="2" >CSS</option>
                                        <option value="3">JavaScript</option>
                                        <option value="4">PHP</option>
                                        <option value="5">MySQL</option>
                                        <option value="6">Ruby</option>
                                        <option value="7">Angular</option>
                                        <option value="8">React</option>
                                        <option value="9">Vue.js</option>
                                    </select>
                                </div>
                                {{-- <div class="col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <select class="js-select2 form-control" id="example-select2-multiple" name="example-select2-multiple" style="width: 100%;" data-placeholder="Choose many.." multiple>
                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            <option value="1" selected>HTML</option>
                                            <option value="2" selected>CSS</option>
                                            <option value="3">JavaScript</option>
                                            <option value="4">PHP</option>
                                            <option value="5">MySQL</option>
                                            <option value="6">Ruby</option>
                                            <option value="7">Angular</option>
                                            <option value="8">React</option>
                                            <option value="9">Vue.js</option>
                                        </select>
                                    </div>
                                </div> --}}
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
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary">
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
    <script src="{{asset('js/plugins/select2/js/select2.full.min.js')}}"></script>

    <script src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
    <script src="{{asset('js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
    <script src="{{asset('js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
    <script src="{{asset('js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('js/pages/be_tables_datatables.min.js')}}"></script>
    <script>
        jQuery(function() {
            One.helpers(['select2']);
        });
    </script>

@endsection
