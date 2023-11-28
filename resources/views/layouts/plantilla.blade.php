<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>

        body{
            background-color: rgb(15 23 42);
        }

        #contenido{
            overflow-wrap: break-word;
            height: 300px;
            text-align: start;
            padding: 5px;
        }

        .container{
            background-color: rgb(15 23 42);
        }
        .p,.btn{
            margin-left: 10px;margin-right: 10px;
        }

        .nav-item{
            margin-left: 10px;margin-right: 10px;

        }

    </style>
</head>
<body class=" text-white ">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('notas.index')}}">Tus notas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @yield('contenido')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
