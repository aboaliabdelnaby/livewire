<?php

namespace App\Http\Repositories\Base\Crud;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function index(int $paginate);

    public function show(int $id): Model;

    public function store(array $data): Model;

    public function edit(int $id): Model;

    public function update(array $data, int $id): Model;

    public function destroy(int $id): ?bool;


}
