@extends('layouts.admin')
@section('title', 'must go')
@section('content')
<div class="container">
  <div class="col-md-12 mx-auto">
    <div class="row">
      <div class="col-md-12">
        <h4>必見スポット</h4>
        <h2>豊川稲荷神社</h2>
        <p>Snow Man「D.D.」大ヒット御礼参り＆おみくじ 回で行った場所</p>
      </div>
      <div class="col-md-5">
        <div id="map" style="height:300px;width:350px;"> //追加
        </div>
        <script src="{{ asset('/js/result.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyDyysVTNODopcyZMfF79MSkbBBCKttEYxU&callback=initMap" async defer>
        </script>
      </div>
      <div class="col-md-7">
        <iframe width="350" height="315" src="https://www.youtube.com/embed/CntSNOGRd0Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
    <p>・・・順次追加予定・・・</p>
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