<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{route('backend.dashboard')}}" class="logo d-flex"><img style="flex-basis: fit-content;" width="35" class="mr-1"  src="{{asset('/storage/logo/'.$setting->logo)}}"> <span style="white-space: nowrap;width: 100%;overflow: hidden;
    text-overflow: ellipsis;">{{$setting->site_name}}</span></a>
        </div>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left">
                        <i class="fa fa-bars"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>
                <form class="navbar-form pull-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                    </div>
                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                </form>

                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="hidden-xs">
                        <a href="{{url('/')}}" target="_blank" class="waves-effect waves-light" aria-expanded="true">
                            <i class="md md-web"></i>
                        </a>
                    </li>
                    <li class="hidden-xs">
                        <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                    </li>
                    <li class="hidden-xs">
                        <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                            @if(auth()->user()->avatar)
                                <img src="{{asset('storage/profile/'.auth()->user()->avatar)}}" alt="" class="img-circle">
                            @else
                                <img src="https:via.placeholder.com/200x200" alt="" class="img-circle">
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('backend.users.edit', auth()->guard('web')->id())}}"><i class="md md-face-unlock"></i> Profile</a></li>
                            <li><a href="{{route('backend.settings.password')}}"><i class="md md-lock"></i> Change Password</a></li>
                            <li><a href="{{route('backend.settings.index')}}"><i class="md md-settings"></i> Settings</a></li>
                            <li><a onclick="return confirm('Are you sure you want to log out?');" href="{{route('backend.logout')}}"><i class="md md-settings-power"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>