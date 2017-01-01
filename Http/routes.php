<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'secondhandshop', 'namespace' => 'Gkiokan\SecondHandShop\Http\Controllers'], function()
{
    Route::get('/', [
      'uses'  => 'SecondHandShopController@index',
      'as'    => 'secondhandshop.index'
    ]);


    Route::get('customer.list', [
      'uses'  => 'CustomerController@index',
      'as'    => 'secondhandshop.customer.index'
    ]);

    Route::get('customer.new', [
      'uses'  => 'CustomerController@create',
      'as'    => 'secondhandshop.customer.new'
    ]);

    Route::get('customer.edit/{customer?}', [
      'uses'  => 'CustomerController@edit',
      'as'    => 'secondhandshop.customer.edit'
    ]);

    Route::post('customer.store', [
      'uses'  => 'CustomerController@store',
      'as'    => 'secondhandshop.customer.store'
    ]);

    Route::patch('customer.update/{customer?}', [
      'uses'  => 'CustomerController@update',
      'as'    => 'secondhandshop.customer.update'
    ]);

    Route::get('customer.delete/{customer?}', [
      'uses'  => 'CustomerController@delete',
      'as'    => 'secondhandshop.customer.delete'
    ]);

    Route::delete('customer.delete/{customer?}', [
      'uses'  => 'CustomerController@destroy',
      'as'    => 'secondhandshop.customer.destroy'
    ]);

});
