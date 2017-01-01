<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'secondhandshop', 'namespace' => 'Gkiokan\SecondHandShop\Http\Controllers'], function()
{
    include_once __DIR__ . '/Routes/customer.php';
    include_once __DIR__ . '/Routes/items.php';

});
