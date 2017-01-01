@extends('secondhandshop::layouts.master')

@section('content')
    <h1>Delete Customer <small></small></h1>
    <hr>

    You are going to delete
    <b>{{ $customer->firstname . ' ' . $customer->lastname }}</b>
    (Kd-NR: {{ $customer->kdnr }})!<br>
    Are you sure? <br>
    <br>
    <br>
    <form action="{{ route('secondhandshop.customer.destroy', ['customer' => $customer->id]) }}" method='POST'>

      <button type='submit' class='btn btn-lg btn-success'> Yes, delete it! </button>
      <button type='button' class='btn btn-lg btn-danger'
              onclick='javascript:history.back()'> No, leave it! </button>

      {{ csrf_field() }}
      {{ method_field('delete') }}
    </form>

@stop
