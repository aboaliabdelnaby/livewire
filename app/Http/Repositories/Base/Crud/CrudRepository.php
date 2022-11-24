<?php

namespace App\Http\Repositories\Base\Crud;

use App\Http\Repositories\Base\BaseRepoEloquent;
use Illuminate\Database\Eloquent\Model;

class CrudRepository extends BaseRepoEloquent implements RepositoryInterface
{

    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

    public function index(int $paginate = null, array $search = [], array $sort = []): \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection|array
    {

        return $paginate ? $this->search($search['search'], $search['columns'])->orderBy($sort['by'], $sort['type'])->paginate($paginate) : $this->all();
    }

    public function show(int $id): Model
    {
        return $this->find($id);
    }

    public function store(array $data): Model
    {
        return $this->create($data);
    }

    public function edit(int $id): Model
    {
        return $this->find($id);
    }

    public function update(array $data, int $id): Model
    {
        return $this->updateById($id, $data);
    }

    public function destroy(int $id): ?bool
    {
        return $this->deleteById($id);
    }

}
