<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

abstract class BaseRepository implements BaseRepositoryInterface {

    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function all(): Collection {
        return $this->model->all();
    }

    public function find(int $id): ?Model {
        return $this->model->find($id);
    }

    public function create(array $data): Model {
        return $this->model->create($data);
    }

    public function update(Model $model, array $data): Model {
        $model->update($data);
        return $model->fresh();
    }

    public function delete(Model $model): bool {
        return $model->delete();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator {
        return $this->model->paginate($perPage);
    }

    public function where(string $column, $value): Collection {
        return $this->model->where($column, $value)->get();
    }

}
