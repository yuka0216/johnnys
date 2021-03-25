@extends('layouts.admin')
@section('title', 'profile')
@section('content')
<div class="row">
    <div class="col-md-9 mx-auto">
        <div class="border">
                <h4 class="text-center">talk board</h4>
                <h2 class="text-center">-HIKARU IWAMOTO-</h2>
                <br>
                <form action="{{ action('ArtistController@iwamotoCommentPost') }}" method="post">
                {{ csrf_field() }}
                    <div class="form-group col-md-12">
                        <label>コメント</label>
                        <textarea class="form-control" name="comment" rows="5">{{ old('comment')}}</textarea>
                        <div class="text-right">
                            <button class="btn btn-info col-md-2">\\ 推す //</button>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
            <form action="{{ action('ArtistController@iwamotoCommentIndex') }}" method="get">
            @if (count($iwamotoposts) > 0)
                @foreach($iwamotoposts as $iwamotopost)
                    <table class="table">
                        <tr><td>
                        {{ $iwamotopost->name }}<br>
                        {{ $iwamotopost->comment }}<br>
                        <br>
                        {{ $iwamotopost->created_at }}
                        </td></tr>
                    </table>
                @endforeach
            @else
            <center>-----まだ投稿はありません-----</center>
            @endif
            </form>
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
