@stack('scripts_top')

<script>
    var resizefunc = [];
</script>

<script src="{{asset('/backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/backend/js/waves.js')}}"></script>
<script src="{{asset('/backend/js/wow.min.js')}}"></script>
<script src="{{asset('/backend/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{asset('/backend/js/jquery.scrollTo.min.js')}}"></script>

<!-- sweet alerts -->
<script src="{{asset('/backend/assets/sweet-alert/sweet-alert.min.js')}}"></script>
<script src="{{asset('/backend/assets/sweet-alert/sweet-alert.init.js')}}"></script>

<!-- CUSTOM JS -->
<script src="{{asset('/backend/js/jquery.app.js')}}"></script>


<script>

function ToastMessage(title="Success", message="Success", type="success"){
    $.Toast(title, message, type, {
        appendTo:"body",
        stack:false,
        position_class:"toast-top-right",
        fullscreen:false,
        width: 300,
        spacing: 20,
        timeout: 5000,
        has_close_btn:true,
        has_icon:true,
        sticky:false,
        border_radius: 3,
        has_progress:true,
        rtl:false
    })
}

</script>






@stack('scripts')

<script src="{{asset('/backend/assets/toast/toast.script.js')}}"></script>


<script type="text/javascript">

{{-- Show Toast Message --}}
@if(session()->has('success'))
    $.Toast("Success 👌","{{session()->get('success')}}", "success", {
        appendTo:"body",
        stack:false,
        position_class:"toast-top-right",
        fullscreen:false,
        width: 300,
        spacing: 20,
        timeout: 5000,
        has_close_btn:true,
        has_icon:true,
        sticky:false,
        border_radius: 3,
        has_progress:true,
        rtl:false
    }
);
@endif

@if(session()->has('error'))
    $.Toast("Error ⚠️","{{session()->get('error')}}", "error", {
        appendTo:"body",
        stack:false,
        position_class:"toast-top-right",
        fullscreen:false,
        width: 300,
        spacing: 20,
        timeout: 5000,
        has_close_btn:true,
        has_icon:true,
        sticky:false,
        border_radius: 3,
        has_progress:true,
        rtl:false
    }
);
@endif

</script>
