<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="w-full flex flex-col items-center justify-between gap-7">
                <div class="w-full flex flex-col gap-2 items-center justify-center">
                    <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'http://placehold.it/100x100' }}"
                        class="rounded-full size-32 object-cover">
                    <h2 class="text-4xl font-medium text-gray-900">{{ $user->name }}</h2>
                    <a class="text-sm text-gray-500" href="{{ route('profile', ['username' => $user->username]) }}"
                        wire:navigate>{{ '@' . $user->username }}</a>
                    <div class="w-full flex items-center justify-center mt-2">
                        @if ($user->is(auth()->user()))
                            <a href="{{ route('settings') }}" wire:navigate
                                class="block py-3 px-4 font-medium text-gray-900 bg-gray-100 hover:bg-gray-200 rounded-full">Editar
                                perfil</a>
                        @endif
                    </div>
                </div>
                <div x-data="{ selected_tab: 'created' }" class="w-full flex flex-col items-center justify-between gap-10">
                    <div class="w-full flex overflow-x-auto items-center justify-center gap-4 ">
                        <button @click="selected_tab = 'created'" type="button"
                            :aria-selected="selected_tab === 'created'"
                            :tabindex="selected_tab === 'created' ? '0' : '-1'"
                            :class="selected_tab === 'created' ? 'border-b-[3px] border-gray-900' :
                                'rounded-lg hover:bg-gray-100'"
                            role="tab" aria-controls="tabpanel_created"
                            class="inline-block p-2 text-gray-900 font-medium">Criado</button>
                        <button @click="selected_tab = 'saved'" type="button"
                            :aria-selected="selected_tab === 'created'"
                            :tabindex="selected_tab === 'created' ? '0' : '-1'"
                            :class="selected_tab === 'saved' ? 'border-b-[3px] border-gray-900' :
                                'rounded-lg hover:bg-gray-100'"
                            role="tab" aria-controls="tabpanel_saved"
                            class="inline-block p-2 text-gray-900 font-medium">Guardado</button>
                    </div>
                    <div class="w-full items-center justify-between">
                        <div x-show="selected_tab === 'created'" id="tabpanel_created" role="tabpanel"
                            aria-label="created" class="w-full items-center justify-between">
                            @empty($pins)
                                <div class="w-full flex flex-col items-center justify-center">
                                    <p class="text-center text-gray-900">Ainda não há nada para apresentar! Poderás
                                        encontrar aqui
                                        todos
                                        os Pins que
                                        criares.</p>
                                    <div class="mt-4">
                                        <a href="{{ route('posts.create') }}" wire:navigate
                                            class="block py-3 px-4 font-medium text-white bg-red-600 hover:bg-red-700 rounded-full">Criar
                                            Pin</a>
                                    </div>
                                </div>
                            @else
                                <div
                                    class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 xl:columns-5 2xl:columns-6 gap-4 space-y-4">
                                    @foreach ($pins as $pin)
                                        <div>
                                            <div class="relative overflow-hidden border border-gray-100 rounded-3xl group">
                                                <a href="#">
                                                    <img class="w-full h-auto object-cover rounded-3xl"
                                                        src="{{ $pin->image_url }}" alt="" />
                                                </a>
                                                <div
                                                    class="absolute inset-0 hover:bg-transparent transition duration-300 hover:bg-gray-900 hover:opacity-25 rounded-3xl">
                                                </div>
                                                <div
                                                    class="absolute inset-0 flex flex-col justify-between p-5 opacity-0 group-hover:opacity-100 transition duration-300">
                                                    <div class="flex justify-end">
                                                        <a href="#"
                                                            class="inline-flex items-center px-3 py-3 font-medium text-center text-white bg-red-600 rounded-full">
                                                            Guardar
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endempty
                        </div>
                        <div x-show="selected_tab === 'saved'" id="tabpanel_saved" role="tabpanel" aria-label="saved"
                            class="w-full items-center justify-between">
                            <div class="w-full flex flex-col items-center justify-center">
                                <p class="text-center text-gray-900">Ainda não há nada para apresentar! Poderás
                                    encontrar aqui
                                    todos
                                    os Pins que
                                    guardares.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
