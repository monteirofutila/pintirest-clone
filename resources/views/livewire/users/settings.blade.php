<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto">
            <div class="w-full relative">
                <div class="w-full max-w-lg flex items-center gap-14 mx-auto p-4 mb-32">
                    <div class="w-full flex justify-center">
                        <div class="flex flex-col items-center justify-center w-full space-y-5">
                            <div class="w-full space-y-2 mb-2">
                                <h1 class="text-3xl font-medium">Editar perfil</h1>
                                <p class="block mb-2 text-gray-900 dark:text-white">Mantém os teus dados
                                    pessoais
                                    privados. As
                                    informações que
                                    adicionares aqui ficam
                                    visíveis para qualquer pessoa que possa ver o teu perfil.</p>
                            </div>
                            <div class="w-full ">
                                <label for="file"
                                    class="block mb-2 text-sm text-gray-900 dark:text-white">Foto</label>
                                <div class="w-full flex gap-4 items-center">
                                    <input id="uploadInput" wire:model="file" type="file" class="hidden"
                                        accept="image/*" />
                                    @if ($file)
                                        <img src="{{ $file->temporaryUrl() }}"
                                            class="rounded-full size-24 object-cover">
                                    @else
                                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'http://placehold.it/100x100' }}"
                                            class="rounded-full size-24 object-cover">
                                    @endif
                                    <button type="submit" wire:click="$dispatch('image-preview')"
                                        class="block py-3 px-4 font-medium text-gray-900 bg-gray-100 hover:bg-gray-200 rounded-full">
                                        Alterar</button>
                                    @error('password')
                                        <span class="error text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full flex grid grid-cols-1 sm:grid-cols-2 gap-2">
                                <div class="w-full">
                                    <label for="name" class="block mb-2 text-sm text-gray-900 dark:text-white">Nome
                                        próprio</label>
                                    <input type="text" id="name" wire:model="name"
                                        class="bg-white py-3 px-4 border-2 border-gray-300 text-gray-700 text-medium placeholder-gray-500 rounded-2xl w-full" />
                                    @error('name')
                                        <span class="error text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="nickname"
                                        class="block mb-2 text-sm text-gray-900 dark:text-white">Apelido</label>
                                    <input type="text" id="nickname" wire:model="nickname"
                                        class="bg-white py-3 px-4 border-2 border-gray-300 text-gray-700 text-medium placeholder-gray-500 rounded-2xl w-full" />
                                    @error('nickname')
                                        <span class="error text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full">
                                <label for="bio"
                                    class="block mb-2 text-sm text-gray-900 dark:text-white">Acerca</label>
                                <textarea name="bio" id="bio" rows="3" wire:model="bio"
                                    class="bg-white py-3 px-4 border-2 border-gray-300 text-gray-700 text-medium placeholder-gray-500 rounded-2xl w-full"
                                    placeholder="Conta a tua história"></textarea>
                                @error('bio')
                                    <span class="error text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="website"
                                    class="block mb-2 text-sm text-gray-900 dark:text-white">Website</label>
                                <input type="text" id="website" wire:model="website"
                                    class="bg-white py-3 px-4 border-2 border-gray-300 text-gray-700 text-medium placeholder-gray-500 rounded-2xl w-full"
                                    placeholder="Adicionar uma ligação, para direcionar trafégo para o website" />
                                @error('website')
                                    <span class="error text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="username" class="block mb-2 text-sm text-gray-900 dark:text-white">Nome de
                                    utilizador</label>
                                <input type="text" id="username" wire:model.live.debounce.100ms="username"
                                    class="bg-white py-3 px-4 border-2 border-gray-300 text-gray-700 text-medium placeholder-gray-500 rounded-2xl w-full"
                                    placeholder="Faz uma escolha sensata, para que os outros te encontrem" />
                                <p class="mt-2 text-xs text-gray-900 dark:text-gray-500">
                                    {{ url($username) }}
                                </p>
                                @error('username')
                                    <span class="error text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="w-full bg-white fixed inset-x-0 bottom-0 flex items-center justify-center gap-2 shadow-[rgba(0,_0,_0,_0.24)_0px_3px_8px] shadow p-4">
                    <a href="#"
                        class="block py-3 px-4 font-medium text-gray-900 bg-gray-100 hover:bg-gray-200 rounded-full">Repor</a>
                    <button type="submit" wire:click="edit"
                        class="block py-3 px-4 font-medium text-white bg-red-600 hover:bg-red-700 rounded-full">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('image-preview', (event) => {
                document.getElementById('uploadInput').click()
            });
        });
    </script>
@endpush
