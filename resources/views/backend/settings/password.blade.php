@extends('backend.layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <form id="form" role="form" action="{{route('backend.settings.passwordSubmit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Change Password</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                            <li class="active">Change Password</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <!-- Basic example -->
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Password</h3></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Old Password:</label>
                                    <input type="password" class="form-control" name="old_password">
                                </div>
                                <div class="form-group">
                                    <label for="">New Password:</label>
                                    <input type="password" class="form-control" name="new_password"  >
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password:</label>
                                    <input type="password" class="form-control" name="confirm_password">
                                </div>
                                <div>
                                    <button type="submit" class="spin btn btn-primary waves-effect waves-light">
                                        <svg class="spinner" viewBox="0 0 50 50">
                                            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
                                        </svg>
                                        Update
                                    </button>
                                </div>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div>
                </div>
            </form>
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
<link rel="stylesheet" href="{{asset('backend/assets/tags/style.css')}}">
<style>
.acc{
    margin-bottom:12px;
}
.acc .panel-heading{
    cursor:pointer;
    border-top-left-radius:5px;
    border-top-right-radius:5px;
}
.acc .acc-toggler.active{
    background:#317eeb;
    color:#ffffff;
}
.acc-body{
    display:none;
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
<script src="{{asset('backend/assets/tags/script.js')}}"></script>

<script>
$(document).on('keypress', '.inputTags-field', function(e){
    if (e.keyCode === 13) {
        e.preventDefault();
    }
});
var tags = $('#tags').inputTags({
    tags:@php echo json_encode(explode(',', $setting->meta_keyword)); @endphp,
});


$('#form').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:"{{route('backend.settings.passwordSubmit')}}",
        type: "POST",
        data:new FormData(this),
        cache: false,
        contentType: false,
        processData: false,                        
        beforeSend:function(res){
            $('#form').find('button').attr('disabled', true);
        },
        success:function(res){
            console.log(res);
            ToastMessage(res.status?"Success":"Error", res.message, res.status?'success':"error");
            $('.error-message').remove();
            if(!res.status && Object.keys(res.errors).length > 0){
                Object.keys(res.errors).forEach(function(key, index){
                    var targetEl = $('#form').find('input[name="'+key+'"]')[0] || $('#form').find('select[name="'+key+'"]')[0] || $('#form').find('textarea[name="'+key+'"]')[0];
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
            $('#form').find('button').removeAttr('disabled', true);
        }
    });
    
});

$('input[type="file"]').change(function(){
    if(this.files.length > 0){
        var file = this.files[0];
        $("#"+this.name).attr('src', URL.createObjectURL(file));
    }
});



</script>
@endpush
{{-- Scripts Section End --}}

