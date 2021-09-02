@extends('index')

@section('css')
@endsection

@section('content')

<div class="content">
    <div class="container">
        <div class="block">
            <div class="row">


                <div class="col-md-12">
                    <div class="block-content">
                    <h2 class="pt-3">Your Posts </h2>
                </div>
                @if ($posts!=null)
                    @foreach ($posts as $post)


                    <a class="block block-rounded " href="{{ url('single_post/'.$post->id) }}">
                        <div class="block-content" style="padding-top: 0">
                            <div class="row">
                                <div class="col-sm-3 customwork" >
                                    <img src="{{asset('img/main_image/'. $post->main_image)}}" alt="" class="stl">
                                </div>
                                <div class="col-sm-9" >
                                    <h3 class="mt-1">{{ $post->title }} </h3>
                                    <p>{{ $post->short_description }}</p>
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
                    @else
                     <div class="d-flex flex-column justify-content-center" style="text-align: center;"><span class="d-block font-weight-bold ">You Don't Have Posted Any Post Yet!</span></div>

                    @endif

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
