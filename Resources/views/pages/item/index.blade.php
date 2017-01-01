@extends('company::layouts.master')

@section('content')
    <h1> Alle waren <small></small></h1>
    <div class='space_50'></div>

    {{ $items->count() }} Items verfügbar: <br>

    <ul>
    @foreach($items as $item)
        <li>
            <div class='title'>{{ $item->id . ' ' . $item->name }} ({{ $item->price }}€)</div>
            <div class='desc'> <small> {{ $item->description }} </small> </div>
            <div class='user'> Belongs To {{ $item->customer->firstname . ' ' . $item->customer->lastname}}</div>
            <div class='info'> limit : {{ $item->limit }} to: {{ $item->expires_at }}</div>
        </li>
    @endforeach
    </ul>

    <div class='space_200'></div>
@stop
