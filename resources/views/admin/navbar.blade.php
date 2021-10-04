@extends('admin.index')

@section('css')
@endsection

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                NavBar Settings <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
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
            <h3 class="block-title"> MAIN HEADER <small class="ml-2"> CATEGORIES</small> </h3>
        </div>
        <div class="block-content block-content-full">
                <div class="row push">
                    {{-- ----------section 1------------- --}}
                    <form method="post" action="{{ route('admin.main_header1') }}" id="upload_form" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-4 col-xl-4">
                        <input type="hidden" value="1" name="section">
                        <div class="form-group">
                            <select class="custom-select" id="example-select-custom" name="section1_1">
                                <option value="0">Please select</option>
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
                            <select class="custom-select" id="example-select-custom" name="section1_2">
                                <option value="0">Please select</option>
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
                            <select class="custom-select" id="example-select-custom" name="section1_3">
                                <option value="0">Please select</option>
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
                            <select class="custom-select" id="example-select-custom" name="section1_4">
                                <option value="0">Please select</option>
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
                            <button type="submit" class="btn btn-sm btn-success" data-toggle="click-ripple">Submit</button>
                        </div>
                    </div>
                    </form>
                    {{-- ----------section 2------------- --}}
                    <form method="post" action="{{ route('admin.main_header2') }}" id="upload_form" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-4 col-xl-4">
                        <input type="hidden" value="2" name="section">
                        <div class="form-group">
                            <select class="custom-select" id="example-select-custom" name="section2_1">
                                <option value="0">Please select</option>
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
                            <select class="custom-select" id="example-select-custom" name="section2_2">
                                <option value="0">Please select</option>
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
                            <select class="custom-select" id="example-select-custom" name="section2_3">
                                <option value="0">Please select</option>
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
                            <select class="custom-select" id="example-select-custom" name="section2_4">
                                <option value="0">Please select</option>
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
                            <button type="submit" class="btn btn-sm btn-success" data-toggle="click-ripple">Submit</button>
                        </div>
                    </div>
                    </form>
                    {{-- ----------section 3------------- --}}
                    <form method="post" action="{{ route('admin.main_header3') }}" id="upload_form" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-4 col-xl-4">
                        <input type="hidden" value="3" name="section">
                        <div class="form-group">
                            <select class="custom-select" id="example-select-custom" name="section3_1">
                                <option value="0">Please select</option>
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
                            <select class="custom-select" id="example-select-custom" name="section3_2">
                                <option value="0">Please select</option>
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
                            <select class="custom-select" id="example-select-custom" name="section3_3">
                                <option value="0">Please select</option>
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
                            <select class="custom-select" id="example-select-custom" name="section3_4">
                                <option value="0">Please select</option>
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
                            <button type="submit" class="btn btn-sm btn-success" data-toggle="click-ripple">Submit</button>
                        </div>
                    </div>
                    </form>

                </div>
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
