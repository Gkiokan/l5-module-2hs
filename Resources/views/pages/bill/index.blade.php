@extends('company::layouts.master')

@section('content')
    <h1> Alle Kommissionen <small></small></h1>
    <hr>
    <a href="{{ route('secondhandshop.commission.create') }}" class="btn btn-md btn-success"> Neue Kommission erstellen </a> <br>

    <div class='space_50'></div>


    <div class="panel panel-default">
    <div class='panel-heading'> Alle Kommissionen </div>
    <table class='table'>
        <thead>
            <tr>
                <th style='width:40px' class='text-center'> ID </th>
                <th> Kommissions-Nummer </th>
                <th style='width:80px' class='text-center'> Artikel </th>
                <th style='width:100px' class='text-right'> Preis </th>
                <th> Status </th>
                <th style='width:100px' class='text-right'> Optionen </th>
            </tr>
        </thead>
        <tbody>
            <tr>
            @unless($bills->count() !== 0)
              <td colspan='6'> hops nothing here </li>
            @endunless
            @foreach($bills as $bill)
                <td class='text-center'> {{ $bill->id }} </td>
                <td>
                    {{ $bill->nr }}  <br>
                    <small> {{ $bill->type }} </small>
                </td>
                <td class='text-center'> {{ $bill->items->count() }} </td>
                <td class='text-right'> {{ $bill->items->sum('price') }} € </td>
                <td> {{ $bill->status }} </td>
                <td class='text-right'>
                    <a href="{{ route('secondhandshop.commission.show', $bill->id) }}" class='label label-info'> Commission ansehen </a>
                </td>
            @endforeach
          </tr>
        </tbody>
    </table>
    </div>

@stop
