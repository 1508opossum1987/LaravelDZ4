<?php

namespace App\Http\Requests\Category;

use App\Rules\CountCategoryRule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255|unique:categories,name',
            'parent_id' => ['nullable','exists:categories,id', new CountCategoryRule()],
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле Name обезательна к заполнению!',
            'name.min' => 'Минемальное количество символов 3!'
        ];
    }
}
