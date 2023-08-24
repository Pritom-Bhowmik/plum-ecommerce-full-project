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
                        <li><a href="{{route('backend.users.index')}}">All Admins</a></li>
                        <li class="active">Edit Admin</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!-- Basic example -->
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Edit a admin data</h3></div>
                        <div class="panel-body">
                            <form id="form" role="form" action="{{route('backend.users.update', $user->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" class="form-control" name="name"  placeholder="Enter name" value="{{$user->name}}">
                                    @error('name')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Email address:</label>
                                    <input type="email" class="form-control"  name="email" placeholder="Enter email" value="{{$user->email}}">
                                    @error('email')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Avatar:</label>
                                    <input type="file" class="form-control" accept=".jpeg, .png, .gif, .svg, .webp" id="avatar" name="avatar" placeholder="Enter email">
                                    <span class="note"><strong>Accepted Image Type:</strong> .jpeg, .jpg, .png, .gif, .svg, .webp</span>
                                    @error('avatar')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
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
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Preview Avatar</h3></div>
                        <div class="panel-body">
                            <div class="">
                                <div class="">
                                    <img id="preview_avatar" class="img-thumbnail" src="{{asset('storage/profile')}}/{{$user->avatar}}" data-src="@if($user->avatar){{asset('storage/profile')}}/{{$user->avatar}} @else https://via.placeholder.com/200x200 @endif" alt="" style="max-width:250px;">
                                    <br>
                                    <label id="avatar_name"></label>
                                </div>
                            </div>
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
        url:"{{route('backend.users.update', $user->id)}}",
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

$('#avatar').change(function(){
    if(this.files.length > 0){
        var file = this.files[0];
        $('#preview_avatar').attr('src', URL.createObjectURL(file));
        $('#avatar_name').text(file.name);
    }
});



</script>
@endpush
{{-- Scripts Section End --}}

