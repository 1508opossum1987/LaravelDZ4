<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::query()
            ->with('children')
            ->whereNull('parent_id')
            ->where('active', true)
            ->with('children')
            ->get();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function create(): View
    {
        $parents = Category::query()->where('active', true)
            ->whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return view('categories.create', ['parents' => $parents]);
    }

    public function store(CategoryStoreRequest $categoryStoreRequest): RedirectResponse
    {
        $validated = $categoryStoreRequest->validated();
        $validated['slug'] = Str::slug($validated['name']);

        $validated['active'] = $categoryStoreRequest->has('active');

        $category = Category::query()->create($validated);

        return redirect()
            ->route('categories.index')
            ->with('success', "Категория '{$category->name} успешно создана!");

    }

    public function show(Category $category): View
    {
        $category->load(['parent', 'children', 'products' => function ($query) {
            $query->where('active', true)->limit(20);
        }]);
        return view('categories.show', ['category' => $category]);
    }

    public function edit(Category $category): View
    {
        $parents = Category::where('id', '!=', $category->id)
            ->where('active', true)
            ->orderBy('name')
            ->get();

        return view('categories.edit', [
            'category' => $category,
            'parents' => $parents
        ]);
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'parent_id' => 'nullable|exists:categories,id',
            'active' => 'sometimes|boolean',
        ]);

        if ($validated['name'] !== $category->name) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['active'] = $request->has('active') ? true : false;

        $category->update($validated);

        return redirect()
            ->route('categories.index')
            ->with('success', "Категория '{$category->name}' успешно обновлена!");
    }

    public function destroy(Category $category): RedirectResponse
    {
        $categoryName = $category->name;

        if ($category->products()->exists()) {
            return redirect()
                ->route('categories.index')
                ->with('error', "Нельзя удалить категорию '{$categoryName}', так как у нее есть товары!");
        }

        if ($category->children()->exists()) {
            return redirect()
                ->route('categories.index')
                ->with('error', "Нельзя удалить категорию '{$categoryName}', так как у нее есть подкатегории!");
        }

        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', "Категория '{$categoryName}' успешно удалена!");
    }
}
