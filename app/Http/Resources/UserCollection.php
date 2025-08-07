<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection {

    public function toArray($request) {
        return [
            'data' => $this->collection,
        ];
    }

    public function with($request) {
        return [
            'meta' => [
                'total_users' => $this->collection->count(),
                'active_users' => $this->collection->where('is_active', true)->count(),
            ],
        ];
    }

}
