<?php
/*
    Item Routs
*/

Route::get('items', [
  'uses'  => 'ItemController@index',
  'as'    => 'secondhandshop.item.index'
]);

Route::get('items/sold', [
  'uses'  => 'ItemController@sold',
  'as'    => 'secondhandshop.item.sold'
]);

Route::get('items/open', [
  'uses'  => 'ItemController@open',
  'as'    => 'secondhandshop.item.open'
]);

Route::get('items/expired', [
  'uses'  => 'ItemController@expired',
  'as'    => 'secondhandshop.item.expired'
]);


Route::get('items/create/{bill?}', [
  'uses'  => 'ItemController@create',
  'as'    => 'secondhandshop.item.create'
]);

Route::post('items/store/', [
  'uses'  => 'ItemController@store',
  'as'    => 'secondhandshop.item.store'
]);

Route::get('item/edit/{item}', [
  'uses'  => 'ItemController@edit',
  'as'    => 'secondhandshop.item.edit'
]);

Route::patch('item/update/{item}', [
  'uses'  => 'ItemController@update',
  'as'    => 'secondhandshop.item.update'
]);

Route::get('item/delete/{item}', [
  'uses'  => 'ItemController@delete',
  'as'    => 'secondhandshop.item.delete'
]);

Route::delete('item/destroy/{item}', [
  'uses'  => 'ItemController@destroy',
  'as'    => 'secondhandshop.item.destroy'
]);
