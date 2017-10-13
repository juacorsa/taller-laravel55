<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de entradas</title>          
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css">    
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css">    
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.1/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Gestión Entradas</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">                    
                    <li>
                        <a href="{{ route('entradas-pendientes.index') }}"><i class="fa fa-bell"></i> Entradas Pendientes</a>
                    </li>
                    <li>
                        <a href="{{ url('pedidos_preparados') }}"><i class="fa fa-thumbs-up"></i> Entradas Preparadas</a>
                    </li>                    
                    <li>
                        <a href="{{ url('pedidos_entregados') }}"><i class="fa fa-check"></i> Entradas Entregadas</a>
                    </li>
                    <li>
                        <a href="{{ route('clientes.index') }}"><i class="fa fa-users"></i> Clientes</a>
                    </li>
                    <li>
                        <a href="{{ route('productos.index') }}"><i class="fa fa-desktop"></i> Productos</a>
                    </li>
                    <li>
                        <a href="{{ route('tecnicos.index') }}"><i class="fa fa-user"></i> Técnicos</a>
                    </li>
                </ul> 

                <ul class="nav navbar-nav pull-right">   
                    <li>    
                    <a href="{{ route('entrada.create') }}"><i class="fa fa-user"></i> Nueva entrada</a>
                    </li>                                               
                </ul>
            </div>
        </div>
    </nav>

    <div class='container'>
        @yield('contenido')   
    </div>

    @section('scripts')  
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.1/sweetalert2.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>  
        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script src="{{ asset('/js/datatable-config.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    @show
</body>
</html>




