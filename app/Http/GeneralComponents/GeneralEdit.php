<?php

namespace App\Http\GeneralComponents;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class GeneralEdit extends Component
{
    public Model $model;
    protected string $module;
    protected string $update;
    protected string $parent;

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
            $this->model->update($this->validatedData($validatedData));
        } catch (\Exception) {
            $this->emit('error', 'something error');
        }
        session()->flash('success', $this->module . ' updated successfully');
        return redirect()->route($this->parent . '.index');
    }

    protected function validatedData($validatedData)
    {
        return $validatedData;
    }

    public function render()
    {
        return view('livewire.' . $this->parent . '.edit');
    }
}
