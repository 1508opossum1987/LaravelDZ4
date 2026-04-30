@extends('layouts.main')

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Hero секция -->
            <div class="bg-gradient-to-r from-cyan-500 to-blue-500 rounded-2xl p-8 mb-8 text-white">
                <h1 class="text-4xl font-bold mb-2">Каталог товаров</h1>
                <p class="text-cyan-100 text-lg">Выберите идеальный вариант из нашей коллекции</p>
            </div>

            <!-- Сортировка -->
            <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
                <div class="flex items-center gap-2">
                    <span class="text-gray-500 text-sm">Сортировать:</span>
                    <select id="sort-select" class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm text-gray-700 outline-none focus:border-cyan-400 cursor-pointer">
                        <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>По умолчанию</option>
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Новинки</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Цена: по возрастанию</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Цена: по убыванию</option>
                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Название: А-Я</option>
                        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Название: Я-А</option>
                    </select>
                </div>

                <div class="text-sm text-gray-500">
                    Найдено: <span class="font-semibold text-gray-700">{{ $products->total() }}</span> товаров
                </div>
            </div>

            <!-- Сетка товаров -->
            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                            <!-- Изображение -->
                            <a href="{{ route('products.show', $product) }}" class="block relative overflow-hidden bg-gray-100 h-64">
                                @if($product->img_path && file_exists(public_path($product->img_path)))
                                    <img src="{{ asset($product->img_path) }}"
                                         alt="{{ $product->name }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif

                                <!-- Бейдж со скидкой -->
                                @if($product->discount_price && $product->discount_price < $product->price)
                                    <div class="absolute top-3 right-3 bg-red-500 text-white px-2 py-1 rounded-lg text-xs font-bold">
                                        -{{ round((1 - $product->discount_price / $product->price) * 100) }}%
                                    </div>
                                @endif
                            </a>

                            <!-- Информация -->
                            <div class="p-4">
                                <!-- Бренд и категория -->
                                <div class="flex items-center gap-2 mb-2">
                                    @if($product->brand)
                                        <span class="text-xs text-cyan-600 bg-cyan-50 px-2 py-1 rounded-lg">
                                        {{ $product->brand->name }}
                                    </span>
                                    @endif
                                    @if($product->country)
                                        <span class="text-xs text-gray-500">
                                        {{ $product->country->name }}
                                    </span>
                                    @endif
                                </div>

                                <!-- Название -->
                                <a href="{{ route('products.show', $product) }}" class="block">
                                    <h3 class="text-lg font-semibold text-gray-800 hover:text-cyan-600 transition mb-2 line-clamp-2">
                                        {{ $product->name }}
                                    </h3>
                                </a>

                                <!-- Описание -->
                                <p class="text-gray-500 text-sm mb-3 line-clamp-2">
                                    {{ Str::limit($product->description, 80) }}
                                </p>

                                <!-- Цена -->
                                <div class="flex items-baseline gap-2 mb-4">
                                    @if($product->discount_price && $product->discount_price < $product->price)
                                        <span class="text-2xl font-bold text-cyan-600">
                                        {{ number_format($product->discount_price, 0, ',', ' ') }} ₽
                                    </span>
                                        <span class="text-sm text-gray-400 line-through">
                                        {{ number_format($product->price, 0, ',', ' ') }} ₽
                                    </span>
                                    @else
                                        <span class="text-2xl font-bold text-gray-800">
                                        {{ number_format($product->price, 0, ',', ' ') }} ₽
                                    </span>
                                    @endif
                                </div>

                                <!-- Кнопка -->
                                <button class="w-full py-2 bg-gray-100 hover:bg-cyan-500 text-gray-700 hover:text-white rounded-xl transition-all duration-300 font-medium text-sm">
                                    В корзину
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Пагинация -->
                <div class="mt-12">
                    <div class="flex justify-center">
                        {{ $products->links() }}
                    </div>

                    <!-- Информация о страницах -->
                    <div class="text-center text-sm text-gray-500 mt-4">
                        Показано с {{ $products->firstItem() }} по {{ $products->lastItem() }} из {{ $products->total() }} товаров
                    </div>
                </div>

            @else
                <!-- Пустое состояние -->
                <div class="text-center py-16 bg-white rounded-2xl">
                    <div class="text-gray-400 text-6xl mb-4">📦</div>
                    <h3 class="text-xl font-semibold text-gray-600">Товары не найдены</h3>
                    <p class="text-gray-400 mt-1">Попробуйте изменить параметры сортировки</p>
                </div>
            @endif

        </div>
    </div>

    @push('scripts')
        <script>
            // Сортировка с сохранением параметров в URL
            document.addEventListener('DOMContentLoaded', function() {
                const sortSelect = document.getElementById('sort-select');

                if (sortSelect) {
                    sortSelect.addEventListener('change', function() {
                        const selectedValue = this.value;
                        const currentUrl = new URL(window.location.href);

                        if (selectedValue && selectedValue !== 'default') {
                            currentUrl.searchParams.set('sort', selectedValue);
                        } else {
                            currentUrl.searchParams.delete('sort');
                        }

                        currentUrl.searchParams.delete('page');
                        window.location.href = currentUrl.toString();
                    });
                }
            });
        </script>
    @endpush

    @push('styles')
        <style>
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        </style>
    @endpush
@endsection
