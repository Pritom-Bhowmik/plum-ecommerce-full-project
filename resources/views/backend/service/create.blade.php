@extends('backend.layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Add New</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                        <li><a href="{{route('backend.content.services.index')}}">All Products</a></li>
                        <li class="active">Add New</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Create a new product</h3></div>
                        <div class="panel-body">
                            <form role="form" action="{{route('backend.content.services.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Product Title:</label>
                                    <input type="text" class="form-control" name="product_title"  placeholder="Enter Title">
                                    @error('product_title')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Product Image:</label>
                                    <input type="file" class="form-control" name="product_image">
                                    @error('product_image')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Product Category:</label>
                                    <select class="form-control" name="product_category">
                                        <option>Choose Category</option>
                                        @foreach(\App\Models\Categorie::orderBy('id', 'asc')->get() as $row)
                                            <option value="{{ $row->name }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_image')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Product Price:</label>
                                    <input type="text" class="form-control" name="product_price"  placeholder="Enter Price">
                                    @error('product_price')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Product Description:</label>
                                    <textarea type="text" class="form-control" name="product_description" rows="3" placeholder="Enter Description" required></textarea>
                                    @error('product_description')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="spin btn btn-purple waves-effect waves-light">
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
    <script src="https://cdn.ckeditor.com/4.16.0/full-all/ckeditor.js"></script>
@endpush
{{-- Scripts Head Section End --}}


{{-- Scripts Top Section Start --}}
@push('scripts_top')
    
@endpush
{{-- Scripts Top Section End --}}


{{-- Scripts Section Start --}}
@push('scripts')
<script>
    CKEDITOR.replace('product_description');
</script>
@endpush
{{-- Scripts Section End --}}

