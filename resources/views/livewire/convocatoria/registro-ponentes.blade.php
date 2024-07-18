<div>
    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="registrarPonenciaModal" aria-labelledby="registrarPonenciaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrarPonenciaModalLabel">Registrar Ponencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="registrarPonencia" class="row g-3 needs-validation">
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

                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <h6>Datos del Ponente</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tipo_documento_id" class="form-label">Tipo de Documento:</label>
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
                                            <label for="nombres" class="form-label">Nombres:</label>
                                            <input type="text" class="form-control" id="nombres" wire:model="nombres"
                                                required>
                                            @error('nombres')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="ap_paterno" class="form-label">Apellido Paterno:</label>
                                            <input type="text" class="form-control" id="ap_paterno"
                                                wire:model="ap_paterno" required>
                                            @error('ap_paterno')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="ap_materno" class="form-label">Apellido Materno:</label>
                                            <input type="text" class="form-control" id="ap_materno"
                                                wire:model="ap_materno" required>
                                            @error('ap_materno')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="correo" class="form-label">Correo:</label>
                                            <input type="email" class="form-control" id="correo" wire:model="correo"
                                                required>
                                            @error('correo')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="celular" class="form-label">Celular:</label>
                                            <input type="tel" class="form-control" id="celular" wire:model="celular"
                                                required>
                                            @error('celular')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="grupo_investigacion_id" class="form-label">Grupo de
                                                Investigacion:</label>
                                            <div class="d-flex align-items-center">
                                                <select class="form-control" style="margin-right: 0.5rem;"
                                                    id="grupo_investigacion_id" wire:model="grupo_investigacion_id"
                                                    required>
                                                    <option value="0" selected hidden>Seleccione ... </option>
                                                    @foreach ($grupoInvestigacion as $grupo)
                                                        <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                <button id="modalGrupo"
                                                    class="btn btn-primary ml-3 d-flex align-items-center"
                                                    data-bs-toggle="modal" data-bs-target="#registrarGrupoModal">
                                                    <i class="fas fa-plus" style="margin-right: 0.5rem;"></i>Grupo
                                                </button>
                                                @error('grupo_investigacion_id')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="institucion_id" class="form-label">Institucion:</label>
                                            <div class="d-flex align-items-center">
                                                <select class="form-control" style="margin-right: 0.5rem;"
                                                    id="institucion_id" wire:model="institucion_id" required>
                                                    <option value="0" selected hidden>Seleccione ... </option>
                                                    @foreach ($instit as $institucion)
                                                        <option value="{{ $institucion->id }}">
                                                            {{ $institucion->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                <button id="modalInstitucion"
                                                    class="btn btn-primary ml-3 d-flex align-items-center"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#registrarInstitucionModal">
                                                    <i class="fas fa-plus"
                                                        style="margin-right: 0.5rem;"></i>Institución
                                                </button>
                                                @error('institucion_id')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="orcid_id" class="form-label">ORCID ID:</label>
                                            <input type="text" class="form-control" id="orcid_id"
                                                wire:model="orcid_id" required>
                                            @error('orcid_id')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="foto" class="form-label">Subir Foto:</label>
                                            <input type="file" class="form-control" id="foto" wire:model="foto"
                                                required>
                                            @error('foto')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cv_resumen" class="form-label">CV Resumen:</label>
                                            <textarea wire:model="cv_resumen" name="cv_resumen" id="cv_resumen" class="form-control" rows="3"></textarea>
                                            @error('cv_resumen')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button class="btn btn-primary" type="submit" wire:click="submitForm">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @push('js')
            <script>
                window.addEventListener('closePonenciaModal', event => {
                    $('#registrarPonenciaModal').modal('hide');
                    console.log('xd');
                });
            </script>

            <script>
                window.addEventListener('showPonenciaSuccessAlert', event => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registro Exitoso!',
                        position: 'top-end',
                        timer: 3000,
                        toast: true,
                    });
                });
            </script>
        @endpush
    </div>

</div>
