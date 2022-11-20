<?php

namespace App\Http\GeneralComponents;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class GeneralCreate extends Component
{
    protected string $parent = '';
    protected function rules(): array
    {
        return $this->store::rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $validatedData = $this->validate();
        try {
            $this->model::create($validatedData);
        } catch (\Exception) {
            $this->emit('error', 'something error');
        }
        session()->flash('success', $this->module . ' created successfully');
        return redirect()->route($this->parent .'.index');

    }

    public function render()
    {
        return view('livewire.'.$this->parent  . '.create');
    }
}
