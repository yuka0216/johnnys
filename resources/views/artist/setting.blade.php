@extends('layouts.admin')
@section('title', 'setting')
@section('content')
<div class="container">
  <div class="row py-4">
    <div class="col-md-6 mx-auto" id="main">
      <h4 class="text-center">profile登録</h4>
      <form action="/setting" method="post" enctype="multipart/form-data">
        @if (!empty($profile))
        <label>名前</label>
        <input type="text" class="form-control" name="name" value="{{ $profile->name()->value() }}">
        <label>担当</label>
        <input type="text" class="form-control" name="favorite" value="{{ $profile->favorite()->value() }}">
        <label>自己紹介</label>
        <textarea type="text" class="form-control" name="free_writing" rows="4" cols="100">{{ $profile->freeWriting()->value() }}</textarea>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon">プロフィール画像</span>
          </div>
          <div class="custom-file col-5">
            <input type="file" class="custom-file-input" id="inputGroupFile" name="profile_image_path" accept=".png,.jpg,.jpeg,image/png,image/jpg" aria-describedby="inputGroupFileAddon">
            <label class="custom-file-label" for="inputGroupFile" data-browse="参照">ファイルを選択</label>
          </div>
        </div>
        @else
        <label>名前</label>
        <input type="text" class="form-control" name="name" placeholder="名前">
        <label>担当</label>
        <input type="text" class="form-control" name="favorite">
        <label>自己紹介</label>
        <textarea type="text" class="form-control" name="free_writing" rows="4" cols="100"></textarea>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon">プロフィール画像</span>
          </div>
          <div class="custom-file col-5">
            <input type="file" class="custom-file-input" id="inputGroupFile" name="profile_image_path" accept=".png,.jpg,.jpeg,image/png,image/jpg" aria-describedby="inputGroupFileAddon">
            <label class="custom-file-label" for="inputGroupFile" data-browse="参照">画像選択</label>
          </div>
        </div>
        @endif
        {{ csrf_field() }}
        <div class="text-right">
          <button class="btn col-md-2" style="background-color:#e5c4bb">登録</button>
        </div>
        <br>

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