<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface extends BaseRepositoryInterface {

    public function findByEmail(string $email): ?User;

    public function getActiveUsers(): Collection;

    public function search(string $query): Collection;

    public function findWithPosts(int $id): ?User;

    public function getRecentUsers(int $days = 30): Collection;
}
