@extends('layouts.master')

@section('contenido')
	<h2><i class="fa fa-check" aria-hidden="true"></i> Entradas entregadas</h2>
	<p>A continuación se muestran todas las entradas reparadas, ordenadas por fecha de entrega.</p>
	<div class="row">
		<div class="col-md-4">
			{!! Form::open(['class' => 'form-horizontal', 'route' => 'entradas-entregadas.list', 'method' => 'POST']) !!}
				<div class="form-group">				
					<label class="col-sm-2 control-label">Año</label>
					<div class="col-sm-5">
						{!! Form::select('año', $años, $año, array('class' => 'form-control')) !!}
					</div>									
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-search-plus"></i> Buscar entradas
					</button>				
				</div>	
			{!! Form::close() !!}
		</div>
	</div>
	<br/>
	@entradas($entradas)
	<div class="row">
		<div class="col-md-12">	
			<table id="tabla" class="table table-bordered">
				<thead>
					<tr>
						<td class="no-sort">Detalles</td>
						<td class="fecha">Reparado</td>
						<td class="fecha">Entregado</td>						
						<td>Cliente</td>
						<td>Usuario</td>
						<td>Producto</td>
						<td>Modelo</td>
						<td>Técnico</td>
						<td>Horas</td>
						<td class="no-sort">Avería</td>
						<td class="no-sort">Solución</td>
						<td class="no-sort">Comentario</td>						
					</tr>
				</thead>
				<tbody id="tbody">
					@foreach ($entradas as $entrada)
						<tr>
							<td class="text-center">
								<a class="btn btn-primary" href="{{ route('entrada-entregada.show', $entrada) }}">
									<i class="fa fa-bars"></i>									
								</a>						
							</td>	
							<td class="text-center">
								{{ Carbon\Carbon::parse($entrada->fecha_reparacion)->format('d-m-Y') }}
							</td>
							<td class="text-center">
								{{ Carbon\Carbon::parse($entrada->fecha_entrega)->format('d-m-Y') }}
							</td>						
							<td>{{ $entrada->cliente->nombre }}</td>						
							<td>{{ $entrada->usuario }}</td>
							<td>{{ $entrada->producto->nombre }}</td>
							<td>{{ $entrada->modelo }}</td>
							<td>{{ $entrada->tecnico->nombre }}</td>
							<td>{{ $entrada->horas }}</td>
							<td>{{ $entrada->averia }}</td>	
							<td>{{ $entrada->solucion }}</td>	
							<td>{{ $entrada->comentario }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@else
		Oops!!. No hay entradas entregadas para el año seleccionado
	@endentradas

	@section('scripts')
	@parent    	
		<script>
		  	$('#tabla').DataTable({	
		  		"pagingType": "simple",
		  		"stateSave" : true,	 		  		
				"language"  : { "url": "{{ asset('/json/spanish.json')}}" },
				"columnDefs": [
				    { "width": "10px", "targets": 0 },
				    { "width": "60px", "targets": 1 },
				    { "width": "60px", "targets": 2 }
				  ]
		  	});		  
		</script>
    @stop

@endsection