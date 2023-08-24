<section id="header">
    <a href="{{ url('/') }}"><img src="{{asset('/storage/logo/'.$setting->logo)}}" class="logo"alt=""></a>
    <div>
      <ul id="navbar">
        <li> <a class="active" href="{{ url('/') }}">Home</a></li>
        <li> <a href="{{route('web.shop')}}">Shop</a></li>
        <li> <a href="{{route('web.blog')}}">Blog</a></li>
        <li> <a href="{{route('web.about')}}">About</a></li>
        <li> <a href="{{route('web.contact')}}">Contact</a></li>
        <li id="lg-bag"><a href="{{route('web.cart')}}"><i class="fa fa-bag-shopping"></i><span style="color:#088178; font-size: 22px;">
            @if(session('cart'))
                @php $count = 0; @endphp
                @foreach(session('cart') as $details)
                    @php $count++; @endphp
                @endforeach
                @php echo $count; @endphp
            @else
                0
            @endif
        </span></a></li>
        <a href="#" id="close"><i class="fa fa-times"></i></a>
      </ul>
    </div>
    <div id="mobile">
      <a href="{{route('web.cart')}}"><i class="fa-regular fa-bag-shopping"></i></a>
      <i id="bar" class="fa fa-outdent"></i>
    </div>
</section>