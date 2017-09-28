@extends('layouts.master')

@section('contenido')

	<h2><i class="fa fa-users" aria-hidden="true"></i> Actualizar cliente</h2>	
	<p>A continuación podrás actualizar el cliente seleccionado. Recuerda que no está permitido duplicar clientes.</p>
	<hr/>
	<div class="col-sm-6">
		{!! Form::model($cliente, ['class' => 'form-horizontal', 'route' => 'cliente.update', 'method' => 'PUT']) !!}

			@include('clientes.partials.fields')		

			<div class="form-group">
	        	<div class="col-sm-offset-2 col-sm-8">				
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-check"></i> Guardar cambios</button>	
					<a class="btn btn-danger" href="javascript:history.back()">
						<i class="fa fa-close"></i> Cancelar</a>			
	            </div>
        	</div>

		{!! Form:: close() !!}
	</div>

@endsection
