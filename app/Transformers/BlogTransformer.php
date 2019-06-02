<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class BlogTransformer extends TransformerAbstract
{
    /**
     * Transform the given data
     *
     * @param array $blog
     * @return array
     */
    public function transform(array $blog)
    {
        $data = [
            'id' => $blog['id'] ?? null,
            'title' => $blog['title'] ?? null,
            'content' => $blog['content'] ?? null,
            'cover' => $blog['cover'] ?? null,
            'category_id' => $blog['category_id'] ?? null,
        ];

        return array_filter($data, function ($item) {
            return !is_null($item);
        });
    }
}
