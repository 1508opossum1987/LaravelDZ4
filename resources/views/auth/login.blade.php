@extends('layouts.main')

@section('content')
    <div class="min-h-screen bg-white flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full">
            <!-- Заголовок -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-black tracking-tight">Electro</h1>
                <p class="text-zinc-500 mt-2">Войдите в свой аккаунт</p>
            </div>

            <div class="bg-white rounded-3xl shadow-xl p-8 border border-zinc-200">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

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
                            autofocus
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
                            autocomplete="current-password"
                            class="w-full bg-zinc-50 border border-zinc-300 text-zinc-900 rounded-2xl px-5 py-4 focus:outline-none focus:border-black transition-colors @error('password') border-red-500 @enderror"
                        >
                        @error('password')
                        <span class="text-red-500 text-sm mt-1 block">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Remember Me + Forgot Password -->
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center">
                            <input
                                class="w-5 h-5 bg-white border-2 border-zinc-300 rounded-xl text-black focus:ring-0 focus:ring-offset-0 checked:bg-black"
                                type="checkbox"
                                name="remember"
                                id="remember"
                                {{ old('remember') ? 'checked' : '' }}
                            >
                            <label for="remember" class="ml-3 text-zinc-600 text-sm cursor-pointer">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-sm text-zinc-600 hover:text-black transition-colors">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="w-full bg-black text-white font-semibold py-4 rounded-2xl hover:bg-zinc-800 transition-colors text-lg">
                        {{ __('Login') }}
                    </button>
                </form>

                <!-- Ссылка на регистрацию -->
                <div class="text-center mt-8">
                    <p class="text-zinc-500 text-sm">
                        Нет аккаунта?
                        <a href="{{ route('register') }}" class="text-black hover:underline font-medium">
                            Зарегистрироваться
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
