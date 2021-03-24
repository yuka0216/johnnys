@extends('layouts.admin')
@section('title', 'Snow Man')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div id="example-2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="{{ asset('image/' . 'top.jpg') }}" alt="First slide" style="width:100%" style="height:auto">
                        </div>
                        <div class="carousel-item">
                        <img src="{{ asset('image/' . 'top3.jpg') }}" alt="Second slide" style="width:100%" style="height:auto">
                        </div>
                        <div class="carousel-item">
                        <img src="{{ asset('image/' . 'soresuno3.jpg') }}" alt="Third slide" style="width:100%" style="height:auto">
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
                    <a href="http://127.0.0.1:8080/snowman/profile" class="btn btn-secondary col-md-4">PROFILE</a>
                    <a href="http://127.0.0.1:8080/snowman/checkit" class="btn btn-secondary col-md-4">CHECK IT</a>
                    <a href="http://127.0.0.1:8080/snowman/mustgo" class="btn btn-secondary col-md-4">MUST GO</a>
                    <a href="http://127.0.0.1:8080/snowman/aaa" class="btn btn-secondary col-md-4">AAA</a>
                </div>
                <div class="col" style="padding-top:20px">
                    <h2 class="text-center">-- NEWS --</h2>
                    <ul>
                        <li class="list-unstyled">2021/03/03 デビューライブDVD&Bluelay発売</li>
                        <li class="list-unstyled">2021/03/05 2021年カレンダー発売</li>
                        <li class="list-unstyled">2021/04/01 それSnowManにやらせてください 地上波放送開始！</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('johnnys')
https://www.johnnys-net.jp/page?id=artistTop&artist=43
@endsection
@section('record')
https://avex.jp/snowman/
@endsection
@section('twitter')
https://twitter.com/sore_snowman
@endsection
@section('instagram')
https://www.instagram.com/j_snowman_weibo/?hl=ja
@endsection
@section('weibo')
https://weibo.com/SnowManofficial?is_all=1
@endsection
@section('youtube')
https://www.youtube.com/channel/UCuFPaemAaMR8R5cHzjy23dQ
@endsection