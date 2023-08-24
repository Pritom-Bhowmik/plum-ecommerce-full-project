@extends('backend.layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Contacts</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                        <li class="active">Contacts</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading content-between">
                            <h3 class="panel-title">View Table</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="10%">Name</th>
                                        <th width="10%">Email</th>
                                        <th width="25%">Subject</th>
                                        <th width="40%">Message</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(\App\Models\Contact::orderBy('id', 'desc')->get() as $row)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->subject }}</td>
                                        <td>{{ $row->message }}</td>
                                        <td>
                                            <a class="btn btn-warning" href="{{route('backend.blog.edit', $row->id)}}">Edit</a>
                                            <a class="btn btn-danger" onclick="return confirm('Are your sure? delete this row.');" href="{{route('backend.blog.delete', $row->id)}}">Delete</a>
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
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var datatable = $('#datatable').dataTable();
    });
</script>
@endpush
{{-- Scripts Section End --}}

