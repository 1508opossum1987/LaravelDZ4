@extends('layouts.main')

@section('content')
    <div class="min-h-screen bg-white flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full">
            <!-- Заголовок -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-black tracking-tight">Electro</h1>
                <p class="text-zinc-500 mt-2">Создайте новый аккаунт</p>
            </div>

            <div class="bg-white rounded-3xl shadow-xl p-8 border border-zinc-200">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-zinc-600 mb-2">
                            {{ __('Name') }}
                        </label>
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            autofocus
                            class="w-full bg-zinc-50 border border-zinc-300 text-zinc-900 rounded-2xl px-5 py-4 focus:outline-none focus:border-black transition-colors @error('name') border-red-500 @enderror"
                        >
                        @error('name')
                        <span class="text-red-500 text-sm mt-1 block">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-zinc-600 mb-2">
                            {{ __('Email Address') }}
                        </label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            class="w-full bg-zinc-50 border border-zinc-300 text-zinc-900 rounded-2xl px-5 py-4 focus:outline-none focus:border-black transition-colors @error('email') border-red-500 @enderror"
                        >
                        @error('email')
                        <span class="text-red-500 text-sm mt-1 block">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-zinc-600 mb-2">
                            {{ __('Password') }}
                        </label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            class="w-full bg-zinc-50 border border-zinc-300 text-zinc-900 rounded-2xl px-5 py-4 focus:outline-none focus:border-black transition-colors @error('password') border-red-500 @enderror"
                        >
                        @error('password')
                        <span class="text-red-500 text-sm mt-1 block">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Password Confirmation -->
                    <div class="mb-8">
                        <label for="password-confirm" class="block text-sm font-medium text-zinc-600 mb-2">
                            {{ __('Confirm Password') }}
                        </label>
                        <input
                            id="password-confirm"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            class="w-full bg-zinc-50 border border-zinc-300 text-zinc-900 rounded-2xl px-5 py-4 focus:outline-none focus:border-black transition-colors"
                        >
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="w-full bg-black text-white font-semibold py-4 rounded-2xl hover:bg-zinc-800 transition-colors text-lg">
                        {{ __('Register') }}
                    </button>
                </form>

                <!-- Ссылка на логин -->
                <div class="text-center mt-8">
                    <p class="text-zinc-500 text-sm">
                        Уже есть аккаунт?
                        <a href="{{ route('login') }}" class="text-black hover:underline font-medium">
                            Войти
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
