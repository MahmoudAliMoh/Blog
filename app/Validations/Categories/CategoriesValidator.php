<?php

namespace App\Validations\Categories;

use App\Contracts\Categories\CategoryValidatorContract;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class CategoriesValidator implements CategoryValidatorContract
{
    /**
     * @param array $data
     * @return boolean
     * @throws ValidationException
     */
    public function validations(array $data)
    {
        $rules = [
            'name' => 'required|max:150|regex:/(?=.*[a-z])(?=.*[a-z0-9])/',
        ];

        $messages = [
            'name.required' => 'The category name is required.',
            'name.max' => 'The category name max characters is 150.',
            'name.regex' => 'The category name format is invalid.',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return true;
    }
}
