<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="w-full flex flex-col items-center justify-between gap-10">
                <div class="w-full flex flex-col gap-2 items-center justify-center">
                    <img src="http://placehold.it/100x100" class="rounded-full size-32 object-cover">
                    <h2 class="text-4xl font-medium text-gray-900">{{ $user->name }}</h2>
                    <a class="text-sm text-gray-500" href="{{ route('profile', ['username' => $user->username]) }}"
                        wire:navigate>{{ '@' . $user->username }}</a>
                    <div class="w-full flex items-center justify-center mt-2">
                        <a href="{{ route('settings') }}"
                            class="block py-3 px-4 font-medium text-gray-900 bg-gray-100 hover:bg-gray-200 rounded-full">Editar
                            perfil</a>
                    </div>
                </div>
                <div class="w-full flex items-center justify-center">
                    <ul
                        class="w-full flex flex-wrap items-center justify-center gap-4 font-medium text-center text-gray-900">
                        <li>
                            <a href="#" class="inline-block py-2 border-b-[3px] border-gray-900">Criado</a>
                        </li>
                        <li>
                            <a href="#"
                                class="inline-block p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">Guardado</a>
                        </li>
                    </ul>
                </div>
                <div class="w-full flex flex-col items-center justify-center">
                    <p class="text-center text-gray-900">Ainda não há nada para apresentar! Poderás encontrar aqui todos
                        os Pins que
                        criares.</p>
                    <div class="mt-4">
                        <a href="#"
                            class="block py-3 px-4 font-medium text-white bg-red-600 hover:bg-red-700 rounded-full">Criar
                            Pin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
