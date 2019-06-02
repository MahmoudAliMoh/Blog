<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class CategoriesTransformer extends TransformerAbstract
{
    /**
     * Transform the given data
     *
     * @param array $category
     * @return array
     */
    public function transform(array $category)
    {
        $data = [
            'id' => $category['id'] ?? null,
            'name' => $category['name'] ?? null,
        ];

        return array_filter($data, function ($item) {
            return !is_null($item);
        });
    }
}
