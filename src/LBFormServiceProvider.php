<?php

namespace LIBRESSLtd\LBForm;

use Illuminate\Support\ServiceProvider;
use Form;

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
	        __DIR__.'/views' => base_path('resources/views/libressltd/lbform'),
	    ]);
		
		Form::component('lbText', 'libressltd.lbform.bstext', ['name', 'value', 'title', 'place_holder']);
		Form::component('lbNumber', 'libressltd.lbform.bsnumber', ['name', 'value', 'title', 'min', 'max']);
		Form::component('lbTimepicker', 'libressltd.lbform.bstimepicker', ['name', 'value', 'title']);
		Form::component('lbDatepicker', 'libressltd.lbform.bsdatepicker', ['name', 'value', 'title']);
		Form::component('lbDatetime', 'libressltd.lbform.bsdatetime', ['name', 'value', 'title', 'sub_class']);
		Form::component('lbTextarea', 'libressltd.lbform.bstextarea', ['name', 'value', 'title', 'placeholder']);
		Form::component('lbCKEditor', 'libressltd.lbform.bsckeditor', ['name', 'value', 'title']);
		Form::component('lbCheckbox', 'libressltd.lbform.bscheckbox', ['name', 'value', 'title']);
		Form::component('lbRatio', 'libressltd.lbform.bsratio', ['name', 'value', 'items', 'title']);
		Form::component('lbSelect', 'libressltd.lbform.bsselect', ['name', 'value', 'items', 'title']);
		Form::component('lbSelect2', 'libressltd.lbform.bsselect2', ['name', 'value', 'items', 'title']);
		Form::component('lbSelect2multi', 'libressltd.lbform.bsselect2multi', ['name', 'value', 'items', 'title']);
		Form::component('lbRatioYesNo', 'libressltd.lbform.bsratioyesno', ['name', 'value', 'title']);
		Form::component('lbButton', 'libressltd.lbform.bsbutton', ['url', 'method', 'title', 'attribute']);
		Form::component('lbAlert', 'libressltd.lbform.bsalert', []);
		Form::component('lsSubmit', 'libressltd.lbform.lbsubmit', []);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    	
    }
}
