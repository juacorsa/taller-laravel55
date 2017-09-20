@extends('layouts.master')

@section('contenido')

	<h2>Gestión de productos</h2>
	<p>
	    A continuación se muestran todos los productos registrados en la aplicación, ordenados alfabéticamente.
		<span class="pull-right"> <a href="{{ route('producto.create') }}" class="btn btn-primary">
	    	<i class="fa fa-plus"></i> Registrar un nuevo producto</a></span>
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
						<td>Producto</td>
					</tr>
				</thead>
				<tbody id="tbody">
					@foreach ($productos as $producto)
						<tr class="item">
							<td class="editar">
								<a class="btn btn-primary" href="{{ route('producto.edit', $producto) }}">
									<i class="fa fa-bars"></i>									
								</a>						
							</td>							
							<td>
								{{ $producto->nombre }}
							</td>							
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	@section('scripts')
	@parent
    	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    	<script src="{{ asset('js/filtrar.js') }}"></script>  
    @stop

@endsection
