<div>


    <form class="p-4 md:p-5" wire:submit.prevent="SaveInvoice" autocomplete="off">
        <div class="mb-6">
            <h2 class="text-xl font-semibold leading-tight text-center text-gray-800 font dark:text-gray-200">
                Adjuntar Factura
            </h2>
        </div>

        <div class="grid grid-cols-2 gap-3 mb-4">
            <div>
                <x-label for="fecha_registro" value="{{ __('Fecha de Registro') }}" />
                <input wire:model.blur="fecha_registro" type="date" name="fecha_registro" readonly
                    class="cursor-no-drop w-full bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-800 dark:border-zinc-700 dark:placeholder-zinc-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required max="2100-12-31" step="1">
                @error('fecha_registro')
                <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <x-label for="lugar_registro" value="{{ __('Sede de Registro') }}" />
                <input wire:model="lugar_registro" type="text" name="lugar_registro" id="lugar_registro"
                    class="cursor-no-drop w-full bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-800 dark:border-zinc-700 dark:placeholder-zinc-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('lugar_registro') `
                <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="col-span-4">
                <x-label for="folio" value="{{ __('Folio') }}" />
                <input wire:model.blur="folio" type="text" name="folio" readonly
                    class="cursor-no-drop w-full bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-800 dark:border-zinc-700 dark:placeholder-zinc-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                @error('folio')
                <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-4 mt-2 text-center">
                <input type="file" name="archivo" wire:model="archivo" accept=".pdf"
                    class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400">
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

            <div class="col-span-4">
                <x-label for="arch_nombre" value="{{ __('Nombre del Archivo') }}" />
                <input wire:model="arch_nombre" type="text" name="arch_nombre" id="arch_nombre"
                    placeholder="Nombre del Archivo"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('arch_nombre')
                <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-4">
                <x-label for="arch_descripcion" value="{{ __('Descripción del Archivo') }}" />
                <textarea wire:model.blur="arch_descripcion" name="arch_descripcion" rows="3"
                    placeholder="Describe el contenido del Archivo"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </textarea>
                @error('arch_descripcion')
                <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Asignar Factura
        </button>
    </form>
</div>
