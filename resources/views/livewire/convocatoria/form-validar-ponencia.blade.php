<div>

    <div class="card my-4">
        <form wire:submit='registrarComprobante'>
            <div class="card-body">
                <h4>INGRESE LOS DATOS DE SU COMPROBANTE</h4>
                <p class="mb-0">Hola <span class="fw-bold">{{ $ponente_ponencia->ponente->autor->persona->ap_paterno }}
                        {{ $ponente_ponencia->ponente->autor->persona->ap_materno }}
                        {{ $ponente_ponencia->ponente->autor->persona->nombres }}</span>.</p>
                <p>Necesitamos que registres tu comprobante de pago</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_pago" class="mt-2">Fecha de Pago:</label>
                            <input type="date" class="form-control  " id="fecha_pago" placeholder="fecha de pago"
                                wire:model="fecha_pago" required>
                            @error('fecha_pago')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="monto">Monto:</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">S/.</span>
                                <input type="numeric" step="0.01" class="form-control" id="monto"
                                    wire:model="monto" required>
                            </div>
                            @error('monto')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="metodo_pago_id" class="mt-2">Metodo de Pago:</label>
                            <select class="form-control" id="metodo_pago_id" wire:model="metodo_pago_id" required>
                                <option value="0" selected hidden>Seleccione ... </option>
                                {{-- @each('opciones/optionmetodopago', $metodoPago, 'tipo') --}}
                                @foreach ($metodosPago as $metodo)
                                    <option value="{{ $metodo->id }}">{{ $metodo->metodo }}</option>
                                @endforeach
                            </select>
                            @error('metodo_pago_id')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="imagen_comprobante" class="mt-2">Subir recibo:</label>
                            <input type="file" class="form-control" id="imagen_comprobante"
                                wire:model="imagen_comprobante" accept="image/*" required>
                            @error('imagen_comprobante')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <div wire:loading wire:target="imagen_comprobante">
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                Cargando...
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" wire:loading.class="disabled" type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>
