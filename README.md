# LBForm
This is a form element pre-written with adminlte library of acacha.

# How to install

### Step 1: install

composer require libressltd/lbform

### Step 2: add service provider

In config/app.php, add following line to provider

LIBRESSLtd\LBForm\LBFormServiceProvider::class,

### Step 3: Publish 

php artisan vendor:publish --tag=lbform

### Step 4: Using:

{!! Form::lbText("text-input-name", "value in text input name", "Label of text input") !!}
