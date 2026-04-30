<!-- resources/views/layouts/partials/header.blade.php -->
<header class="bg-white shadow-xl sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Верхняя строка -->
        <div class="flex items-center justify-between h-20">

            <!-- Логотип -->
            <div class="flex items-center">
                <a href="#" class="flex items-center gap-x-3 group">
                    <div
                        class="w-12 h-12 bg-gradient-to-r from-orange-500 to-pink-500 rounded-2xl flex items-center justify-center text-white font-black text-2xl shadow-lg group-hover:shadow-xl transition-all">
                        E
                    </div>
                    <div>
                        <span
                            class="text-2xl font-black bg-gradient-to-r from-orange-600 to-pink-600 bg-clip-text text-transparent">Electro</span>
                        <span class="block text-[10px] font-bold text-gray-400 tracking-wider">MEGA STORE</span>
                    </div>
                </a>
            </div>

            <!-- Поиск -->
            <div class="flex-1 max-w-xl mx-10">
                <form action="#" method="GET">
                    <div class="relative">
                        <input
                            type="text"
                            name="search"
                            placeholder="🔍 What are you looking for?"
                            value="{{ request()->search }}"
                            class="w-full bg-gray-50 border-2 border-gray-100 focus:border-orange-300 rounded-2xl py-4 px-6 pl-14 text-sm transition-all outline-none focus:ring-4 focus:ring-orange-100">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <button type="submit"
                                class="absolute right-2 top-1/2 -translate-y-1/2 bg-gradient-to-r from-orange-500 to-pink-500 text-white px-6 py-2 rounded-xl text-sm font-bold">
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <!-- Иконки -->
            <div class="flex items-center gap-x-4">
                <a href="#" class="relative bg-gray-50 p-2.5 rounded-2xl hover:bg-orange-50 transition-all group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 group-hover:text-orange-500"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364"/>
                    </svg>
                    <span
                        class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-bold w-5 h-5 flex items-center justify-center rounded-full">12</span>
                </a>

                <a href="#" class="relative bg-gray-50 p-2.5 rounded-2xl hover:bg-orange-50 transition-all group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 group-hover:text-orange-500"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span id="cart-count"
                          class="absolute -top-1 -right-1 bg-gradient-to-r from-orange-500 to-pink-500 text-white text-[10px] font-bold w-5 h-5 flex items-center justify-center rounded-full">0</span>
                </a>

                <!-- Auth Section -->
                <div class="flex items-center gap-x-3">
                    @guest
                        <!-- Не авторизован -->
                        <a href="{{ route('login') }}"
                           class="flex items-center gap-x-2 bg-gray-50 hover:bg-orange-50 px-5 py-2.5 rounded-2xl transition-all group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5 text-gray-600 group-hover:text-orange-500" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7"/>
                            </svg>
                            <span
                                class="hidden sm:block text-sm font-semibold text-gray-700 group-hover:text-orange-500">
                Войти
            </span>
                        </a>

                        <a href="{{ route('register') }}"
                           class="flex items-center gap-x-2 bg-black text-white hover:bg-zinc-800 px-6 py-2.5 rounded-2xl transition-all font-semibold text-sm">
                            Регистрация
                        </a>

                    @else
                        <!-- Авторизован -->
                        <div class="relative">
                            <button id="user-menu-button"
                                    onclick="toggleUserDropdown()"
                                    class="flex items-center gap-x-2 bg-gray-50 hover:bg-orange-50 px-5 py-2.5 rounded-2xl transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7"/>
                                </svg>
                                <span class="hidden sm:block text-sm font-semibold text-gray-700">
                    {{ Auth::user()->name }}
                </span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-4 h-4 text-gray-500 transition-transform duration-200" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <!-- Дропдаун -->
                            <div id="user-dropdown"
                                 class="hidden absolute right-0 mt-3 w-56 bg-white rounded-3xl shadow-2xl border border-zinc-100 py-2 z-50 overflow-hidden">

                                <div class="px-6 py-4 border-b border-zinc-100">
                                    <p class="font-semibold text-black">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-zinc-500 mt-0.5">{{ Auth::user()->email }}</p>
                                    <p class="text-base font-semibold text-green-600 mt-0.5">
                                        Роль:  {{ Auth::user()->getRole() }}
                                    </p>
                                </div>

                                <a href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="flex items-center gap-x-3 px-6 py-3.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 16l4-4m0 0l-4-4m4 4V7m-4 4V7"/>
                                    </svg>
                                    Выйти
                                </a>
                            </div>
                        </div>

                        <!-- Форма выхода -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>

        <!-- Навигация с категориями -->
        <nav class="border-t border-gray-100 mt-2">
            <div class="flex items-center h-12">

                <!-- Кнопка категорий -->
                <div class="relative group">
                    <button
                        class="flex items-center gap-x-2 px-6 h-12 bg-gradient-to-r from-orange-500 to-pink-500 text-white font-bold text-sm rounded-xl hover:shadow-lg transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <span>ALL CATEGORIES</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Mega Dropdown -->
                    <div
                        class="absolute left-0 top-full hidden group-hover:block w-screen max-w-7xl bg-white shadow-2xl rounded-2xl mt-2 z-50">
                        <div class="grid grid-cols-4 gap-6 p-8">
                            @foreach($navigationCategories as $category)
                                <div>
                                    <a href="#"
                                       class="block font-bold text-gray-900 hover:text-orange-500 mb-4 text-base">
                                        🎯 {{ $category->name }}
                                    </a>
                                    <ul class="space-y-2">
                                        @foreach($category->children as $child)
                                            <li>
                                                <a href="{{ route('categories.category.products', $category->id) }}"
                                                   class="text-gray-500 hover:text-gray-900 text-sm transition block hover:pl-2">
                                                    {{ $child->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                        <div
                            class="bg-gradient-to-r from-orange-50 to-pink-50 rounded-b-2xl p-4 flex justify-between items-center">
                            <div class="text-sm text-gray-600">🔥 Hot deals this week!</div>
                            <a href="#" class="text-orange-500 font-bold">View All →</a>
                        </div>
                    </div>
                </div>

                <!-- Ссылки -->
                <div class="flex items-center gap-x-6 ml-8 text-sm font-semibold text-gray-700">
                    <a href="#" class="hover:text-orange-500 transition">🏠 Home</a>
                    <a href="#" class="hover:text-orange-500 transition">🔥 Deals</a>
                    <a href="#" class="hover:text-orange-500 transition">⭐ Bestsellers</a>
                    <a href="#" class="hover:text-orange-500 transition">✨ New Arrivals</a>
                    <a href="#" class="hover:text-orange-500 transition">🏷️ Brands</a>
                    <a href="#" class="hover:text-orange-500 transition">📝 Blog</a>
                    <a href="#" class="hover:text-orange-500 transition">📞 Contact</a>
                </div>

                <div class="ml-auto flex items-center gap-x-3">
                    <div class="bg-green-100 text-green-700 px-3 py-1.5 rounded-full text-xs font-bold">⭐ 4.9 ★★★★★
                    </div>
                    <a href="#" class="text-gray-600 hover:text-orange-500 text-sm font-semibold">📞 24/7 Support</a>
                </div>
            </div>
        </nav>
    </div>
</header>

<script>
    function toggleUserDropdown() {
        const dropdown = document.getElementById('user-dropdown');
        dropdown.classList.toggle('hidden');
    }

    // Закрывать дропдаун при клике вне меню
    document.addEventListener('click', function (event) {
        const button = document.getElementById('user-menu-button');
        const dropdown = document.getElementById('user-dropdown');

        if (button && dropdown) {
            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        }
    });
</script>
