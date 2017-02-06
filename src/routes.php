<?php


Route::get('setLang/{lang}', 'libressltd\lbform\controllers\HomeController@getSetLang');

Route::group(["middleware" => "auth", 'prefix' => 'lbform', 'namespace' => 'libressltd\lbform\controllers'], function(){
	Route::get('logout', "HomeController@logout");
});