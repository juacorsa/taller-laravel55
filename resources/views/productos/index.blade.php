@extends('layouts.master')

@section('contenido')

	<h2>Gestión de productos</h2>
	<p>
	    A continuación se muestran todos los productos registrados en la aplicación, ordenados alfabéticamente.
		<span class="pull-right"> <a href="{{ route('producto.create') }}" class="btn btn-primary">
	    <i class="fa fa-plus"></i> Registrar un nuevo producto</a> 
	</p>






@endsection
