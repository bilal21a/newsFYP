@extends('admin.index')

@section('css')

        <link href="{{asset('js/plugins/datatables/dataTables.bootstrap4.css')}} "rel="stylesheet">
        <link href="{{asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}} "rel="stylesheet">
        <link href="{{asset('css/summernote.min.css')}} "rel="stylesheet">
@endsection

@section('content')

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                World News Posts
            </h1>
            {{-- <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="">All Posts</a>
                    </li>
                </ol>
            </nav> --}}
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header" >
            {{-- <h3 class="block-title">Posts</h3> --}}
        </div>
        <div class="block-content block-content-full">
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
                    @foreach ($posts as $post)
                    <tr>
                        <td class="text-center">

                            @if ($post->main_image)
                            <img class="img_post" src="{{ asset ('img/main_image/'.$post->main_image) }}" alt="">
                            @else
                            <img class="img_post" src="{{ asset ('img/deafault_post.png') }}" alt="">
                            @endif

                        </td>
                        <td class="font-w600 font-size-sm">
                            <a href="{{ url('single_post/'.$post->id) }}">{{ $post->title }}</a>
                        </td>
                        <td class="d-none d-sm-table-cell font-size-sm">
                            @if ($post->author_name_api!=null)
                            <a href="">{{ $post->author_name_api }} </a><span class="badge badge-danger badge-pill"> api</span>
                            @else
                            <a href="{{ url('author_name/'.$post->created_by) }}">{{ App\User::find($post->created_by)->name }} </a>
                            @endif
                        </td>
                        <td class="d-none d-sm-table-cell">
                            @if ($post->status==1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            @php
                                $var_1= $post->created_at;
                                $var_2 = strtotime($var_1);
                                $date = date('F d, Y', $var_2);
                            @endphp
                            <em class="text-muted font-size-sm">{{ $date }}</em>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#view-modal{{ $post->id }}">
                                    <i class="fa fa-fw fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-success"  data-toggle="modal" data-target="#edit-modal{{ $post->id }}">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#delete-modal{{ $post->id }}" >
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </td>
     <!-- View Modal -->
    <div class="modal fade" id="view-modal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">

                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-success">
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
                                    <p>{{ $post->title }}</p>
                                </div>
                                <div class="form-group">

                                    @if ($post->main_image)
                                    <img src="{{ asset ('img/main_image/'.$post->main_image) }}" alt="" style="width: 100%;">
                                    @else
                                    <img src="{{ asset ('media/avatars/avatar7.jpg') }}" alt="" style="width: 100%;">
                                    @endif

                                <span>

                                    @if ($post->author_name_api!=null)
                                    <a href="" class="text-dark pr-4"><i class="fa fa-user"> {{ $post->author_name_api }}</i></a>
                                    @else
                                    <a href="" class="text-dark pr-4"><i class="fa fa-user"> {{ App\User::find($post->created_by)->name }}</i></a>
                                    @endif



                                    <a href="" class="text-dark pr-4"><i class="fa fa-clock"> {{ $date }}</i></a>
                                </span>
                                </div>
                                <div class="form-group">
                                    @if (App\Category::find($post->category_id))
                                    <label for="example-text-input">Category</label>
                                    <p>{{ App\Category::find($post->category_id)->name }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input">Short Description</label>
                                    <p>{{ $post->short_description }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input">Description</label>
                                    <p>{!! $post->description !!}</p>
                                </div>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- END View Modal -->
     <!-- Edit Modal -->
    <div class="modal fade" id="edit-modal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.edit_posts') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-success">
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
                                    <input type="text" class="form-control" id="example-text-input" name="title" placeholder="" value="{{ $post->title }}">
                                    <input type="hidden" class="form-control" id="example-text-input" name="id" placeholder="" value="{{ $post->id }}">
                                </div>
                                <div class="form-group">
                                    <label for="example-select">Select Category</label>
                                    <select class="form-control" id="example-select" name="category">
                                    <?php
                                        $cat=App\Category::where('status',1)->get()->toArray();
                                    ?>
                                    <option value="0" selected hidden>Please select</option>
                                    @foreach ($cat as $single_cat)
                                    <option value="{{ $single_cat['id'] }}" {{ $single_cat['id'] == $post->category_id ? 'selected' : '' }}>{{ $single_cat['name'] }}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-textarea-input">Short Description</label>
                                    <textarea class="form-control" id="example-textarea-input" name="short_description" rows="4" placeholder="" >{{ $post->short_description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group container">
                                <label for="summernote">Description</label>
                                <textarea id="summernote" name="description" style="height: 150px;">{{ $post->description }}</textarea>
                            </div>
                            <div class="form-group container">
                                <label for="example-select">Status</label>
                                <select class="form-control" id="example-select" name="status">
                                    <option value="" selected hidden>Please select</option>
                                    @if ($post->status==1)
                                        <option value="1" selected>Active</option>
                                        <option value="0">inactive</option>
                                    @else
                                    <option value="1" >Active</option>
                                    <option value="0" selected>inactive</option>
                                    @endif
                                </select>
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
    <div class="modal fade" id="delete-modal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="one-inbox-new-message" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                {{-- <form action="{{ route('admin.delete_posts') }}" method="POST" enctype="multipart/form-data"> --}}
                    {{-- @csrf --}}
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-danger">
                            <h3 class="block-title">
                                <i class="fa fa-trash mr-1"></i> Delete Post
                            </h3>
                            {{-- @php
                                dd($post->id);
                            @endphp --}}
                            <input type="hidden" class="form-control" id="example-text-input" name="id" placeholder="" value="{{ $post->id }}">

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
                            <button type="button" class="btn btn-sm btn-outline-danger mr-2" data-dismiss="modal">Cancel</button>
                            <a href="{{ url('admin/delete_posts/'.$post->id) }}"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash mr-1"></i> Delete</button></a>
                        </div>
                    </div>
                {{-- </form> --}}
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


</div>
<!-- END Page Content -->

@endsection

@section('internal_css')
<style>
.img_post{
    width: 180px;
    height: 90px;
}
</style>
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
        <script src="{{asset('js/summernote.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
      </script>


@endsection
