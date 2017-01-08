@extends('company::layouts.master')

@section('content')
    <h1> Kommissions Information  <small></small></h1>
    <hr>

    <form action="{{ route('secondhandshop.commission.store') }}" method='post'>
        <div class='panel panel-default'>
        <div class='panel-heading'> {{ $commission->nr }}  </div>
        <div class='panel-body'>
        pay date : {{ $commission->pay_date }}  <br>
        paid at : {{ $commission->paid_at }}  <br>
        <br>

        <button type='submit' class='btn btn-success'> Speichere </button>

        </div>
        </div>
        {{ csrf_field() }}
    </form>


        <div class='space_50x'></div>

        <h3 class='hidden'>
            Items
                <a href="{{ route('secondhandshop.item.create', $commission->id) }}" class='btn btn-success btn-sm'> Neuen Artikel hinzufügen </a>
        </h3>

        <div class='panel panel-default'>
        <div class="panel-heading">
            Items <small>({{ $items->count() }})</small>
        </div>

        <div class='panel-body'>
          <a href="{{ route('secondhandshop.item.create', $commission->id) }}" class='btn btn-success btn-sm xpull-right'> Neuen Artikel hinzufügen </a>
          <a href='javascript:void(0)' onClick='toggle_existing_item_add_field()' class='btn btn-warning btn-sm xpull-right'> Vorhandenen Artikel hinzufügen </a>
        </div>

        <form action="{{ route('secondhandshop.commission.additem', $commission->id) }}" method='post'>
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
                        <form action="javascript:alert('huhu')" method='post'>
                            <button type='submit' class='btn btn-danger'> - </button>
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
