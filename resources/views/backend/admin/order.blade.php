@extends('backend.layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">All Orders</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                        <li class="active">All Orders</li>
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
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Phone</th>
                                        <th>User Address</th>
                                        <th>Product Title</th>
                                        <th>Product Price</th>
                                        <th>Product Quentity</th>
                                        <th>Product Image</th>
                                        <th>Product Total</th>
                                        <th>Product Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order as $key => $data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->user_name }}</td>
                                        <td>{{ $data->user_email }}</td>
                                        <td>{{ $data->user_phone }}</td>
                                        <td>{{ $data->user_address }}</td>
                                        <td>{{ $data->product_title }}</td>
                                        <td>£{{ $data->product_price }}</td>
                                        <td>{{ $data->product_quentity }}</td>
                                        <td>
                                            <img src="{{asset('frontend/img/product/'.$data->product_image)}}" height="80">
                                        </td>
                                        <td>£
                                            @php
                                                $qty = $data->product_quentity;
                                                $prc = $data->product_price;
                                                
                                                echo $qty*$prc;
                                            @endphp
                                        </td>
                                        <td>{{ $data->created_at->format('d M Y') }}</td>
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

