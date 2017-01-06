@extends('secondhandshop::layouts.master')

@section('content')
    <h1> Alle Kunden </h1><hr>

    <a class='btn btn-success' href="{{ route('secondhandshop.customer.new') }}"> Neuen Kunden erstellen </a><br>
    <br>

    <div class='panel panel-default'>
    <div class='panel-heading'> Kunden <small>({{ count($customers) }})</small></div>
    <div class='panel-body'>
      <table class='table table-condensed table-hover'>
      <thead>
      <tr>
          <th style='width:100px'> Kd-nr </th>
          <th> Name Vorname </th>
          <th style='width:30px'> Gesamt Waren </th>
          <th style='width:30px'> Verkaufte Waren </th>
          <th style='width:30px'> Aktuelle Waren </th>
          <th width=120px class='text-right'> Options </th>
      </tr>
      </thead>
      <tbody>
      @if(count($customers) == 0)
        <tr><td colspan=6 class='text-center info'> <br> Kein Kundenstamm vorhanden <br><br></td></tr>
      @endif

      @foreach( $customers as $customer)
      <tr>
          <td> {{ $customer->kdnr }} </td>
          <td> {{ $customer->firstname . ' ' . $customer->lastname }}  {{ $customer->id }}</td>
          <td> (G) </td>
          <td> (V) </td>
          <td> (A) </td>
          <td>
              <div class='pull-right'>
                <a href="{{ route('secondhandshop.customer.delete', ['id' => $customer->id]) }}" class='btn btn-danger btn-xs'> <span class='glyphicon glyphicon-trash'></span> </a>
              </div>
              <div class='pull-right' style='padding-right:10px;'>
                  <a href="{{ route('secondhandshop.customer.edit', ['id' => $customer->id]) }}" class='btn btn-info btn-xs'> <span class='glyphicon glyphicon-pencil'></span> </a>
              </div>
          </td>
      </tr>
      @endforeach
      </tbody>
      </table>

    </div>
    </div>
@stop
