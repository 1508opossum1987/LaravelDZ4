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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'active' => 'sometimes|boolean',
            'price' => 'required|numeric|min:0|max:1000000',
            'description' => 'nullable|string|max:5000',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'country_id' => 'required|exists:countries,id',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'discount_price' => 'nullable|numeric|min:0|max:1000000',
            'price_from' => 'nullable|numeric|min:0|max:1000000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле Name обязательно к заполнению!',
            'name.min' => 'Минимальное количество символов 3!',
            'price.required' => 'Поле Price обязательно к заполнению',
            'price.numeric' => 'Поле Price должно быть числом',
            'price.min' => 'Цена не может быть меньше 0',
            'price.max' => 'Цена не может быть больше 1000000',
            'category_id.required' => 'Выберите категорию',
            'brand_id.required' => 'Выберите бренд',
            'country_id.required' => 'Выберите страну',
        ];
    }
}
