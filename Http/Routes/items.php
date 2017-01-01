<?php

Route::get('/items', [
  'uses'  => 'ItemController@index',
  'as'    => 'secondhandshop.item.index'
]);
