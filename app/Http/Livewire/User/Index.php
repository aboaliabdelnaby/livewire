<?php

namespace App\Http\Livewire\User;

use App\Http\Traits\WithSorting;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithSorting;

    protected string $paginationTheme = 'bootstrap'; //Using The Bootstrap Pagination Theme
    public string $search = '';
    public string $sortField = 'name';
    protected $listeners = ['delete'];

    public function updatingSearch()      // Resetting Pagination After Filtering Data
    {
        $this->resetPage();
    }

    public function render()
    {
        try {
            $users = User::search($this->search)
                ->orderBy($this->sortField, $this->sortType)
                ->paginate(10);
        } catch (\Exception) {
            $this->emit('error', 'something error');
        }
        return view('livewire.user.index', ['users' => $users]);

    }

    public function delete($id)
    {
        try {
            User::find($id)->delete();
            $this->emit('success', 'user deleted successfully');
        } catch (\Exception) {
            $this->emit('error', 'something error');
        }
    }

}
