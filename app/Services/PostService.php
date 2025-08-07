<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostService {

    protected $postRepository;

    public function __construct(PostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function createPost(array $data): Post {
        return DB::transaction(function () use ($data) {
                    if (empty($data['slug'])) {
                        $data['slug'] = Str::slug($data['title']);
                    }

                    return $this->postRepository->create($data);
                });
    }

    public function publishPost(Post $post): Post {
        $data = [
            'is_published' => true,
            'published_at' => now(),
        ];

        return $this->postRepository->update($post, $data);
    }

    public function unpublishPost(Post $post): Post {
        $data = [
            'is_published' => false,
            'published_at' => null,
        ];

        return $this->postRepository->update($post, $data);
    }

}
