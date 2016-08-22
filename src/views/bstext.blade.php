<div class="form-group">
    {{ Form::label($title, null, ['class' => 'control-label']) }}
    @if (isset($hin))
    	<span class="help-block">$hin</span>
    @endif
    <?php
    	$attrs = array('class' => 'form-control');
		if (isset($place_holder))
		{
			$attrs['placeholder'] = $place_holder;
		}
    ?>
    {{ Form::text($name, $value, $attrs) }}
</div>