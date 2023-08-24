@extends('backend.layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">All Admins</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                        <li class="active">All Admin</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!-- Basic example -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading content-between">
                            <h3 class="panel-title">View Table</h3>
                            <a class="btn btn-primary" href="{{route('backend.users.create')}}">Add New</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
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
        var datatable = $('#datatable').dataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('backend.users.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'avatar', name: 'avatar'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            lengthMenu: [
                [20, 50, 100, 500, -1],
                ['20 Rows', '50 Rows', '100 Rows', '500 Rows', 'Show All']
            ],
            dom:"<'row'<'col-sm-6'l><'col-sm-6'<'row'<'col-sm-9'f><'col-sm-3 text-right between-next'B>>>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            buttons: [
                {
                    titleAttr: 'Download as PDF',
                    extend: 'pdfHtml5',
                    className: 'custom-btn btn btn-success',
                    text: '<i class="fa fa-file-pdf-o"></i>'
                },
                {
                    titleAttr: 'Download as Excel',     
                    extend: 'excelHtml5',
                    className: 'custom-btn btn btn-info',
                    text: '<i class="fa fa-file-excel-o"></i>'
                },
                {
                    titleAttr: 'Download as CSV',     
                    extend: 'csvHtml5',
                    className: 'custom-btn btn btn-primary',
                    text: '<i class="fa fa-file-text-o"></i>'
                },
                {
                    titleAttr: 'Print',     
                    extend: 'print',
                    className: 'custom-btn btn btn-warning',
                    text: '<i class="fa fa-print"></i>'
                }
            ]
        });
        {{-- ============ --}}
        $(document).on('click', '.action_delete_btn', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            var el = this;
            if(confirm('Are you sure, you want to delete this row.')){
                $.ajax({
                    url,
                    type: "get",                 
                    beforeSend:function(res){
                        $(el).attr('disabled', true);
                    },
                    success:function(res){
                        datatable.api().ajax.reload();
                        ToastMessage(res.status?"Success":"Error", res.message, res.status?'success':"error");
                    },
                    error:function(res){
                        ToastMessage("Error", 'Something went wrong please try again.', 'error');
                    },
                    complete:function(res){
                    }
                });
            }
        });
        {{-- ============ --}}
    });
</script>
@endpush
{{-- Scripts Section End --}}

