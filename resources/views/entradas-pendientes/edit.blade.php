@extends('layouts.master')

@section('contenido')
	
	<h2><i class="fa fa-bell" aria-hidden="true"></i> Actualizar entrada</h2>	
	<p>A continuación podrás actualizar la entrada seleccionada.</p>
	<hr/>
	<div class="col-sm-6">
		{!! Form::model($entrada, ['class' => 'form-horizontal', 'route' => 'entrada.update', 'method' => 'PUT']) !!}

			@include('entradas-pendientes.partials.fields')		

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
		@if(Session::has('flash_swal'))	
			<script type="text/javascript">
				$(function() {			
				    swal({
				        title: "{{ Session::get('flash_titulo') }}",
				        type: "{{ Session::get('flash_tipo') }}",
				        text: "{{ Session::get('flash_mensaje') }}"
				    });
				});		
			</script>
		@endif
    @stop
    
@endsection
