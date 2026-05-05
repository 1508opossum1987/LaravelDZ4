@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!{{--<div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-white">Управление пользователями</h1>
            <a href="{{ route('admin.users.index') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">
                🔄 Выгрузить список пользователей
            </a>
        </div>--}}>

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

        <div class="bg-gray-900 rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                    <tr class="bg-gray-800 border-b border-gray-700">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Имя</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Роль</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Статус</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Действия</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-800 transition">
                            <td class="px-6 py-4 text-white text-sm">{{ $user->id }}</td>
                            <td class="px-6 py-4 text-white text-sm font-medium">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-gray-400 text-sm">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                @if($user->role === 'admin')
                                    <span class="px-2 py-1 bg-purple-900 text-purple-300 text-xs rounded-full font-medium">Admin</span>
                                @else
                                    <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded-full font-medium">User</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($user->is_active)
                                    <span class="flex items-center gap-1 text-green-400 text-sm">
                                            <span>🟢</span> Активен
                                        </span>
                                @else
                                    <span class="flex items-center gap-1 text-red-400 text-sm">
                                            <span>🔴</span> Заблокирован
                                        </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2 flex-wrap">
                                    {{-- Кнопка блокировки/разблокировки (скрыта для себя) --}}
                                    @if($user->id !== auth()->id())
                                        @if($user->is_active)
                                            <form action="{{ route('admin.users.toggleActive', $user->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                        onclick="return confirm('Заблокировать пользователя «{{ $user->name }}»?')"
                                                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-lg transition text-sm">
                                                    Заблокировать
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.users.toggleActive', $user->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                        onclick="return confirm('Разблокировать пользователя «{{ $user->name }}»?')"
                                                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-1 px-3 rounded-lg transition text-sm">
                                                    Разблокировать
                                                </button>
                                            </form>
                                        @endif

                                        {{-- Кнопка смены роли (скрыта для себя) --}}
                                        @if($user->role === 'admin')
                                            <form action="{{ route('admin.users.changeRole', $user->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                        onclick="return confirm('Понизить пользователя «{{ $user->name }}» до роли User?')"
                                                        class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded-lg transition text-sm">
                                                    Сменить роль на User
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.users.changeRole', $user->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                        onclick="return confirm('Повысить пользователя «{{ $user->name }}» до роли Admin?')"
                                                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded-lg transition text-sm">
                                                    Сменить роль на Admin
                                                </button>
                                            </form>
                                        @endif
                                    @else
                                        <span class="text-gray-500 text-xs italic">(Это вы)</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                                Пользователи не найдены
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- <div class="mt-10">
            {{ $users->links() }}
        </div> --}}
    </div>
@endsection
