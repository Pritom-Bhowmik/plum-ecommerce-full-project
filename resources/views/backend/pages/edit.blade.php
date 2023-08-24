@extends('backend.layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Edit Page</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                        <li class="active">Edit Page</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Edit {{ucfirst($edit->page_name)}} Page</h3></div>
                        <div class="panel-body">
                            <form id="form" role="form" action="{{route('backend.content.pages.update', $edit->slug)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Page Name:</label>
                                    <input type="text" class="form-control" name="page_name" value="{{old('page_name', $edit->page_name)}}">
                                    @error('page_name')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Page Title:</label>
                                    <input type="text" class="form-control" name="page_title" value="{{old('page_title', $edit->page_title)}}">
                                    @error('page_title')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Page Description:</label>
                                    <textarea type="text" class="form-control" name="page_description" rows="3">{{old('page_description', $edit->page_description)}}</textarea>
                                    @error('page_description')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Page Content:</label>
                                    <textarea type="text" class="form-control" name="page_content" rows="10">{{old('page_content', $edit->page_content)}}</textarea>
                                    @error('page_content')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Meta Title:</label>
                                    <textarea type="text" class="form-control" name="meta_title" rows="3">{{old('meta_title', $edit->meta_title)}}</textarea>
                                    @error('meta_title')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Meta Description:</label>
                                    <textarea type="text" class="form-control" name="meta_description" rows="3">{{old('meta_description', $edit->meta_description)}}</textarea>
                                    @error('meta_description')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Meta Keyword:</label>
                                    <textarea type="text" class="form-control" name="meta_keyword" rows="3">{{old('meta_keyword', $edit->meta_keyword)}}</textarea>
                                    @error('meta_keyword')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                               
                               
                               
                                <div class="form-group">
                                    <label for="">Thumbnail: (2048 x 1536)</label>
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
                                            <img class="img-thumbnail" src="{{asset('frontend/img/backgrounds/'.$edit->thumbnail)}}">
                                            @else
                                            <img class="img-thumbnail" src="https://via.placeholder.com/300x120">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <br>
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
    CKEDITOR.replace('page_content');
</script>

@endpush
{{-- Scripts Top Section End --}}


{{-- Scripts Section Start --}}
@push('scripts')
@endpush
{{-- Scripts Section End --}}

