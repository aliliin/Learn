
@extends('app')
@section('content')

    <h1>My name is ：{{ $first }}</h1>

    <h2>People</h2>
    <ul>
    @foreach($people as $person)
        <li>{{$person}}</li>
    @endforeach
    </ul>
    <h2>空数据的情况</h2>
    @if(count($p) > 0)
        <ul>
            @foreach($p as $per)
                <li>{{$per}}</li>
            @endforeach
        </ul>
    @endif
@stop

