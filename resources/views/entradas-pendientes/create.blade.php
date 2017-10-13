@extends('layouts.master')

@section('contenido')
	
	<h2><i class="fa fa-bell" aria-hidden="true"></i> Registrar entrada</h2>	
	<p>A continuación podrás registrar un nueva entrada</p>	
	<hr/>
	<div class="col-sm-6">
		{!! Form::open(['class' => 'form-horizontal', 'route' => 'entrada.store', 'method' => 'POST']) !!}

			@include('entradas-pendientes.partials.fields')		

			<div class="form-group">
	        	<div class="col-sm-offset-2 col-sm-8">				
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-plus"></i> Registrar entrada</button>				
	            </div>
        	</div>

		{!! Form:: close() !!}
	</div>

@endsection
