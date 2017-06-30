<?php

Route::get('testroute', function(){
    return "The Routes are loaded";
});

Route::get('testtrans', function(){
    return trans('bulma::example.message');
});

Route::group(['middleware' => 'web', 'namespace' => 'Ridrog\Bulma\Http\Controllers'], function () {
    Route::get('/controllertest', 'BulmaController@test')->name('test-controller');
});
