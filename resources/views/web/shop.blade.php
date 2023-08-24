@extends('web.app')


@section('content')

<section id="page-header" style="background-image: url('{{asset('frontend/img/backgrounds/'.$shop_page->thumbnail)}}');">
      
    <h2>{{ $shop_page->page_title }}</h2>
    
    <p> {{ $shop_page->page_description }} </p>
    

  </section>

  <section id="product1" class="section-p1">
    
    <div class="pro-container">
        @foreach(\App\Models\Service::orderBy('id', 'asc')->get()->take(12) as $row)
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

  <!--<section id="pagination" class="section-p1">-->
  <!--  <a href="#">1</a>-->
  <!--  <a href="#">2</a>-->
  <!--  <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>-->
  <!--</section>-->

@endsection