@extends('company::layouts.master')

@section('content')
    <h1>Update Customer <small></small></h1>
    <div class='space_50'></div>

    <form action="{{ route('secondhandshop.customer.update', ['customer' => $customer->id]) }}" method="POST" class='form-horizontal'>

        <h3> Persönliche Information </h3> <hr>
        {{-- Company selectio --}}
        <div class='row'>
        <div class='col-xs-12 col-sm-10'>
          <div class="form-group">
              <label class="control-label col-sm-3" for="company_id">Company Connection</label>
              <div class='col-sm-9'>
                  <select name='company_id' class='form-control'>
                  @foreach( $companies as $company)
                      <option value="{{ $company->id }}"
                        {{ ($customer->company_id == $company->id) ? 'selected' : '' }}
                        > {{ $company->name }}</option>
                  @endforeach
                  </select>
              </div>
          </div>
        </div>
        </div>
        <br>

        {{--First Row --}}
        <div class='row'>
        <div class='col-xs-12 col-sm-5'>
            {{-- Kunden-NR --}}
            <div class="form-group">
                <label class="control-label col-sm-3" for="kdnr">Kd-nr</label>
                <div class='col-sm-9'>
                    <input type='text' id='kdnr' class='form-control' name='kdnr' value='{{ $customer->kdnr }}'>
                </div>
            </div>

            {{-- Firstname --}}
            <div class="form-group">
                <label class="control-label col-sm-3" for="firstname">Firstname</label>
                <div class='col-sm-9'>
                    <input type='text' id='firstname' class='form-control' name='firstname' value='{{ $customer->firstname }}'>
                </div>
            </div>

            {{-- Lastname --}}
            <div class="form-group">
                <label class="control-label col-sm-3" for="lastname">Lastname</label>
                <div class='col-sm-9'>
                    <input type='text' id='lastname' class='form-control' name='lastname' value='{{ $customer->lastname }}'>
                </div>
            </div>

            {{-- BDay --}}
            <div class="form-group">
                <label class="control-label col-sm-3" for="bday">B-Day</label>
                <div class='col-sm-9'>
                    <input type='text' id='bday' class='form-control' name='bday' placeholder='dd.mm.yyyy' value='{{ $customer->bday }}'>
                </div>
            </div>
        </div>
        <div class='col-xs-12 col-sm-7'>
            {{-- Adress --}}
            <div class="form-group">
                <label class="control-label col-sm-3" for="adress">Adress</label>
                <div class='col-sm-9'>
                    <input type='text' id='adress' class='form-control' name='street' placeholder="Strees Adress and number" value='{{ $customer->street }}'>
                </div>
            </div>


            {{-- ZIP/City --}}
            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3" for="plz">ZIP/City</label>
                <div class='col-xs-5 col-sm-3 col-sm-offset-0'>
                    <input type='text' id='plz' maxlength=5 class='form-control' name='plz' placeholder='code' value='{{ $customer->plz }}'>
                </div>
                <div class='col-xs-7 col-sm-6 col-sm-offset-0'>
                    <input type='text' id='city' class='form-control' name='city' placeholder="Your cities name" value='{{ $customer->city }}'>
                </div>
            </div>

            {{-- State --}}
            <div class="form-group">
                <label class="control-label col-sm-3" for="state">State</label>
                <div class='col-sm-9'>
                    <input type='text' id='state' class='form-control' name='state' placeholder='In which State do you life?' value='{{ $customer->state }}'>
                </div>
            </div>

            {{-- Country --}}
            <div class="form-group">
                <label class="control-label col-sm-3" for="country">Country</label>
                <div class='col-sm-9'>
                    <input type='text' id='country' class='form-control' name='country' placeholder="What's your contries name" value='{{ $customer->country }}'>
                </div>
            </div>
        </div>
        </div>
        {{-- end first row --}}
        <div class='space_50'></div>


        <h3> Kontakt Information </h3> <hr>
        {{-- 2nd row --}}
        <div class='row'>
            <div class='col-xs-12 col-sm-5'>
                  {{-- Company email --}}
                  <div class="form-group">
                      <label class="control-label col-sm-3" for="email">E-Mail</label>
                      <div class='col-sm-9'>
                          <input type='text' id='email' class='form-control' name='email'
                                 placeholder="Info E-Mail adress of the company" value='{{ $customer->email }}'>
                      </div>
                  </div>

                  {{-- Tel --}}
                  <div class="form-group">
                      <label class="control-label col-sm-3" for="tel">Tel</label>
                      <div class='col-sm-9'>
                          <input type='text' id='tel' class='form-control' name='tel'
                                 placeholder="Company Phone Number" value='{{ $customer->tel }}'>
                      </div>
                  </div>

                  {{-- Mobil --}}
                  <div class="form-group">
                      <label class="control-label col-sm-3" for="fax">Mobil</label>
                      <div class='col-sm-9'>
                          <input type='text' id='mobil' class='form-control' name='mobil'
                                placeholder="Company Mobil Number" value='{{ $customer->mobil }}'>
                      </div>
                  </div>
            </div>
        </div>
        {{-- END 2nd row --}}
        <div class='space_50'></div>

        <h3 class='hidden'> Waren Statistik </h3><hr>
        {{-- 3rd row --}}
        {{-- Item Statistik --}}
        <div class='row hidden'>
        <div class='col-xs-12 col-sm-5'>

            <div class='panel panel-default'>
            <div class='panel-heading hidden'>Waren Statistik</div>
            <table class='table'>
                <thead>
                <tr>
                    <th>Bezeichnung</th>
                    <th style='width:80px'> Anzahl</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                      <td> Gesamt gebrachte Waren </td>
                      <td> 200 </td>
                  </tr>
                  <tr>
                      <td> Verkaufte Waren </td>
                      <td> 170 </td>
                  </tr>
                  <tr>
                      <td> aktuell zu verkaufende Waren </td>
                      <td> 23 </td>
                  </tr>
                  <tr>
                      <td> verbliebene Waren </td>
                      <td> 7 </td>
                  </tr>
                </tbody>
            </table>
            </div>
        </div>
        <div class='col-xs-12 col-sm-5'>
            a b c
        </div>
        </div>
        {{-- end 3rd row --}}

        {{-- btn area --}}
        <div class='row'>
            <div class='col-xs-12'>
                <button type='submit' class='btn btn-success'> Update customer </button>
            </div>
        </div>
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
    </form>

    <div class='space_200'></div>
@stop
