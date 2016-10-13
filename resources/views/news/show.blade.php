@extends('template')
@section('content')
 <header>
  <div class="row">
   <div class="col s12 m12 l12">
    <h1>{{$new->title}}</h1>
   </div>
  </div>
 </header>
 <section id="images">
  <div class="row">
   <div class="col s12 m6 l6">
    <img class="materialboxed" height="325" src="{{asset('storage/images/news/' . $new->uri . '/image1.png')}}">
   </div>
   {{--<div class="col m1 l1">--}}
    {{--<img class="materialboxed" height="100" src="{{asset('storage/images/news/' . $new->uri . '/image1.png')}}">--}}
    {{--<img class="materialboxed" height="100" src="{{asset('storage/images/news/' . $new->uri . '/image2.png')}}">--}}
    {{--<img class="materialboxed" height="100" src="{{asset('storage/images/news/' . $new->uri . '/image3.png')}}">--}}
    {{--<img class="materialboxed" height="100" src="{{asset('storage/images/news/' . $new->uri . '/image4.png')}}">--}}

   {{--</div>--}}
   {{--<div class="col m1 l1">--}}
    {{--<img class="materialboxed" height="100" src="{{asset('storage/images/news/' . $new->uri . '/image5.png')}}">--}}
    {{--<img class="materialboxed" height="100" src="{{asset('storage/images/news/' . $new->uri . '/image6.png')}}">--}}
    {{--<img class="materialboxed" height="100" src="{{asset('storage/images/news/' . $new->uri . '/image7.png')}}">--}}
    {{--<img class="materialboxed" height="100" src="{{asset('storage/images/news/' . $new->uri . '/image8.png')}}">--}}

   {{--</div>--}}
  </div>
 </section>

 <section id="textArea">
  <div class="row">
   <div class="col s12 m8 l8">
    <div class="text-justify">
     <?php
     echo($new->text)
     ?>
    </div>
   </div>
  </div>
 </section>
 <div class="divider"></div>

@stop