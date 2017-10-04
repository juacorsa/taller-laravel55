	@extends('layouts.master')

@section('contenido')
	
	<h2><i class="fa fa-desktop" aria-hidden="true"></i> Registrar de producto</h2>	
	<p>
	    A continuación podrás registrar un nuevo producto. Recuerda que no está permitido duplicar productos.	    
	</p>
	<hr/>
	<div class="col-sm-6">
		{!! Form::open(['class' => 'form-horizontal', 'route' => 'producto.store', 'method' => 'POST']) !!}

			@include('productos.partials.fields')		

			<div class="form-group">
	        	<div class="col-sm-offset-2 col-sm-8">				
					<button class="btn btn-primary no-border" type="submit">
						<i class="fa fa-plus"></i> Registrar producto</button>				
	            </div>
        	</div>

		{!! Form:: close() !!}
	</div>

	@section('scripts')
	@parent    	
		@if(Session::has('flash_mensaje'))	
			<script type="text/javascript">
				$(function() {			
				    swal({
				        title: "{{ Session::get('flash_titulo') }}",
				        type: "{{ Session::get('flash_tipo') }}",
				        text: "{{ Session::get('flash_mensaje') }}"
				    });
				});		
			</script>				
			@php
		    	\Session::flush()		
			@endphp    
		@endif		
    @stop

@endsection
