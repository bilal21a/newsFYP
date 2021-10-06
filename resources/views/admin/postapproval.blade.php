@extends('admin.index')
@section('css')

@endsection

@section('content')
    <!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Pending Posts
            </h1>
        </div>
    </div>
</div>
<!-- END Hero -->
     <!-- Latest Posts -->
<div class="content">
     <div class="col-lg-12">
        <div class="block block-mode-loading-oneui">
            <div class="block-header border-bottom">
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                </div>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                    <thead class="thead-dark">
                        <tr class="text-uppercase">
                            <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 50%;">Title</th>
                            <th class="font-w700" style="width: 20%;">Author</th>
                            <th class="d-none d-sm-table-cell font-w700" style="width: 10%;">Date</th>
                            <th class="font-w700 text-center" style="width: 20%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td class="d-none d-sm-table-cell text- ">
                                <p> {{ $post->title }}</p>
                            </td>
                            <td>
                                <span class="font-w600">{{ App\User::find($post->created_by)->name }}</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="font-size-sm text-muted">today</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                <a href="{{ url('admin/post_accept/'.$post->id) }}">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fa fa-fw fa-check"></i>
                                    </button>
                                </a>
                                <a href="{{ url('admin/post_reject/'.$post->id) }}">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <!-- END Latest Posts -->
@endsection


@section('js')

@endsection

@section('internal_css')
<style>
.three_dots {
    overflow: hidden;
    width:150px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}
.three_dots2 {
    overflow: hidden;
    width: 214px;
    display: contents;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}
</style>
@endsection

