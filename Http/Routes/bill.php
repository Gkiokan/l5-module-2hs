<?php
/*
    Bill Routes
*/

Route::group([
    'middleware' => ['web', 'auth'],
    'as'         => 'secondhandshop.'
], function($router){
    Route::resource('bill', 'BillController');
    Route::resource('receipt', 'ReceiptController');
    Route::resource('commission', 'CommissionController');

    Route::post('/commission/{commission}/add.item', [
        'uses' => 'CommissionController@addItem',
        'as'   => 'commission.additem'
    ]);

});
