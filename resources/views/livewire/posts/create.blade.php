<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto">
            <div class="w-full flex items-center justify-between border border-gray-300 p-4">
                <h1 class="text-xl font-medium">Criar Pin</h1>
                <button type="submit" wire:click="store"
                    class="block py-3 px-4 font-medium text-white bg-red-600 hover:bg-red-700 rounded-full">Publicar</button>
            </div>
            <div class="w-full max-w-screen-lg flex flex-col sm:flex-row gap-14 mx-auto p-4">
                <div class="flex flex-[0.5] justify-center">
                    <label x-data="imgPreview" for="upload"
                        class="flex flex-col items-center justify-center w-full h-96 border-2 border-gray-300 border-dashed rounded-2xl cursor-pointer bg-gray-100 dark:hover:bg-gray-800 dark:bg-gray-700 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div x-show="!imgsrc" class="flex flex-col items-center justify-center pt-5 pb-6 px-4">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 font-medium text-gray-900 text-center dark:text-gray-400 w-60">Selecione
                                um
                                ficheiro
                                ou arrasta-o e
                                larga-o aqui</p>
                        </div>
                        <img x-show="imgsrc" :src="imgsrc" class="w-full h-full object-cover rounded-2xl"
                            alt="">
                        <input @change="previewFile" x-ref="myFile" id="upload" wire:model="file" type="file"
                            class="hidden" accept="image/*" />
                    </label>
                    @error('file')
                        <span class="error text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-1 justify-center">
                    <div class="flex flex-col items-center justify-center w-full space-y-5">
                        <div class="w-full">
                            <label for="title"
                                class="block mb-2 text-sm text-gray-900 dark:text-white">Título</label>
                            <input type="text" id="title" wire:model="title"
                                class="bg-white py-3 px-4 border-2 border-gray-300 text-gray-700 text-medium placeholder-gray-500 rounded-2xl w-full"
                                placeholder="Adicionar um título" />
                            @error('title')
                                <span class="error text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="description"
                                class="block mb-2 text-sm text-gray-900 dark:text-white">Descrição</label>
                            <textarea wire:model="description" name="description" id="description" rows="3"
                                class="bg-white py-3 px-4 border-2 border-gray-300 text-gray-700 text-medium placeholder-gray-500 rounded-2xl w-full"
                                placeholder="Escreva uma descrição detalhada"></textarea>
                            @error('description')
                                <span class="error text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="link"
                                class="block mb-2 text-sm text-gray-900 dark:text-white">Ligação</label>
                            <input type="text" id="link" wire:model="link"
                                class="bg-white py-3 px-4 border-2 border-gray-300 text-gray-700 text-medium placeholder-gray-500 rounded-2xl w-full"
                                placeholder="Adicionar uma ligação" />
                            @error('link')
                                <span class="error text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="tag" class="block mb-2 text-sm text-gray-900 dark:text-white">Tópicos
                                etiquetados (0)</label>
                            <input type="text" id="tag"
                                class="bg-white py-3 px-4 border-2 border-gray-300 text-gray-700 text-medium placeholder-gray-500 rounded-2xl w-full"
                                placeholder="Pesquisa uma Tag" />
                            @error('tag')
                                <span class="error text-sm text-red-600">{{ $message }}</span>
                            @enderror
                            <p class="mt-2 text-xs text-gray-900 dark:text-gray-500">Não te preocupes. Os utilizadores
                                não
                                veem as tuas Tags.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        Alpine.data('imgPreview', () => ({
            imgsrc: null,
            previewFile() {
                let file = this.$refs.myFile.files[0];
                if (!file || file.type.indexOf('image/') === -1) return;
                this.imgsrc = null;
                let reader = new FileReader();

                reader.onload = e => {
                    this.imgsrc = e.target.result;
                }

                reader.readAsDataURL(file);
            }
        }))
    </script>
@endscript
