<?php


Route::get('setLang/{lang}', 'libressltd\lbform\controllers\LBFormControllerr@getSetLang');

Route::group(["middleware" => "auth", 'prefix' => 'lbform', 'namespace' => 'libressltd\lbform\controllers'], function(){
	Route::get('logout', "LBFormControllerer@logout");
});