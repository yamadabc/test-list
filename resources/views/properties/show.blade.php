@extends('layouts.app')

@section('content')
<h3 class='text-center'>{{ $property -> property_name }}</h3>
<div class='container'>
    <div class='row col-md-8 offset-2'>
       
        <table class='table table-borderd text-center'>
            
            <tr>
                <th>ステータス</th>
                <td>{{ $property -> status }}</td>
            </tr>
            <tr>
                <th>所在地</th>
                <td>{{ $property -> prefecture.$property->town. $property->house_number }}</td>
            </tr> 
            <tr>
                <th>地図</th>
                <td><a href="https://maps.google.co.jp/maps/search/{{ $property ->prefecture . $property -> town . $property -> house_number}}">リンク</a></td>
            <tr>
                <th>入手価格</th>
                <td>{{ $property -> price }}億円</td>
            </tr>
            <tr>
                <th>利回り</th>
                <td>{{ ($property -> price * 10000)/ $property -> full_price }}%</td>
            </tr>
            <tr>
                <th>指値</th>
                <td>{{ $property ->limit_price }}億</td>
            </tr>
            <tr>
                <th>利回り</th>
                <td>{{($property -> limit_price * 10000)/$property -> full_price }}%</td>
            </tr>
            <tr>
                <th>構造</th>
                <td>{{ $property -> structure }}</td>
            </tr>
            <tr>
                <th>築年数</th>
                <td></td>
            </tr>
            <tr>
                <th>満室想定</th>
                <td>{{ $property -> full_price }}万</td>
            </tr>
            <tr>
                <th>情報入力者</th>
                <td>{{ $property -> user_name }}</td>
            </tr>
            <tr>
                <th>入力日</th>
                <td>{{ $property -> created_at }}</td>
            </tr>
            <tr>
                <th>更新日</th>
                <td>{{ $property -> updated_at }}</td>
            </tr>
        </table>
    </div>
</div>

@endsection