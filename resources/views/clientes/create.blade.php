@extends('layouts.master')

@section('contenido')
	<h2><i class="fa fa-users" aria-hidden="true"></i> Registrar cliente</h2>
	<p>
	    A continuación podrás registrar un nuevo cliente. Recuerda que no está permitido duplicar clientess.	    
	</p>
	<hr/>
	<div class="col-sm-6">
		{!! Form::open(['class' => 'form-horizontal', 'route' => 'cliente.store', 'method' => 'POST']) !!}

			@include('clientes.partials.fields')		

			<div class="form-group">
	        	<div class="col-sm-offset-2 col-sm-8">				
					<button class="btn btn-primary no-border" type="submit">
						<i class="fa fa-plus"></i> Registrar cliente</button>				
	            </div>
        	</div>

		{!! Form:: close() !!}
	</div>

@endsection
