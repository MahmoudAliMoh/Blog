<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class BlogTransformer extends TransformerAbstract
{

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'categories',
    ];

    /**
     * Transform the given data
     *
     * @param array $blog
     * @return array
     */
    public function transform(array $blog)
    {
        $data = [
            'id' => (int) $blog['id'] ?? null,
            'title' => $blog['title'] ?? null,
            'content' => $blog['content'] ?? null,
            'cover' => $blog['cover'] ?? null,
            'category_id' => $blog['category_id'] ?? null,
        ];

        return array_filter($data, function ($item) {
            return !is_null($item);
        });
    }


    /**
     * @param array $categories
     * @return \League\Fractal\Resource\Item
     */
    public function includeCategories(array $categories)
    {
        return $this->item($categories['category'], new CategoriesTransformer());
    }
}
