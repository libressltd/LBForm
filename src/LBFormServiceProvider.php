<?php

namespace LIBRESSLtd\LBForm;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\ServiceProvider;
use Form;
use Cookie;

class LBFormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'lbform');
		$this->publishes([
	        __DIR__.'/views' => base_path('resources/views/layouts/form'),
	        __DIR__.'/config' => base_path('config'),
	    ], "lbform");
		
		Form::component('lbText', 'layouts.form.bstext', ['name', 'value', 'title', 'place_holder', 'hin', 'validation']);
		Form::component('lbNumber', 'layouts.form.bsnumber', ['name', 'value', 'title', 'min', 'max']);
		Form::component('lbTimepicker', 'layouts.form.bstimepicker', ['name', 'value', 'title']);
		Form::component('lbDatepicker', 'layouts.form.bsdatepicker', ['name', 'value', 'title']);
		Form::component('lbDatetime', 'layouts.form.bsdatetime', ['name', 'value', 'title', 'sub_class']);
		Form::component('lbTextarea', 'layouts.form.bstextarea', ['name', 'value', 'title', 'placeholder']);
		Form::component('lbCKEditor', 'layouts.form.bsckeditor', ['name', 'value', 'title']);
		Form::component('lbCheckbox', 'layouts.form.bscheckbox', ['name', 'value', 'title']);
		Form::component('lbRatio', 'layouts.form.bsratio', ['name', 'value', 'items', 'title']);
		Form::component('lbSelect', 'layouts.form.bsselect', ['name', 'value', 'items', 'title']);
		Form::component('lbSelectIcon', 'layouts.form.bsselecticon', ['name', 'value', 'title']);
		Form::component('lbSelect2', 'layouts.form.bsselect2', ['name', 'value', 'items', 'title']);
		Form::component('lbSelect2multi', 'layouts.form.bsselect2multi', ['name', 'value', 'items', 'title']);
		Form::component('lbRatioYesNo', 'layouts.form.bsratioyesno', ['name', 'value', 'title']);
		Form::component('lbButton', 'layouts.form.bsbutton', ['url', 'method', 'title', 'attribute']);
		Form::component('lbAlert', 'layouts.form.bsalert', []);
		Form::component('lbSubmit', 'layouts.form.lbsubmit', []);

        $lang;
        try {
            $lang = Crypt::decrypt(Cookie::get('locale'));
        } catch (DecryptException $e) {
            $lang = Cookie::get('locale');
        }
        
        if ($lang != null) 
        {
            \App::setLocale($lang);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('LIBRESSLtd\LBForm\Controllers\LBFormController');
    }
}
