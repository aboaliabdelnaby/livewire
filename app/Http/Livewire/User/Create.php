<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $validatedData = $this->validate();
        try {
            User::create($validatedData);
        } catch (\Exception) {
            $this->emit('error', 'something error');
        }
        session()->flash('success', 'user created successfully');
        return redirect()->route('users');

    }

    public function render()
    {
        return view('livewire.user.create');
    }
}
