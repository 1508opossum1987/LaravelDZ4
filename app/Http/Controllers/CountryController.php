<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Country;

class CountryController extends Controller
{
    public function index(): View
    {
        $countries = Country::query()
            ->withTrashed()
            ->where('active', true)
            ->orderBy('name')
            ->get();

        return view('countries.index', (
        ['countries' => $countries]
        ));
    }

    public function create(): View
    {
        return view('countries.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:countries,name',
            'active' => 'sometimes|boolean',
        ]);

        $validated['active'] = $request->has('active') ? true : false;

        $country = Country::create($validated);

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

    public function update(Request $request, Country $country): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:countries,name,' . $country->id,
            'active' => 'sometimes|boolean',
        ]);

        $validated['active'] = $request->has('active') ? true : false;

        $country->update($validated);

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
