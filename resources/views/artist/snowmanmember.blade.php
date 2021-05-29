@extends('layouts.admin')
@section('title', 'アーティスト一覧')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 mx-auto">
      <h3>アーティスト一覧</h3>
      <form action="{{ action('ArtistController@snowmanIndex') }}" method="get">
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
            <td><a href="{{ asset('/snowman/talk/' . $artist->id()->value() ) }}"><img src="{{ asset('image/' . $artist->imagePath()->value()) }}" class="img-thumbnail" alt="参考画像" width="120" height="120"></td>
            <td>{{ $artist->name()->value() }}</td>
            <td>{{ $artist->group()->value() }}</td>
            <td>{{ $artist->birthday }}</td>
            <td>{{ $artist->bloodType()->value() }}</td>
            <td>{{ $artist->joinedDate }}</a></td>
          </tr>
          @endforeach
        </table>
    </div>
  </div>
</div>
@endsection