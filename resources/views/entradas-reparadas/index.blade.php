@extends('layouts.master')

@section('contenido')

	<h2><i class="fa fa-thumbs-up" aria-hidden="true"></i> Entradas reparadas</h2>
	<p>A continuación se muestran todas las entradas reparadas, ordenadas por fecha de reparación.</p>

	@entradas($entradas)
	{{ csrf_field() }}

	<div class="row">
		<div class="col-md-12">	
			<table id="tabla" class="table table-bordered">
				<thead>
					<tr>
						<td class="no-sort">Editar</td>						
						<td>Reparada</td>
						<td>Cliente</td>
						<td>Usuario</td>
						<td>Producto</td>						
						<td>Técnico</td>
						<td class="no-sort">Avería</td>
						<td class="no-sort">Comentario</td>
						<td class="no-sort">Solución</td>
						<td class="no-sort text-center">Horas</td>
						<td class="no-sort text-center">Acciones</td>
					</tr>
				</thead>
				<tbody id="tbody">
					@foreach ($entradas as $entrada)
						<tr class="entrada{{$entrada->id}}">
							<td class="text-center">
								<a class="btn btn-primary" href="{{ route('entrada-reparada.edit', $entrada) }}">
									<i class="fa fa-bars"></i>									
								</a>						
							</td>	
							<td class="text-center">
								@hoy($entrada->fecha_reparacion)
									<span class="label label-success">Hoy</span>
								@endhoy

								@ayer($entrada->fecha_reparacion)
									<span class="label label-warning">Ayer</span>								
								@endayer	

								@hacevariosdias($entrada->fecha_reparacion)
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
							<td>{{ $entrada->tecnico->nombre }}</td>
							<td>{{ $entrada->averia }}</td>							
							<td>{{ $entrada->comentario }}</td>
							<td>{{ $entrada->solucion }}</td>
							<td class="text-center">{{ $entrada->horas }}</td>
							<td class="text-center">								 
								<div class="btn-group">
								  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Entrada entregada">
								    <i class="fa fa-check"></i></button>
								  <ul class="dropdown-menu">
								    <li><a href="#" class="entregada" data-id="{{$entrada->id}}" data-desde="0">Hoy</a></li>
								    <li><a href="#" class="entregada" data-id="{{$entrada->id}}" data-desde="1">Ayer</a></li>
								    <li><a href="#" class="entregada" data-id="{{$entrada->id}}" data-desde="2">Hace 2 días</a></li>	
								    <li><a href="#" class="entregada" data-id="{{$entrada->id}}" data-desde="3">Hace 3 días</a></li>
								    <li><a href="#" class="entregada" data-id="{{$entrada->id}}" data-desde="4">Hace 4 días</a></li>
								    <li><a href="#" class="entregada" data-id="{{$entrada->id}}" data-desde="5">Hace 5 días</a></li>
								    <li><a href="#" class="entregada" data-id="{{$entrada->id}}" data-desde="6">Hace 6 días</a></li>
								    <li><a href="#" class="entregada" data-id="{{$entrada->id}}" data-desde="7">Hace 1 semana</a></li>
								  </ul>
								</div>								 
								 <button type="button" class="btn btn-danger btn-delete" data-id="{{$entrada->id}}" title="Borrar entrada">
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
		No hay entradas reparadas.
	@endentradas

	@section('scripts')
	@parent    	
		<script>
			$(document).on('click', '.entregada', function() {				
 				entrada_id = $(this).attr('data-id'); 
 				desde = $(this).attr('data-desde'); 

				$.ajax({
					type: 'post',
				    url : 'http://localhost/taller/public/entrada-entregada',
				    data: {
						'_token': $('input[name=_token]').val(),
			            'id'    : entrada_id,
			            'desde' : desde
				    },
				    success: function (resultado) {						            		
				    	$(".entrada" + entrada_id).hide();
				        toastr.success(resultado.mensaje, resultado.titulo);
				    },
				    error: function (resultado) {
				    	console.log('Error:', resultado);
						toastr.error(resultado.mensaje, resultado.titulo);
				    }
				});  				
 			});

			$(document).on('click', '.btn-delete', function() {				
 				entrada_id = $(this).attr('data-id'); 

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
				    callback: function (resultado) {	
				    	if (resultado === true) {
				 			$.ajax({
				            	type: 'post',
				            	url : 'http://localhost/taller/public/borrar-entrada',
				            	data: {
									'_token': $('input[name=_token]').val(),
			                		'id': entrada_id          		
				            	},
				            	success: function (resultado) {						            		
				                	$(".entrada" + entrada_id).hide();
				                	toastr.success(resultado.mensaje, resultado.titulo);
				            	},
				            	error: function (resultado) {
				                	console.log('Error:', resultado);
									toastr.error(resultado.mensaje, resultado.titulo);
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
				    { "width": "80px", "targets": 1 }				    
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