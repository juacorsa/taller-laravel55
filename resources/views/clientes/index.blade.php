@extends('layouts.master')

@section('contenido')

	<h2><i class="fa fa-users" aria-hidden="true"></i> Gestión de clientes</h2>
	<p>
	    A continuación se muestran todos los clientes registrados en la aplicación, ordenados alfabéticamente.
		<span class="pull-right"> <a href="{{ route('cliente.create') }}" class="btn btn-primary">
	    	<i class="fa fa-plus"></i> Registrar un nuevo cliente</a></span>
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
						<td>Cliente</td>
					</tr>
				</thead>
				<tbody id="tbody">
					@foreach ($clientes as $cliente)
						<tr class="item">
							<td class="editar">
								<a class="btn btn-primary" href="{{ route('cliente.edit', $cliente) }}">
									<i class="fa fa-bars"></i>									
								</a>						
							</td>							
							<td>
								{{ $cliente->nombre }}
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
