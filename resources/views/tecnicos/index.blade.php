@extends('layouts.master')

@section('contenido')

	<h2><i class="fa fa-user" aria-hidden="true"></i> Gestión de técnicos</h2>
	<p>
	    A continuación se muestran todos los técnicos registrados en la aplicación, ordenados alfabéticamente.
		<span class="pull-right"> <a href="{{ route('tecnico.create') }}" class="btn btn-primary">
	    	<i class="fa fa-plus"></i> Registrar un nuevo técnico</a></span>
	</p>
	<br>
	<div class="row">	
		<div class="col-md-2">
	    	<input type="text" class="form-control" autofocus id="buscar" placeholder="Buscar ..."></input>
	    </div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-4">	
			<table id="tabla" class="table table-bordered">
				<thead>
					<tr>
						<td>Editar</td>
						<td>Técnico</td>
					</tr>
				</thead>
				<tbody id="tbody">
					@foreach ($tecnicos as $tecnico)
						<tr class="item">
							<td class="editar">
								<a class="btn btn-primary" href="{{ route('tecnico.edit', $tecnico) }}">
									<i class="fa fa-bars"></i>									
								</a>						
							</td>							
							<td>
								{{ $tecnico->nombre }}
							</td>							
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	@section('scripts')
	@parent    	
    	<script src="{{ asset('js/filtrar.js') }}"></script>  
    @stop

@endsection
