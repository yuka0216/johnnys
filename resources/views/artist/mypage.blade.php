@extends('layouts.admin')
@section('title', 'mypage')
@section('content')
<div class="row">
    <div class="col-md-9 mx-auto">
        <h2>コメント履歴</h2>
        <form action="{{ action('ArtistController@commentIndex') }}" method="get">
            @if ($myComments != NULL)
                @foreach ($myComments as $myComment)
                    <div class="card">
                        <div class="card-body">
                            {{ $myComment->comment }}<br>
                            @if ($myComment->image_path)
                            <img src="{{ asset('storage/image/' . $myComment->image_path) }}" style="width: 100px"><br>
                            @endif
                            <a href="/snowman/profile/iwamototalk">{{ "@" . $myComment->commented_at . "ページ" }}</a><br>
                            {{ $myComment->created_at }}
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