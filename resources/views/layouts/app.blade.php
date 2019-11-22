<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title class="titulo"></title>

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap3/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">


</head>
<body id="app-layout">
    <div class="row-fluid" style="text-align:center;height:80px; background-color: white">
        <img src="..\img\logo.jpg" class="img-responsive" style="width: 5%; display: inline-block;">
        <div style="display: inline-block; width: 90%">
            <h1>Clínica San Antonio</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col"></div>
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

                <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            Inicio
                        </a>
                    

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
               <!-- <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul> -->

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Iniciar Sesi&oacute;n</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Registrarse</a></li>
                    @else
                        @if ((Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('owner')))
                            <!--<li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Datos Generales <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="{{ route('paises.index') }}">Pa&iacute;ses</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/provincias') }}">Provincias</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/localidades') }}">Localidades</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/feriados') }}">Feriados</a></li>
                                </ul>
                            </li>-->
                            <li class="nav-item dropdown">
                                <a href="{{ route('pacientes.index') }}" class="nav-link" role="button" aria-expanded="false">
                                    Pacientes <span class="caret"></span>
                                </a>
                                <!--<ul class="dropdown-menu" role="menu">
                                    <li class="dropdown-item"><a class="dropdown-item" href="{{ url('/obras_sociales') }}">Obras Sociales</a></li>
                                    <li class="dropdown-item"><a class="dropdown-item" href="{{ url('/planes') }}">Planes</a></li>
                                    <li class="dropdown-item"><a class="dropdown-item" href="{{ url('/tipopago') }}">Tipos de Pago</a></li>
                                    <li class="dropdown-item"><a class="dropdown-item" href="{{ url('/pacientes') }}"><i class="fa fa-heartbeat"></i> Pacientes</a></li>
                                </ul>-->
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ url('/obras_sociales') }}" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Obras Sociales <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown-item"><a class="dropdown-item" href="{{ url('/planes') }}">Planes</a></li>
                                    <li class="dropdown-item"><a class="dropdown-item" href="{{ url('/tipopago') }}">Tipos de Pago</a></li>
                                    
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ url('/especialidades') }}" class="nav-link" role="button" aria-expanded="false">
                                    Especialidades <span class="caret"></span>
                                </a>
                                <!--<ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="{{ url('/especialidades') }}">Especialidades</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/asuntos') }}">Asuntos de Mensajes</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/medicos') }}"><i class="fa fa-user-md"></i> M&eacute;dicos</a></li>
                                </ul>-->
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ url('/medicos') }}" class="nav-link" role="button" aria-expanded="false">
                                    M&eacute;dicos <span class="caret"></span>
                                </a>
                                <!--<ul class="dropdown-menu" role="menu">
                                    <!--<li><a class="dropdown-item" href="{{ url('/especialidades') }}">Especialidades</a></li>-->
                                    <!--<li><a class="dropdown-item" href="{{ url('/asuntos') }}">Asuntos de Mensajes</a></li>-->
                                    <!--<li><a class="dropdown-item" href="{{ url('/medicos') }}"><i class="fa fa-user-md"></i> M&eacute;dicos</a></li>
                                </ul>-->
                            </li>
                            <!--<li><a class="navbar-brand" href="{{ url('/mensajes') }}" id=mensajes>Mensajes</a></li>-->
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Gesti&oacute;n de Turnos <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="{{ url('/turnos.listado') }}"><i class="fa fa-btn fa-list"></i>Listado</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/turnos.create') }}"><i class="fa fa-btn fa-calendar-plus-o"></i>Dar un turno</a></li>
                                </ul>
                            </li>

                        <!--Exclusive menues (for paciente, medico or owner)-->
                        @elseif(Auth::user()->hasRole('paciente'))
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Turnos <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="{{ url('/turnos.create') }}"><i class="fa fa-btn fa-calendar-plus-o"></i>Turno por M&eacute;dico</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/turnos.create_por_especialidad') }}"><i class="fa fa-btn fa-calendar-plus-o"></i>Turno por Especialidad</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/turnos.misturnos') }}"><i class="fa fa-btn fa-calendar"></i>Mis Turnos</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/mensajes.create') }}">Contacto</a></li>
                        @elseif(Auth::user()->hasRole('medico'))
                            <li><a class="dropdown-item" href="{{ url('/medicos.misturnos') }}">Turnos</a></li>
                            <li><a class="dropdown-item" href="{{ url('/medicos.mismensajes') }}" id=mensajes>Mensajes</a></li>
                            <li><a class="dropdown-item" href="{{ url('/medicos.misdiastachados') }}" id=mensajes>Inasistencias Informadas</a></li>
                        @endif

                        @if(Auth::user()->hasRole('owner'))
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Configuraci&oacute;n <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="{{ url('/usersnroles') }}"><i class="fa fa-btn fa-user"></i>Usuarios y Roles</a></li>
                                <li><a class="dropdown-item" href="{{ url('/empresa.perfil') }}"><i class="fa fa-btn fa-building-o"></i>Empresa</a></li>
                            </ul>
                        </li>
                        @endif

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ ucwords(Auth::user()->name) . ' ' . ucwords(Auth::user()->surname) }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                @if(Auth::user()->hasRole('medico'))
                                    <!--<li><a class="dropdown-item" href="{{ url('/medicos.perfil') }}"><i class="fa fa-btn fa-user"></i>Perfil</a></li>-->
                                @else
                                    <!--<li><a class="dropdown-item" href="{{ url('/pacientes.perfil') }}"><i class="fa fa-btn fa-user"></i>Perfil</a></li>-->
                                @endif
                                <li><a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar Sesi&oacute;n</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}} 
    -->
    <!--IMPORTACIÓN DE COMPONENTES TIMEPICKER-->
    <!--<script src="https://www.google-analytics.com/analytics.js" async=""></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="{{ asset('jquery-timepicker/lib/site.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('jquery-timepicker/lib/site.css') }}">

    <script src="{{ asset('jquery-timepicker/lib/bootstrap-datepicker.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('jquery-timepicker/lib/bootstrap-datepicker.css') }}">

    <script src="{{ asset('jquery-timepicker/jquery.timepicker.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('jquery-timepicker/jquery.timepicker.css') }}">-->
    <!--FIN IMPORTACIÓN DE COMPONENTES TIMEPICKER-->

    <!--IMPORTACIÓN DE COMPONENTES COLORPICKER-->
    <!--<script src="{{ asset('bp-colorpicker/dist/js/bootstrap-colorpicker.js') }}"></script>    
    <link rel="stylesheet" href="{{ asset('bp-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">-->
    <!--FIN IMPORTACIÓN DE COMPONENTES COLORPICKER-->

    <script src="{{ asset('plugins/bootstrap/css/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap3/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/jquery/js/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('plugins/jquery/js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('plugins/ajax/js/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/ajax/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('plugins/Trumbowyg/dist/trumbowyg.js') }}"></script>

    <!--{{ Html::script('js/app.js') }}-->
    {{ Html::script('js(2)/layout/parameters.js') }}
    {{ Html::script('js(2)/layout/alertMensajes.js') }}
    {{ Html::script('js(2)/especialidades/create.js') }}
    {{ Html::script('js(2)/especialidades/edit.js') }}
    {{ Html::script('js(2)/feriados/create.js') }}
    {{ Html::script('js(2)/feriados/edit.js') }}
    {{ Html::script('js(2)/funciones/colorpicker.js') }}
    {{ Html::script('js(2)/funciones/datepicker.js') }}
    {{ Html::script('js(2)/funciones/focus.js') }}
    {{ Html::script('js(2)/funciones/timepicker.js') }}
    {{ Html::script('js(2)/funciones/toTitleCase.js') }}
    {{ Html::script('js(2)/funciones/validateMoney.js') }}
    {{ Html::script('js(2)/localidades/create.js') }}
    {{ Html::script('js(2)/localidades/edit.js') }}
    {{ Html::script('js(2)/medicos/diastachados.js') }}
    {{ Html::script('js(2)/medicos/edit.js') }}
    {{ Html::script('js(2)/medicos/horarios.js') }}
    {{ Html::script('js(2)/medicos/importe.js') }}
    {{ Html::script('js(2)/obras_sociales/create.js') }}
    {{ Html::script('js(2)/obras_sociales/edit.js') }}
    {{ Html::script('js(2)/pacientes/create.js') }}
    {{ Html::script('js(2)/pacientes/edit.js') }}
    {{ Html::script('js(2)/pacientes/confirm.js') }}
    {{ Html::script('js(2)/pacientes/edit_completo.js') }}
    {{ Html::script('js(2)/paises/create.js') }}
    {{ Html::script('js(2)/paises/edit.js') }}
    {{ Html::script('js(2)/planes/create.js') }}
    {{ Html::script('js(2)/planes/edit.js') }}
    {{ Html::script('js(2)/provincias/create.js') }}
    {{ Html::script('js(2)/provincias/edit.js') }}
    {{ Html::script('js(2)/register/register.js') }}
    {{ Html::script('js(2)/tipopago/create.js') }}
    {{ Html::script('js(2)/tipopago/edit.js') }}
    {{ Html::script('js(2)/turnos/create.js') }}
    {{ Html::script('js(2)/turnos/create_por_especialidad.js') }}
    {{ Html::script('js(2)/turnos/misturnos.js') }}
    {{ Html::script('js(2)/turnos/moverturno.js') }}
    @yield('scripts')
</body>
@include('partials.footer')
</html>
