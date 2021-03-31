@extends('layouts.admin')
@section('title', 'profile')
@section('content')
<div class="row">
    <div class="col-md-9 mx-auto">
        <div class="border">
                <h4 class="text-center">talk board</h4>
                <h2 class="text-center">-{{ $profile->name }}-</h2>
                <br>
                <form action="{{ action('ArtistController@post', ['name' => $name]) }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                {{ csrf_field() }}
                    <div class="form-group col-md-12">
                        <label>コメント</label>
                        <textarea class="form-control" name="comment" rows="5">{{ old('comment')}}</textarea>
                        <form>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon">画像選択</span>
                                </div>

                                <div class="custom-file col-5">
                                    <input type="file" class="custom-file-input" id="inputGroupFile" name="image" accept=".png,.jpg,.jpeg,image/png,image/jpg" aria-describedby="inputGroupFileAddon">
                                    <label class="custom-file-label" for="inputGroupFile" data-browse="参照">ファイルを選択</label>
                                </div>

                            </div>
                        </form>
                        <div class="text-right">
                            <button class="btn btn-info col-md-2">\\ 推す //</button>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
            <form action="{{ action('ArtistController@postIndex', ['name'=>$name]) }}" method="get">
            @if (count($posts) > 0)
                @foreach($posts as $post)
                    <table class="table">
                        <tr><td>
                        {{ $post->name }}<br>
                        {{ $post->comment }}<br>
                        @if ($post->image_path)
                        <img src="{{ asset('storage/image/' . $post->image_path) }}" style="width: 100px"><br>
                        @endif
                        {{ $post->created_at }}                        
                        </td></tr>
                    </table>
                @endforeach
            @endif
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
