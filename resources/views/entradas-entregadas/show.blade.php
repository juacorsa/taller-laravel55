@extends('layouts.master')

@section('contenido')
	<h2><i class="fa fa-check" aria-hidden="true"></i> Detalle entrada entregada de {{ $entrada->cliente->nombre }}</h2>
	<p>A continuación se muestra toda la información asociada a la entrada seleccionada.</p>
	<div class="row">
		<div class="col-md-4">		
			<table class="table table-bordered">
				<tr>
					<td><strong>Cliente</strong></td>
					<td>{{ $entrada->cliente->nombre }}</td>
				</tr>
				<tr>
					<td><strong>Usuario</strong></td>
					<td>{{ $entrada->usuario }}</td>
				</tr>				
				<tr>
					<td><strong>Producto</strong></td>
					<td>{{ $entrada->producto->nombre }}</td>
				</tr>
				<tr>
					<td><strong>Modelo</strong></td>
					<td>{{ $entrada->modelo }}</td>
				</tr>				
				<tr>
					<td><strong>Fecha Entrada</strong></td>
					<td>
						{{ Carbon\Carbon::parse($entrada->fecha_entrada)->format('d-m-Y') }} 
						({{ $desdeFechaEntrada }})
					</td>
				</tr>
				<tr>
					<td><strong>Fecha Reparación</strong></td>
					<td>
						{{ Carbon\Carbon::parse($entrada->fecha_reparacion)->format('d-m-Y') }}
						({{ $desdeFechaReparacion }})
					</td>
				</tr>
				<tr>
					<td><strong>Fecha Entrega</strong></td>
					<td>
						{{ Carbon\Carbon::parse($entrada->fecha_entrega)->format('d-m-Y') }}
						({{ $desdeFechaEntrega }})
					</td>
				</tr>
				<tr>
					<td><strong>Avería</strong></td>
					<td>{{ $entrada->averia }}</td>
				</tr>
				<tr>
					<td><strong>Horas</strong></td>
					<td>{{ $entrada->horas }}</td>
				</tr>
				<tr>
					<td><strong>Solución</strong></td>
					<td>{{ $entrada->solucion }}</td>
				</tr>
				<tr>
					<td><strong>Comentario</strong></td>
					<td>{{ $entrada->comentario }}</td>
				</tr>
				<tr>
					<td><strong>Técnico</strong></td>
					<td>{{ $entrada->tecnico->nombre }}</td>
				</tr>
			</table>
		</div>
	</div>
	<a class="btn btn-primary" href="javascript:history.back()"><i class="fa fa-close"></i> Volver</a>
@endsection