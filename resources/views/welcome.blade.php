<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>NEXUS</title>
</head>
<body>
    <nav id="header">    
        <img src="{{ asset('img/Logo.png') }}" alt="logo">
        <ul>
            <i class="fa-solid fa-user"></i>
            <li class="li"> <a href="{{ route('login') }}">Iniciar Sesion</a></li>
            <li class="li"><a href="{{ route('register') }}">Registrarse</a></li>
        </ul>
    </nav>
    <div class="mensaje">
        <h1>BIENVENIDO A NEXUS</h1>
        <p>Desarrollamos el Software de acuerdo a tu necesidad</p>
    </div>
</body>
</html>