@extends('company::layouts.master')

@section('content')
    <h1> Create <small></small></h1>
    <hr>
    <div class='space_50'></div>

    <form action="{{ route('secondhandshop.commission.store') }}" method='post'>

        <input placeholder='Kommission numba' name='nr' value="{{ old('nr') }}"> <br>
        <input placeholder='Status' name='status' value="{{ old('status') }}"> <br>

        <input type='date' name='pay_date' value="{{ old('pay_date') }}"> <br>
        <input type='date' name='paid_at' value="{{ old('padi_at') }}"> <br>

        <button type='submit' class='btn btn-success'> Erstelle Kommission </button>
        {{ csrf_field() }}
    </form>

@stop
