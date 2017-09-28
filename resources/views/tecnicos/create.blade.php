@extends('layouts.master')

@section('contenido')
	
	<h2><i class="fa fa-user" aria-hidden="true"></i> Registrar técnico</h2>	
	<p>
	    A continuación podrás registrar un nuevo técnico. Recuerda que no está permitido duplicar técnicos.	    
	</p>
	<hr/>
	<div class="col-sm-6">
		{!! Form::open(['class' => 'form-horizontal', 'route' => 'tecnico.store', 'method' => 'POST']) !!}

			@include('tecnicos.partials.fields')		

			<div class="form-group">
	        	<div class="col-sm-offset-2 col-sm-8">				
					<button class="btn btn-primary no-border" type="submit">
						<i class="fa fa-plus"></i> Registrar técnico</button>				
	            </div>
        	</div>

		{!! Form:: close() !!}
	</div>

@endsection
