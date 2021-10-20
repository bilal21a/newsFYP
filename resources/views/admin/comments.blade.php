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
                Comments
            </h1>


        </div>
    </div>
</div>
<!-- END Hero -->
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header">
            {{-- <h3 class="block-title">Roles & Permissions</h3> --}}

        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>


                        <th class="d-none d-sm-table-cell" style="width: 50%;">Post</th>
                        <th class="d-none d-sm-table-cell" style="width: 50%;">Comment</th>
                        {{-- <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th> --}}

                    </tr>
                </thead>
                <tbody>

                    <tr>



                        <td class="font-w600 font-size-sm">
                            <a href="be_pages_generic_blank.html">Post title will be shown here</a>
                        </td >
                        <td class="d-none d-sm-table-cell font-size-sm" >
                            <p style="line-height:0px !important;"> <a href="be_pages_generic_blank.html" class="text-success">(User name)</a> bila anwar group leader hai nids shnjw nwknskw nj
                                <i class="fa fa-trash-alt text-danger" style="line-height:0px !important; float: right; margin: 0 20px; cursor: pointer;" data-toggle="modal" data-target="#delete-modal"></i>
                            </p>
                                <p style="line-height:0px !important;"> <a href="be_pages_generic_blank.html" class="text-success">(User name)</a> bila anwar group leader hai
                                        <i class="fa fa-trash-alt text-danger" style="line-height:0px !important; float: right; margin: 0 20px; cursor: pointer;" data-toggle="modal" data-target="#delete-modal"></i>
                                    </p>
                                <p  data-toggle="modal" data-target="#modal-block-large" class="text-primary" style="cursor: pointer">Show all >></p>
                            </td>
                    </tr>


    <!-- Delete Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.delete_role') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-danger">
                            <h3 class="block-title">
                                <i class="fa fa-trash mr-1"></i> Delete Comment
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
                        <input class="form-control" type="hidden" id="message-id" name="role_id" value="1">

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

     <!-- Show all Modal -->
     <div class="modal" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title"> <a href="#" class="text-light"> Post title will be shown here </a></h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content font-size-sm">
                        <p> <a href="be_pages_generic_blank.html" class="text-success">(User name)</a> bila anwar group leader hai
                            <a><i class="fa fa-trash-alt text-danger" style="line-height:0px !important; float: right; margin: 0 20px; cursor: pointer;"></i></a>
                        </p>
                        <p> <a href="be_pages_generic_blank.html" class="text-success">(User name)</a> bila anwar group leader hai
                            <a><i class="fa fa-trash-alt text-danger" style="line-height:0px !important; float: right; margin: 0 20px; cursor: pointer;"></i></a>
                        </p>
                    </div>
                    <div class="block-content block-content-full text-right ">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Show all Modal -->

                </tbody>
            </table>
        </div>
    </div>
</div>
    <!-- END Dynamic Table Full -->


    @if (session('error'))
    <input type="hidden" id="errors" value="{{ session('error') }}">
    @endif
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
    <script>
        const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })
    </script>
    <script>
        jQuery(function() {
            One.helpers(['select2']);
        });

        $( document ).ready(function() {

            var error=$("#errors").val();
            console.log(error);

            if (error != null) {
                Toast.fire({
                icon: 'warning',
                title: error,
            })
            }

        });

    </script>

@endsection
