@extends('secondhandshop::layouts.master')

@section('content')
    <h1>Delete Item <small></small></h1>
    <hr>

    Willst du das Item <b>{{ $item->name . ' ' . $item->item_nr }}</b> löschen? <br>
    <br>
    Kd-NR: {{ $item->customer->kdnr }} <br>
    Kunde: {{ $item->customer->firstname . ' ' . $item->customer->lastname }} <br>

    @if( $item->sold_at )
        Verkauft am {{ $item->sold_at->format('d.m.Y') }}, {{ $item->sold_at->diffForHumans() }}<br>
    @else
        Noch nicht verkauft! <br>
    @endif
    <br>
    Bist du sicher?    <br>
    <br>
    <form action="{{ route('secondhandshop.item.destroy', ['item' => $item->id]) }}" method='POST'>

      <button type='submit' class='btn btn-lg btn-success'> Yes, delete it! </button>
      <button type='button' class='btn btn-lg btn-danger'
              onclick='javascript:history.back()'> No, leave it! </button>

      {{ csrf_field() }}
      {{ method_field('delete') }}
    </form>

@stop
