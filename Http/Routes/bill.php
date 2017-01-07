<?php
/*
    Bill Routes
*/

Route::group([
    'middleware' => ['web', 'auth'],
    'as'         => 'secondhandshop.'
], function($router){
    Route::resource('bill', 'BillController');
});
