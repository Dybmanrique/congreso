<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Congreso Internacional</title>
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @yield('css')
    @livewireStyles
    <style>
        nav {
            width: 100%;
            height: 100px;
        }

        nav ul {
            float: right;
            margin-right: 20px;
        }

        nav ul li {
            display: inline-block;
            line-height: 80px;
            margin: 0 5px;
        }

        nav ul li a {
            color: white;
            font-size: 17px;
            padding: 7px 13px;
            border-radius: 3px;
        }

        a.active,
        a:hover {
            background: #e1e3e9;
            transition: 0.5s;
        }

        .background-image {
            min-height: 100vh;
            background: linear-gradient(rgba(5, 7, 12, 0.35), rgba(0, 0, 0, 0.35)),
                url('/img/nevado.png') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;

        }

        .fa-calendar {
            font-size: 3.5em;
            margin-left: 0.25em;

        }

        .fa-users {
            font-size: 3em;
        }

        .separator {
            font-size: 4.5em;
            margin-right: -1em;
            margin-left: 0.25em;
            margin-bottom: 20px;

        }
    </style>

</head>

<body class="antialiased">

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid" style="background-color: #ffffff;">
                <a class="navbar-brand  ms-5" href="#"><img src="{{ asset('img/unasam.png') }}" alt="UNASAM"
                        height="80px"></a>

                <a class="navbar-brand ms-5" href="#"><img src="{{ asset('img/matdiama.png') }}" alt="UNASAM"
                        height="80px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="#acerca">Presentacion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#ponentes">Ponentes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#convocatoria">Convocatoria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Programa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tallares</a>
                        </li>
                        <li class="nav-item mt-2">
                            <button id="a" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#registrarParticipanteModal">
                                Inscríbete
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid background-image">
        <div class="row">
            <div class="col-6 col-md-6 py-5 text-left text-white" style="margin-top: 140px; margin-left: 70px;">
                <h1 class="display-4 font-weight-semibold " style="font-family:  'Helvetica Neue', sans-serif"><strong>I
                        Congreso <br> Internacional de <br>Investigación Universitaria</h1>
                <p class="lead font-weight-semibolder mb-0">SANTIAGO ANTÚNEZ DE MAYOLO</p></strong>
                <div class="mt-4">
                    <a href="#"><img src="{{ asset('img/peru.png') }}" alt="Facebook" width="30"
                            height="30"></a>
                    <a href="#"><img src="{{ asset('img/spain.png') }}" alt="Twitter" width="30"
                            height="30"></a>
                    <a href="#"><img src="{{ asset('img/mexico.png') }}" alt="LinkedIn" width="30"
                            height="30"></a>
                    <a href="#"><img src="{{ asset('img/colombia.png') }}" alt="Instagram" width="30"
                            height="30"></a>
                </div>
                <h3 class=" font-weight-semibold mt-4" style="font-family:  'Helvetica Neue', sans-serif">
                    04 al 09 de noviembre</h3>
                <div class="mt-5">
                    <a href="#" class="btn btn-lg me-2" style="background-color: #000; color: #fff;"
                        data-bs-toggle="modal" data-bs-target="#registrarParticipanteModal">¡Quiero
                        inscribirme!</a>
                    <a href="#" class="btn btn-lg" style="background-color: #0752B5; color: #fff;">Mas
                        información</a>
                </div>
            </div>
            <div class="col-5 col-md-5 py-5 text-left text-white" style="margin-top: 520px;">
                <div class="text-center">

                    <div class="mt-3">
                        <h3 class="mt-1">
                            Costo de Inversión:
                        </h3>
                        <p style="background-color: #0752B5">Estudiantes: S/ 40.00, ponentes S/ 150.00 y publico
                            general S/ 130.00</p>
                        <p style="background-color: #ffffff7e; color:rgba(0, 0, 0) ">BCP:xxxx-xxxx-xxxx-xxxx; CCI:
                            xxxx-xxxx-xxxx-xxxx</p>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="text-white" style="background-color: #0752B5;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col d-flex align-items-center">
                    <i class="fa fa-calendar"></i> <span class="separator">|</span>
                </div>
                <div class="col-5">
                    <h3 class="font-weight-bolder" id="evento" style="color: #EDDFB0;">04 al 09 de noviembre
                    </h3>
                    <h3 class="font-weight-bolder"
                        style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                        HUARAZ</h3>
                </div>
                <div class="col-6">
                    <div class="row text-white text-center py-2" id="contador">
                        <div class="col">
                            <h2 class="font-weight-bolder" id="dias">00</h2>
                            <p class="font-weight-bold">Días</p>
                        </div>
                        <div class="col">
                            <h2 class="font-weight-bolder" id="horas">00</h2>
                            <p class="font-weight-bold">Horas</p>
                        </div>
                        <div class="col">
                            <h2 class="font-weight-bolder" id="minutos">00</h2>
                            <p class="font-weight-bold">Minutos</p>
                        </div>
                        <div class="col">
                            <h2 class="font-weight-bolder" id="segundos">00</h2>
                            <p class="font-weight-bold">Segundos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="acerca">
        <div class="container py-5">
            <div class="row mt-5">
                <div class="col-lg-6">
                    <h2 class="my-2">Acerca del evento</h2>
                    <p class="mt-5">Es un evento académico multidisciplinario que busca reunir a investigadores,
                        académicos, profesionales y estudiantes de diversas áreas del conocimiento para compartir
                        avances científicos, discutir metodologías y fomentar la colaboración interinstitucional.


                    </p>
                    <p>El evento reunirá a investigadores de países como: Honduras, Colombia, Mexico, <br>
                        EEUU, Rusia, España y entre otros.</p>

                    <div class="mt-4">
                        <a href="#"><img src="/img/peru.png" alt="Facebook" width="30"
                                height="30"></a>
                        <a href="#"><img src="/img/spain.png" alt="Twitter" width="30"
                                height="30"></a>
                        <a href="#"><img src="/img/mexico.png" alt="LinkedIn" width="30"
                                height="30"></a>
                        <a href="#"><img src="/img/colombia.png" alt="Instagram" width="30"
                                height="30"></a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div>
                        <i class="fa fa-users"></i>

                        <h3 class="mt-1">
                            Dirigido a:
                        </h3>
                        <p>Investigadores y ponentes de talla internacional
                            y nacional que dan realce a este evento. Asimismo,
                            también participan investigadores que deseen mostrar y exponer los resultados de sus
                            investigaciones a la comunidad académica y científica; y público en general que quiera
                            nutrir su conocimiento.
                        </p>
                    </div>
                    <div class="mt-3">
                        <a href="#"><img src="/img/certificado.png" alt="Instagram" width="60"></a>
                        <h3 class="mt-1">
                            Costo de Inversión:
                        </h3>
                        <p>Estudiantes: S/ 40.00, ponentes S/ 150.00 y publico general S/ 130.00</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <x-convocatoria.convocatoria />
    @livewire('convocatoria.ponentes')
    @livewire('convocatoria.registro-participantes')

    {{-- @livewire('particpantes-component')
    @livewire('ponentes-component')
    @component('convocatoria.convocatoria')
    @endcomponent --}}

    {{-- @livewire('ponencias-component')
    @livewire('registrar-grupo-investigacion-form')
    @livewire('registrar-institucion-modal-form') --}}

    @livewire('convocatoria.registro-ponentes')

    <footer class="footer bg-light text-dark">
        <div class="container text-center text-md-left">
            <div class="row">
                <!-- Primera sección -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase font-weight-bold" style="color: #0752B5;">INFORMACIÓN</h5>
                    <hr class="mb-4">
                    <p>El Vicerrectorado de Investigacion de la Universidad Nacional Santiago Antúnez de Mayolo se
                        dedica a la
                        investigación y desarrollo en diversas áreas. </p>
                </div>

                <!-- Cuarta sección -->
                <div class="col-md-1 col-lg-1 col-xl-1 mx-auto mt-3">
                    <h5 class="text-uppercase font-weight-bold" style="color: #0752B5;">Menu</h5>
                    <hr class="mb-4">
                    <p><a class="text-dark" href="#acerca">Acerca</a></p>
                    <p><a class="text-dark" href="#ponentes">Ponentes</a></p>
                    <p><a class="text-dark" href="#convocatoria">Convocatoria</a></p>
                </div>

                <!-- Quinta sección -->
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h5 class="text-uppercase font-weight-bold" style="color: #0752B5;">CONTACTO</h5>
                    <hr class="mb-4">
                    <p>
                        <li class="fas fa-home me-2 "></li>Ancash, Huaraz
                    </p>
                    <p>
                        <li class="fas fa-envelope me-2"></li>ciiunasam@unasam.edu.pe
                    </p>
                    <p>
                        <li class="fas fa-phone me-2"></li>+51 968 121 077

                    </p>
                    <p>

                        <li class="fas fa-phone me-2"></li>+51 916 730 881
                    </p>
                </div>
            </div>
            <hr style="width: 100%;">
        </div>
        <div style="width: 100%; background-color: #47464b; color:#ffffff;">
            <div class="text-center py-5">
                <p>Copyright © 2023–2024 VRI-UNASAM™. Todos los derechos reservados.
                <ul class="list-inline list-unstyled">
                    <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=61562064339315"><i
                                class="fab fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
                </p>
            </div>
        </div>
    </footer>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var fechaFinal = new Date("Nov 04, 2024 00:00:00").getTime();

        var x = setInterval(function() {
            var ahora = new Date().getTime();
            var distancia = fechaFinal - ahora;

            var dias = Math.floor(distancia / (1000 * 60 * 60 * 24));
            var horas = Math.floor((distancia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutos = Math.floor((distancia % (1000 * 60 * 60)) / (1000 * 60));
            var segundos = Math.floor((distancia % (1000 * 60)) / 1000);

            document.getElementById("dias").innerHTML = dias;
            document.getElementById("horas").innerHTML = horas;
            document.getElementById("minutos").innerHTML = minutos;
            document.getElementById("segundos").innerHTML = segundos;

            if (distancia < 0) {
                clearInterval(x);
                document.getElementById("dias").innerHTML = "";
                document.getElementById("horas").innerHTML = "";
                document.getElementById("minutos").innerHTML = "";
                document.getElementById("segundos").innerHTML = "¡Llegó el día!";
            }
        }, 1000);

        var Toast = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: true,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    </script>

    @livewireScripts
    @stack('js')
</body>

</html>
