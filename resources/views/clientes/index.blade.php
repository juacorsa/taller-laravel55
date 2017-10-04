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
		<div class="col-md-6">	
			<table id="tabla" class="table table-bordered">
				<thead>
					<tr>
						<td class="no-sort">Editar</td>
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
		<script>
		  	$('#tabla').DataTable({	
		  		"pagingType": "simple",
		  		"stateSave": true,	  			  		
				"language" : { "url": "{{ asset('/json/spanish.json')}}" }			 
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
				        title: "{{ Session::get('flash_titulo') }}",
				        type: "{{ Session::get('flash_tipo') }}",
				        text: "{{ Session::get('flash_mensaje') }}"
				    });
				});		
			</script>
		@endif
		
    @stop

@endsection
