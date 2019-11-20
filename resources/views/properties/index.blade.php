@extends('layouts.app')

@section('content')

<table class='table table-borderd text-center'>
    <tr>
        <th>入力日</th>
        <th>更新日</th>
        <th>情報入力者</th>
        <th>ステータス</th>
        <th>地図</th>
        <th>物件名</th>
        <th>金額</th>
        <th>利回り</th>
        <th>指値</th>
        <th>利回り</th>
        <th>都道府県</th>
        <th>市区町村</th>
        <th>構造</th>
        <th>築年数</th>
        <th>満室想定(万)</th>
    </tr>
    @foreach($properties as $property)
    <tr>
        <td>{{ $property-> created_at }}</td>
        <td>{{ $property -> updated_at }}</td>
        <td>{{ $property -> user_name }}</td>
        <td>{{ $property -> status }}</td>
        <td><a href="https://maps.google.co.jp/maps/search/{{ $property ->prefecture . $property -> town . $property -> house_number}}">リンク</a></td>
        <td><a href="{{ url('/properties', $property -> id) }}">{{ $property -> property_name }}</a></td>
        <td>{{ $property -> price }}</td>
        <td>{{ ($property -> price * 10000)/ $property -> full_price }}</td>
        <td>{{ $property -> limit_price }}</td>
        <td>{{ ($property -> limit_price * 10000)/$property -> full_price }}</td>
        <td>{{ $property -> prefecture }}</td>
        <td>{{ $property -> town }}</td>
        <td>{{ $property -> structure }}</td>
        <td>{{ $property -> build_year}}</td>
        <td>{{ $property -> full_price }}</td>
    </tr>
    @endforeach
</table>

@endsection