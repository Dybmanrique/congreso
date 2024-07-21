<div>
    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="registrarPonenciaModal" aria-labelledby="registrarPonenciaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form wire:submit.prevent="submitForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registrarPonenciaModalLabel">Registrar Ponencia</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h6>Datos de la ponencia</h6>
                                <div class="form-group">
                                    <label for="titulo" class="mt-2">Titulo:</label>
                                    <input type="text" class="form-control" id="titulo" wire:model="titulo"
                                        required>
                                    @error('titulo')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="resumen" class="mt-2">Resumen:</label>
                                    <textarea wire:model="resumen" name="resumen" id="resumen" class="form-control" rows="3"></textarea>
                                    @error('resumen')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="eje_tematico_id" class="mt-2">Eje temático:</label>
                                    <select class="form-control" style="margin-right: 0.5rem;" id="eje_tematico_id"
                                        wire:model="eje_tematico_id" required>
                                        <option value="0" selected hidden>Seleccione ... </option>
                                        @foreach ($ejesTematicos as $eje)
                                            <option value="{{ $eje->id }}">
                                                {{ $eje->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('eje_tematico_id')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <h6>Datos del Ponente</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tipo_documento_id" class="mt-2">Tipo de Documento:</label>
                                            <select class="form-control" id="tipo_documento_id"
                                                wire:model="tipo_documento_id" required>
                                                <option value="0" selected hidden>Seleccione ... </option>
                                                @foreach ($tiposDocumento as $tipo)
                                                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                                @endforeach
                                            </select>
                                            @error('tipo_documento_id')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control mt-2 " id="numero_documento"
                                                placeholder="Ingrese su documento" wire:model="numero_documento"
                                                required>
                                            @error('numero_documento')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nombres" class="mt-2">Nombres:</label>
                                            <input type="text" class="form-control" id="nombres"
                                                wire:model="nombres" required>
                                            @error('nombres')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="ap_paterno" class="mt-2">Apellido Paterno:</label>
                                            <input type="text" class="form-control" id="ap_paterno"
                                                wire:model="ap_paterno" required>
                                            @error('ap_paterno')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="ap_materno" class="mt-2">Apellido Materno:</label>
                                            <input type="text" class="form-control" id="ap_materno"
                                                wire:model="ap_materno" required>
                                            @error('ap_materno')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="correo" class="mt-2">Correo:</label>
                                            <input type="email" class="form-control" id="correo"
                                                wire:model="correo" required>
                                            @error('correo')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="celular" class="mt-2">Celular:</label>
                                            <input type="tel" class="form-control" id="celular"
                                                wire:model="celular" required>
                                            @error('celular')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="grupo_investigacion_id" class="mt-2">Grupo de
                                                Investigación:</label>
                                            <div class="d-flex align-items-center">
                                                <select class="form-control" style="margin-right: 0.5rem;"
                                                    id="grupo_investigacion_id" wire:model="grupo_investigacion_id"
                                                    required>
                                                    <option value="0" selected hidden>Seleccione ... </option>
                                                    @foreach ($grupoInvestigacion as $grupo)
                                                        <option value="{{ $grupo->id }}">{{ $grupo->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button id="agregarGrupo" type="button" class="btn btn-primary">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            @error('grupo_investigacion_id')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="institucion_id" class="mt-2">Institución:</label>
                                            <div class="d-flex align-items-center">
                                                <select class="form-control" style="margin-right: 0.5rem;"
                                                    id="institucion_id" wire:model="institucion_id" required>
                                                    <option value="0" selected hidden>Seleccione ... </option>
                                                    @foreach ($instit as $institucion)
                                                        <option value="{{ $institucion->id }}">
                                                            {{ $institucion->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                <button id="agregarInstitucion" type="button"
                                                    class="btn btn-primary">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            @error('institucion_id')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="orcid_id" class="mt-2">ORCID ID:</label>
                                            <input type="text" class="form-control" id="orcid_id"
                                                wire:model="orcid_id" required>
                                            @error('orcid_id')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="paper" class="mt-2">Enlace de paper:</label>
                                            <input type="text" class="form-control" id="paper"
                                                wire:model="paper">
                                            @error('paper')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="foto" class="mt-2">Subir Foto:</label>
                                            <input type="file" class="form-control" id="foto"
                                                wire:model="foto" required>
                                            @error('foto')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                            <div wire:loading wire:target="foto">
                                                <div class="spinner-border spinner-border-sm" role="status">
                                                    <span class="visually-hidden">Loading...</span> 
                                                </div>
                                                Cargando...
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cv_resumen" class="mt-2">CV Resumen:</label>
                                            <textarea wire:model="cv_resumen" name="cv_resumen" id="cv_resumen" class="form-control" rows="3"></textarea>
                                            @error('cv_resumen')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary" wire:loading.class="disabled" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Registrar Grupo Investigacion-->
        <div class="modal fade" id="modalGrupo" tabindex="-1" aria-labelledby="modalGrupoLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form wire:submit='registrar_grupo'>
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalGrupoLabel">Agregar grupo de investigación</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="grupo_investigacion_add">Nombre: </label>
                                <input wire:model='grupo_investigacion_add' type="text"
                                    name="grupo_investigacion_add" class="form-control" id="grupo_investigacion_add">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Registrar Instituciones-->
        <div class="modal fade" id="modalInstitucion" tabindex="-1" aria-labelledby="modalInstitucionLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form wire:submit='registrar_institucion'>
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalInstitucionLabel">Agregar Institución</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="institucion_add">Nombre: </label>
                                <input wire:model='institucion_add' type="text" name="institucion_add"
                                    class="form-control" id="institucion_add">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @push('js')
            <script>
                window.addEventListener('closePonenciaModal', event => {
                    $('#registrarPonenciaModal').modal('hide');
                });

                Livewire.on('grupoAgregado', function(message) {
                    $('#modalGrupo').modal('hide');
                    setTimeout(() => {
                        @this.set('grupo_investigacion_id', message.id)
                    }, 500);
                })

                Livewire.on('institucionAgregada', function(message) {
                    $('#modalInstitucion').modal('hide');
                    setTimeout(() => {
                        @this.set('institucion_id', message.id)
                    }, 500);
                })

                window.addEventListener('showPonenciaSuccessAlert', event => {
                    Swal.fire({
                        title: "¡Gracias por Registrarse!",
                        text: "Evaluaremos sus datos, y le confirmaremos a su correo.",
                        icon: "success",
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    });
                });

                window.addEventListener('error', event => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Algo salió mal, reinicie la página.',
                    })
                });

                $('#agregarGrupo').click(function() {
                    $('#modalGrupo').modal('show');
                });
                $('#agregarInstitucion').click(function() {
                    $('#modalInstitucion').modal('show');
                });
            </script>
        @endpush
    </div>

</div>
