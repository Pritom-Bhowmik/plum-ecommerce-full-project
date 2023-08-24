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
                        <li><a href="{{route('backend.categories.index')}}">All Categories</a></li>
                        <li class="active">Add New</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Create a new categorie</h3></div>
                        <div class="panel-body">
                            <form role="form" action="{{route('backend.categories.create')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Categorie Name:</label>
                                    <input type="text" class="form-control" name="categorie_name"  placeholder="Enter name">
                                    @error('categorie_name')
                                        <span class="error-message">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Categorie Image:</label>
                                    <input type="file" class="form-control" name="categorie_image">
                                    @error('categorie_image')
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
        url:"{{route('backend.categories.store')}}",
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
                $('#form')[0].reset();
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

