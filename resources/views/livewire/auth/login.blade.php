{{-- In work, do what you enjoy. --}}
<div class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4 h-screen">
        <div class="w-full max-w-lg flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="w-full flex flex-col items-center justify-center">
                <h2 class="text-4xl font-medium text-gray-900 text-center">Bem-vindo(a) ao Pinterest</h2>
            </div>
            <div class="w-full max-w-xs flex flex-wrap items-center justify-between mx-auto">
                <div class="w-full flex flex-col items-center justify-center w-full space-y-5 mt-7">
                    <div class="w-full">
                        <label for="email" class="block mb-2 ps-2 text-sm text-gray-900 dark:text-white">E-mail</label>
                        <input type="email" id="email" wire:model="email"
                            class="bg-white py-3 px-4 border-2 border-gray-300 text-gray-700 text-medium placeholder-gray-500 rounded-2xl w-full"
                            placeholder="E-mail" />
                        @error('email')
                            <span class="error text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="password"
                            class="block mb-2 ps-2 text-sm text-gray-900 dark:text-white">Palavra-passe</label>
                        <input type="password" id="password" wire:model="password"
                            class="bg-white py-3 px-4 border-2 border-gray-300 text-gray-700 text-medium placeholder-gray-500 rounded-2xl w-full"
                            placeholder="Palavra-passe" />
                        @error('password')
                            <span class="error text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <button wire:click="authenticate"
                            class="block py-2 px-4 text-center font-medium text-white bg-red-600 hover:bg-red-700 rounded-full">
                            Iniciar sessão</button>
                    </div>
                    <div class="w-full">
                        <p class="text-center">
                            <a href="{{ route('register') }}" wire:navigate
                                class="undefined text-xs font-medium text-gray-900 dark:text-gray-500">Ainda
                                não
                                estás no
                                Pinterest?
                                Inscreve-te
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
