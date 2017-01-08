@extends('company::layouts.master')

@section('content')
    <h1> Ware erstellen <small></small></h1>
    <div class='space_50'></div>

    <form action="{{ route('secondhandshop.item.store') }}" method='POST' class='form-horizontal'>

    {{-- puh --}}
    <div class='row'>
        <div class='col-xs-6'>
            {{-- Item name  --}}
            <div class="form-group">
                <label class="control-label col-sm-4" for="name"> Kunde </label>
                <div class='col-sm-8'>
                    <select name='customer_id' class='form-control'>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}"
                          {{ old('customer_id')==$customer->id ? 'selected=selected' : '' }}
                        > {{ $customer->firstname . ' ' . $customer->lastname }} </option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class='col-xs-6'>
            @if($bill)
              {{ $bill->nr }} {{ $bill->type }}
              <input type='hidden' name='bill_id' value='{{ $bill->id }}'>
            @endif
        </div>
    </div>
    {{-- end puh --}}

    {{-- first row --}}
    <div class='row'>
        <div class='col-xs-6'>
            {{-- Item name  --}}
            <div class="form-group">
                <label class="control-label col-sm-4" for="name"> Titel </label>
                <div class='col-sm-8'>
                    <input type='text' id='name' class='form-control' name='name' value='{{ old('name') }}'>
                </div>
            </div>
        </div>
        <div class='col-xs-4'>
            {{-- Item Nr  --}}
            <div class="form-group">
                <label class="control-label col-sm-4" for="item_nr"> Item-NR </label>
                <div class='col-sm-8'>
                    <input type='text' id='item_nr' class='form-control' name='item_nr' value='{{ old('item_nr') }}'>
                </div>
            </div>
        </div>
        <div class='col-xs-2'>
            {{-- Price  --}}
            <div class="form-group">
                <label class="control-label col-sm-3" for="price"> Preis </label>
                <div class='col-sm-9'>
                    <input type='text' id='price' class='form-control' name='price' value='{{ old('price') }}'>
                </div>
            </div>
        </div>
    </div>
    {{-- end first row --}}

    {{-- 2nd row  --}}
    <div class='row'>
        <div class='col-xs-12'>
            {{-- Shortdescription --}}
            <div class="form-group">
                <label class="control-label col-sm-2" for="description"> Kurzbeschreibung </label>
                <div class='col-sm-10'>
                    <input type='text' id='description' class='form-control' name='description' value='{{ old('description') }}'>
                </div>
            </div>
        </div>
        <div class='col-xs-12'>
            {{-- Artikel content --}}
            <div class="form-group">
              <label class="control-label col-sm-2" for="content"> Artikel Beschreibung </label>
                <div class='col-sm-10'>
                  <textarea type='text' rows=10 id='content' class='form-control' name='content'>{{ old('content') }}</textarea>
                </div>
            </div>
        </div>
        <div class='col-xs-12'>
            {{-- Article image --}}
            <div class="form-group">
                <label class="control-label col-sm-2" for="image"> Bild </label>
                <div class='col-sm-10'>
                    <input type='text' id='image' class='form-control' name='image' value='{{ old('image') }}'>
                </div>
            </div>
        </div>
    </div>
    {{-- end 2nd row --}}


    {{-- 3rd row --}}
    <div class='row'>
        <div class='col-xs-3'>
            {{-- Resold --}}
            <div class="form-group">
                <label class="control-label col-sm-8" for="limit"> Resold </label>
                <div class='col-sm-4'>
                    <input type='text' id='limit' class='form-control' name='limit' value='{{ old('resell') }}'>
                </div>
            </div>
        </div>
        <div class='col-xs-3'>
            {{-- Expires Limit  --}}
            <div class="form-group">
                <label class="control-label col-sm-8" for="limit"> Wochenlimit </label>
                <div class='col-sm-4'>
                    <input type='text' id='limit' class='form-control' name='limit' value='{{ old('limit') }}'>
                </div>
            </div>
        </div>
        <div class='col-xs-6'>
            {{-- Expires  --}}
            <div class="form-group">
                <label class="control-label col-sm-3" for="expires_at"> Läuft ab </label>
                <div class='col-sm-9'>
                    <input type='date' id='expires_at' class='form-control' name='expires_at' value='{{ old('expires_at') }}'>
                </div>
            </div>
        </div>
    </div>
    {{-- end 3rd row --}}




    <div class='row'>
    <div class='col-xs-12 col-sm-10 col-sm-offset-2'>
        <div class='space_50'></div>
        <button type='submit' class='btn btn-info'>  Ware erstellen </button>
    </div>
    </div>
    {{ csrf_field() }}
    </form>

    <div class='space_200'></div>

@stop
