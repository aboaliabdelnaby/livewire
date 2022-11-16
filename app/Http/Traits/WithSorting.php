<?php

namespace App\Http\Traits;

trait WithSorting
{
    public string $sortType = 'asc'; // default sort direction

    public function sortBy($field): void
    {
        $this->sortType = ($this->sortField === $field) ? $this->reverseSort() : 'asc';
        $this->sortField = $field;
    }

    public function reverseSort(): string
    {
        return $this->sortType === 'asc'
            ? 'desc'
            : 'asc';
    }

}
