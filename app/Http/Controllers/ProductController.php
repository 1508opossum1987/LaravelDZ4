<?php

namespace App\Http\Controllers;

use App\Http\Requests\Brand\BrandStoreRequest;
use App\Models\Brand;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    private const int ITEMS_PER_PAGE=6;
    public function index(): View
    {
        $products = Product::query()
            ->withTrashed()
            ->where('active', true)
            ->orderBy('name')
            ->paginate(self::ITEMS_PER_PAGE);

        return view('products.index', (
        ['products' => $products]
        ));
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(ProductStoreRequest $productStoreRequest): RedirectResponse
    {
        $validated = $productStoreRequest->validated();
        $validated['slug'] = Str::slug($validated['name']);

        $validated['active'] = $productStoreRequest->has('active');

        $product = Product::query()->create($validated);

        return redirect()
            ->route('products.index')
            ->with('success', "Продукт '{$product->name}' успешно создан!");
    }

    public function show(Product $product): View
    {
        $product->load(['products' => function ($query) {
            $query->where('active', true)->limit(20);
        }]);

        return view('products.show', compact('product'));
    }

    public function edit(Product $product): View
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255|unique:products,name,' . $product->id, new ProductStoreRequest(70, "Название продукта"),
            'active' => 'sometimes|boolean',
            'price' => 'required|decimal|min:100|max:1000000,'
        ]);

        $validated['active'] = $request->has('active') ? true : false;

        $product->update($validated);

        return redirect()
            ->route('products.index')
            ->with('success', "Продукт '{$product->name}' успешно обновлен!");
    }

    public function destroy(Product $product): RedirectResponse
    {
        $productName = $product->name;

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', "Продукт '{$productName}' успешно удален!");
    }

    public function restore($id): RedirectResponse
    {
        $product = Product::withTrashed()
            ->findOrFail($id);
        $productName = $product->name;

        if ($product->trashed()) {
            $product->restore();
            return redirect()
                ->route('products.index')
                ->with('success', "Продукт '{$productName}' успешно восстановлен!");
        }

        return redirect()
            ->route('products.index')
            ->with('success', "Продукт '{$productName}' не удалялся!");
    }

    public function forceDestroy($id): RedirectResponse
    {
        $product = Product::withTrashed()
            ->findOrFail($id);
        $productName = $product->name;

        if ($product->trashed()) {
            $product->forceDelete();
            return redirect()
                ->route('products.index')
                ->with('success', "Продукт '{$productName}' успешно удален из корзины!");
        }

        return redirect()
            ->route('products.index')
            ->with('success', "Продукт '{$productName}' не находится в корзине!");
    }

    public function trashed(): View
    {
        $products = Product::onlyTrashed()->orderBy('name')->get();
        return view('products.trashed', ['products' => $products]);
    }
}
