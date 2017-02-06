<?php


Route::get('setLang/{lang}', 'libressltd\lbform\controllers\LBFormController@getSetLang');

Route::group(["middleware" => "auth", 'prefix' => 'lbform', 'namespace' => 'libressltd\lbform\controllers'], function(){
	Route::get('logout', "LBFormController@logout");
});