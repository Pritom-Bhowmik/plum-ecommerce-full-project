@extends('web.app')


@section('content')

<section id="page-header" class="about-header" style="background-image: url('{{asset('frontend/img/backgrounds/'.$about_page->thumbnail)}}');">
      
    <h2>{{ $about_page->page_title }}</h2>
    
    <p> {{ $about_page->page_description }} </p>
    

  </section>
  
  <section id="about-head" class="section-p1">
    <img src="{{asset('/frontend/img/about/'.$about->thumbnail)}}" alt="">
    <div>
      <h2>{!! $about->title !!}</h2>
      <p>{!! $about->content !!}</p>

          <abbr title="">Join us in creating a greener fashion future.</abbr>
          <br><br>

          <marquee bgcolor="#ccc" loop="1" scrollermount="5" width="100%"> Create your own look</marquee>
    </div>
</section>

  <section id="about-app" class="section-p1">
    <h1> Download Our <a href="#">App</a> </h1>
    <div class="video">
      <video autoplay muted loop src="{{asset('/frontend/img/about/'.$about->video)}}"></video>
    </div>
  </section>


@endsection