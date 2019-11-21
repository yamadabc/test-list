@extends('layouts.app')

@section('content')

<table class='table table-bordered text-center'>
    <tr class='bg-secondary text-white'>
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
        @if( $property->status =='要返答')
        <td class='text-white bg-danger'>{{ $property -> status }}</td>
        @elseif( $property -> status == '返答待ち')
        <td class='text-white bg-primary'>{{ $property -> status }}</td>
        @elseif( $property -> status == '値下待ち')
        <td class='text-white bg-success'>{{ $property -> status }}</td>
        @elseif( $property -> status == '定期連絡')
        <td class='text-white bg-primary'>{{ $property -> status }}</td>
        @elseif( $property -> status == '見送り')
        <td class='text-white bg-info'>{{ $property -> status }}</td>
        @elseif( $property -> status == '売止')
        <td class='text-white bg-secondary'>{{ $property -> status }}</td>
        @elseif( $property -> status == '他決(契約前)')
        <td class='bg-warning'>{{ $property -> status }}</td>
        @elseif( $property -> status == '他決(契約済)')
        <td class='text-white bg-dark'>{{ $property -> status }}</td>
        @elseif( $property -> status == '他決(決済済)')
        <td class='bg-white'>{{ $property -> status }}</td>
        @else
        <td>{{ $property -> status }}</td>
        @endif
        <td><a href="https://maps.google.co.jp/maps/search/{{ $property ->prefecture . $property -> town . $property -> house_number}}">リンク</a></td>
        <td><a href="{{ url('/properties', $property -> id) }}">{{ $property -> property_name }}</a></td>
        <td>{{ $property -> price }}億</td>
        <td>{{ round($property -> full_price/($property -> price * 10000) *100,2) }}%</td>
        <td>{{ $property -> limit_price }}億</td>
        <td>{{ round($property -> full_price/($property -> limit_price * 10000) *100,2) }}%</td>
        <td>{{ $property -> prefecture }}</td>
        <td>{{ $property -> town }}</td>
        <td>{{ $property -> structure }}</td>
        @if( $property -> build_month <= $this_month)
        <td>{{ ($this_year - $property -> build_year) -1}}年</td>
        @else
        <td>{{ $this_year - $property -> build_year }}年</td>
        @endif
        <td>{{ $property -> full_price }}</td>
    </tr>
    @endforeach
</table>

@endsection