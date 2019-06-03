<?php

namespace App\Validations\Comments;

use App\Contracts\Comments\CommentValidatorContract;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class CommentValidator implements CommentValidatorContract
{
    /**
     * @param array $data
     * @return boolean
     * @throws ValidationException
     */
    public function validations(array $data)
    {
        $rules = [
            'comment' => 'required|max:250',
        ];

        $messages = [
            'comment.required' => 'Comment is required.',
            'comment.max' => 'Comment max characters is 250.',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return true;
    }
}
