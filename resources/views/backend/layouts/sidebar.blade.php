<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
            @if(auth()->user()->avatar)
                <img src="{{asset('storage/profile/'.auth()->user()->avatar)}}" alt="" class="thumb-md img-circle">
            @else
                <img src="https:via.placeholder.com/200x200" alt="" class="thumb-md img-circle">
            @endif
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{auth()->user()->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('backend.users.edit', auth()->guard('web')->id())}}"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                        <li><a href="{{route('backend.settings.password')}}"><i class="md md-lock"></i> Change Password</a></li>
                        <li><a href="{{route('backend.settings.index')}}"><i class="md md-settings"></i> Settings</a></li>
                        <li><a onclick="return confirm('Are you sure you want to log out?');" href="{{route('backend.logout')}}"><i class="md md-settings-power"></i> Logout</a></li>
                    </ul>
                </div>
                
                <p class="text-muted m-0">Administrator</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('backend.dashboard')}}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-group"></i><span> Admins </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('backend.users.create')}}">Add New</a></li>
                        <li><a href="{{route('backend.users.index')}}">All Admins</a></li>
                    </ul>
                </li>
                
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-bookmark"></i><span> Categories </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('backend.categories.create')}}">Add New</a></li>
                        <li><a href="{{route('backend.categories.index')}}">All Categories</a></li>
                    </ul>
                </li>
                
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-web"></i><span> Web Content </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('backend.content.pages.index')}}">Pages</a></li>
                        <li><a href="{{route('backend.content.about.index')}}">About Us</a></li>
                        <li><a href="{{route('backend.content.services.index')}}">Shop Products</a></li>
                        <li><a href="{{route('backend.blog.index')}}">Blogs</a></li>
                        <li><a href="{{route('backend.contact_index')}}">Contact</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="{{route('backend.users.newsletter')}}" class="waves-effect"><i class="md md-group"></i><span> Newsletter </span></a>
                </li>
                
                <li>
                    <a href="{{route('backend.users.orders')}}" class="waves-effect"><i class="md md-group"></i><span> Orders </span></a>
                </li>

                
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-image"></i><span> Settings </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('backend.settings.index')}}">General Settings</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="{{route('cache.clear')}}" class="waves-effect"><i class="md md-delete"></i><span> Cache Clear </span></a>
                </li>


            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>