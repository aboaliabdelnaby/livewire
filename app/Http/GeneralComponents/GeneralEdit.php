<?php

namespace App\Http\GeneralComponents;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;

class GeneralEdit extends Component
{
    protected string $parent = '';
    protected function rules(): array
    {
        return $this->update::rules($this->model);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $validatedData = $this->validate();
        try {
            $this->model->update($validatedData);
        } catch (\Exception) {
            $this->emit('error', 'something error');
        }
        session()->flash('success', $this->module . ' updated successfully');
        return redirect()->route($this->parent . '.index');
    }

    public function render()
    {
        return view('livewire.' . $this->parent . '.edit');
    }
}
