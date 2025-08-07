<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository extends BaseRepository {

    public function __construct(Post $model) {
        parent::__construct($model);
    }

    public function getPublishedPosts(): Collection {
        return $this->model->published()->with('user')->get();
    }

    public function getPostsByUser(int $userId): Collection {
        return $this->model->byUser($userId)->get();
    }

    public function findBySlug(string $slug): ?Post {
        return $this->model->where('slug', $slug)->first();
    }

}
