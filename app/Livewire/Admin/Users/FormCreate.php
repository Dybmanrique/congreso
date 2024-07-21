<?php

namespace App\Livewire\Admin\Users;

use App\Models\EjeTematico;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Component;

class FormCreate extends Component
{
    public $ejesTematicos;

    public $user_eje_tematico = [];

    //ATRIBUTOS USER
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|max:255|unique:users,email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function mount()
    {
        $this->ejesTematicos = EjeTematico::all();
    }

    public function save()
    {
        $this->validate();

        try {
    
            $user = User::create([
                "name" => $this->name,
                "email" => $this->email,
                "password" => Hash::make($this->password),
            ]);

            $user->ejes_tematicos()->sync($this->user_eje_tematico);
    
            $this->reset('user_eje_tematico','name', 'email', 'password', 'password_confirmation');

            $this->dispatch('message', code: '200', content: 'Operación realizada');
        } catch (\Exception $ex) {
            $this->dispatch('message', code: '500', content: 'Algo salió mal');
        }
    }

    public function render()
    {
        return view('livewire.admin.users.form-create');
    }
}
