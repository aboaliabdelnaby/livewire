<?php

namespace App\Http\Repositories\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseRepoContract
{
    public function all(array $columns = ['*']);

    public function createMultiple(array $data);

    public function updateById($id, array $data, array $options = []);

    public function deleteById($id);

    public function deleteMultipleByIds(array $ids);

    public function getByColumn($column, $item, array $columns = ['*']);

}
