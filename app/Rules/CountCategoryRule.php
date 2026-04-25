<?php

namespace App\Rules;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CountCategoryRule implements ValidationRule
{
    private $maxCount = 5;
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $category = Category::query()->where('id', $value)->firstOrFail();

        if ($category->children()->count() > $this->maxCount) {
            $fail("Максимальное количество дочерних подкатегорий может быть: {$this->maxCount}!");
        }
    }
}
