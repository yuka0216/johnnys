@extends('layouts.admin')
@section('title', 'profile')
@section('content')
<div class="container">
  <div class="row py-4">
    <div class="col-md-8 mx-auto" id="main">
      <div class="border">
        <form action="{{ action('ArtistController@postUpdate',['id' => $post->id()->value()]) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group col-md-12">
            <label>コメント編集</label>
            @if($errors->has('comment')) <span class="text-danger">{{ $errors->first('comment') }}</span> @endif
            <textarea class="form-control" name="comment" rows="5">{{ $post->comment()->value() }}</textarea>
            @if (!empty($post->images()))
            投稿した画像:
            @foreach ($post->images() as $image)
            <img src="{{ asset('/images/' . $image->path()->value()) }}" style="width: 100px">
            @endforeach
            @endif
            <br>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
              </label>
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon">画像変更</span>
              </div>
              <div class="custom-file col-5">
                <input type="file" class="custom-file-input" id="inputGroupFile" name="image" accept=".png,.jpg,.jpeg,image/png,image/jpg" aria-describedby="inputGroupFileAddon">
                <label class="custom-file-label" for="inputGroupFile" data-browse="参照">ファイルを選択</label>
              </div>
            </div>
            <div class="text-right">
              <button class="btn" style="background-color:#e5c4bb">\\ 更新 //</button>
            </div>
            <br>
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