@stack('styles_top')

        <link href="{{asset('/backend/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{asset('/backend/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('/backend/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('/backend/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{asset('/backend/css/animate.css')}}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{asset('/backend/css/waves-effect.css')}}" rel="stylesheet">

        <!-- sweet alerts -->
        <link href="{{asset('/backend/assets/sweet-alert/sweet-alert.min.css')}}" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{asset('/backend/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/backend/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/backend/assets/toast/toast.style.min.css')}}" rel="stylesheet">

        <script src="{{asset('/backend/js/modernizr.min.js')}}"></script>

        <script src="{{asset('/backend/js/jquery.min.js')}}"></script>
<style>
a.spin,
button.spin{
        display:inline-flex;
        flex-direction:row;
        align-items: center;
}
.spin .spinner {
  -webkit-animation: rotate 2s linear infinite;
          animation: rotate 2s linear infinite;
    z-index: 2;
    width: 15px;
    height: 15px;
    margin-right: 5px;
    display:none;
}
.spin[disabled] .spinner{
        display:inline-block;
}
.spin .spinner .path {
  stroke: #ffffff;
  stroke-linecap: round;
  -webkit-animation: dash 1.5s ease-in-out infinite;
          animation: dash 1.5s ease-in-out infinite;
}
.between-next >*,
.content-between{
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.content-center{
    display:flex;
    justify-content:center;
    align-items:center;
}
.error-message{
    display:block;
    color:red;
    padding:5px 0px;
}
.note{
    display:block;
    color:orange;
    padding:5px 0px;
    font-size:12px;
}
@-webkit-keyframes rotate {
  100% {
    transform: rotate(360deg);
  }
}

@keyframes rotate {
  100% {
    transform: rotate(360deg);
  }
}
@-webkit-keyframes dash {
  0% {
    stroke-dasharray: 1, 150;
    stroke-dashoffset: 0;
  }
  50% {
    stroke-dasharray: 90, 150;
    stroke-dashoffset: -35;
  }
  100% {
    stroke-dasharray: 90, 150;
    stroke-dashoffset: -124;
  }
}
@keyframes dash {
  0% {
    stroke-dasharray: 1, 150;
    stroke-dashoffset: 0;
  }
  50% {
    stroke-dasharray: 90, 150;
    stroke-dashoffset: -35;
  }
  100% {
    stroke-dasharray: 90, 150;
    stroke-dashoffset: -124;
  }
}
.flex-column{
  display:flex;
  flex-direction:column;
}
.flex-column .error-message{
  order:3;
}
</style>

@stack('styles')

@stack('scripts_head')