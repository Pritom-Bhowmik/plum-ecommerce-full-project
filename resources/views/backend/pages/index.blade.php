@extends('backend.layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">All Pages</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                        <li class="active">All Pages</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading content-between">
                            <h3 class="panel-title">View Table</h3>
                            <!--<a class="btn btn-primary" href="{{route('backend.users.create')}}">Add New</a>-->
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="35%">Page Name</th>
                                        <th width="35%">Page Title</th>
                                        <th width="10%">Thumbnail</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(\App\Models\Page::orderBy('page_name', 'ASC')->get() as $row)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$row->page_name}}</td>
                                        <td>{{$row->page_title}}</td>
                                        <td>
                                            <img class="img-thumbnail" src="{{asset('frontend/img/backgrounds/'.$row->thumbnail)}}" />
                                        </td>
                                        <td>
                                            <a href="{{route('backend.content.pages.edit', $row->slug)}}" class="btn btn-warning btn-sm">Edit</a>
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
<script src="{{asset('/backend/assets/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/backend/assets/datatables/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var datatable = $('#datatable').dataTable();
        {{-- ============ --}}
        
        {{-- ============ --}}
    });
</script>
@endpush
{{-- Scripts Section End --}}

