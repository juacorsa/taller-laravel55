@extends('layouts.master')

@section('contenido')
	
	<h2><i class="fa fa-desktop" aria-hidden="true"></i> Actualizar producto</h2>	
	<p>A continuación podrás actualizar el producto seleccionado. Recuerda que no está permitido duplicar productos.</p>
	<hr/>
	<div class="col-sm-6">
		{!! Form::model($producto, ['class' => 'form-horizontal', 'route' => 'producto.update', 'method' => 'PUT']) !!}

			@include('productos.partials.fields')		

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

@section('scripts')
	@parent
	<script type="text/javascript">
			$(document).keydown(function(e) {				
				if (e.keyCode == 27) { 
				   window.history.back();
				   return false;
				}
			});    				
		</script>
    @stop

@endsection
