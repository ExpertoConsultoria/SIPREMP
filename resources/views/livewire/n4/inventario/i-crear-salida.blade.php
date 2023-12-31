<div>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-2xl font-bold leading-tight text-gray-800 font dark:text-gray-200">
                    {{ __('Crear Salida de Inventario') }}
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
                    <div class="grid grid-cols-5 gap-6 ">
                        <div>
                            <x-label for="fecha" value="{{ __('Fecha') }}" />
                            <input wire:model.blur="fecha" type="date" name="fecha" readonly
                            class="cursor-no-drop w-full bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-800 dark:border-zinc-700 dark:placeholder-zinc-600 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required max="2100-12-31" step="1">
                        </div>
                        <div>
                            <x-label for="sku" value="{{ __('Folio') }}" />
                            <input wire:model.blur="folio" type="text" name="folio" readonly
                            class="cursor-no-drop w-full bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-800 dark:border-zinc-700 dark:placeholder-zinc-600 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                        </div>
                        <div>
                            <x-label for="solicitante" value="{{ __('Solicitante') }}" />
                            <input wire:model.blur="solicitante" type="text" name="solicitante" readonly
                            class="cursor-no-drop w-full bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-800 dark:border-zinc-700 dark:placeholder-zinc-600 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                        </div>
                        <div class="col-span-2">
                            <x-label for="lugar" value="{{ __('Area') }}" />
                            <input wire:model.blur="lugar" type="text" name="lugar" readonly
                                class="cursor-no-drop w-full bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-800 dark:border-zinc-700 dark:placeholder-zinc-600 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <div class="col-span-2">
                            <x-label for="solicitante" value="{{ __('Entrega') }}" />
                            <input wire:model.blur="solicitante" type="text" name="solicitante" readonly
                                class="cursor-no-drop w-full bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-800 dark:border-zinc-700 dark:placeholder-zinc-600 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
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
                            <input wire:model.blur="cantidad" type="number"
                                name="cantidad" step="1" placeholder="0.00"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('cantidad')
                                <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-4">
                            <x-label for="unidad_medida" value="{{ __('Unidad de medida') }}" />
                            <input wire:model.blur="unidad_medida" type="text" name="unidad_medida"
                                placeholder="Unidad de Medida"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('unidad_medida')
                                <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-3">
                            <x-label for="precio_unitario" value="{{ __('Precio unitario') }}" />
                            <input wire:model.blur="precio_unitario" type="number" name="precio_unitario"
                                placeholder="0.00"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('precio_unitario')
                                <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-4">
                            <x-label for="concepto" value="{{ __('Concepto') }}" />
                            <input wire:model.blur="concepto" type="text" name="concepto" placeholder="Concepto"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('concepto')
                                <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-4 flex">
                        <x-label for="partida_presupuestal" value="{{ __('Partida presupuestal') }}" />
                            <select value=""
                                wire:model.blur="partida_presupuestal"
                                required
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">
                                    Seleccione una partida presupuestal
                                </option>
                                @foreach ($partidas_presupuestales as $partida_presupuestal)
                                    <option value="{{ $partida_presupuestal->CvePptal }}">
                                        {{ $partida_presupuestal->PartidaEspecifica }}
                                    </option>
                                @endforeach
                                {{-- opciones --}}
                            </select>
                            @error('partida_presupuestal')
                                <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-5 text-start">
                            <button type="button" wire:click="AddToList"
                                class="focus:outline- text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition-all active:translate-y-1">
                                Registrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Table --}}
            <div class="pb-12 mt-4 bg-white border border-gray-200 rounded-lg shadow-sm w-30 text dark:bg-gray-800 dark:border-gray-700">
                <div class="relative overflow-x-auto rounded-lg">
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-800 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Cantidad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    UM
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Concepto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Partida presupuestal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Precio unitario
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($itemSalida as $item)
                            <tr class="text-center dark:bg-gray-800 dark:border-gray-700 border-b">
                                <td class="px-6 py-3">
                                    {{ $item->cantidad}}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $item->unidad_medida}}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $item->concepto}}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $item->partida_presupuestal_id}}
                                </td>
                                <td class="px-6 py-3">
                                    {{ number_format($item->precio_unitario) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="p-6 bg-white h-16 text dark:bg-gray-800 dark:border-gray-700"></div>
                    <div class="border-b dark:bg-gray-800 dark:border-gray-700"></div>

                </div>
            </div>

            <div class="mt-5">
                <div class="container">
                    <div class="grid grid-cols-6">
                        <div class="text-start">
                            <button type="submit" wire:loading.attr="disabled"
                                class="disabled:opacity-25 focus:outline- text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all active:translate-y-1">
                                FIRMA DE RECIBIDO
                            </button>
                        </div>
                        <div class="text-start">
                            <button type="submit" wire:loading.attr="disabled"
                                class="disabled:opacity-25 focus:outline- text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all active:translate-y-1">
                                IMPRIMIR COMPROBANTE
                            </button>
                        </div>
                        <div class="col-span-4 text-end">
                            <button wire:click="saveSalida" wire:loading.attr="disabled"
                                class="disabled:opacity-25 focus:outline- text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 transition-all active:translate-y-1">
                                REGISTRAR SALIDA
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
