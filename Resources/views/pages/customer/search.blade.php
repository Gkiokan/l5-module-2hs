@extends('secondhandshop::layouts.master')

@section('content')
    <h1> Suche Kunden <small>(nach Kd-nr)</small></h1><hr>

    <form action="{{ route('secondhandshop.customer.searchresult') }}" method="POST" class='form-horizontal'>

    <div class='row'>
        <div class='col-xs-12'>
            {{--  --}}
            <div class="form-group">
                <label class="control-label col-sm-3" for="kdnr">Kd-nr</label>
                <div class='col-xs-9 col-sm-6'>
                    <input type='text' id='kdnr' class='form-control' name='kdnr' value='{{ old('kdnr') }}'>
                </div>
            </div>
            <br>
            <button type="submit" class='btn btn-success'> Suche nach Kd-nr </button>
        </div>
    </div>
    <div class='space_50'></div>

    @if( $customer )
        <span class='label label-success'> Kunde gefunden ! </span> <br>

        <b> {{ $customer->kdnr }}</b> |  {{ $customer->firstname . ' ' . $customer->lastname}} <br>
        <a href="{{ route('secondhandshop.customer.edit', ['customer' => $customer->id]) }}" class='btn btn-info'> Kunden Profil </a>
    @else
        <span class='label label-danger'> Kunde mit {{ $kdnr }} nicht gefunden ! </span> <br>
    @endif

    <br>
    <br>
    {{ csrf_field() }}
    </form>
@stop
