<?php

namespace App\Http\GeneralComponents;

use App\Http\Traits\WithSorting;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class GeneralIndex extends Component
{
    use WithPagination, WithSorting;

    protected string $paginationTheme = 'bootstrap'; //Using The Bootstrap Pagination Theme
    public string $search = '';
    public string $sortField = 'created_at';
    protected $listeners = ['delete'];
    protected int $paginate = 10;
    protected string $parent = '';

    public function updatingSearch()      // Resetting Pagination After Filtering Data
    {
        $this->resetPage();
    }

    public function render()
    {
        $data = null;
        try {
            $data = $this->model::search($this->search)
                ->orderBy($this->sortField, $this->sortType)
                ->paginate($this->paginate);
        } catch (\Exception) {
            $this->emit('error', 'something error');
        }
        return view('livewire.' . $this->parent. '.index', ['data' => $data]);

    }

    public function delete($id)
    {
        try {
            $this->model::find($id)->delete();
            $this->emit('success', $this->module . ' deleted successfully');
        } catch (\Exception) {
            $this->emit('error', 'something error');
        }
    }

}
