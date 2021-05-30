@extends('layouts.admin')
@section('title', 'addThread')
@section('content')
<div class="container">
  <div class="row py-4">
    <div class="col-md-3 order-1" id="sticky-sidebar">
      <div class="sticky-top">
        <div class="nav flex-column">
          <h4>talk about...?</h4>
          <a href="{{ action('ArtistController@makeCheckBox') }}" role="button" class="btn" style="background-color: #e5c4bb">新規作成</a>
          @foreach ($threadList as $thread)
          <a href="/snowman/talk/{{ $thread->id()->value() }}" class="nav-link" style="color:black">{{ $thread->name()->value() }}</a>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-md-8 order-2" id="main">
      <!-- <div class="row"> -->
      <!-- <div class="col-md-12 mx-auto"> -->
      <div class="border">
        <h4 class="text-center">スレッド新規作成</h4>
        <br>
        <form action="{{ action('ArtistController@addThread') }}" method="post">
          <div class="form-group col-md-12">
            {{ csrf_field() }}
            <label>スレッド名</label>
            <textarea class="form-control" name="thread_name">{{ old('thread_name') }}</textarea>
            @if($errors->has('thread_name')) <span class="text-danger">{{ $errors->first('thread_name') }}</span> @endif
            <br>
            <label for="chk01" class="col-form-label">誰についての話題ですか？</label>
            <div class="col-md-12">
              @foreach($memberList as $member)
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="chk01" name="artist_id[]" value="{{ $member->id }}">
                <label class="form-check-label" for="chk01">{{ $member->name }}</label>
              </div>
              @endforeach
            </div>
            @if($errors->has('artist_id')) <span class="text-danger">{{ $errors->first('artist_id') }}</span> @endif
            <br>
            {{ csrf_field() }}
            <div class="text-right">
              <button class="btn" style="background-color:#e5c4bb">\\ 作成 //</button>
            </div>
          </div>
        </form>
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