<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource {

    public function toArray($request) {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'content' => $this->when($request->routeIs('posts.show'), $this->content),
            'is_published' => $this->is_published,
            'published_at' => $this->published_at?->toDateTimeString(),
            'created_at' => $this->created_at->toDateTimeString(),
            'reading_time' => $this->estimated_reading_time,
            // Author information
            'author' => new UserResource($this->whenLoaded('user')),
        ];
    }

}
