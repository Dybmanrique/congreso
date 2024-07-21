<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit='save'>
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input wire:model='name' type="text" id="name" class="form-control"
                                placeholder="Ingrese los nombres del usuario" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email*:</label>
                            <input wire:model='email' type="email" id="email" class="form-control"
                                placeholder="Ingrese el correo electrónico del usuario" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password*:</label>
                            <input wire:model='password' type="password" id="password" class="form-control"
                                placeholder="Ingrese una contraseña" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirmar password*:</label>
                            <input wire:model='password_confirmation' type="password" id="password_confirmation"
                                class="form-control" placeholder="Repita la contraseña" required>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="text-bold mb-1">Ejes temáticos:</p>
                        <div class="form-group border p-2 mb-1 rounded">
                            @foreach ($ejesTematicos as $eje)
                                <div class="form-check form-switch">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" wire:model='user_eje_tematico'
                                            value="{{ $eje->id }}">
                                        {{ $eje->nombre }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary float-right">Crear</button>
            </form>
        </div>
    </div>
</div>
