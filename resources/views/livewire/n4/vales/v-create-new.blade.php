<div>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-2xl font-bold leading-tight text-gray-800 font dark:text-gray-200">
                    {{ __('Nuevo vale de compra o servicio | Solicitud #0001') }}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem">
                <a href="{{ route('vales') }}">
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

    <div class="py-8 max-w-screen-xl mx-auto">

        <div
            class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-md w-30 text dark:bg-gray-800 dark:border-gray-700">
            <div class="container px-4">
                <div class="grid grid-cols-6  gap-6">
                    <div>
                        <x-label for="fecha" value="{{ __('Fecha') }}" />
                        <p class="font-extralight text-xs text-gray-500 font-sans dark:text-gray-200">13/09/2023</p>
                    </div>
                    <div>
                        <x-label for="folio" value="{{ __('Folio') }}" />
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">SP-000001</p>
                    </div>
                    <div>
                        <x-label for="solicitante" value="{{ __('Solicitante') }}" />
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">Solicitante</p>
                    </div>
                    <div>
                        <x-label for="lugar" value="{{ __('Sede/Lugar') }}" />
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">Matriz</p>
                    </div>
                    <div>
                        <x-label for="mir" value="{{ __('MIR') }}" />
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">
                            97438498328498-38293898</p>
                    </div>
                    <div>
                        <button type="button"
                            class="disabled:opacity-25 focus:outline-none text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all active:translate-y-1">
                            ADJUNTAR COTIZACIÓN
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-6  gap-6 mt-6">
                    <div class="flex items-center">
                        <label
                            class="block text-lg font-bold text-gray-900 text-start dark:text-white">Proveedor</label>
                    </div>
                    <div class="col-span-2">
                        <x-input type="text" wire:model.live="buscar" placeholder="Buscar..." autofocus
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 pl-10 p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <div>
                        <x-label for="razonsocial" value="{{ __('Razón social') }}" />
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">Solicitante</p>
                    </div>
                    <div>
                        <x-label for="rfc" value="{{ __('RFC') }}" />
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">Matriz</p>
                    </div>
                    <div>
                        <x-label for="telefono" value="{{ __('Teléfono') }}" />
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">
                            97438498328498-38293898</p>
                    </div>
                </div>

                <div class="container py-6">
                    <div
                        class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-2 xl:grid-cols-10 gap-2 mb-1">
                        <div class="text-left">
                            <label class="block text-lg font-bold text-gray-900 dark:text-white">Justificación</label>
                        </div>
                        <div class="col-span-9">
                            <textarea name="justificacion" id="" rows="4"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-10  gap-6 mb-6">
                    <div class="col-span-3 flex items-center">
                        <label class="block text-lg font-bold text-gray-900 text-start dark:text-white">Condiciones de
                            entrega:</label>
                    </div>
                    <div class="flex items-center">
                        <label
                            class="block text-lg font-semibold text-gray-900 text-start dark:text-white">Lugar</label>
                    </div>
                    <div class="col-span-2">
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value="">Selecciona una Opción</option>
                        </select>
                    </div>
                    <div class="flex items-center">
                        <label
                            class="block text-lg font-semibold text-gray-900 text-start dark:text-white">Fecha</label>
                    </div>
                    <div class="col-span-2">
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled value="">Selecciona una Opción</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div
                        class="p-6 mt-4 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">

                        <div class="container px-4">
                            <div class="grid gap-3 mb-6 grid-cols-12">
                                <div>
                                    <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                                    <input wire:model.blur="cantidad" wire:change="CalculateAmount()" type="number"
                                        name="cantidad" step="0.01" placeholder="0.00"
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('cantidad')
                                        <span class="text-xs text-rose-600"></span>
                                    @enderror
                                </div>
                                <div class="col-span-5">
                                    <x-label for="concepto" value="{{ __('Concepto') }}" />
                                    <input wire:model.blur="concepto" type="text" name="concepto"
                                        placeholder="Concepto"
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('concepto')
                                        <span class="text-xs text-rose-600"></span>
                                    @enderror
                                </div>
                                <div >
                                    <x-label for="p_u" value="{{ __('P/U') }}" />
                                    <input wire:model.blur="p_u" wire:change="CalculateAmount()" type="number"
                                        step="0.001" placeholder="0.00" name="p_u"
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('p_u')
                                        <span class="text-xs text-rose-600"></span>
                                    @enderror
                                </div>
                                <div>
                                    <x-label for="importe" value="{{ __('Importe') }}" />
                                    <input wire:model.blur="importe" type="number" name="importe" step="0.01"
                                        placeholder="0.00" readonly
                                        class="w-full bg-gray-200 border border-gray-400 text-gray-900 text-sm font-bold rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="23">
                                    @error('importe')
                                        <span class="text-xs text-rose-600"></span>
                                    @enderror
                                </div>
                                <div class="col-span-4">
                                    <div >
                                        <x-label for="partida_presupuestal" value="{{ __('Partida presupuestal') }}" />
                                    </div>
    
                                    <div>
                                        <select wire:model.blur="partida_presupuestal" name="partida_presupuestal"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected disabled value="">Selecciona una Opción</option>
                                        </select>
                                        @error('partida_presupuestal')
                                            <span class="text-xs text-rose-600"></span>
                                        @enderror
                                </div>
                                </div>
                            </div>
                            <div >
                                <div class="text-center">
                                    <button type="submit" wire:loading.attr="disabled"
                                        class="disabled:opacity-25 focus:outline- text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition-all active:translate-y-1">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

        <div
            class="flex relative gap-x-7 items-center h-4 p-6 mt-4 bg-lime-500 border rounded-lg w-30 text dark:bg-gray-800 dark:border-gray-700">
            <div>
                <h1 class="text-white font-bold">Partida presupuestal</h1>
            </div>
            <div>
                <span class="text-sm text-white">09397589347598437597295</span>
            </div>
            <div class="ml-auto sm:col-span-2">
                <h1 class="text-white font-bold">DISPONIBLE</h1>
            </div>
        </div>

        <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center text-bla">
                        <th class="px-4 py-2 cursor-pointer whitespace-nowrap">
                            Cantidad
                        </th>
                        <th class="px-4 py-2 cursor-pointer">
                            Concepto
                        </th>
                        <th class="px-4 py-2 cursor-pointer">
                            P/U
                        </th>
                        <th class="px-4 py-2 cursor-pointer">
                            Importe
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                        <td class="px-4 py-2"> 1</td>
                        <td class="px-4 py-2"> 1 Coca </td>
                        <td class="px-4 py-2">
                            <div
                                class=" flex items-center mx-auto bg-white border w-1/2 border-gray-400 text-gray-900 text-sm rounded-lg p-2">
                                <span class="mx-auto">$00.00</span>
                            </div>
                        </td>
                        <td class="px-4 py-2">
                            <div
                                class=" flex items-center mx-auto bg-white border w-1/2 border-gray-400 text-gray-900 text-sm rounded-lg p-2">
                                <span class="mx-auto">$00.00</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="p-6 bg-white h-16 text dark:bg-gray-800 dark:border-gray-700">
            </div>

            <hr>

            <div class="grid grid-cols-12 gap-2 mb-1 bg-white p-6 ">

                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        Subtotal:</p>
                </div>
                <div class="col-span-2 px-3 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">$10
                    </p>
                </div>
                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">I.V.A:
                    </p>
                </div>
                <div class="col-span-2 px-3 border border-gray-400 rounded-lg text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">$6
                    </p>
                </div>
                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">Total:
                    </p>
                </div>
                <div class="col-span-2 px-3 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">$16
                    </p>
                </div>
            </div>
        </div>

        <div
            class="flex relative gap-x-7 items-center h-4 p-6 mt-4 bg-red-600 border rounded-lg w-30 text dark:bg-gray-800 dark:border-gray-700">
            <div>
                <h1 class="text-white font-bold">Partida presupuestal</h1>
            </div>
            <div>
                <span class="text-sm text-white">09397589347598437597295</span>
            </div>
            <div class="ml-auto sm:col-span-2">
                <h1 class="text-white font-bold">NO DISPONIBLE</h1>
            </div>
        </div>

        <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center text-black">
                        <th class="px-4 py-2 cursor-pointer whitespace-nowrap">
                            Cantidad
                        </th>
                        <th class="px-4 py-2 cursor-pointer">
                            Concepto
                        </th>
                        <th class="px-4 py-2 cursor-pointer">
                            P/U
                        </th>
                        <th class="px-4 py-2 cursor-pointer">
                            Importe
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                        <td class="px-4 py-2"> 1</td>
                        <td class="px-4 py-2">1 Coca</td>
                        <td class="px-4 py-2">
                            <div
                                class=" flex items-center mx-auto bg-white border w-1/2 border-gray-400 text-gray-900 text-sm rounded-lg p-2">
                                <span class="mx-auto">$00.00</span>
                            </div>
                        </td>
                        <td class="px-4 py-2">
                            <div
                                class=" flex items-center mx-auto bg-white border w-1/2 border-gray-400 text-gray-900 text-sm rounded-lg p-2">
                                <span class="mx-auto">$00.00</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="p-6 bg-white h-16 text dark:bg-gray-800 dark:border-gray-700">
            </div>

            <hr>

            <div class="grid grid-cols-12 gap-2 mb-1 bg-white p-6 ">

                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        Subtotal:</p>
                </div>
                <div class="col-span-2 px-3 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">$10
                    </p>
                </div>
                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">I.V.A:
                    </p>
                </div>
                <div class="col-span-2 px-3 border border-gray-400 rounded-lg text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">$6
                    </p>
                </div>
                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">Total:
                    </p>
                </div>
                <div class="col-span-2 px-3 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">$16
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-4 ">
            <div class="container">
                <div class="grid grid-cols-2 gap-10">
                    <div class="text-start">
                        <button type="button" wire:click="SaveAsDraft"
                            class="disabled:opacity-25 focus:outline- text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all active:translate-y-1">
                            GUARDAR BORRADOR
                        </button>
                    </div>
                    <div class="text-end">
                        <button type="submit" wire:loading.attr="disabled"
                            class="disabled:opacity-25 focus:outline- text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition-all active:translate-y-1">
                            FIRMAR Y SOLICITAR
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
