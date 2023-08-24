@extends('backend.layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Edit & Update</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                        <li><a href="{{route('backend.categories.index')}}">All Categories</a></li>
                        <li class="active">Edit Categorie</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!-- Basic example -->
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Edit a CATEGORIE</h3></div>
                        <div class="panel-body">
                            <form role="form" action="{{route('backend.categories.update', $categorie->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Categorie Name:</label>
                                    <input type="text" class="form-control" name="categorie_name"  placeholder="Enter Categorie name" value="{{$categorie->name}}">
                                    @error('categorie_name')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Avatar: (170 x 280)</label>
                                    <input type="file" class="form-control" accept=".jpeg, .png, .gif, .svg, .webp" name="categorie_image">
                                    <span class="note"><strong>Accepted Image Type:</strong> .jpeg, .jpg, .png, .gif, .svg, .webp</span>
                                    @error('categorie_image')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group d-block">
                                    <label class="d-block">Avatar Preview:</label>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-4">
                                            <br>
                                            @if(optional($categorie)->image)
                                            <img id="avatar_preview" class="img-thumbnail" src="{{asset('/frontend/img/category/'.optional($categorie)->image)}}">
                                            @else
                                            <img id="avatar_preview" class="img-thumbnail" src="https://via.placeholder.com/170x280">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="spin btn btn-purple waves-effect waves-light">
                                    <svg class="spinner" viewBox="0 0 50 50">
                                        <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
                                    </svg>
                                    Submit
                                </button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
            </div>

        </div> <!-- container -->
    </div> <!-- content -->
</div> <!-- content-page -->


@endsection




{{-- Meta Section Start --}}
@push('meta')

@endpush
{{-- Meta Section End --}}


{{-- Styles Top Section Start --}}
@push('styles_top')

@endpush
{{-- Styles Top Section End --}}


{{-- Styles Section Start --}}
@push('styles')
<style>

</style>
@endpush
{{-- Styles Section End --}}


{{-- Scripts Head Section Start --}}
@push('scripts_head')

@endpush
{{-- Scripts Head Section End --}}


{{-- Scripts Top Section Start --}}
@push('scripts_top')

@endpush
{{-- Scripts Top Section End --}}


{{-- Scripts Section Start --}}
@push('scripts')
<script>
$('#form').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:"{{route('backend.categories.update', $categorie->id)}}",
        type: "POST",
        data:new FormData(this),
        cache: false,
        contentType: false,
        processData: false,                        
        beforeSend:function(res){
            $('#form').find('button').attr('disabled', true);
        },
        success:function(res){
            ToastMessage(res.status?"Success":"Error", res.message, res.status?'success':"error");
            $('button[type="submit"]').removeAttr('disabled');
            $('.error-message').remove();
            if(!res.status && Object.keys(res.errors).length > 0){
                Object.keys(res.errors).forEach(function(key, index){
                    var targetEl = $('#form').find('input[name="'+key+'"]')[0];
                    $(targetEl).after(`<span class="error-message">${res.errors[key][0]}</span>`);
                });
            }else{
            }
        },
        error:function(res){
            ToastMessage("Error", 'Something went wrong please try again.', 'error');
        },
        complete:function(res){
            console.log('complete', res);
        }
    });
    
});


</script>
@endpush
{{-- Scripts Section End --}}

