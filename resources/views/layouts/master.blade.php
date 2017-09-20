<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de entradas</title>          
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">  
    <link href="{{ asset('/css/taller.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    
    

    <style type="text/css">
        .btn {
            border-radius: 0;   
        }

        input[type=text], textarea.form-control, select.form-control {
            border: 2px solid silver ;    
            border-radius: 0;
        }

        input[type=text]:focus, textarea.form-control:focus, select.form-control:focus {
           border: 2px solid #58ACFA;
        }

        .error { 
            color: #DC143C;
            font-size: 13px;
        }

        label {            
            font-size: 14px;
            font-weight: normal;
        }

        .editar {
            width: 50px;
        }

        thead { 
          background-color: #f5f5f5; 
          border-bottom: 4px solid #bdbdbd;   
        }

        table {
            background-color: white;
        }

        .item:hover {
            background-color: #f5f5f5;
        }





    </style>

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
                        <a href="{{ url('pedidos_entregados') }}"><i class="fa fa-bell"></i> Entradas Pendientes</a>
                    </li>
                    <li>
                        <a href="{{ url('pedidos_preparados') }}"><i class="fa fa-thumbs-up"></i> Entradas Preparadas</a>
                    </li>                    
                    <li>
                        <a href="{{ url('pedidos_entregados') }}"><i class="fa fa-check"></i> Entradas Entregadas</a>
                    </li>
                    <li>
                        <a href="{{ route('clientes.index') }}"><i class="fa fa-check"></i> Clientes</a>
                    </li>
                    <li>
                        <a href="{{ route('productos.index') }}"><i class="fa fa-check"></i> Productos</a>
                    </li>
                    <li>
                        <a href="{{ route('tecnicos.index') }}"><i class="fa fa-check"></i> Técnicos</a>
                    </li>
                </ul>                                
            </div>
        </div>
    </nav>

    <div class='container'>
        @yield('contenido')   
    </div>

    @section('scripts')
        
    @show
</body>
</html>
