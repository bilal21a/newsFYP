@extends('admin.index')

@section('css')
@endsection

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                General Settings <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
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

<div class="content container">
    <div class="block">
        <div class="block-content block-content-full">
            <form action="be_forms_elements.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                <div class="row push">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8 col-xl-8">
                        <div class="form-group">
                            <label for="example-text-input">System Name</label>
                            <input type="text" class="form-control" id="example-text-input" name="example-text-input" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Favicon</label>
                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="example-file-input-custom">
                                <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Front Logo</label>
                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="example-file-input-custom">
                                <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Admin Logo</label>
                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="example-file-input-custom">
                                <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                        <button type="button" class="btn btn-primary" data-toggle="click-ripple">Submit</button>
                        </div>
                    </div>
                    <div class="col-lg-2">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
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
