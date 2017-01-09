@extends('company::layouts.master')

@section('content')
    <h1> Alle Quittungen <small></small></h1>
    <hr>
    <a href="{{ route('secondhandshop.receipt.create') }}" class="btn btn-md btn-success"> Neue Quittung erstellen </a> <br>

    <div class='space_50'></div>


    <div class="panel panel-default">
    <div class='panel-heading'> Alle Quittungen </div>
    <table class='table'>
        <thead>
            <tr>
                <th style='width:40px' class='text-center'> ID </th>
                <th> Quittung-Nummer </th>
                <th style='width:80px' class='text-center'> Artikel </th>
                <th style='width:100px' class='text-right'> Preis </th>
                <th> Status </th>
                <th style='width:100px' class='text-right'> Optionen </th>
            </tr>
        </thead>
        <tbody>
            @unless($bills->count() !== 0)
              <td colspan='6'> hops nothing here </td>
            @endunless
            @foreach($bills as $bill)
            <tr>
                <td class='text-center'> {{ $bill->id }} </td>
                <td>
                    {{ sprintf("Q-NR-" . $bill->created_at->format('Y/m/d'). "-%05d", $bill->id) }}  <br>
                    <small> {{ $bill->type }} </small>
                </td>
                <td class='text-center'> {{ $bill->items->count() }} </td>
                <td class='text-right'> {{ $bill->items->sum('price') }} € </td>
                <td> {{ $bill->status }} </td>
                <td class='text-right'>
                    <a href="{{ route('secondhandshop.receipt.show', $bill->id) }}" class='label label-info'> Quittung ansehen </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

@stop
