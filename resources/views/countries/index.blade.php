@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-white">Страны</h1>
            <a href="{{ route('countries.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">
                + Создать страну
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($countries as $country)
                <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-white mb-2">
                            {{ $country->name }}
                        </h2>

                        <div class="text-gray-400 text-sm mb-4">
                            Товаров: {{ $country->products()->count() }}
                        </div>

                        <div class="flex justify-between items-center">
                            <a href="{{ route('countries.show', $country) }}"
                               class="text-blue-400 hover:text-blue-300 text-sm">
                                Подробнее →
                            </a>

                            <div class="flex gap-2">
                                <a href="{{ route('countries.edit', $country) }}"
                                   class="text-yellow-400 hover:text-yellow-300 text-sm">
                                    Редактировать
                                </a>

                                <form action="{{ route('countries.destroy', $country) }}"
                                      method="POST"
                                      onsubmit="return confirm('Удалить страну «{{ $country->name }}»?')">
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
                    <p class="text-gray-400 text-lg">Нет стран</p>
                    <a href="{{ route('countries.create') }}" class="text-blue-400 hover:text-blue-300 mt-2 inline-block">
                        Создать первую страну
                    </a>
                </div>
            @endforelse
        </div>
    </div>
@endsection
