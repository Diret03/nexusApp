@extends($layout)

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">{{ __('Acerca de Nexus') }}</h1>

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card shadow mb-4">

                <div class="card-profile-image mt-4">
                    <img src="{{ asset('img/Logo.png') }}" class="rounded-circle" alt="user-image">
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="font-weight-bold">Nexus</h5>
                            <p>Nexus es una compañía enfocada en comercializar productos y servicios tecnológicos. Sus
                                principales divisiones incluyen la venta de computadoras de diferentes gamas y la creación
                                de software personalizado.</p>
                            <p>Debido al crecimiento significativo de la empresa, especialmente en el ámbito del desarrollo
                                de software, se busca mejorar la gestión de proyectos para la elaboración de sistemas
                                informáticos.</p>
                            <p>Nuestro compromiso es brindar el mejor servicio a nuestros clientes, asegurándonos de cumplir
                                con sus expectativas y ofrecer soluciones tecnológicas innovadoras y de alta calidad.</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="font-weight-bold">Créditos</h5>
                            <p>NexusApp utiliza algunas bibliotecas/paquetes de terceros de código abierto.</p>
                            <ul>
                                <li><a href="https://laravel.com" target="_blank">Laravel</a>
                                </li>
                                <li><a href="https://github.com/DevMarketer/LaravelEasyNav"
                                        target="_blank">LaravelEasyNav</a></li>
                                <li><a href="https://startbootstrap.com/themes/sb-admin-2" target="_blank">SB Admin 2</a>
                                </li>
                                <li><a href="https://spatie.be/docs/laravel-permission/v6/"
                                        target="_blank">laravel-permission(Roles)</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
