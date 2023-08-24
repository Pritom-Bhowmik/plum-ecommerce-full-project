
@extends('web.app')

@push('styles')
    
@endpush

@section('content')

<section id="hero" style="background-image: url('{{asset('frontend/img/backgrounds/'.$home_page->thumbnail)}}');">
    <h4>Summer collection</h4>
    <h2>{{ $home_page->page_title }}</h2>
    <!--<h1> ALL Dresses!</h1>-->
    <p> {{ $home_page->page_description }} </p>
     <a href="{{ route('web.shop') }}"><button>Shop Now</button></a>

  </section>

  <section id="feature" class="section-p1">
    @foreach($home_category as $row)
    <div class="fe-box">
      <img src="{{asset('frontend/img/category/'.$row->image)}}" alt="">
      <h6> {{ $row->name }}</h6>
    </div>
    @endforeach
  </section>

  <section id="product1" class="section-p1">
    <h2> New</h2>
    <p>Summer collection</p>
    <div class="pro-container">
        @foreach(\App\Models\Service::orderBy('id', 'desc')->get()->take(4) as $row)
        <div class="pro">
            <a href="{{ route('web.shop.details', ['id' => $row->id]) }}">
                <img src="{{asset('frontend/img/product/'.$row->image)}}" alt="">
                <div class="des">
                    <span> {{ $row->category }} </span>
                    <h5>{{ $row->title }}</h5>
                    <div class="star">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <h4> £{{ $row->price }}</h4>
                </div>
                <a href="{{ route('cart.add', $row->id) }}"><i class="fa fa-shopping-cart"></i></a>
            </a>
        </div>
        @endforeach
    </div>

  </section>

<section id="banner" class="section-m1">
    <h4>Plum Membership</h4>
    <h2>UNLIMITED FREE NEXT DAY DELIVERY AND FREE RETURNS FOR ONLY<span>£15.99</span></h2>
  <button class="normal"> Explore More</button>
  </section>

  <section id="product1" class="section-p1">
    <h2> Dresses</h2>
    <p>Summer collection</p>
    <div class="pro-container">
        @foreach(\App\Models\Service::where('category', 'Dresses')->get()->take(8) as $row)
        <div class="pro">
            <a href="{{ route('web.shop.details', ['id' => $row->id]) }}">
                <img src="{{asset('frontend/img/product/'.$row->image)}}" alt="">
                <div class="des">
                    <span> {{ $row->category }} </span>
                    <h5>{{ $row->title }}</h5>
                    <div class="star">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <h4> £{{ $row->price }}</h4>
                </div>
                <a href="{{ route('cart.add', $row->id) }}"><i class="fa fa-shopping-cart"></i></a>
            </a>
        </div>
        @endforeach
    </div>

  </section>

  <section id="sm-banner" class="section-p1">
    <div class="banner-box">
      <h4>AMAZING discounts</h4>
      <h2> Buy now for 30% off all dresses</h2>
      <span> Featuring this summer's HOTTEST looks</span>
      <button class="white"> Explore Deals</button>
    </div>
    <div class="banner-box banner-box2">
      <h4>Style Inspo</h4>
      <h2> Summer trends</h2>
      <span> Solve your summer style dilemas</span>
      <button class="white"> Explore trends</button>
    </div>
  </section>

  <section id="banner3">
    <div class="banner-box">
      <h2>Season Sale</h2>
      <h3>30% Off</h3>
    </div>
    <div class="banner-box banner-box2">
      <h2>Dresses</h2>
      <h3>Summer Ready</h3>
    </div>
    <div class="banner-box banner-box3">
      <h2>Newe Collection</h2>
      <h3>Summer '23</h3>
    </div>
  </section>

@endsection
  
@push('scripts')
    
@endpush