<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

    {{-- Fuentes --}}
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
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
        <p>Desarrollamos Software de acuerdo a tu necesidad</p>
    </div>
</body>

</html>
