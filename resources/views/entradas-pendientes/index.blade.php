@extends('layouts.master')

@section('contenido')

	<h2><i class="fa fa-bell" aria-hidden="true"></i> Entradas pendientes</h2>
	<p>A continuación se muestran todas las entradas pendientes de reparar, ordenadas por fecha de entrada.</p>

	@entradas($entradas)
	{{ csrf_field() }}

	<div class="row">
		<div class="col-md-12">	
			<table id="tabla" class="table table-bordered">
				<thead>
					<tr>
						<td class="no-sort">Editar</td>
						<td class="fecha">Fecha Entrada</td>
						<td>En taller</td>
						<td>Cliente</td>
						<td>Usuario</td>
						<td>Producto</td>
						<td>Modelo</td>
						<td>Técnico</td>
						<td class="no-sort">Avería</td>
						<td class="no-sort">Comentario</td>
						<td class="no-sort text-center">Acciones</td>
					</tr>
				</thead>
				<tbody id="tbody">
					@foreach ($entradas as $entrada)
						<tr class="entrada{{$entrada->id}}">
							<td class="text-center">
								<a class="btn btn-primary" href="{{ route('entrada.edit', $entrada) }}">
									<i class="fa fa-bars"></i>									
								</a>						
							</td>	
							<td class="text-center">
								{{ Carbon\Carbon::parse($entrada->fecha_entrada)->format('d-m-Y') }}
							</td>
							<td class="text-center">
								@hoy($entrada)
									<span class="label label-success">Hoy</span>
								@endhoy

								@ayer($entrada)
									<span class="label label-warning">Ayer</span>								
								@endayer	

								@hacevariosdias($entrada)
									<?php
										Carbon\Carbon::setLocale('es');
										$fecha = Carbon\Carbon::parse($entrada->fecha_entrada);						
										$dias_retraso = $fecha->diffInDays(Carbon\Carbon::today());
										$retraso = 'Hace ' . $fecha->diffForHumans(Carbon\Carbon::now(), true);
										echo '<span class="label label-danger">';
										echo $retraso;
										echo '</span>';
									?>								
								@endhacevariosdias
							</td>	
							<td>{{ $entrada->cliente->nombre }}</td>						
							<td>{{ $entrada->usuario }}</td>
							<td>{{ $entrada->producto->nombre }}</td>
							<td>{{ $entrada->modelo }}</td>
							<td>{{ $entrada->tecnico->nombre }}</td>
							<td>{{ $entrada->averia }}</td>							
							<td>{{ $entrada->comentario }}</td>
							<td class="text-center">
								 <a href="{{ route('entrada-reparada.create', $entrada->id) }}" title="Reparar entrada" class="btn btn-success">
								 	<i class="fa fa-check"></i>									
								 </a>	
								 <button type="button" class="btn btn-danger btn-delete" data-id="{{$entrada->id}}" data-toggle="modal">
								 	<i class="fa fa-remove"></i>									
								 </button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@else
		Enhorabuena!!. No hay entradas pendientes de reparar.
	@endentradas

	@section('scripts')
	@parent    	
		<script>
			$(document).on('click', '.btn-delete', function() {				
 				entrada = $(this).attr('data-id'); 

				bootbox.confirm({
					size   : 'small',
					title  : "¿Borrar entrada?",
				    message: "¿Estás seguro que deseas borrar la entrada seleccionda?",
				    buttons: {
				        confirm: {
				            label: 'Sí, estoy seguro',
				            className: 'btn-success'
				        },
				        cancel: {
				            label: 'Cancelar',
				            className: 'btn-danger'
				        }
				    },
				    callback: function (result) {	
				    	if (result === true) {
				 			$.ajax({
				            	type: 'post',
				            	url : 'http://localhost/taller/public/delete',
				            	data: {
									'_token': $('input[name=_token]').val(),
			                		'id': entrada           		
				            	},
				            	success: function (data) {				                	
				                	$(".entrada" + entrada).hide();
				                	toastr.success('La entrada se ha borrado con éxito', 'Enhorabuena!!');

				            	},
				            	error: function (data) {
				                	console.log('Error:', data);
									toastr.error('Ha sido imposible borrar la entrada seleccionda', 'Error');		
				            	}
				        	});  
			        	}     			
				    }
				});
    		});	

		  	$('#tabla').DataTable({	
		  		"pagingType": "simple",
		  		"stateSave" : true,	 		  		
				"language"  : { "url": "{{ asset('/json/spanish.json')}}" },
				"columnDefs": [
				    { "width": "10px",  "targets": 0 },
				    { "width": "100px", "targets": 1 },
				    { "width": "60px",  "targets": 2 }
				  ]
		  	});		  
		</script>

		@if(Session::has('flash_toastr'))	
			<script type="text/javascript">
				toastr.{{ Session::get('flash_tipo') }}		
				('{{ Session::get('flash_mensaje') }}', '{{ Session::get('flash_titulo') }}')
			</script>
		@endif		

		@if(Session::has('flash_swal'))	
			<script type="text/javascript">
				$(function() {			
				    swal({
				        title:"{{ Session::get('flash_titulo') }}",
				        type: "{{ Session::get('flash_tipo') }}",
				        text: "{{ Session::get('flash_mensaje') }}"
				    });
				});		
			</script>
		@endif
    @stop


@endsection