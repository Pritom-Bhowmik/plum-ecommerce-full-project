@extends('backend.layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Edit Product</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                        <li class="active">Edit Product</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Edit Product</h3></div>
                        <div class="panel-body">
                            <form id="form" role="form" action="{{route('backend.content.services.update', $edit->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label>Product Title:</label>
                                    <input type="text" class="form-control" value="{{ $edit->title }}" name="product_title"  placeholder="Enter Title">
                                    @error('product_title')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Product Image</label>
                                    <input type="file" class="form-control" accept=".jpeg, .png, .gif, .svg, .webp" name="product_image">
                                    <span class="note"><strong>Accepted Image Type:</strong> .jpeg, .jpg, .png, .gif, .svg, .webp</span>
                                    @error('product_image')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group d-block">
                                    <label class="d-block">Avatar Preview:</label>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-4">
                                            <br>
                                            @if(optional($edit)->image)
                                            <img id="avatar_preview" class="img-thumbnail" src="{{asset('/frontend/img/product/'.optional($edit)->image)}}">
                                            @else
                                            <img id="avatar_preview" class="img-thumbnail" src="https://via.placeholder.com/170x280">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Product Category:</label>
                                    <select class="form-control" name="product_category">
                                        <option>Choose Category</option>
                                        @foreach(\App\Models\Categorie::orderBy('id', 'asc')->get() as $row)
                                            <option value="{{ $row->name }}" <?php if($row->name == $edit->category){echo "selected";} ?> >{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_image')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Product Price:</label>
                                    <input type="text" class="form-control" value="{{ $edit->price }}" name="product_price"  placeholder="Enter Price">
                                    @error('product_price')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Product Description:</label>
                                    <textarea type="text" class="form-control" name="product_description" rows="3" placeholder="Enter Description">{!! $edit->description !!}</textarea>
                                    @error('product_description')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
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
    CKEDITOR.replace('product_description');
</script>

@endpush
{{-- Scripts Top Section End --}}


{{-- Scripts Section Start --}}
@push('scripts')
@endpush
{{-- Scripts Section End --}}

