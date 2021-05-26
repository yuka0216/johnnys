@extends('layouts.admin')
@section('title', 'profile')
@section('content')
<div class="container">
  <div class="row py-4">
    <div class="col-md-3 order-2" id="sticky-sidebar">
      <div class="sticky-top">
        <div class="nav flex-column">
          <h4>talk about...?</h4>
          <a href="{{ action('ArtistController@makeCheckBox') }}" role="button" class="btn" style="background-color: #e5c4bb">新規作成</a>
          @foreach ($threadList as $thread)
          <a href="/snowman/profile/{{ $thread->id()->value() }}" class="nav-link" style="color:black">#{{ $thread->name()->value() }}</a>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-md-8 order-1" id="main">
      <div class="border">
        <h4 class="text-center">talk board</h4>
        <h2 class="text-center">-{{ $thread_name->value() }}-</h2>
        <br>
        <form action="{{ action('ArtistController@post', ['threadId' => $threadId]) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group col-md-12">
            <label>コメント</label>
            @if($errors->has('comment')) <span class="text-danger">{{ $errors->first('comment') }}</span> @endif
            <textarea class="form-control" name="comment" rows="5">{{ old('comment')}}</textarea>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon">画像選択</span>
              </div>
              <div class="custom-file col-5">
                <input type="file" class="custom-file-input" id="inputGroupFile" name="image" accept=".png,.jpg,.jpeg,image/png,image/jpg" aria-describedby="inputGroupFileAddon">
                <label class="custom-file-label" for="inputGroupFile" data-browse="参照">ファイル</label>
              </div>
            </div>
            <div class="text-right">
              <button class="btn col-md-2" style="background-color:#e5c4bb">\\ 推す //</button>
            </div>
            <br>
        </form>
      </div>
    </div>
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><img src="{{ asset('/image/吹き出し.jpg') }}" width="40px" /></a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><img src="{{ asset('/image/カメラ.jpeg') }}" width="40px" /></a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <form action="{{ action('ArtistController@postIndex', ['threadId' => $threadId]) }}" method="get"></form>
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        @if (count($posts) > 0)
        @foreach($posts as $post)
        <table class="table">
          <tr>
            <td>
              <a href="{{ "/mypage/" . $post->user()->id()->value()  }}" style="color:#6f6152">
                <img @if ($post->user()->profile()->favorite()->value() == 2) class="rounded-full recommend-image-border"
                @else class="rounded-full default-image-border"
                @endif
                src="{{ asset('/images/' . $post->user()->profile()->imagePath()->value())}}" width="65" height="65" align="right">{{ $post->user()->profile()->name()->value() }}</a><br>
              {{ $post->comment()->value() }}<br>
              @if (!empty($post->images()))
              @foreach ($post->images() as $image)
              <img src="{{ asset('/images/' . $image->path()->value()) }}" style="width: 100px"><br>
              @endforeach
              @endif
              {{ $post->createdAt() }}
              @if ($post->user()->id()->value() == Auth::id())
              <div align="right">
                <a href="{{ action('ArtistController@postEdit', ['id' => $post->id()->value()]) }}" style="color:#6f6152">編集</a>
                <a href="{{ action('ArtistController@postDelete', ['id' => $post->id()->value()]) }}" style="color:#6f6152">削除</a>
              </div>
              @endif
            </td>
          </tr>
        </table>
        @endforeach
        @endif
      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="d-flex flex-wrap">
          @if (count($posts) > 0)
          @foreach($posts as $post)
          @if (!empty($post->images()))
          @foreach ($post->images() as $image)
          <div class="image w-25">
            <a href="{{'/images/' . $image->path()->value()}}" data-lightbox="group">
              <img src="{{ asset('/images/' . $image->path()->value()) }}">
            </a>
          </div>
          @endforeach
          @endif
          @endforeach
          @endif
        </div>
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