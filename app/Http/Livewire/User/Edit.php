<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Arr;
use Livewire\Component;

class Edit extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->user->id],
            'password' => ['nullable', 'string', 'min:8'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $validatedData = $this->validate();
        try {
            if (empty($validatedData['password'])) {
                $validatedData = Arr::except($validatedData, 'password');
            }
            $this->user->update($validatedData);
        } catch (\Exception) {
            $this->emit('error', 'something error');
        }
        session()->flash('success', 'user updated successfully');
        return redirect()->route('users');
    }

    public function render()
    {
        return view('livewire.user.edit');
    }
}
