@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-white">Категории товаров</h1>
            <a href="{{ route('categories.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">
                + Создать категорию
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-600 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-600 text-white p-4 rounded-lg mb-6">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($categories as $category)
                <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-white mb-2">
                            {{ $category->name }}
                        </h2>

                        @if($category->children->count() > 0)
                            <div class="mb-3">
                                <p class="text-gray-400 text-sm mb-1">Подкатегории:</p>
                                <div class="flex flex-wrap gap-1">
                                    @foreach($category->children as $child)
                                        <span class="text-xs bg-gray-800 text-gray-300 px-2 py-1 rounded">
                                        {{ $child->name }}
                                    </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="flex justify-between items-center mt-4">
                            <a href="{{ route('categories.show', $category) }}"
                               class="text-blue-400 hover:text-blue-300 text-sm">
                                Подробнее →
                            </a>

                            <div class="flex gap-2">
                                <a href="{{ route('categories.edit', $category) }}"
                                   class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    Редактировать
                                </a>

                                <form action="{{ route('categories.destroy', $category) }}"
                                      method="POST"
                                      onsubmit="return confirm('Удалить категорию «{{ $category->name }}»?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 text-sm">
                                        Удалить
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-400 text-lg">Нет категорий</p>
                    <a href="{{ route('categories.create') }}" class="text-blue-400 hover:text-blue-300 mt-2 inline-block">
                        Создать первую категорию
                    </a>
                </div>
            @endforelse
        </div>
    </div>
@endsection
