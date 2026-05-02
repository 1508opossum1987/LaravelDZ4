<?php

namespace App\Http\Controllers;

use App\Http\Requests\Country\CountryStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Models\Country;

class CountryController extends Controller
{
    private const int ITEMS_PER_PAGE = 6;
    public function index(): View
    {
        $countries = Country::query()
            ->withTrashed()
            ->where('active', true)
            ->orderBy('name')
            ->paginate(self::ITEMS_PER_PAGE);

        return view('countries.index', (
        ['countries' => $countries]
        ));
    }

    public function create(): View
    {
        return view('countries.create');
    }

    public function store(CountryStoreRequest $countryStoreRequest): RedirectResponse
    {
        $validated = $countryStoreRequest->validated();
        $validated['slug'] = Str::slug($validated['name']);

        $validated['active'] = $countryStoreRequest->has('active');

        $country = Country::query()->create($validated);

        return redirect()
            ->route('countries.index')
            ->with('success', "Страна '{$country->name}' успешно создана!");
    }

    public function show(Country $country): View
    {
        $country->load(['products' => function ($query) {
            $query->where('active', true)->limit(20);
        }]);

        return view('countries.show',
            ['country' => $country]
        );
    }

    public function edit(Country $country): View
    {
        return view('countries.edit', ['country' => $country]);
    }

    public function update(CountryStoreRequest $request, Country $country): RedirectResponse
    {
        $validated = $request->validated();

        if ($validated['name'] !== $country->name) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['active'] = $request->has('active');

        try {
            $country->name = $validated['name'];
            $country->active=$validated['active'];
        }
        catch (\Exception $exception)
        {}

        return redirect()
            ->route('countries.index')
            ->with('success', "Страна '{$country->name}' успешно обновлена!");
    }

    public function destroy(Country $country): RedirectResponse
    {
        $countryName = $country->name;

        if ($country->products()->exists()) {
            return redirect()
                ->route('countries.index')
                ->with('error', "Нельзя удалить страну '{$countryName}', так как у нее есть товары!");
        }

        $country->delete();

        return redirect()
            ->route('countries.index')
            ->with('success', "Страна '{$countryName}' успешно удалена!");
    }

    public function restore($id): RedirectResponse
    {
        $country = Country::withTrashed()
            ->findOrFail($id);
        $countryName = $country->name;

        if ($country->trashed()) {
            $country->restore();
            return redirect()
                ->route('countries.index')
                ->with('success', "Страна '{$countryName}' успешно восстановлена!");
        }

        return redirect()
            ->route('countries.index')
            ->with('success', "Страна '{$countryName}' не удалялась!");
    }

    public function forceDestroy($id): RedirectResponse
    {
        $country = Country::withTrashed()
            ->findOrFail($id);
        $countryName = $country->name;

        if ($country->trashed()) {
            $country->forceDelete();
            return redirect()
                ->route('countries.index')
                ->with('success', "Страна '{$countryName}' успешно удалена из корзины!");
        }

        return redirect()
            ->route('countries.index')
            ->with('success', "Страна '{$countryName}' не находится в корзине!");
    }

    public function trashed(): View
    {
        $countries = Country::onlyTrashed()->orderBy('name')->get();
        return view('countries.trashed', ['countries' => $countries]);
    }


}
