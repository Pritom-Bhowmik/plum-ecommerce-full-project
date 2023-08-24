@extends('backend.layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">All Categories</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                        <li class="active">All Categories</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading content-between">
                            <h3 class="panel-title">View Table</h3>
                            <a class="btn btn-primary" href="{{route('backend.categories.create')}}">Add New</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>Categorie Name</th>
                                        <th>Categorie Image</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $key = 0;
                                    @endphp
                                    @foreach($categories as $key => $data)
                                    <tr>
                                        <td>{{ $key++ }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <img height="80" src="{{asset('frontend/img/category/'.$data->image)}}" />
                                        </td>
                                        <td>
                                            <a href="{{route('backend.categories.edit', $data->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{route('backend.categories.delete', $data->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
<link href="{{asset('/backend/assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
<style>
ul{
    margin:0px;
    padding:0px;
}
.sub-cat{
    border-radius:5px;
    padding:3px 0px; 
}
.sub-cat:hover{
    background: linear-gradient(45deg, #e3ecf7, #f2f2f2);
}
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

@endpush
{{-- Scripts Section End --}}

