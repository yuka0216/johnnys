@extends('layouts.admin')
@section('title', 'アーティスト一覧')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h3>アーティスト一覧</h3>
            <form action="{{ action('ArtistController@index') }}" method="get">
                <div class="form-group row">
                    <label class="col-md-2">名前</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="cond_name" value="{{ $searchWordList["名前"] }}">
                    </div>
                    <label class="col-md-2">グループ</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="cond_group" value="{{ $searchWordList["グループ"] }}">
                    </div>
                    <label class="col-md-2">血液型</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="cond_blood" value="{{ $searchWordList["血液型"] }}">
                    </div>
                    <label class="col-md-2">誕生日</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="cond_birthDay" value="{{ $searchWordList["誕生日"] }}">
                    </div>
                    <label class="col-md-2">入所日</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="cond_joinYear" value="{{ $searchWordList["入所日"] }}">
                    </div>

                    <div class="col-md-2">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="検索">
                    </div>
                    <table class="table table-hover">
                        <thead class="thead-lignt">
                            <tr>
                                <th></th>
                                <th>名前</th>
                                <th>グループ</th>
                                <th>誕生日</th>
                                <th>血液型</th>
                                <th>入所日</th>
                            </tr>
                        </thead>
                        @foreach($artists as $artist)
                        <tr>
                            <td><a href="{{ asset('/snowman/profile/' . $artist->id ) }}"><img src="{{ asset('image/' . $artist->image_path) }}" class="img-thumbnail" alt="参考画像" width="120" height="120"></td>
                            <td>{{ $artist->名前 }}</td>
                            <td>{{ $artist->グループ }}</td>
                            <td>{{ $artist->誕生日 }}</td>
                            <td>{{ $artist->血液型 }}</td>
                            <td>{{ $artist->入所日 }}</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
        </div>
    </div>
    @endsection