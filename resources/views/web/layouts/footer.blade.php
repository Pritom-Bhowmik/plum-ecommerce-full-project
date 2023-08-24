<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
      <h4> Sign Up For Newsletters</h4>
      <p>Be the first to get view our latest collections and <span>special offers</span> 
      </p>
      <form action="{{ route('web.newsletter') }}" method="POST">
      @csrf
          <div class="form">
            <input type="email" name="email" placeholder="Your email address">
            <button class="normal"> Sign Up</button>
          </div>
      </form>

  </section>
  
  <footer class="section-p1">
    <div class="col">
      <img class="logo" src="{{asset('frontend/images/log.png')}}" alt="">
      <h4>Contact</h4>
      <p>{!!$setting->address!!}</p>
      <div class="follow">
        <h4> Follow us</h4>
        <div class="icon">
          <i class="fab fa-facebook-f"></i>
          <i class="fab fa-twitter"></i>
          <i class="fab fa-instagram"></i>
          <i class="fab fa-pinterest-p"></i>
          <i class="fab fa-youtube"></i>
        </div>
      </div>
    </div>
    <div class="col">
      <h4> About</h4>
      <a href="{{ route('web.about') }}"> About us</a>
      <a href="#"> Delivery Information</a>
      <a href="#"> Privacy Policy</a>
      <a href="#"> Terms and Conditions</a>
      <a href="{{ route('web.contact') }}"> Contact Us</a>
    </div>
    <div class="col">
      <h4> My Account</h4>
      <a href="#"> Sign In</a>
      <a href="#"> View Cart</a>
      <a href="#"> My wishlist</a>
      <a href="#"> Track My Order</a>
      <a href="#"> Help</a>
    </div>
    <div class="col install">
      <h4> Install App</h4>
      <p> From App Store or Google Play</p>
      <div class="row">
        <img src="{{asset('frontend/images/appstore.png')}}" alt="">
        <img src="{{asset('frontend/images/googleplay.png')}}" alt="">
    </div>
      <p> Secure Payment</p>
      <img src="{{asset('frontend/images/payment.png')}}" alt="">
    </div>
    <div class="copyright">
        <p>© {!!$setting->copy_right!!} </p>
    </div>

  </footer>


  

  @include('web.inc.scripts')

  </body>


</body>
</html>