@extends('web.app')


@section('content')

<section id="page-header">
      
    <h2 style="color:black;"> Cart</h2>
    
    <p style="color:black;">Thank you for sopping with us </p>
    

    </section>
    <section id="cart" class="section-p1">
      <table width="100%">
        <thead>
          <tr>
            <td> Remove</td>
            <td> Images</td>
            <td> Product</td>
            <td> Price</td>
            <td> Quantity</td>
            <td> Subtotal</td>
          </tr>
        </thead>
        <tbody>
            @php
                $total_price = 0;
            @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    <tr rowId="{{ $id }}">
                        <td><a href="#" class="delete-product"><i class="far fa-times-circle"></i></a></td>
                        <td> <img src="{{asset('frontend/img/product/'.$details['image'])}}" alt=""></td>
                        <td> {{ $details['title'] }}</td>
                        <td id="singleProductPrice"> £{{ $details['price'] }} 
                            <input type="hidden" value="{{ $details['price'] }}" class="price_{{ $id }}">
                        </td>
                        
                        <td> <input type="number" class="quentity" id="edit-cart-info" data-product_id="{{ $id }}" value="{{ $details['quantity'] }}"></td>
                        <td> £ <span class="quentity_into_price quentity_into_price_{{ $id }}">{{ $details['price'] * $details['quantity'] }}</span></td>
                    </tr>
                    @php
                    $total_price = ($total_price+($details['price'] * $details['quantity']));
                    @endphp
                @endforeach
            @else
                <tr>
                    <td colspan="6">
                         <p>No product available here</p>
                    </td>
                </tr>
            @endif
            
        </tbody>
      </table>
    </section>
    <section id="cart-add" class="section-p1">
      <div id="coupon">
        <h3> Give Your Details</h3>
        <div>
          <input type="text" id="uName" required placeholder="Enter Name">
        </div>
        <div>
          <input type="email" id="uEmail" required placeholder="Enter Email">
        </div>
        <div>
          <input type="number" id="uPhone" required placeholder="Enter Phone">
        </div>
        <div>
          <input type="text" id="uAddress" required placeholder="Enter Address">
        </div>
      </div>
      <div id="subtotal">
        <h3>Cart Total</h3>
        <table>
          <tr>
                <td>Subtotal</td>
                <td>£
                    @if(session('cart'))
                        {{ $total_price }}
                    @else
                        NAN
                    @endif
                </td>
          </tr>
          <tr>
            <td>Shipping</td>
            <td> Free</td>
          </tr>
          <tr>
            <td><strong>Total</strong></td>
            <td>
                <strong id="total_price"> £
                    @if(session('cart'))
                        {{ $total_price }}
                    @else
                        NAN
                    @endif
                </strong>
            </td>
        </table>
        <button class="normal" id="checkOut">Proceed to checkout </button>
      </div>
    </section>
  </section>

@endsection
  
