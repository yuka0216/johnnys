@extends('layouts.admin')
@section('title', 'profile')
@section('content')
<div class="container">
    <div class="row py-4">
        <div class="col-md-3 order-1" id="sticky-sidebar">
            <div class="sticky-top">
                <div class="nav flex-column">
                    <p>talk about...?</p>
                    <a href="{{ action('ArtistController@makeCheckBox') }}" role="button" class="btn btn-primary">新規作成</a>
                    @foreach ($threadList as $thread)
                    <a href="/snowman/profile/{{ $thread->id }}" class="nav-link" style="color:black">#{{ $thread->thread_name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-8 order-2" id="main">
            <div class="border">
                <h4 class="text-center">talk board</h4>
                <h2 class="text-center">-{{ $thread_name }}-</h2>
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
                                <label class="custom-file-label" for="inputGroupFile" data-browse="参照">ファイルを選択</label>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-info col-md-2">\\ 推す //</button>
                        </div>
                        <br>
                </form>
            </div>
        </div>
        <form action="{{ action('ArtistController@postIndex', ['threadId' => $threadId]) }}" method="get"></form>
        @if (count($posts) > 0)
        @foreach($posts as $post)
        <table class="table">
            <tr>
                <td>
                    {{ $post->user->name }}<br>
                    {{ $post->comment }}<br>
                    @if ($post->image_path)
                    <img src="{{ asset('/images/' . $post->image_path) }}" style="width: 100px"><br>
                    @endif
                    {{ $post->created_at }}
                </td>
            </tr>
        </table>
        @endforeach
        @endif
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