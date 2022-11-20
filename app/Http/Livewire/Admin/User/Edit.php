<?php

namespace App\Http\Livewire\User;

use App\Http\GeneralComponents\GeneralEdit;
use App\Http\Validation\Users\Update;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Edit extends GeneralEdit
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public Model $model;
    protected string $module = 'User';
    protected string $update=Update::class;

    public function mount(User $user)
    {
        $this->model = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';
    }

    public function update() //override function
    {
        $validatedData = $this->validate();
        try {
            if (empty($validatedData['password'])) {
                $validatedData = Arr::except($validatedData, 'password');
            }
            $this->model->update($validatedData);
        } catch (\Exception) {
            $this->emit('error', 'something error');
        }
        session()->flash('success', $this->module . ' updated successfully');
        return redirect()->route(Str::lower($this->module) . 's');
    }


}
