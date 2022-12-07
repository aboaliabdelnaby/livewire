<?php

namespace App\Http\Repositories\Base;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Collection;

abstract class BaseRepoEloquent implements BaseRepoContract
{
    /**
     * The repository model.
     *
     * @var Model
     */
    public $model;

    /**
     * The query builder.
     *
     * @var Builder
     */
    protected $query;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $method
     * @param $args
     * @return false|mixed
     */
    public function __call($method, $args)
    {
        $query = $this->getQuery();
        $result = call_user_func_array([$query, $method], $args);
        if ($result instanceof Builder) {
            $this->query = $result;
            return $this;
        }
        return $result;
    }

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Get all the model records in the database.
     *
     * @param array $columns
     *
     * @return Collection|static[]
     */
    public function all(array $columns = ['*'])
    {
        return $this->model->all($columns);
    }

    /**
     * Count the number of specified model records in the database.
     *
     * @return int
     */
    public function count()
    {
        return $this->getQuery()->get()->count();
    }

    /**
     * Creating a new model record in the database.
     *
     * @param array $data
     *
     * @return Model
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Creating one or more new model records in the database.
     *
     * @param array $data
     *
     * @return Collection
     */
    public function createMultiple(array $data)
    {
        $models = new Collection();

        foreach ($data as $d) {
            $models->push($this->create($d));
        }

        return $models;
    }

    /**
     * Delete one or more model records from the database.
     *
     * @return mixed
     */
    public function delete()
    {
        $result = ($this->query)->delete();

        return $result;
    }

    /**
     * Delete the specified model record from the database.
     *
     * @param $id
     *
     * @return bool|null
     * @throws \Exception
     */
    public function deleteById($id)
    {
        return $this->find($id)->delete();
    }

    /**
     * Delete multiple records.
     *
     * @param array $ids
     *
     * @return int
     */
    public function deleteMultipleByIds(array $ids)
    {
        return $this->model->destroy($ids);
    }

    /**
     * Get the first specified model record from the database.
     *
     * @param array $columns
     *
     * @return Model|static
     */
    public function first(array $columns = ['*'])
    {
        $model = $this->getQuery()->firstOrFail($columns);

        return $model;
    }


    /**
     * Get all the specified model records in the database.
     *
     * @param array $columns
     *
     * @return Collection|static[]
     */
    public function get(array $columns = ['*'])
    {
        $models = $this->getQuery()->get($columns);
        $this->unsetQuery();
        return $models;
    }


    /**
     * Get the specified model record from the database.
     *
     * @param       $id
     * @param array $columns
     *
     * @return Collection|Model
     */
    public function find($id, array $columns = ['*'])
    {
        return $this->newQuery()->findOrFail($id, $columns);
    }

    /**
     * @param       $column
     * @param       $item
     * @param array $columns
     *
     * @return Model|null|static
     */
    public function getByColumn($column, $item, array $columns = ['*'])
    {
        return $this->model->where($column, $item)->first($columns);
    }

    /**
     * @param int $limit
     * @param array $columns
     * @param string $pageName
     * @param null $page
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($limit = 25, array $columns = ['*'], $pageName = 'page', $page = null)
    {
        $models = $this->getQuery()->paginate($limit, $columns, $pageName, $page);

        return $models;
    }

    /**
     * Update the specified model record in the database.
     *
     * @param       $id
     * @param array $data
     * @param array $options
     *
     * @return Collection|Model
     */
    public function updateById($id, array $data, array $options = [])
    {
        if ($id instanceof $this->model) {
            $model = $id;
        } else {
            $model = $this->find($id);
        }

        $model->update($data, $options);

        return $model;
    }

    /**
     * Set the query limit.
     *
     * @param int $limit
     *
     * @return $this
     */
    public function limit($limit)
    {
        $this->getQuery()->limit($limit);
        return $this;
    }

    /**
     * Set an ORDER BY clause.
     *
     * @param string $column
     * @param string $direction
     * @return $this
     */
    public function orderBy($column, $direction = 'asc')
    {
        // $this->getQuery()->orderBy($column, $direction);
        $this->getQuery()->orderByWithRelations($column, $direction);
        return $this;
    }

    /**
     * Add a simple where clause to the query.
     *
     * @param string|array|Closure $column
     * @param string $value
     * @param string $operator
     *
     * @return $this
     */
    public function where($column, string $operator = null, mixed $value = null, $boolean = 'and')
    {
        $this->getQuery()->where($column, $operator, $value, $boolean);
        return $this;
    }

    /**
     * Add a simple where in clause to the query.
     *
     * @param string $column
     * @param mixed $values
     *
     * @return $this
     */
    public function whereIn($column, $values)
    {
        $this->getQuery()->whereIn($column, $values);
        return $this;
    }

    /**
     * Set Eloquent relationships to eager load.
     *
     * @param $relations
     *
     * @return $this
     */
    public function with($relations)
    {
        $this->getQuery()->with($relations);
        return $this;
    }

    /**
     * Set Eloquent relationships count to eager load.
     *
     * @param $relations
     *
     * @return $this
     */
    public function withCount($relations)
    {
        $this->getQuery()->withCount($relations);
        return $this;
    }

    /**
     * Creating a new instance of the model's query builder.
     *
     * @return $this
     */
    public function newQuery()
    {
        $this->query = $this->model->newQuery();

        return $this->query;
    }

    public function getQuery()
    {
        return $this->query ?? $this->newQuery();
    }

    public function unsetQuery()
    {
        $this->newQuery();
        return $this;
    }


    public function getDataIfRequest($request)
    {
        if ($request instanceof Request) {
            return $request->all();
        }
        return $request;
    }

    public function search(string $search, array $columns)
    {
        if (empty($search) || empty($columns)) {
            $query = $this->getQuery();
        } else {
            $query = $this->query ?? $this->model->newQuery();;
            $query->where(function ($q) use ($search, $columns) {
                foreach ($columns as $index => $column) {
                    if ($index == 0) {
                        $q->where($column, 'like', '%' . $search . '%');
                    } else {
                        $q->orWhere($column, 'like', '%' . $search . '%');
                    }
                }
            });
        }

        return $query;

    }


}
