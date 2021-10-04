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

        </div>
    </div>
</div>
<!-- END Hero -->

{{-- Page Content --}}
@php
    $all_cat=App\Category::get();
@endphp
<div class="content container">
    <div class="block">
        <div class="block-header">
            <h3 class="block-title"> MAIN HEADER <small class="ml-2"> CATEGORIES</small> </h3>
        </div>
        <div class="block-content block-content-full">
                <div class="row push">
                    {{-- ----------section 1------------- --}}

                    @for ($j = 1; $j < 4; $j++)
                    <div class="col-lg-4 col-xl-4">
                        @for ($i = 1; $i < 5; $i++)
                        @php
                            // dd(${"sec1_" . $i});
                        @endphp
                        <form method="post" action="{{ route('admin.main_header'.$j.'_'.$i) }}" id="" enctype="multipart/form-data">
                            @csrf
                        <input type="hidden" value="{{ $i }}" name="order">
                        <input type="hidden" value="{{ $j }}" name="section">
                        @if(isset(${"sec".$j."_".$i}[0]))
                                    <input type="hidden" value="{{ ${"sec".$j."_".$i}[0]->id }}" name="old">
                        @endif
                        <div class="form-group">
                            <select class="custom-select" id="section{{ $j }}_{{ $i }}" name="cat_id">
                                <option value="0" selected disabled>Please select</option>
                                @foreach($all_cat as $cat)
                                    @if(isset(${"sec".$j."_".$i}[0]))
                                    <option value="{{ $cat->id }}" {{ $cat->id == ${"sec".$j."_".$i}[0]->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @else
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success" id="section{{ $j }}_{{ $i }}_btn" data-toggle="click-ripple" style="display: none">Submit</button>
                        </div>
                        </form>
                        @endfor
                    </div>
                    @endfor



                </div>
        </div>
    </div>
</div>
{{-- Page Content End --}}

@endsection

@section('js')
<script>
    $( document ).ready(function() {
  console.log("hi");

  for (let j = 1; j < 4; j++) {
    for (let i = 1; i < 5; i++) {

        $( "#section"+j+"_"+i ).change(function() {
            $("#section"+j+"_"+i+"_btn").css("display", "block");
        });
    }

  }

});

</script>
@endsection

@section('internal_css')
<style>
.vl{
     border-left: 1px solid grey;
     height: 200px;
    }
</style>
@endsection
