<div class="card">
    <form wire:submit.prevent="submitForm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tipo_documento_id" class="mt-2">Tipo de Documento:</label>
                        <select class="form-control" id="tipo_documento_id" wire:model="tipo_documento_id" required>
                            <option value="0" selected hidden>Seleccione ... </option>
                            @foreach ($tiposDocumento as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                        @error('tipo_documento_id')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <input type="text" class="form-control mt-2 " id="numero_documento"
                                placeholder="Ingrese su documento" wire:model="numero_documento" required>
                            @error('numero_documento')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nombres" class="mt-2">Nombres:</label>
                            <input type="text" class="form-control" id="nombres" wire:model="nombres" required>
                            @error('nombres')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ap_paterno" class="mt-2">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="ap_paterno" wire:model="ap_paterno" required>

                            @error('ap_paterno')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ap_materno" class="mt-2">Apellido Materno:</label>
                            <input type="text" class="form-control" id="ap_materno" wire:model="ap_materno" required>
                            @error('ap_materno')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="correo" class="mt-2">Correo:</label>
                            <input type="email" class="form-control" id="correo" wire:model="correo" required>
                            @error('correo')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="celular" class="mt-2">Celular:</label>
                            <input type="tel" class="form-control" id="celular" wire:model="celular" required>
                            @error('celular')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="from-group">
                        <label for="tipo_participante_id" class="mt-2">Condicion:</label>
                        <select class="form-control" id="tipo_participante_id" wire:model="tipo_participante_id"
                            required>
                            <option value="0" selected hidden>Seleccione ... </option>
                            @foreach ($tiposParticipante as $tipoParticipante)
                                <option value="{{ $tipoParticipante->id }}">
                                    {{ $tipoParticipante->tipo }}</option>
                            @endforeach
                        </select>
                        @error('tipo_participante_id')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="metodo_pago_id" class="mt-2">Metodo de Pago:</label>
                        <select class="form-control" id="metodo_pago_id" wire:model="metodo_pago_id" required>
                            <option value="0" selected hidden>Seleccione ... </option>
                            @foreach ($metodoPago as $metodo)
                                <option value="{{ $metodo->id }}">{{ $metodo->metodo }}</option>
                            @endforeach
                        </select>
                        @error('metodo_pago_id')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_pago" class="mt-2">Fecha de Pago:</label>
                        <input type="date" class="form-control  " id="fecha_pago" placeholder="fecha de pago"
                            wire:model="fecha_pago" required>
                        @error('fecha_pago')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="from-group">
                        <label for="monto" class="mt-2">Monto:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">S/.</span>
                            </div>
                            <input type="numeric" step="0.01" class="form-control" id="monto" wire:model="monto"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="imagen_comprobante" class="mt-2">Subir recibo:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imagen_comprobante"
                                wire:model="imagen_comprobante" accept="image/*" required>
                            <label class="custom-file-label" for="imagen_comprobante" data-browse="Elegir">Seleccione
                                archivo</label>
                        </div>
                        @error('imagen_comprobante')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        <div wire:loading wire:target="imagen_comprobante">
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <span>Subiendo...</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary float-right" wire:loading.class="disabled" type="submit"><i class="fas fa-save"></i> Guardar</button>
        </div>
    </form>
    @push('js')
        <script>
            window.addEventListener('closeParticipanteModal', event => {
                $('#registrarParticipanteModal').modal('hide');
            });

            window.addEventListener('showParticipanteSuccessAlert', event => {
                Toast.fire({
                    icon: 'success',
                    title: 'Se ha registrado correctamente',
                })
            });
            window.addEventListener('error', event => {
                Toast.fire({
                    icon: 'error',
                    title: 'Algo salió mal, reinicie la página.',
                })
            });
        </script>
    @endpush
</div>
