@extends('adminlte::page')

@section('title', 'Congreso')

@section('content_header')
    <h1>Participantes</h1>
@stop

@section('content')
    <!-- Modal -->
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

    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.participantes.create')}}" class="btn btn-success">Nuevo participante</a>
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-striped table-sm w-100" id="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Identificaciones</th>
                            <th scope="col">Participante</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Celular</th>
                            <th scope="col">F. Registro</th>
                            <th scope="col">F. Pago</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Metodo</th>
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
                "data": "participante"
            },
            {
                "data": "tipo"
            },
            {
                "data": "correo"
            },
            {
                "data": "celular"
            },
            {
                "data": "fecha_registro"
            },
            {
                "data": "fecha_pago"
            },
            {
                "data": "monto"
            },
            {
                "data": "metodo"
            },
            {
                "data": "es_valido",
                "render": function(data, type, row, meta) {
                    return (data == 1) ? '<span class="badge badge-primary">Validado</span>' :
                        '<span class="badge badge-info">No validado</span>';
                }
            },
            {
                "data": null,
                "render": function(data, type, row, meta) {
                    template =
                        `<button class="btn btn-sm btn-info mr-2" onclick="ver('${data.imagen_comprobante}')" type="button" data-toggle="modal" data-target="#modalVer"><i class="far fa-file-alt"></i> Ver comprobante</button>`;
                    if (data.es_valido == 0) {
                        template +=
                            `<button class="btn btn-sm btn-primary mr-2" onclick="validar(${data.id})" type="button"><i class=" fas fa-check"></i> Validar</button>`;
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
                "url": "{{ route('admin.participantes.data') }}",
                "type": "GET",
                "dataSrc": "",
            },
            "columns": columnAttributes,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
            },
            columnDefs: columnDefs,
        });

        function validar(id) {
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Vamos a validar a este participante",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Validar!',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.participantes.validar') }}",
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
        function invalidar(id) {
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Vamos a invalidar a este participante",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Invalidar!',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.participantes.invalidar') }}",
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
        function ver(imagen) {
            $('#imgComprobante').attr('src', url + "/" + imagen)
        }
    </script>
@stop
