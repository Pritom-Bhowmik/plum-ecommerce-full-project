@extends('backend.layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Edit About</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                        <li class="active">Edit About</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Edit About</h3></div>
                        <div class="panel-body">
                            <form id="form" role="form" action="{{route('backend.content.about.update', $edit->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label>Title:</label>
                                    <textarea type="text" class="form-control" name="title" rows="3">{{old('content', $edit->title)}}</textarea>
                                    @error('title')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Content:</label>
                                    <textarea type="text" class="form-control" name="content" rows="3">{{old('content', $edit->content)}}</textarea>
                                    @error('content')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                               
                                <div class="form-group">
                                    <label for="">Thumbnail: (1800 x 1801)</label>
                                    <input type="file" class="form-control" accept=".jpeg, .png, .gif, .svg, .webp" id="avatar" name="thumbnail">
                                    <span class="note"><strong>Accepted Image Type:</strong> .jpeg, .jpg, .png, .gif, .svg, .webp</span>
                                    @error('avatar')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group d-block">
                                    <label class="d-block">Thumbnail Preview:</label>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <br>
                                            @if($edit->thumbnail)
                                            <img class="img-thumbnail" src="{{asset('/frontend/img/about/'.$edit->thumbnail)}}">
                                            @else
                                            <img class="img-thumbnail" src="https://via.placeholder.com/300x120">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Video</label>
                                    <input type="file" class="form-control" id="avatar" name="video">
                                    @error('avatar')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group d-block">
                                    <label class="d-block">Video Preview:</label>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <br>
                                            @if($edit->video)
                                            <img class="img-thumbnail" src="{{asset('/frontend/img/about/'.$edit->video)}}">
                                            @else
                                            <img class="img-thumbnail" src="https://via.placeholder.com/300x120">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="d-block">
                                    <button type="submit" class="spin btn btn-purple waves-effect waves-light">
                                        Submit
                                    </button>
                                </div>
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
<script src="https://cdn.ckeditor.com/4.16.0/full-all/ckeditor.js"></script>

@endpush
{{-- Scripts Head Section End --}}


{{-- Scripts Top Section Start --}}
@push('scripts_top')
<script>
    CKEDITOR.replace('title');
    CKEDITOR.replace('content');
</script>

@endpush
{{-- Scripts Top Section End --}}


{{-- Scripts Section Start --}}
@push('scripts')
@endpush
{{-- Scripts Section End --}}

