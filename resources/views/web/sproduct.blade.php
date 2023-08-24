@extends('web.app')


@section('content')

<section id="prodetails" class="section-p1">
    <div class="single-pro-image">
      <img src="{{asset('frontend/img/product/'.$service->image)}}" width="100%" id="mainimg" alt="">
      <div class="small-image-group">
        <div class="small-image-col">
          <img src="{{asset('frontend/img/product/'.$service->image)}}" width="100%" class="small img" alt="">
        </div>
      </div>
    </div>

    <div class="single-pro-details">
      <h6>{{ $service->category }}</h6>
      <h4> {{ $service->title }}</h4>
      <h2> £{{ $service->price }} </h2>
      <a href="{{ route('cart.add', $service->id) }}"><button class="normal">Add To Cart</button></a>
      <h4>Product Details</h4>
      <span>{!! $service->description !!}</span>

    </div>
  </section>
  <section id="product1" class="section-p1">
    <h2> Featured Products</h2>
    <p>Summer collection</p>
    <div class="pro-container">
        @foreach(\App\Models\Service::orderBy('id', 'asc')->get()->take(4) as $row)
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

@endsection