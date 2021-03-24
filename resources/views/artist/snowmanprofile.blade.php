@extends('layouts.admin')
@section('title', 'profile')
@section('content')
    <div class="container">
        <table>
            <td><a href="http://127.0.0.1:8080/"><img class="rounded-full" src="{{ asset('image/abe.jpg') }}" alt="" width="800" height="800"></a></td>
            <td><a href="http://127.0.0.1:8080/"><img class="rounded-full" src="{{ asset('image/date.jpg') }}" alt="" width="800" height="800"></a></td>
            <td><a href="http://127.0.0.1:8080/"><img class="rounded-full" src="{{ asset('image/hukka.jpg') }}" alt="" width="800" height="800"></a></td>                        
            <td><a href="http://127.0.0.1:8080/"><img class="rounded-full" src="{{ asset('image/meme.jpg') }}" alt="" width="800" height="800"></a></td>
            <td><a href="http://127.0.0.1:8080/"><img class="rounded-full" src="{{ asset('image/mukai.jpg') }}" alt="" width="800" height="800"></a></td>
            <td><a href="http://127.0.0.1:8080/"><img class="rounded-full" src="{{ asset('image/raul.jpg') }}" alt="" width="800" height="800"></a></td>                        
            <td><a href="http://127.0.0.1:8080/"><img class="rounded-full" src="{{ asset('image/sakkun.jpg') }}" alt="" width="800" height="800"></a></td>
            <td><a href="http://127.0.0.1:8080/"><img class="rounded-full" src="{{ asset('image/shoppi.jpg') }}" alt="" width="800" height="800"></a></td>
            <td><a href="http://127.0.0.1:8080/"><img class="rounded-full" src="{{ asset('image/iwamoto.jpg') }}" alt="" width="800" height="800"></a></td>                        
        </table>
        <form action="{{ action('ArtistController@iwamotoCommentIndex') }}" method="get">
            @if (count($iwamotoposts) > 0)
                @foreach($iwamotoposts as $iwamotopost)
                    <table class="table">
                        <tr><td>
                        {{ $iwamotopost->name . "さん" }}<br>
                        {{ $iwamotopost->comment }}<br>
                        {{ $iwamotopost->created_at }}
                        </td></tr>
                    </table>
                @endforeach
            @else
            <center>-----まだ投稿はありません-----</center>
            @endif
        </form>
    
    </div>
 <!-- <div class="w-100"></div>
       <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="row g-0 bg-light position-relative">
                    <div class="col-md-6 mb-md-0 p-md-4">
                        <img src="{{ asset('image/' . 'iwamoto.jpg') }}" class="w-100" alt="カード画像の説明">
                    </div>
                    <div class="col-md-6 p-4 ps-md-0">
                        <h5 class="mt-0">岩本　照</h5>
                        <p>Snow Manのリーダー</p>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#youtube" aria-expanded="false" aria-controls="collapseExample">
                            おすすめYouTube
                        </button>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#comment" aria-expanded="false" aria-controls="collapseExample">
                            みんなの推しポイントを投稿してね！
                        </button>
                    </div>
                    <div class="w-100"></div>
                    <div class="collapse table-responsive" id="youtube">
                        <table class="table">
                            <td><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1xdFq9-2Msw" allowfullscreen></iframe></td>
                            <td><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1xdFq9-2Msw" allowfullscreen></iframe></td>
                            <td><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1xdFq9-2Msw" allowfullscreen></iframe></td>                        
                        </table>
                    </div>
                    <div class="col-md-12 collapse" id="comment">
                        <div class="card card-body">
                            <form action="{{ action('ArtistController@iwamotoCommentPost') }}" method="post">
                                <div class="form-group row">
                                    <label for="text1">名前：</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">      
                                </div>
                                <div class="form-group row">
                                    <label for="text1">コメント：</label>
                                    <input type="text" class="form-control" name="comment" value="{{ old('comment') }}">
                                </div>
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="推す">
                            </form>
                            <form action="{{ action('ArtistController@iwamotoCommentIndex') }}" method="get">
                                @if (count($iwamotoposts) > 0)
                                    @foreach($iwamotoposts as $iwamotopost)
                                        <table class="table">
                                            <tr><td>{{ $iwamotopost->name . "さん" }}</td><td>{{ $iwamotopost->comment }}</td><td>{{ $iwamotopost->created_at }}</td></tr>
                                        </table>
                                    @endforeach
                                @else
                                <center>-----まだ投稿はありません-----</center>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
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