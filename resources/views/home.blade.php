@extends('layouts.main')

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Заголовок -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Каталог наших товаров</h1>
                <p class="text-gray-500 mt-1">Выберите подходящий вариант из нашего ассортимента</p>
            </div>

            <!-- Фильтры и сортировка -->
            <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
                <div class="flex items-center gap-3">
                    <button class="px-4 py-2 bg-cyan-500 text-white rounded-xl text-sm font-semibold">Все</button>
                    <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-xl text-sm font-semibold hover:border-cyan-300 transition">Популярные</button>
                    <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-xl text-sm font-semibold hover:border-cyan-300 transition">Новинки</button>
                    <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-xl text-sm font-semibold hover:border-cyan-300 transition">Со скидкой</button>
                </div>

                <!-- Сортировка с добавлением параметра в URL -->
                <select id="sort-select" class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm text-gray-600 outline-none focus:border-cyan-400 cursor-pointer">
                    <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>По умолчанию</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Цена: по возрастанию</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Цена: по убыванию</option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Название: А-Я</option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Название: Я-А</option>
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Сначала новые</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Сначала старые</option>
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
                        <p class="text-gray-400 mt-1">Попробуйте изменить параметры сортировки</p>
                    </div>
                @endforelse
            </div>

            <!-- Пагинация -->
            <div class="mt-10">
                {{ $products->withQueryString()->links() }}
            </div>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sortSelect = document.getElementById('sort-select');

            if (sortSelect) {
                sortSelect.addEventListener('change', function() {
                    const selectedValue = this.value;
                    const currentUrl = new URL(window.location.href);

                    // Добавляем или обновляем параметр sort
                    if (selectedValue && selectedValue !== 'default') {
                        currentUrl.searchParams.set('sort', selectedValue);
                    } else {
                        currentUrl.searchParams.delete('sort');
                    }

                    // Сбрасываем страницу на первую при смене сортировки
                    currentUrl.searchParams.delete('page');

                    // Переходим на новый URL
                    window.location.href = currentUrl.toString();
                });
            }
        });
    </script>
@endsection
