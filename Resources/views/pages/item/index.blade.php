@extends('company::layouts.master')

@section('content')
    <h1>Create a new Customer <small></small></h1>
    <div class='space_50'></div>

    <ul>
    @foreach($items as $item)
        <li>
            <div class='title'>{{ $item->id . ' ' . $item->name }}</div>
            <div class='desc'> <small> {{ $item->description }} </small> </div>
        </li>
    @endforeach
    </ul>

    <div class='space_200'></div>
@stop
