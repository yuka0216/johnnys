@extends('layouts.admin')
@section('title', 'profile')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <h3 class="text-center">talk about ...?</h2>
                <table class="mx-auto">
                    <tr>
                    <td><a href="/snowman/profile/abe"><img class="rounded-full" src="{{ asset('image/abe.jpg') }}" alt=""></a></td>
                    <td><a href="/snowman/profile/miyadate"><img class="rounded-full" src="{{ asset('image/date.jpg') }}" alt=""></a></td>
                    <td><a href="/snowman/profile/fukazawa"><img class="rounded-full" src="{{ asset('image/hukka.jpg') }}" alt=""></a></td>                        
                    </tr>
                    <tr>
                    <td><a href="/snowman/profile/meguro"><img class="rounded-full" src="{{ asset('image/meme.jpg') }}" alt=""></a></td>
                    <td><a href="/snowman/profile/mukai"><img class="rounded-full" src="{{ asset('image/mukai.jpg') }}" alt=""></a></td>
                    <td><a href="/snowman/profile/raul"><img class="rounded-full" src="{{ asset('image/raul.jpg') }}" alt=""></a></td>                        
                    </tr>
                    <tr>
                    <td><a href="/snowman/profile/sakuma"><img class="rounded-full" src="{{ asset('image/sakkun.jpg') }}" alt=""></a></td>
                    <td><a href="/snowman/profile/watanabe"><img class="rounded-full" src="{{ asset('image/shoppi.jpg') }}" alt=""></a></td>
                    <td><a href="/snowman/profile/iwamoto"><img class="rounded-full" src="{{ asset('image/iwamoto.jpg') }}" alt=""></a></td>                        
                    </tr>
                </table>
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