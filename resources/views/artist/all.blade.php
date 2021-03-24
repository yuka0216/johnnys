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
                            <input type="text" class="form-control" name="cond_name" value="{{ $cond_name }}">
                        </div>
                        <label class="col-md-2">グループ</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="cond_group" value="{{ $cond_group }}">
                        </div>
                        <label class="col-md-2">血液型</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="cond_blood" value="{{ $cond_blood }}">
                        </div>
                        <label class="col-md-2">誕生日：年</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="cond_birthYear" value="{{ $cond_birthYear }}">
                        </div>
                        <label class="col-md-2">月</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="cond_birthMonth" value="{{ $cond_birthMonth }}">
                        </div>
                        <label class="col-md-2">日</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="cond_birthDay" value="{{ $cond_birthDay }}">
                        </div>
                        <label class="col-md-2">入所年</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="cond_joinYear" value="{{ $cond_joinYear }}">
                        </div>

                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                        <table class="table table-hover">
                            <thead class="thead-lignt">
                                <tr><th></th><th>名前</th><th>グループ</th><th>誕生日</th><th>血液型</th><th>入所日</th></tr>
                            </thead>
                                @foreach($artists as $artist)
                                    <tr><td><img src="{{ asset('image/' . $artist->image_path) }}" class="img-thumbnail" alt="参考画像" width="120" height="120" /></td><td>{{ $artist->name }}</td><td>{{ $artist->グループ }}</td><td>{{ $artist->誕生日 }}</td><td>{{ $artist->血液型 }}</td><td>{{ $artist->入所日 }}</td></tr>
                                @endforeach
                        </table>
            </div>    
        </div>
    </div>
@endsection
