@extends('layouts.master')

@section('contenido')
	
	<h2>
		<i class="fa fa-bell" aria-hidden="true"></i> Entrada reparada de {{ $entrada->cliente->nombre }}
		({{ $entrada->producto->nombre }})
	</h2>	
	<p>A continuación podrás registrar la entrada seleccionada como reparada</p>	
	<hr/>
	<div class="col-sm-6">

		{!! Form::open(['class' => 'form-horizontal', 'route' => 'entrada-reparada.store', 'method' => 'POST']) !!}

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

			{!! Form::hidden('id', $entrada->id) !!}

			<div class="form-group">   		
				<label class="col-sm-2 control-label">Solución</label>
				<div class="col-sm-8">
					{!! Form::textarea('solucion', null, ['autofocus' => 'on', 'rows' => 5,  'class' => 'form-control', 'autocomplete' => 'off']) !!}  	
				</div>	
			</div>

			<div class="form-group">   		
				<label class="col-sm-2 control-label">Comentario</label>
				<div class="col-sm-8">
					{!! Form::textarea('comentario', $entrada->comentario, ['rows' => 5,  'class' => 'form-control', 'autocomplete' => 'off']) !!}  
				</div>	
			</div>

			<div class="form-group">   		
				<label class="col-sm-2 control-label">Horas</label>
				<div class="col-sm-2">
					{!! Form::text('horas', '1', ['class' => 'form-control', 'autocomplete' => 'off']) !!}  	
				</div>	
			</div>

			<div class="form-group">
	        	<div class="col-sm-offset-2 col-sm-8">				
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-plus"></i> Entrada reparada</button>				
					<a class="btn btn-danger" href="javascript:history.back()">
						<i class="fa fa-close"></i> Cancelar</a>		
	            </div>
        	</div>

		{!! Form:: close() !!}
	</div>


@endsection
