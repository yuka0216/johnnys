@extends('layouts.admin')
@section('title', 'profile')
@section('content')
<div class="container">
    <div class="row py-4">
        <div class="col-md-3 order-1" id="sticky-sidebar">
            <div class="sticky-top">
                <div class="nav flex-column">
                    <p>talk about...?</p>
                    <a href="/snowman/profile/sakuma" class="nav-link" style="color:black">佐久間大介</a>
                    <a href="/snowman/profile/abe" class="nav-link" style="color:black">阿部亮平</a>
                    <a href="/snowman/profile/iwamoto" class="nav-link" style="color:black">岩本照</a>
                    <a href="/snowman/profile/miyadate" class="nav-link" style="color:black">宮舘涼太</a>
                    <a href="/snowman/profile/raul" class="nav-link" style="color:black">ラウール</a>
                    <a href="/snowman/profile/meguro" class="nav-link" style="color:black">目黒蓮</a>
                    <a href="/snowman/profile/fukazawa" class="nav-link" style="color:black">深澤辰也</a>
                    <a href="/snowman/profile/mukai" class="nav-link" style="color:black">向井康二</a>
                    <a href="/snowman/profile/watanabe" class="nav-link" style="color:black">渡辺翔太</a>
                </div>
            </div>
        </div>
        <div class="col-md-8 order-2" id="main">
            <!-- <div class="row"> -->
            <!-- <div class="col-md-12 mx-auto"> -->
            <div class="border">
                <h4 class="text-center">talk board</h4>
                <h2 class="text-center">-{{ $profile->名前 }}-</h2>
                <br>
                <form action="{{ action('ArtistController@post', ['name' => $name]) }}" method="post" enctype="multipart/form-data"></form>
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
                        <div class="text-right">
                            <button class="btn btn-info col-md-2">\\ 推す //</button>
                        </div>
                        <br>
                </div>
            </div>
            <form action="{{ action('ArtistController@postIndex', ['name'=>$name]) }}" method="get"></form>
            @if (count($posts) > 0)
            @foreach($posts as $post)
            <table class="table">
                <tr>
                    <td>
                        {{ $post->user->name }}<br>
                        {{ $post->comment }}<br>
                        @if ($post->image_path)
                        <img src="{{ asset('storage/image/' . $post->image_path) }}" style="width: 100px"><br>
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