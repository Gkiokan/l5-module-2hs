@extends('company::layouts.master')

@section('content')
    <h1> {{ $title }} <small></small></h1>
    <div class='space_50'></div>

    <div class='panel panel-default'>
    <div class='panel-heading'> {{ $items->count() }} Artikel verfügbar </div>
        <table class='table'>
        <thead>
            <tr>
                <th style='width:50px' class='text-center'> # </th>
                <th> Bezeichnung </th>
                <th style='width:80px'> Preis </th>
                <th> Kunde </th>
                <th> Limit </th>
                <th style='width:165px' class='text-right'> Option </th>
            </tr>
        </thead>
        <tbody>
        @unless( $items->count() != 0)
            <tr class='info'>
                <td colspan=6 class='text-center'> <br> Keine Artikel <br><br> </td>
            </tr>
        @endunless

        @foreach($items as $item)
            <tr>
                <td class='text-center'> {{ $item->id }} </td>
                <td>
                    <div class='title'>{{ $item->name }} {{ $item->item_nr }}</div>
                    <div class='desc'> <small> {{ $item->description }} </small> </div>
                </td>
                <td> <div class='price'> {{ $item->price }} € </div> </td>
                <td> <div class='user'> {{ $item->customer->firstname . ' ' . $item->customer->lastname}}</div> </td>
                <td> <div class='expires'>
                  {{ $item->expires_at->format('d.m.Y') }}  <br>
                  {{ $item->expires_at->diffForHumans() }}
                </td>
                <td class='text-right'>
                    <a href="{{ route('secondhandshop.item.edit', ['id'=>$item->id]) }}" class="btn btn-md btn-primary">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="{{ route('secondhandshop.customer.edit', ['customer'=>$item->customer->id]) }}" class="btn btn-md btn-info">
                        <span class="glyphicon glyphicon-user"></span>
                    </a>
                    <a href="{{ route('secondhandshop.item.delete', $item->id) }}" class="btn btn-md btn-danger">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>

    <div class='space_200'></div>
@stop
