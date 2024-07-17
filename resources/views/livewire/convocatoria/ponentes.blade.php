<div>
    <style>
        #tarjetaFoto {
            margin-top: 0em;
            padding: 1.5em 0.5em 0.5em;
            border-radius: 1em;
            text-align: center;
            box-shadow: 0 5px 10px rgba(255, 255, 255, 0.2);
        }

        #tarjetaImg {
            width: 166px;
            height: 181px;
            border-radius: 50%;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }

        .card #tarjetaTitulo{
            font-weight: 700;
            font-size: 1.5em;
        }

        .card #tarjetaBoton {
            border-radius: 4em;
            background-color: #0752B5;
            color: #ffffff;
            padding: 0.5em 1.5em;
        }

        .card .btn:hover {
            background-color: rgba(0, 128, 128, 0.7);
            color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>

    <!-- Sección de Ponentes -->
    <div class="d-flex align-items-center text-white text-center py-4" id="ponentes" style="background-color: #0752B5;">
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="mb-5">PONENTES</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            @foreach ($ponentes as $ponente)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-white h-100   " style="margin: 10px; background-color:#ffff;" id="tarjetaFoto">
                        <div class="card-body" id="tarjetaFoto">
                            <img src="{{ asset('storage/' . $ponente->foto) }}" class="card-img-top img-fluid" height="456"
                                alt="Foto de {{ $ponente->autor->persona->nombre }}" style="object-fit: cover;" id="tarjetaImg">
                            <h5 class="card-title mt-3 text-dark" id="tarjetaTitulo">{{ $ponente->autor->persona->nombres }}</h5>
                            <p class="card-text text-dark" id="tarjetaResumen">{{ \Illuminate\Support\Str::limit($ponente->cv_resumen, 50, '...') }}
                            </p>
                            <a href="#" class="btn btn-light" id="tarjetaBoton">Más información</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
