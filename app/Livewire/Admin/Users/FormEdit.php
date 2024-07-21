<?php

namespace App\Livewire\Admin\Users;

use App\Models\EjeTematico;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rules;

class FormEdit extends Component
{
    public $user;

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
            'email' => 'required|max:255|unique:users,email,'.$this->user->id,
        ];
    }

    public function mount()
    {
        $this->ejesTematicos = EjeTematico::all();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        foreach ($this->user->ejes_tematicos as $eje) {
            array_push($this->user_eje_tematico, $eje->id);
        }
    }

    public function save()
    {
        $this->validate();

        $hasPassword = ($this->password !== "" && $this->password !== null);

        if ($hasPassword) {
            $this->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }

        $this->user->update([
            "name" => $this->name,
            "email" => $this->email,
        ]);

        if($hasPassword){
            $this->user->update([
                "password" => Hash::make($this->password),
            ]);
        }

        $this->user->ejes_tematicos()->sync($this->user_eje_tematico);

        $this->dispatch('message', code: '200', content: 'Operación realizada');
        try {
        } catch (\Exception $ex) {
            $this->dispatch('message', code: '500', content: 'Algo salió mal');
        }
    }

    public function render()
    {
        return view('livewire.admin.users.form-edit');
    }
}
