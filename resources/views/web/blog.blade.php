@extends('web.app')


@section('content')

<section id="blog">
    @foreach(\App\Models\Blog::orderBy('id', 'desc')->get() as $row)
    <div class="blog-box">
      <div class="blog-img">
        <img src="{{asset('/frontend/img/blog/'.$row->thumbnail)}}" alt="">
        </div>
        <div class="blog details">
          <h4>{{$row->title}}</h4>
          <p>{{$row->description}}</p>
             <a href="#"> Continue Reading</a>
        </div>
        <h1> {{$row->created_at->format('d/m')}}</h1>
      </div> 
      @endforeach
  </section> 

  <!--<section id="pagination" class="section-p1">-->
  <!--  <a href="#">1</a>-->
  <!--  <a href="#">2</a>-->
  <!--  <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>-->
  <!--</section>-->

@endsection