@extends('layouts.master')

@section('contenido')

	<h2>Registrar producto</h2>
	<p>
	    A continuación podrás registrar un nuevo producto. Recuerda que no está permitido duplicar productos.	    
	</p>
	<hr/>
	<div class="col-sm-6">
		{!! Form::open(['class' => 'form-horizontal', 'route' => 'producto.store', 'method' => 'POST']) !!}

			@include('productos.partials.fields')		

			<div class="form-group">
	        	<div class="col-sm-offset-2 col-sm-8">				
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-plus"></i> Registrar producto</button>				
	            </div>
        	</div>

		{!! Form:: close() !!}
	</div>

@endsection
