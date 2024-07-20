@extends('adminlte::page')

@section('title', 'Congreso')

@section('content_header')
    <h1>Participantes</h1>
@stop

@section('content')
    <div class="card">
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
    <script>
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
                    return (data == 1) ? '<span class="badge badge-primary">Validado</span>' : '<span class="badge badge-info">No validado</span>';
                }
            },
        ];

        columnDefs = [{
            className: 'text-left text-nowrap',
            targets: '_all'
        }];

        $(`#table`).DataTable({
            // createdRow: createdRow,
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
            // responsive: true,
            // layout: layout
        });
    </script>
@stop
