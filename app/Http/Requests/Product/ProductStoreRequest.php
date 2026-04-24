<?php

namespace App\Http\Requests\Product;


use App\Rules\RussianCharsRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255|unique:products,name,' , new ProductStoreRequest(70, "Название продукта"),
            'active' => 'sometimes|boolean',
            'price' => 'required|decimal|min:0|max:1000000,'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле Name обязательно к заполнению!',
            'name.min' => 'Минимальное количество символов 3!',
            'price.required' => 'Поле Price обязательно к заполнению'
        ];
    }
}
