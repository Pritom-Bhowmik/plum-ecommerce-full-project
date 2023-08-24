@extends('backend.layouts.app')

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <form id="form" role="form" action="" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">General Settings</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
                            <li><a href="">All Logos</a></li>
                            <li class="active">General Settings</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <!-- Basic example -->
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">General Settings</h3></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Site Name:</label>
                                    <input type="text" class="form-control" name="site_name"  value="{{$setting->site_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Site Type:</label>
                                    <input type="text" class="form-control" name="site_type"  value="{{$setting->site_type}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Address:</label>
                                    <textarea type="text" class="form-control" name="address">{{$setting->address}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Copy Right:</label>
                                    <input type="text" class="form-control" name="copy_right" value="{{$setting->copy_right}}">
                                </div>                           
                                <div class="form-group">
                                    <label for="">Logo (78x79):</label>
                                    <input type="file" class="form-control" name="logo">
                                </div>                                    
                                <div class="form-group">
                                    <img id="logo" style="width:100px;" class="img-thumbnail" src="{{$setting->logo?asset('/storage/logo/'.$setting->logo):'https://via.placeholder.com/80x80'}}" alt="">
                                </div>                                    
                                <div class="form-group">
                                    <label for="">Favicon: (32x32)</label>
                                    <input type="file" class="form-control" name="favicon">
                                </div>                                    
                                <div class="form-group">
                                    <img id="favicon"  style="width:60px;" class="img-thumbnail" src="{{$setting->favicon?asset('/storage/logo/'.$setting->favicon):'https://via.placeholder.com/60x60'}}" alt="">
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
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Social Link</h3></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="">Google Map Lat,Long:</label>
                                    <input type="text" class="form-control" name="map_latlong" value="{{$setting->map_latlong}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <input type="text" class="form-control" name="email" value="{{$setting->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone:</label>
                                    <input type="text" class="form-control" name="phone"  value="{{$setting->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Facebook:</label>
                                    <input type="text" class="form-control" name="facebook" value="{{$setting->facebook}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Twitter:</label>
                                    <input type="text" class="form-control" name="twitter"  value="{{$setting->twitter}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Instagram:</label>
                                    <input id="tags" type="text" class="form-control" name="instagram"  value="{{$setting->instagram}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Linkedin:</label>
                                    <input type="text" class="form-control" name="linkedin" value="{{$setting->instagram}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Google Script:</label>
                                    <textarea type="text" class="form-control" name="google_script" rows="6">{{$setting->google_script}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Background Color: ( #18130C )</label>
                                    <input type="color" class="form-control" name="background_color" value="{{$setting->background_color}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Text Color: ( #A8A7A5 )</label>
                                    <input type="color" class="form-control" name="text_color" value="{{$setting->text_color}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Icon Color: ( #B88768 )</label>
                                    <input type="color" class="form-control" name="icon_color" value="{{$setting->icon_color}}">
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="default_color">
                                        Default Color
                                    </label>
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

CKEDITOR.replace('address');

$('#form').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:"{{route('backend.settings.update')}}",
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

