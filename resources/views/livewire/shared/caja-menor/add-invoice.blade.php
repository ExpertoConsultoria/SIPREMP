<div>
    <form class="p-4 md:p-5" wire:submit.prevent="SaveInvoice" autocomplete="off">
        @if (!$is_done)
            <div class="text-center">
                @if (!$is_loading_pdf)
                    <div>
                        <button type="button" wire:click="$toggle('is_loading_pdf')"
                            class="disabled:opacity-25 focus:outline- text-white bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 transition-all active:translate-y-1">
                            SUBIR PDF (Del Proveedor)
                        </button>
                    </div>
                @endif
            </div>
            <div class="grid grid-cols-3 gap-6 lg:grid-cols-6 xl:grid-cols-6 ">

                @if ($is_loading_pdf)
                    <div class="col-span-3">
                        <div class="text-center">
                            <input type="file" name="factura_PDF" wire:model="factura_PDF" accept=".pdf"
                                class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400">
                            <div>
                                @error('factura_PDF')
                                    <span class="text-sm text-rose-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div wire:loading wire:target="factura_PDF">
                                <div class="w-80">
                                    <div class="mb-1 text-center">
                                        <span
                                            class="text-base font-medium text-green-700 dark:text-white">Cargando...</span>
                                        <span class="text-sm font-medium text-green-700 dark:text-white">75%</span>
                                    </div>
                                    <div class=" bg-gray-200 rounded-full h-2.5 dark:bg-zinc-700">
                                        <div class="bg-green-600 h-2 rounded-full w-[75%]"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-3">
                        <div class="text-center">

                            <button type="submit"
                                class="disabled:opacity-25 focus:outline- text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition-all active:translate-y-1">
                                Cargar PDF
                            </button>
                            <div>
                                <span class="text-sm text-rose-600">{{ $pdf_message }}</span>
                            </div>

                        </div>
                    </div>
                @endif

            </div>
        @else
            <div class="items-center text-center">
                <div class="col-span-3">
                    <p class="text-lg font-bold text-gray-900 dark:text-white">
                        !Factura Cargada Correctamente!
                    </p>
                </div>
            </div>
        @endif
    </form>
</div>
