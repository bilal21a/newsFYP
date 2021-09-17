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
            <form action="{{ route('admin.system_setting') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row push">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8 col-xl-8">
                        <div class="form-group">
                            <label for="example-text-input">System Name</label>
                            <input type="text" class="form-control" id="system_name" name="system_name" placeholder="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" data-toggle="click-ripple">Submit</button>
                        </div>
                        <hr>

{{-- ------------------------------------------------------------ --}}
<div class="form-group">
    <label for="example-text-input">Favicon</label>
    <div class="row">
        <div class="col-md-6 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-zoom-out">
                <img class="img-fluid options-item" src="{{ asset('media/photos/photo10.jpg') }}" alt="">
                <div class="options-overlay bg-primary-dark-op">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-2">Favicon</h3>
                        {{-- <h4 class="h6 text-white-75 font-w400 mb-3">Some Extra Info</h4> --}}
                        <a class="btn btn-sm btn-light" href="javascript:void(0)" id="favicon_id">
                            <i class="fa fa-fw fa-pencil-alt text-success mr-1"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-7">
            <div class="custom-file form-group">
                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="favicon">
                <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
            </div><br><br>
            <div class="form-group">
                <button type="submit" class="btn btn-success" data-toggle="click-ripple" id="favicon_submit">Submit</button>
                <button type="button" class="btn btn-light"  id="favicon_cancel">Cancel  </button>
            </div>

        </div>

    </div>
</div>
<hr>
<div class="form-group">
    <label for="example-text-input">Front Logo</label>
    <div class="row">
        <div class="col-md-6 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-zoom-out">
                <img class="img-fluid options-item" src="{{ asset('media/photos/photo10.jpg') }}" alt="">
                <div class="options-overlay bg-primary-dark-op">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-2">Logo</h3>
                        {{-- <h4 class="h6 text-white-75 font-w400 mb-3">Some Extra Info</h4> --}}
                        <a class="btn btn-sm btn-light" href="javascript:void(0)" id="front_logo_edit">
                            <i class="fa fa-fw fa-pencil-alt text-success mr-1"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-7">
            <div class="custom-file form-group">
                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="favicon">
                <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
            </div><br><br>
            <div class="form-group">
                <button type="submit" class="btn btn-success" data-toggle="click-ripple" id="front_logo_submit">Submit</button>
                <button type="button" class="btn btn-light"  id="front_logo_cancel">Cancel  </button>
            </div>

        </div>

    </div>
</div>
<hr>
<div class="form-group">
    <label for="example-text-input">Admin Logo</label>
    <div class="row">
        <div class="col-md-6 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-zoom-out">
                <img class="img-fluid options-item" src="{{ asset('media/photos/photo10.jpg') }}" alt="">
                <div class="options-overlay bg-primary-dark-op">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-2">Admin Logo</h3>
                        {{-- <h4 class="h6 text-white-75 font-w400 mb-3">Some Extra Info</h4> --}}
                        <a class="btn btn-sm btn-light" href="javascript:void(0)" id="admin_logo_edit">
                            <i class="fa fa-fw fa-pencil-alt text-success mr-1"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-7">
            <div class="custom-file form-group">
                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="favicon">
                <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
            </div><br><br>
            <div class="form-group">
                <button type="submit" class="btn btn-success" data-toggle="click-ripple" id="admin_logo_submit">Submit</button>
                <button type="button" class="btn btn-light" id="admin_logo_cancel">Cancel  </button>
            </div>

        </div>

    </div>
</div>





<hr>
{{-- ------------------------------------------------------------ --}}
                        <div class="form-group">
                            <label for="example-text-input">Favicon</label>
                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="favicon">
                                <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Front Logo</label>
                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="front_logo">
                                <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Admin Logo</label>
                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="admin_logo">
                                <label class="custom-file-label" for="example-file-input-custom">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary" data-toggle="click-ripple">Submit</button>
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
