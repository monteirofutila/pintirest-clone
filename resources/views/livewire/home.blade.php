<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 xl:columns-5 2xl:columns-6 gap-4 space-y-4">
                @foreach ($pins as $pin)
                    <div>
                        <div class="relative overflow-hidden border border-gray-100 rounded-3xl group">
                            <a href="#">
                                <img class="w-full h-auto object-cover rounded-3xl" src="{{ $pin->image_url }}"
                                    alt="" />
                            </a>
                            <div
                                class="absolute inset-0 hover:bg-transparent transition duration-300 hover:bg-gray-900 hover:opacity-25 rounded-3xl">
                            </div>
                            <div
                                class="absolute inset-0 flex flex-col justify-between p-5 opacity-0 group-hover:opacity-100 transition duration-300">
                                <div class="flex justify-end">
                                    <a href="#" wire:click="bookmark({{ $pin->id }})"
                                        class="inline-flex items-center px-3 py-3 font-medium text-center text-white bg-red-600 rounded-full">
                                        Guardar
                                    </a>
                                </div>
                                {{-- <div class="flex justify-end gap-2">
                                    <a href="#"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-full">
                                        Read
                                    </a>
                                    <a href="#"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-full">
                                        More
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
