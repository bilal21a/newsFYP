@extends('admin.index')

@section('css')
@endsection

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                MiniHeader Settings <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
            </h1>
            {{-- <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="">DataTables</a>
                    </li>
                </ol>
            </nav> --}}
        </div>
    </div>
</div>
<!-- END Hero -->

{{-- Page Content --}}
<div class="content container">
    <div class="block">
        <div class="block-header">
            {{-- <h3 class="block-title"> MINI HEADER </h3> --}}
        </div>
        <div class="block-content block-content-full">
            <form action="{{ route('admin.miniheader_setting') }}" method="POST" enctype="multipart/form-data" >
               @csrf
                <div class="row push">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8 col-xl-8">
                        <div class="form-group">
                            <label for="example-text-input">Source Name</label>
                            <input type="text" class="form-control" id="example-text-input" name="source_name" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Source API Name</label>
                            <input type="text" class="form-control" id="example-text-input" name="source_api_name" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Order</label>
                            <select class="custom-select" id="example-select-custom" name="order">
                                <option value="0">Please select</option>
                                <option value="1"> 1</option>
                                <option value="2"> 2</option>
                                <option value="3"> 3</option>
                                <option value="4"> 4</option>
                                <option value="5"> 5</option>
                                <option value="6"> 6</option>
                                <option value="7"> 7</option>
                                <option value="8"> 8</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="icon">
                                <label class="custom-file-label" for="example-file-input-custom">Choose icon</label>
                            </div>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-success" data-toggle="click-ripple">Submit</button>
                        </div>
                    </div>
                    <div class="col-lg-2">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="content container">
    <div class="block">
    <div class="block-content block-content-full">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="text-center" style="width: 100px;">
                        <i class="far fa-image"></i>
                    </th>
                    <th>Source Name</th>
                    <th class="d-none d-sm-table-cell" style="width: 30%;">Source API Name</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Order</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mini as $header)

                <tr>
                    <td class="text-center">
                        {{-- @if ($users->profile_pic)
                        <img class="img-avatar img-avatar48" src="{{ asset ('img/profile_image/'.$users->profile_pic) }}" alt="">
                        @else --}}
                        <img class="img-avatar img-avatar48" src="{{ asset ('media/avatars/avatar7.jpg') }}" alt="">
                        {{-- @endif --}}

                    </td>
                    <td class="font-w600 font-size-sm">
                        <a href="be_pages_generic_blank.html">{{ $header->source_name }}</a>
                    </td>
                    <td class="d-none d-sm-table-cell font-size-sm">
                       {{ $header->source_api_name }}
                    </td>
                    <td>
                        <em class="text-muted font-size-sm">{{ $header->order }}</em>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#delete-modal" >
                                <i class="fa fa-fw fa-times"></i>
                              Delete
                            </button>
                        </div>
                    </td>
                </tr>

                    <!-- Delete Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.delete_source') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary">
                            <h3 class="block-title">
                                <i class="fa fa-trash mr-1"></i> Delete Source
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
                        <input class="form-control" type="hidden" id="message-id" name="id" value="{{ $header->id }}">

                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-link mr-2" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fa fa-trash mr-1"></i> "Delete"
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

{{-- Page Content End --}}

@endsection

@section('js')
@endsection

@section('internal_css')
<style>
.vl{
     border-left: 1px solid grey;
     height: 200px;
    }
</style>
@endsection
