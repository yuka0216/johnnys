@extends('layouts.admin')
@section('title', 'mypage')
@section('content')
<div class="row">
  <div class="col-md-9 mx-auto">
    <h2>コメント履歴</h2>
    <form action="{{ action('ArtistController@myPostIndex') }}" method="get">
      @if ($myPosts != NULL)
      @foreach ($myPosts as $myPost)
      <div class="card">
        <div class="card-body">
          {{ $myPost->comment }}<br>
          @if ($myPost->image_path)
          <img src="{{ asset('storage/image/' . $myPost->image_path) }}" style="width: 100px"><br>
          @endif
          <a href="{{ asset('/snowman/profile/' . $myPost->thread->id) }}">{{"@" . $myPost->thread->thread_name}}</a><br>
          {{ $myPost->created_at }}
        </div>
      </div>
      @endforeach
      @endif
    </form>
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