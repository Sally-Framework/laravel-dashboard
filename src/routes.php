<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Sally\Dashboard\Controller', 'prefix' => 'dashboard'], function () {
    Route::get('/', 'MainController@index')->name('main');
    Route::get('/new-design', 'StatisticController@newDesign')->name('new-design');
    Route::get('/statistic', 'StatisticController@index')->name('statistic');
});
