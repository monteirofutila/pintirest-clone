<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="items-center justify-between md:flex">
                <ul class="w-full flex flex-row gap-10 items-center justify-between">
                    <li>
                        <a href="{{ route('home') }}" class="self-cente r text-2xl font-semibold dark:text-white">
                            Pinterest
                        </a>
                    </li>
                    @auth
                        <li>
                            <a href="{{ route('home') }}" wire:navigate class="block font-medium text-gray-900">Início</a>
                        </li>
                        <li>
                            <a href="{{ route('posts.create') }}" wire:navigate
                                class="block font-medium text-gray-900">Criar</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('home') }}" wire:navigate class="block font-medium text-gray-900">Explorar</a>
                        </li>
                    @endauth
                </ul>
            </div>
            <div
                class="w-full max-w-sm md:max-w-md lg:max-w-xl xl:max-w-3xl 2xl:max-w-5xl flex items-center hidden md:block">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search icon</span>
                    </div>
                    <input type="text" id="search-navbar"
                        class="block w-full py-3 px-4 ps-10 text-medium text-gray-700 placeholder-gray-500 bg-gray-100 border-0 rounded-full"
                        placeholder="Procura por refeições fáceis, moda, etc.">
                </div>
            </div>
            <div class="items-center justify-between md:flex">
                @auth
                    <ul class="flex flex-row space-x-2 items-center justify-center">
                        <a href="{{ route('profile', auth()->user()->username) }}" wire:navigate
                            class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                            <span class="sr-only">Open user menu</span>
                            <img class="rounded-full size-10 object-cover" src="{{ auth()->user()->avatar_url }}"
                                alt="{{ auth()->user()->name }}">
                        </a>
                        <div x-data="{ open: false }" class="inline-flex relative">
                            <button @click="open = ! open"
                                class="flex text-gray-700 hover:bg-gray-100 size-8 font-medium rounded-full text-sm items-center justify-center"
                                type="button"><svg class="w-2.5 h-2.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div x-show="open"
                                class="absolute z-50 top-12 right-0 p-2 flex w-full min-w-[18rem] flex-col overflow-hidden bg-white rounded-lg shadow-md">
                                <div class="flex w-full items-center jutify-between gap-3 p-2 bg-gray-100 rounded-lg">
                                    <img src="{{ auth()->user()->avatar_url }}" class="rounded-full size-14 object-cover">
                                    <div class="items-center jutify-between">
                                        <span
                                            class="block font-medium text-base text-gray-700 dark:text-white">{{ auth()->user()->name }}</span>
                                        <span
                                            class="block text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                                <ul class="flex flex-col w-full py-2">
                                    <li>
                                        <a href="{{ route('settings') }}" wire:navigate
                                            class="block font-medium text-base px-2 py-2 text-gray-700 rounded-lg hover:bg-gray-100">Definições</a>
                                    </li>
                                    <form action="{{ route('logout') }}" method="post" class="w-full">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left font-medium text-base px-2 py-2 text-gray-700 rounded-lg hover:bg-gray-100">Terminar
                                            sessão</button>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </ul>
                @else
                    <ul class="flex flex-row space-x-2">
                        <li>
                            <a href="{{ route('login') }}"
                                class="block py-3 px-4 font-medium text-gray-900 bg-gray-100 hover:bg-gray-200 rounded-full">Iniciar
                                sessão</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"
                                class="block py-3 px-4 font-medium text-white bg-red-600 hover:bg-red-700 rounded-full">Inscreve-te</a>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
</div>
