@extends('adminlte::page')

@section('title', 'Congreso')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.users.create')}}" class="btn btn-success">Nuevo usuario</a>
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-striped table-sm w-100" id="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ejes temáticos</th>
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
                "data": "name"
            },
            {
                "data": "email"
            },
            {
                "data": "ejes_tematicos",
                "render": function(data, type, row, meta) {
                    if (data.length <= 0) {
                        return 'Ninguno asignado';
                    } else{
                        template = "<ul style='list-style: none; margin: 0; padding: 0;'>"
                        data.forEach(element => {
                            template += `<li>- ${element.nombre}</li>`;
                        });
                        template+="</ul>"
                        return template;
                    }
                }
            },
            {
                "data": null,
                "render": function(data, type, row, meta) {
                    template =
                        `<a class="btn btn-primary btn-sm mr-2 btn-edit" href="{{ route('admin.users.edit', ':id') }}"><i class="far fa-edit"></i> Editar</a>`.replace(':id', data.id);
                    template +=
                        `<button class="btn btn-sm btn-danger mr-2" onclick='eliminar(${data.id})' type="button"><i class="far fa-trash-alt"></i> Eliminar</button>`;
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
                "url": "{{ route('admin.users.data') }}",
                "type": "GET",
                "dataSrc": "",
            },
            "columns": columnAttributes,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
            },
            columnDefs: columnDefs,
        });

        function eliminar(id) {
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Vamos a eliminar a este participante",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.users.delete') }}",
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
    </script>
@stop
