<div>
    <div class="container px-4">
        <div class="grid grid-cols-12 gap-2 mb-1">

            @if (!$is_loading_xml)
                <div class="col-span-3">
                    <button type="button" wire:click="$toggle('is_loading_xml')"
                        class="w-4/5 focus:outline- text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        Adjuntar XML
                    </button>
                </div>
            @endif

            @if ($is_loading_xml && !$is_valid_xml)
                <div class="col-span-6">
                    <input type="file" name="factura_XML" wire:model="factura_XML" accept=".xml"
                        class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    @error('factura_XML') <span class="text-xs text-rose-600">{{ $message }}</span> @enderror
                </div>

                <br>

                <span wire:loading wire:target="factura_XML">
                    <div class="flex justify-between mb-1">
                        <span class="text-base font-medium text-green-700 dark:text-white">Cargando...</span>
                        <span class="text-sm font-medium text-green-700 dark:text-white">75%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 75%"></div>
                    </div>
                </span>

                {{-- <div class="col-span-8">
                    <div class="flex items-center justify-center w-full">
                        <label for="factura_XML"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Adjuntar
                                        Factura</span>
                                    o arrastrar y soltar</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Solo XML (MAX. 32kB)</p>
                            </div>
                            <input id="factura_XML" enctype='multipart/form-data' type="file" name="factura_XML"
                                wire:model.blur="factura_XML" class="hidden"/>
                        </label>
                        @error('factura_XML') <span class="text-xs text-rose-600">{{ $message }}</span> @enderror
                    </div>
                </div> --}}

            @endif

            <div class="col-span-4">
                @if ($is_loading_xml && !$is_valid_xml)
                    <span class="text-rose-600 text-">{{ $xml_message }}</span>
                    <button type="button" wire:click='validateXML' wire:loading.attr="disabled"
                    class="w-4/5 focus:outline- text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Validar XML
                </button>
                @endif

                @if ($is_valid_xml)
                    <span class="text-green-600 text-">{{ $xml_message }}</span>

                    <button type="button" wire:click='newFactura'
                        class="w-4/5 focus:outline- text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Cargar Datos
                    </button>
                @endif
            </div>

        </div>
    </div>
</div>
