@extends('layouts.main')

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Заголовок -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Товары для вас</h1>
                <p class="text-gray-500 mt-1">Лучшие предложения от проверенных продавцов</p>
            </div>

            <!-- Фильтры (заглушка) -->
            <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
                <div class="flex items-center gap-3">
                    <button class="px-4 py-2 bg-cyan-500 text-white rounded-xl text-sm font-semibold">Все</button>
                    <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-xl text-sm font-semibold hover:border-cyan-300 transition">Популярные</button>
                    <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-xl text-sm font-semibold hover:border-cyan-300 transition">Новинки</button>
                    <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-xl text-sm font-semibold hover:border-cyan-300 transition">Со скидкой</button>
                </div>
                <select class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm text-gray-600 outline-none focus:border-cyan-400">
                    <option>По умолчанию</option>
                    <option>Сначала дешевле</option>
                    <option>Сначала дороже</option>
                    <option>По популярности</option>
                </select>
            </div>

            <!-- Сетка товаров -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($products as $product)
                    <x-product-card :product="$product" />
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-gray-400 text-6xl mb-4">📦</div>
                        <h3 class="text-xl font-semibold text-gray-600">Товары не найдены</h3>
                        <p class="text-gray-400 mt-1">Попробуйте изменить параметры фильтрации</p>
                    </div>
                @endforelse
            </div>

            <!-- Пагинация -->
            <div class="mt-10">
                {{ $products->links() }}
            </div>

        </div>
    </div>
@endsection
