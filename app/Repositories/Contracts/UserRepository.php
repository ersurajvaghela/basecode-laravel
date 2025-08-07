<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository implements UserRepositoryInterface {

    public function __construct(User $model) {
        parent::__construct($model);
    }

    public function findByEmail(string $email): ?User {
        return $this->model->where('email', $email)->first();
    }

    public function getActiveUsers(): Collection {
        return $this->model->active()->get();
    }

    public function search(string $query): Collection {
        return $this->model->where('name', 'like', "%{$query}%")
                        ->orWhere('email', 'like', "%{$query}%")
                        ->get();
    }

    public function findWithPosts(int $id): ?User {
        return $this->model->with('posts')->find($id);
    }

    public function getRecentUsers(int $days = 30): Collection {
        return $this->model->recent($days)->get();
    }

// Add to UserRepository
    public function findCached(int $id): ?User {
        return Cache::store('users')->remember("user:{$id}", 3600, function () use ($id) {
                    return $this->find($id);
                });
    }

    public function clearUserCache(int $id): void {
        Cache::store('users')->forget("user:{$id}");
    }

}
