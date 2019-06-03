<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class CommentsTransformer extends TransformerAbstract
{
    /**
     * Transform the given data
     *
     * @param array $comment
     * @return array
     */
    public function transform(array $comment)
    {
        $data = [
            'comment' => $comment['comment'] ?? null,
            'user_name' => $comment['user']['name'] ?? null,
        ];

        return array_filter($data, function ($item) {
            return !is_null($item);
        });
    }
}
