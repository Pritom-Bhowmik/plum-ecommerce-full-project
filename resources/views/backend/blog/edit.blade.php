@extends('backend.layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Edit Blog</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                        <li class="active">Edit Blog</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Edit</h3></div>
                        <div class="panel-body">
                            <form id="form" role="form" action="{{route('backend.blog.update', $edit->id)}}" method="post" enctype="multipart/form-data">
                                @include('backend.blog.form')
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
<script>
    
    
    $('#avatar').change(function(){
    if(this.files.length > 0){
        var file = this.files[0];
        $('#avatar_preview').attr('src', URL.createObjectURL(file));
        }
    });
    
    
</script>

@endpush
{{-- Scripts Top Section End --}}


{{-- Scripts Section Start --}}
@push('scripts')
@endpush
{{-- Scripts Section End --}}

