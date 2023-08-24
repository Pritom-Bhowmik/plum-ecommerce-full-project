@extends('backend.layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">All Products</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                        <li class="active">Products</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading content-between">
                            <h3 class="panel-title">View Table</h3>
                            <a class="btn btn-primary" href="{{route('backend.content.services.create')}}">Add New</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="25%">Product Title</th>
                                        <th>Product Image</th>
                                        <th>Product Price</th>
                                        <th>Product Content</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(\App\Models\Service::orderBy('id', 'asc')->get() as $row)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{!! $row->title !!}</td>
                                        <td>
                                            <img height="80" src="{{asset('frontend/img/product/'.$row->image)}}" />
                                        </td>
                                        <td>{!! $row->price !!}</td>
                                        <td>{!! Str::limit($row->description, 250) !!}</td>
                                        <td width="10%">
                                            <a class="btn btn-warning" href="{{route('backend.content.services.edit', $row->id)}}">Edit</a>
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

