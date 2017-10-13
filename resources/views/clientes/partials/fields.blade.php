
<div class="form-group"> 	  
	<div class="col-sm-offset-2 col-sm-8 error">			
		@if($errors->any())
			Atención, se han detectado los siguientes errores:			
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		@endif
	</div>
</div>

{!! Form::hidden('id', null) !!}

<div class="form-group">   		
	<label class="col-sm-2 control-label">Cliente</label>
	<div class="col-sm-8">
		{!! Form::text('nombre', null, ['class' => 'form-control', 'autocomplete' => 'off', 'autofocus']) !!}  	
	</div>	
</div>

