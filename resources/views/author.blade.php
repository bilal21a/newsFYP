@extends('index')

@section('css')
@endsection

@section('content')
<div class="content">
    <div class="container">
        <div class="block">
            <div class="row">

                <?php
                    // dd($posts);?>
                <div class="col-md-12">
                    <div class="block-content">
                    <h2 class="pt-3">{{ $posts[0]->name }}'s Posts</h2>
                </div>
                    @foreach ($posts as $post)


                    <a class="block block-rounded " href="{{ url('single_post/'.$post->id) }}">
                        <div class="block-content" style="padding-top: 0">
                            <div class="row">
                                <div class="col-sm-3 customwork" >
                                    <img src="{{asset('img/main_image/'. $post->main_image)}}" alt="" class="stl">
                                </div>
                                <div class="col-sm-9" >
                                    <h3 class="mt-1">{{ $post->title }}</h3>
                                    <?php
                                        $count=str_word_count($post->short_description);
                                    ?>
                                    @if ($count<8)
                                        <p class="mt-1 mb-0" >{{ substr($post->short_description,0,150) }} </p>
                                    @else
                                        <p class="mt-1 mb-0" >{{ substr($post->short_description,0,150) }}...  </p>
                                    @endif
                                    {{-- <p>Short Description Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam unde quisquam at eveniet temporibus dolorum cum nam tempora itaque omnis, molestias pariatur nisi iusto. Sit, assumenda magni. Vitae, sunt dolorem.</p> --}}
                                    <?php
                                        $var_1= $post->created_at;
                                        $var_2 = strtotime($var_1);
                                        $date = date('F d, Y', $var_2);
                                    ?>
                                    <small><i class="far fa-clock"> {{ $date }}</i></small>
                                </div>
                            </div>
                        </div>
                    </a>
                    <hr>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>


 @endsection



 @section('inline_css')
 <style>
    .round{
        width: 100%;
         border-radius: 10px 10px 0px 0px;
     }
     .stl{
        width: 250px !important;
        height: 160px !important;
     }
     .round1{
         border-radius: 15px 15px 0px 0px;
     }
 </style>
@endsection
 @section('js')
@endsection
