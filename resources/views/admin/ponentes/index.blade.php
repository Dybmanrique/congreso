@extends('adminlte::page')

@section('title', 'Congreso')

@section('content_header')
    <h1>Ponentes</h1>
@stop

@section('content')

    <!-- Modal Comprobante-->
    <div class="modal fade" id="modalVer" tabindex="-1" aria-labelledby="modalVerLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalVerLabel">Comprobante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="imgComprobante"
                        src="https://edteam-media.s3.amazonaws.com/blogs/big/2ab53939-9b50-47dd-b56e-38d4ba3cc0f0.png"
                        class="img-fluid" alt="Imagen del comprobante">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detalles-->
    <div class="modal fade" id="detallesModal" tabindex="-1" aria-labelledby="detallesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detallesModalLabel">Detalles ponencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row gutters-sm">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img id="foto" src="https://cdn-icons-png.freepik.com/512/3106/3106921.png"
                                            alt="Admin" height="150" class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h5 id="ponente">Nombres</h5>
                                            <p id="grupo_investigacion" class="text-secondary mb-1">Grupo investigación</p>
                                            <p id="institucion" class="text-muted font-size-sm">Institución</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-3">Titulo:</h6>
                                        </div>
                                        <div id="titulo" class="col-sm-9 text-secondary">
                                            Titulo
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-3">Resumen:</h6>
                                        </div>
                                        <div id="resumen" class="col-sm-12 text-secondary">
                                            Resumen
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6 class="mb-3">CV resumen:</h6>
                                        </div>
                                        <div id="cv_resumen" class="col-sm-12 text-secondary">
                                            CV resumen
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}

    <div class="card">
        <div class="card-header">
            {{-- <a href="{{route('admin.participantes.create')}}" class="btn btn-success">Nuevo participante</a> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-striped table-sm w-100" id="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Identificaciones</th>
                            <th scope="col">Ponente</th>
                            <th scope="col">Título</th>
                            <th scope="col">Eje temático</th>
                            <th scope="col">Orcid ID</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Institución</th>
                            <th scope="col">G. Investigación</th>
                            <th scope="col">Estado</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        let columnAttributes = [{
                "data": "id",
                "render": function(data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                "data": "identificaciones",
                "render": function(data, type, row, meta) {
                    documents = '<ul style="list-style: none;" class="ml-0 pl-0 my-0">';
                    data.forEach(document => {
                        documents +=
                            `<li>${document.nombre}: ${document.pivot.numero}</li>`
                    });
                    documents += '</ul>';
                    return documents;
                }
            },
            {
                "data": null,
                "render": function(data, type, row, meta) {
                    return `${data.ap_paterno} ${data.ap_materno} ${data.nombres}`;
                }
            },
            {
                "data": "titulo"
            },
            {
                "data": "eje_tematico"
            },
            {
                "data": "orcid_id"
            },
            {
                "data": "correo"
            },
            {
                "data": "celular"
            },
            {
                "data": "institucion"
            },
            {
                "data": "grupo_investigacion"
            },
            {
                "data": null,
                "render": function(data, type, row, meta) {
                    template = ""
                    template += (data.estado == 1) ? '<span class="badge badge-primary mr-1">Habilitado</span>' :
                        '<span class="badge badge-info mr-1">Inhabilitado</span>';
                    template += (data.es_valido == 1) ? '<span class="badge badge-success">Validado</span>' :
                        '<span class="badge badge-warning">No validado</span>';
                    return template;
                }
            },
            {
                "data": null,
                "render": function(data, type, row, meta) {
                    template = "";
                    if (data.imagen_comprobante != null) {
                        template =
                            `<button class="btn btn-sm btn-info mr-2" onclick="ver('${data.imagen_comprobante}')" type="button" data-toggle="modal" data-target="#modalVer"><i class="far fa-file-alt"></i> Ver comprobante</button>`;
                    }
                    template +=
                        `<button class="btn btn-sm btn-secondary mr-2 btn-ver" type="button" data-toggle="modal" data-target="#detallesModal"><i class=" fas fa-eye"></i> Detalles</button>`;
                    if (data.estado == 0) {
                        template +=
                            `<button class="btn btn-sm btn-primary mr-2" onclick="habilitar(${data.id})" type="button"><i class=" fas fa-check"></i> Habilitar</button>`;
                    } else {
                        template +=
                            `<button class="btn btn-sm btn-danger mr-2" onclick="inhabilitar(${data.id})" type="button"><i class=" fas fa-ban"></i> Inhabilitar</button>`;
                    }
                    if (data.es_valido == 0) {
                        template +=
                            `<button class="btn btn-sm btn-success mr-2" onclick="validar(${data.id}, '${data.correo}')" type="button"><i class=" fas fa-check"></i> Validar</button>`;
                    } else {
                        template +=
                            `<button class="btn btn-sm btn-danger mr-2" onclick="invalidar(${data.id})" type="button"><i class=" fas fa-ban"></i> Invalidar</button>`;
                    }
                    return template;
                }
            },
        ];

        columnDefs = [{
            className: 'text-left text-nowrap',
            targets: '_all'
        }];

        let table = $(`#table`).DataTable({
            "ajax": {
                "url": "{{ route('admin.ponentes.data') }}",
                "type": "GET",
                "dataSrc": "",
            },
            "columns": columnAttributes,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
            },
            columnDefs: columnDefs,
        });

        function validar(id, email) {
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Vamos a validar a este ponente, y enviarle un CORREO ELECTRÓNICO para que confirme el pago.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Validar!',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.ponentes.validar') }}",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id: id,
                            email: email,
                        }
                    }).done(function(response) {
                        if (response.code == '200') {
                            table.ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: response.message
                            });
                        } else if (response.code == '500') {
                            Toast.fire({
                                icon: 'info',
                                title: response.message
                            });
                        }
                    });
                }
            });
        }

        function invalidar(id) {
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Vamos a invalidar a este ponete",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Invalidar!',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.ponentes.invalidar') }}",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id: id,
                        }
                    }).done(function(response) {
                        if (response.code == '200') {
                            table.ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: response.message
                            });
                        } else if (response.code == '500') {
                            Toast.fire({
                                icon: 'info',
                                title: response.message
                            });
                        }
                    });
                }
            });
        }

        function habilitar(id) {
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Vamos a habilitar a este ponete",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Habilitar!',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.ponentes.habilitar') }}",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id: id,
                        }
                    }).done(function(response) {
                        if (response.code == '200') {
                            table.ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: response.message
                            });
                        } else if (response.code == '500') {
                            Toast.fire({
                                icon: 'info',
                                title: response.message
                            });
                        }
                    });
                }
            });
        }

        function inhabilitar(id) {
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Vamos a inhabilitar a este ponete",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Inhabilitar!',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.ponentes.inhabilitar') }}",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id: id,
                        }
                    }).done(function(response) {
                        if (response.code == '200') {
                            table.ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: response.message
                            });
                        } else if (response.code == '500') {
                            Toast.fire({
                                icon: 'info',
                                title: response.message
                            });
                        }
                    });
                }
            });
        }

        let url = "{{ asset('storage/') }}";
        $('#table tbody').on('click', '.btn-ver', function() {
            var tr = $(this).closest('tr');
            var data = table.row(tr).data();
            $('#ponente').text(`${data.ap_paterno} ${data.ap_materno} ${data.nombres}`);
            $('#grupo_investigacion').text(data.grupo_investigacion);
            $('#institucion').text(data.institucion);
            $('#titulo').text(data.titulo);
            $('#resumen').text(data.resumen);
            $('#cv_resumen').text(data.cv_resumen);
            $('#foto').attr('src', `${url}/${data.foto}`);
        });

        function ver(imagen) {
            $('#imgComprobante').attr('src', url + "/" + imagen)
        }
    </script>
@stop
