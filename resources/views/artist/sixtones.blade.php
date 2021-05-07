@extends('layouts.admin')
@section('title', 'SixTONES')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9 mx-auto">
      <div id="example-2" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('image/' . 'sixtones.jpeg') }}" alt="First slide" style="width:100%" style="height:auto">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('image/' . 'topsixtones.jpg') }}" alt="Second slide" style="width:100%" style="height:auto">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('image/' . 'sixtonesjoa.jpg') }}" alt="Third slide" style="width:100%" style="height:auto">
          </div>
          <a class="carousel-control-prev" href="#example-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#example-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="col btn-group" style="padding:0px" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary col-md-4">PROFILE</button>
        <button type="button" class="btn btn-secondary col-md-3">CHECK IT</button>
        <button type="button" class="btn btn-secondary col-md-3">MUST GO</button>
        <button type="button" class="btn btn-secondary col-md-3">aaa</button>
      </div>
      <div class="col" style="padding-top:20px">
        <h2 class="text-center">-- NEWS --</h2>
        <ul>
          <li class="list-unstyled">2021/03/03</li>
          <li class="list-unstyled">2021/03/05</li>
          <li class="list-unstyled">2021/04/01</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection

<footer>
  <a class="btn btn-outline-light btn-floating m-1" href=@yield('instagram') role="button">
    <i class="fab fa-instagram"></i>
  </a>
</footer>

@section('johnnys')
https://www.johnnys-net.jp/page?id=artistTop&artist=42
@endsection
@section('record')
https://www.sixtones.jp/
@endsection
@section('twitter')
<!-- https://twitter.com/sore_snowman -->
@endsection
@section('instagram')
https://www.instagram.com/sixtones_official/?hl=ja
@endsection
@section('weibo')
<!-- https://weibo.com/SnowManofficial?is_all=1 -->
@endsection
@section('youtube')
https://www.youtube.com/channel/UCwjAKjycHHT1QzHrQN5Stww
@endsection