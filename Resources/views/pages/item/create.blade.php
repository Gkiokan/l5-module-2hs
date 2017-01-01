@extends('company::layouts.master')

@section('content')
    <h1> Neue Ware erstellen <small></small></h1>
    <div class='space_50'></div>

    <ul>
    @foreach($customers as $customer)
        <li>
            {{ $customer->id . ' ' . $customer->firstname . ' ' . $customer->lastname }}
        </li>
    @endforeach
    </ul>

    <form action="{{ route('secondhandshop.item.store') }}" method='POST'>

        <input name='customer_id'><br>
        <input name='name' placeholder='Name / Titel'> <br>
        <input name='description' placeholder="Kurzbeschreibung"> <br>
        <input name='price' placeholder="Preis (EURO.CENTS)"><br>
        <input name='limit' placeholder="Wochen limit 1-8"> <br>
        <br>
        <button type='submit' class='btn btn-success'> Erstelle Ware </button>
        {{ csrf_field() }}
    </form>

    <div class='space_200'></div>
@stop
