<div>


    <form class="p-4 md:p-5" wire:submit.prevent="SaveInvoice" autocomplete="off">
        <div class="mb-6">
            <h2 class="text-xl font-semibold leading-tight text-center text-gray-800 font dark:text-gray-200">
                Adjuntar Factura
            </h2>
        </div>

        <hr>

        <div class="grid grid-cols-2 gap-3 mb-4">
            <div class="col-span-4 mt-2 text-center">

                <label for="archivo" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Sube o Arrastra</span> tu archivo</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Solo PDF (MAX. 2048)</p>
                        </div>
                        <input id="archivo" name="archivo" wire:model="archivo" accept=".pdf" type="file" class="hidden" />
                </label>

                @error('archivo')
                    <span class="text-sm text-rose-600">{{ $message }}</span>
                @enderror

                <div wire:loading wire:target="archivo">
                    <div class="w-80">
                        <div class="mb-1 text-center">
                            <span class="text-base font-medium text-green-700 dark:text-white">Cargando...</span>
                            <span class="text-sm font-medium text-green-700 dark:text-white">75%</span>
                        </div>
                        <div class=" bg-gray-200 rounded-full h-2.5 dark:bg-zinc-700">
                            <div class="bg-green-600 h-2 rounded-full w-[75%]"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Buttons --}}
        <div class="mt-4 ">
            <div class="container">
                <div class="grid grid-cols-1 gap-10">
                    <div class="text-center">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Asignar Factura
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
