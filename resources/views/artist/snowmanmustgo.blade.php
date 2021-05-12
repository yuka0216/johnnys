@extends('layouts.admin')
@section('title', 'must go')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9 mx-auto">
      <h2>豊川稲荷神社</h2>
      <div id="map" style="height:300px;width:350px;"> //追加
      </div>
      <script src="{{ asset('/js/result.js') }}"></script>
      <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyDyysVTNODopcyZMfF79MSkbBBCKttEYxU&callback=initMap" async defer>
      </script>
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