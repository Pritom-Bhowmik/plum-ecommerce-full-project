@extends('web.app')


@section('content')

<section id="page-header" class="about-header" style="background-image: url('{{asset('frontend/img/backgrounds/'.$contact_page->thumbnail)}}');">
      
    <h2>{{ $contact_page->page_title }}</h2>
    
    <p> {{ $contact_page->page_description }} </p>
    

  </section>
  
  <section id="contact-details" class="section-p1">
    <div class="details">
      <span> Get In Touch</span>
      <h2> Visit one of our locations or contact us today</h2>
      <h3>Head Office</h3>
      <div>
        <li>
          <i class="fas fa-map"></i>
            <p> {!!$setting->address!!}</p>
        </li>
        <li>
          <i class="fas fa-envelope"></i>
            <p> {!!$setting->email!!}</p>
        </li>
        <li>
          <i class="fas fa-phone-alt"></i>
            <p> {!!$setting->phone!!}</p>
        </li>
        <!--<li>-->
        <!--  <i class="fas fa-clock"></i>-->
        <!--    <p> Monday to Sunday: 9:00am to 17:00pm </p>-->
        <!--</li>-->
      </div>
    </div>
    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2429.7776304055833!2d-1.8853602224378518!3d52.483161838955155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870bc82e376f387%3A0x3ad90a95857313db!2s5%20Cardigan%20St%2C%20Birmingham%20B4%207RJ!5e0!3m2!1sen!2suk!4v1688596854082!5m2!1sen!2suk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>
  </section>

  <section id="form-details">
      
      
    <form method="post" action="{{route('web.contactSubmit')}}">
          @if(\Session::has('success'))
            <div style="padding: 14px 12px 10px;background: #c8ffd6;display: block;width: 100%;border-radius: 5px;font-size: 14px;font-weight: 600;margin-bottom: 15px;">
                {{\Session::get('success')}}
            </div>
          @endif
        @csrf
      <span> Leave A Message</span>
      <h2> We Love To Hear From You</h2>
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="text" name="email" placeholder="E-Mail" required>
      <input type="text" name="subject" placeholder="Subject" required>
      <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message" required></textarea>
      <button class="normal" type="submit"> Submit</button>



    </form>
    <div class="people">
      <div>
        <img src="{{asset('frontend/images/people/p1.jpeg')}}" alt="">
        <p>
          Khethiwe Betts
          <span>
            Chief Executive Officer <br>
            Phone: * 0121 575976<br>
            Email: Khethiwe@plum.com
          </span>
        </p>
      </div>
    
      <div>
        <img src="{{asset('frontend/images/people/p2.jpeg')}}" alt="">
        <p>
          Isaac Akibo
          <span>
            Sales Director <br>
            Phone: * 0121 575978<br>
            Email: Isaac@plum.com
          </span>
        </p>
      </div>
    
      <div>
        <img src="{{asset('frontend/images/people/p3.jpeg')}}" alt="">
        <p>
          Katie Krate
          <span>
            Senior Marketing Manager <br>
            Phone: * 0121 575975<br>
            Email: Katie@plum.com
          </span>
        </p>
      </div>
    </div>
    

  </section>


@endsection