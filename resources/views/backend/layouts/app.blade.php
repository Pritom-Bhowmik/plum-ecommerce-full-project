@include('backend.layouts.inc.head')
    
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            @include('backend.layouts.header')
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            @include('backend.layouts.sidebar')
            <!-- Left Sidebar End --> 


            

            @yield('content')


            

        </div>
        <!-- END wrapper -->

    
@include('backend.layouts.inc.footer')