<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function index(): View
    {
        $brands = Brand::query()
            ->where('active', true)
            ->orderBy('name')
            ->get();

        return view('brands.index', [
            'brands'=>$brands
        ]);
    }

    public function create(): View
    {
        return view('brands.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
            'active' => 'sometimes|boolean',
        ]);

        $validated['active'] = $request->has('active') ? true : false;

        $brand = Brand::create($validated);

        return redirect()
            ->route('brands.index')
            ->with('success', "Бренд '{$brand->name}' успешно создан!");
    }

    public function show(Brand $brand): View
    {
        $brand->load(['products' => function($query) {
            $query->where('active', true)->limit(20);
        }]);

        return view('brands.show', compact('brand'));
    }

    public function edit(Brand $brand): View
    {
        return view('brands.edit', ['brand'=>$brand] );
    }

    public function update(Request $request, Brand $brand): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'active' => 'sometimes|boolean',
        ]);

        $validated['active'] = $request->has('active') ? true : false;

        $brand->update($validated);

        return redirect()
            ->route('brands.index')
            ->with('success', "Бренд '{$brand->name}' успешно обновлен!");
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        $brandName = $brand->name;

        if ($brand->products()->exists()) {
            return redirect()
                ->route('brands.index')
                ->with('error', "Нельзя удалить бренд '{$brandName}', так как у него есть товары!");
        }

        $brand->delete();

        return redirect()
            ->route('brands.index')
            ->with('success', "Бренд '{$brandName}' успешно удален!");
    }
}
