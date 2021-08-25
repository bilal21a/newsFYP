@extends('index')

@section('css')
    <link href="{{asset('css/comment.css')}} "rel="stylesheet">
@endsection


@section('content')
    <div class="container mt-5">

        <div class="d-flex justify-content-center row">
            <div class="col-md-8 bg-white">

            <div class="bg-white p-2">
                <h2 class="d-flex flex-column justify-content-start ml-2">Your Comments</h2>

                    <!-- repaeat text -->
                <div class="d-flex flex-column comment-section">
                    <div class="bg-white p-2">
                        <div class="d-flex flex-row user-info pt-2">
                            <div class="d-flex flex-column justify-content-start ml-2"><a href=""><span class="d-block font-weight-bold name">Fayazul Hasan Chohan appointed Punjab govt spokesperson</span></a></div>
                        </div>
                        <div class="mt-2">
                            <p class="comment-text cmnt">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                    <div class="bg-white">
                        <div class="d-flex flex-row fs-12">
                            <div class="like p-2 "><b>Posted on <i class="fa fa-clock ml-1"></i><span class="ml-1">12 Jan 2020</span></b></div>
                        </div>
                        <hr>
                    </div>
                </div>
                <!-- end repeat -->
            </div>
            <div class="d-flex flex-column justify-content-center" style="text-align: center;"><span class="d-block font-weight-bold ">You Don't Have Posted Any Comment Yet!</span></div>

        </div>
    </div>
    </div>
@endsection

@section('js')
@endsection
