<div>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-2xl font-bold leading-tight text-gray-800 font dark:text-gray-200">
                    {{ __('Entrada a inventario') }}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem">
                <a href="{{ route('inventario') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 40 40"
                        fill="">
                        <path
                            d="M36.6666 18.3334H7.35664L16.1783 9.51172C16.3375 9.35798 16.4645 9.17407 16.5518 8.97073C16.6392 8.76739 16.6851 8.54869 16.6871 8.32739C16.689 8.10609 16.6468 7.88662 16.563 7.6818C16.4792 7.47697 16.3554 7.29088 16.199 7.1344C16.0425 6.97791 15.8564 6.85415 15.6516 6.77035C15.4467 6.68655 15.2273 6.64438 15.006 6.6463C14.7847 6.64823 14.566 6.6942 14.3626 6.78155C14.1593 6.8689 13.9754 6.99587 13.8216 7.15505L2.15497 18.8217C1.84252 19.1343 1.66699 19.5581 1.66699 20.0001C1.66699 20.442 1.84252 20.8658 2.15497 21.1784L13.8216 32.8451C14.136 33.1487 14.557 33.3166 14.994 33.3128C15.431 33.309 15.849 33.1338 16.158 32.8248C16.467 32.5157 16.6423 32.0977 16.6461 31.6607C16.6499 31.2237 16.4819 30.8027 16.1783 30.4884L7.35664 21.6667H36.6666C37.1087 21.6667 37.5326 21.4911 37.8451 21.1786C38.1577 20.866 38.3333 20.4421 38.3333 20.0001C38.3333 19.558 38.1577 19.1341 37.8451 18.8215C37.5326 18.509 37.1087 18.3334 36.6666 18.3334Z"
                            fill="#515151" />
                    </svg>
                </a>
            </div>

        </div>
    </x-slot>
    <div class="py-8">
        <div class="max-w-screen-xl mx-auto">

            {{-- Datos --}}
            <div
                class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-md w-30 text dark:bg-gray-800 dark:border-gray-700">
                <div class="container px-4">
                    <div class="grid grid-cols-8 gap-6 ">
                        <div>
                            <x-label for="fecha" value="{{ __('Fecha') }}" />
                            <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">07/10/2023</p>
                        </div>
                        <div>
                            <x-label for="sku" value="{{ __('SKU') }}" />
                            <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                MPEO/CM/A001/2023</p>
                        </div>
                        <div class="col-span-2">
                            <label for="mir"
                                class="block text-sm font-bold text-start text-gray-900 dark:text-white">MIR</label>
                            <input wire:model.blur="mir" type="text" name="mir" placeholder=""
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="col-span-2 text-end">
                            <button type="button"
                                class="disabled:opacity-25 focus:outline-none text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg text-xs px-3 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all active:translate-y-1">
                                Subir XML
                            </button>
                        </div>
                        <div class="col-span-2 text-start">
                            <button type="button"
                                class="disabled:opacity-25 focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-xs px-3 py-2.5  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition-all active:translate-y-1">
                                Cargar inventario
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="p-6 mt-4 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">

                <div class="container px-4">
                    <div class="grid gap-3 grid-cols-9">
                        <div>
                            <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                            <input wire:model.blur="cantidad" wire:change="CalculateAmount()" type="number"
                                name="cantidad" step="0.01" placeholder="0.00"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('cantidad')
                                <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <x-label for="unidad_medida" value="{{ __('UM') }}" />
                            <input wire:model.blur="unidad_medida" type="text" name="unidad_medida"
                                placeholder="Unidad de Medida"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('unidad_medida')
                                <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-3">
                            <x-label for="concepto" value="{{ __('Concepto') }}" />
                            <input wire:model.blur="concepto" type="text" name="concepto" placeholder="Concepto"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('concepto')
                                <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-3">
                            <x-label for="partida_presupuestal" value="{{ __('Partida presupuestal') }}" />
                            <input wire:model.blur="p_u" wire:change="CalculateAmount()" type="number" step="0.001"
                                placeholder="0.00" name="p_u"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('p_u')
                                <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-7 text-center">
                            <button type="button" 
                                class="focus:outline- text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition-all active:translate-y-1">
                                Registrar
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Table --}}
            <div
                class="pb-12 mt-4 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">
                <div class="relative overflow-x-auto rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-800 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Cantidad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Concepto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Partida presupuestal
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                                <th class="px-6 py-3">
                                    10
                                </th>
                                <th class="px-6 py-3">
                                    Lt
                                </th>
                                <th class="px-6 py-3">
                                    <input type="text" placeholder=""
                                        class="w-3/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    <div class="p-6 bg-white h-16 text dark:bg-gray-800 dark:border-gray-700">
                    </div>
                    <div class="border-b dark:bg-gray-800 dark:border-gray-700"></div>

                </div>
            </div>

            <div class="mt-5">
                <div class="container">
                    <div class="col-span-2 text-end">
                        <button type="submit"
                            class="disabled:opacity-25 focus:outline- text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition-all active:translate-y-1">
                            AGREGAR AL INVENTARIO
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
