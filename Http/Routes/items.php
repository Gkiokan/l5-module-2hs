<?php

Route::get('/items', [
  'uses'  => 'ItemController@index',
  'as'    => 'secondhandshop.item.index'
]);


Route::get('/items.create', [
  'uses'  => 'ItemController@create',
  'as'    => 'secondhandshop.item.create'
]);

Route::post('/items.store', [
  'uses'  => 'ItemController@store',
  'as'    => 'secondhandshop.item.store'
]);
