@extends('company::layouts.master')

@section('content')
    <h1> Quittungs Information  <small></small></h1>
    <hr>

    <form action="{{ route('secondhandshop.receipt.store') }}" method='post'>
        <div class='panel panel-default'>
        <div class='panel-heading'> {{ $receipt->nr }}  </div>
        <div class='panel-body'>
        Erstellt am: {{ $receipt->created_at->format('d.m.Y H:i') }} <br>
        Zuletzt bearbeitet: {{ $receipt->updated_at->format('d.m.Y H:i') }} <br>
        <br>
        pay date : {{ $receipt->pay_date }}  <br>
        paid at : {{ $receipt->paid_at }}  <br>
        <br>
        Status : {{ $receipt->status }} <br>
        <button type='submit' class='btn btn-success'> Speichere </button>

        </div>
        </div>
        {{ csrf_field() }}
    </form>


        <div class='panel panel-default'>
        <div class="panel-heading">
            Items <small>({{ $items_in_bill->count() }})</small>
        </div>

        <div class='panel-body hidden'>
          <a href="{{ route('secondhandshop.item.create', $receipt->id) }}" class='btn btn-success btn-sm xpull-right'> Neuen Artikel hinzufügen </a>
          <a href='javascript:void(0)' onClick='toggle_existing_item_add_field()' class='btn btn-warning btn-sm xpull-right'> Vorhandenen Artikel hinzufügen </a>
        </div>

        <form action="{{ route('secondhandshop.receipt.additem', $receipt->id) }}" method='post'>
        <table class='table add_existing_item' style='border:0px !important'>
              <tr class='info'>
                  <td>
                      <select name='item' class='form-control'>
                          @unless($items->count() != 0)
                              <option value=''> No items avaible </option>
                          @endunless
                          @foreach($items as $item)
                              <option value="{{ $item->id }}">
                                  (ID: {{ $item->id }})
                                  (Aritkel-NR: {{ $item->item_nr }})
                                  (Preis: {{ $item->price }})
                                  {{ $item->name }}
                              </option>
                          @endforeach
                      </select>
                  </td>
                  <td class='text-right'>
                      <button type='submit' class='btn btn-success btn-md'> + </button>
                  </td>
              </tr>
        </table>
        {{ csrf_field() }}
        </form>

        <table class='table table-hover'>
            <thead>
                <tr>
                  <th style='width:100px'> Artikel-Nr </th>
                  <th> Beschreibung </th>
                  <th style='width:100px' class='text-right'> Preis </th>
                  <th style='width:50px' class='text-right'> Option </th>
                </tr>
            </thead>
            <tbody>
                @php
                  $sum = 0;
                @endphp
                @foreach($items_in_bill as $item)
                <tr>
                    <td> {{ $item->item_nr }} </td>
                    <td>
                        <div> {{ $item->name }} </div>
                        <small> {{ $item->description }} </small>
                    </td>
                    <td class='text-right'> {{ $item->price }} € </td>
                    <td class='text-right'>
                        <form action="{{ route('secondhandshop.receipt.destroy', $receipt->id) }}" method='post'>
                            <button type='submit' class='btn btn-danger'> - </button>
                            <input type='hidden' name='item_id' value="{{ $item->id }}">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                        </form>
                    </td>
                </tr>
                @php
                    $sum = $sum + $item->price;
                @endphp
                @endforeach
            </tbody>
            <tfooter>
                <tr>
                   <th></th>
                   <th class='text-right'> Summe </th>
                   <th class='text-right'> {{ $sum }} €</th>
                   <th></th>
                </tr>
            </tfooter>
        </table>
        </div>

        <div class='space_100'></div>

@stop

@section('scripts')
  <script>
      function toggle_existing_item_add_field(){
          $('.add_existing_item').toggle();
      }
  </script>
@stop
