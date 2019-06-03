<?php

namespace App\Validations\Blog;

use App\Contracts\Blog\BlogValidatorContract;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class BlogValidator implements BlogValidatorContract
{
    /**
     * @param array $data
     * @return boolean
     * @throws ValidationException
     */
    public function validations(array $data)
    {
        $rules = [
            'title' => 'required|max:250|regex:/(?=.*[a-zA-Z])(?=.*[a-zA-Z0-9])/',
            'content' => 'required',
            'cover' => 'sometimes|max:3000',
            'category_id' => 'required'
        ];

        $messages = [
            'title.required' => 'Blog title is required.',
            'title.max' => 'Blog title max characters is 250.',
            'title.regex' => 'Blog title format is invalid.',
            'content.required' => 'Blog content is required',
            'cover.required' => 'Blog cover is required',
            'cover.mimes' => 'Blog cover format is invalid',
            'cover.max' => 'Blog cover max upload file is 3M',
            'category_id.required' => 'Blog category must be selected.'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return true;
    }
}
