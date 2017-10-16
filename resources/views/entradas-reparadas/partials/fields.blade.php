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
		<select class="form-control" name="cliente_id" autofocus="">
 			@foreach($clientes as $cliente)
          		<option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
      		@endforeach				
		</select>
	</div>	
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Usuario</label>
	<div class="col-sm-8">
		{!! Form::text('usuario', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}  	
	</div>	
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Producto</label>
	<div class="col-sm-8">
		<select class="form-control" name="producto_id">
 			@foreach($productos as $producto)
          		<option value="{{$producto->id}}">{{$producto->nombre}}</option>
      		@endforeach				
		</select>
	</div>	
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Modelo</label>
	<div class="col-sm-8">
		{!! Form::text('modelo', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}  	
	</div>	
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Accesorios</label>
	<div class="col-sm-8">
		{!! Form::text('accesorios', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}  			 
	</div>	
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Avería</label>
	<div class="col-sm-8">
		{!! Form::textarea('averia', null, ['rows' => 3,  'class' => 'form-control', 'autocomplete' => 'off']) !!}  	
	</div>	
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Solución</label>
	<div class="col-sm-8">
		{!! Form::textarea('solucion', null, ['rows' => 3,  'class' => 'form-control', 'autocomplete' => 'off']) !!}  	
	</div>	
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Horas</label>
	<div class="col-sm-2">
		{!! Form::text('horas', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}  			 
	</div>	
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Comentario</label>
	<div class="col-sm-8">
		{!! Form::textarea('comentario', null, ['rows' => 3,  'class' => 'form-control', 'autocomplete' => 'off']) !!}  
	</div>	
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Técnico</label>
	<div class="col-sm-8">
		<select class="form-control" name="tecnico_id">
 			@foreach($tecnicos as $tecnico)
          		<option value="{{$tecnico->id}}">{{$tecnico->nombre}}</option>
      		@endforeach				
		</select>
	</div>	
</div>