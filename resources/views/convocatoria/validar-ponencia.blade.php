<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Congreso Internacional</title>
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid" style="background-color: #ffffff;">
                <a class="navbar-brand  ms-5" href="{{route('welcome')}}"><img src="{{ asset('img/unasam.png') }}" alt="UNASAM"
                        height="80px"></a>

                <span class="navbar-brand ms-5"><img src="{{ asset('img/matdiama.png') }}" alt="UNASAM"
                        height="80px"></span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        @livewire('convocatoria.form-validar-ponencia', ['ponente_ponencia' => $ponente_ponencia])
    </div>

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
