@extends('layouts.admin')
@section('title', 'addThread')
@section('content')
<div class="container">
    <div class="row py-4">
        <div class="col-md-3 order-1" id="sticky-sidebar">
            <div class="sticky-top">
                <div class="nav flex-column">
                    <p>talk about...?</p>
                    <a href="{{ action('ArtistController@makeCheckBox') }}" role="button" class="btn btn-primary">新規作成</a>
                    @foreach ($threadList as $thread)
                    <a href="/snowman/profile/{{ $thread->id }}" class="nav-link" style="color:black">{{ $thread->thread_name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-8 order-2" id="main">
            <!-- <div class="row"> -->
            <!-- <div class="col-md-12 mx-auto"> -->
            <div class="border">
                <h4 class="text-center">新規作成</h4>
                <br>
                <form action="{{ action('ArtistController@addThread') }}" method="post">
                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    {{ csrf_field() }}
                    <div class="form-group col-md-12">
                        <label>スレッド名</label>
                        <textarea class="form-control" name="thread_name">{{ old('thread_name') }}</textarea>
                        <br>
                        <label for="chk01" class="col-form-label">誰についての話題ですか？</label>
                        <div class="col-md-12">
                            @foreach($chkDatas as $ckey => $cval)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chk01" name="talkAbout" value="{{$cval}}" @if(empty(old()) and $chkChecked[$ckey]=='checked' ) checked="checked" @elseif($ckey==old($ckey))) checked="checked" @endif>
                                <label class="form-check-label" for="{{$ckey}}">{{$cval}}</label>
                            </div>
                            @endforeach
                        </div>
                        <br>
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="作成">
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