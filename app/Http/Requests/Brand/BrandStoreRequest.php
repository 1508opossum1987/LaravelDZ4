<?php

namespace App\Http\Requests\Brand;

use App\Rules\RussianCharsRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BrandStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255', 'unique:brands,name', new RussianCharsRule(70, "Название бренда")],
            'active' => 'sometimes|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле Name обязательно к заполнению!',
            'name.min' => 'Минимальное количество символов 3!'
        ];
    }
}
