<div>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-2xl font-bold leading-tight text-gray-800 font dark:text-gray-200">
                    {{ __('Vale de bien o servicio | Solicitud # 0001') }}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem">
                <a href="{{route('bandejaentrada.unidadcontrol')}}">
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
            class="p-6 my-6 bg-white border border-gray-200 rounded-lg shadow-md shadow-zinc-300 dark:shadow-none dark:bg-zinc-800 dark:border-zinc-800">
            <div class="container mx-auto px-4 w-2/3">
                <div class="mb-3">
                    <label
                        class="block mb-2 text-lg font-bold text-center text-gray-900 dark:text-gray-200">ESTATUS</label>
                </div>
                <div class="relative h-8 mb-4">
                    {{-- Línea base de la barra de progreso  --}}
                    <div
                        class="h-0.5 w-[86%] sm:w-[86%] md:w-[86%] lg:w-[92%] xl:w-[86%] bg-gray-300 absolute top-3 left-0 right-0 mx-12">
                    </div>

                    {{-- Círculos y etiquetas --}}
                    <div class="flex justify-between items-center dark:text-gray-200">
                        <div class="relative flex flex-col items-center">
                            <div class="w-6 h-6 bg-green-400 rounded-full"></div>
                            <p class="text-xs mt-1">Servicios Generales </p>
                        </div>

                        <div class="relative flex flex-col items-center">
                            <div class="w-6 h-6 bg-gray-400 rounded-full"></div>
                            <p class="text-xs mt-1">Unidad técnica</p>
                        </div>

                        <div class="relative flex flex-col items-center">
                            <div class="w-6 h-6 bg-gray-700 rounded-full"></div>
                            <p class="text-xs mt-1">Control Presupuestal</p>
                        </div>

                        <div class="relative flex flex-col items-center">
                            <div class="w-6 h-6 bg-gray-700 rounded-full "></div>
                            <p class="text-xs mt-1">Dirección Administrativa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="p-8 my-6 bg-white border border-gray-200 rounded-lg shadow-md dark:shadow-none dark:bg-zinc-800 dark:border-zinc-800">

            <div class="px-4 grid grid-cols-12 gap-3 items-center justify-center dark:text-gray-200">
                <div class="col-span-1">
                    <h1 class="font-bold">Fecha</h1>
                    <span class="w-full text-sm ">00/00/0000</span>
                </div>
                <div class="col-span-1">
                    <h1 class="font-bold">Folio</h1>
                    <span class="w-full text-sm ">SP-000001</span>
                </div>
                <div class="col-span-1">
                    <h1 class="font-bold">Área</h1>
                    <span class="w-full text-sm ">User + area</span>
                </div>
                <div class="col-span-3 text-center">
                    <h1 class="font-bold">Lugar</h1>
                    <span class="w-full text-sm ">Matriz</span>
                </div>
                <div class="col-span-3">
                    <h1 class="font-bold">MIR</h1>
                    <span class="w-full text-sm ">97438498328498-38293898</span>
                </div>
                <div class="col-span-3 text-end">
                    {{-- Agregarle el pinche texto --}}
                    <div>
                        <x-button-icons icon="eye" />
                    </div>
                </div>
            </div>

            <div class="container px-4 py-8 grid grid-cols-8 gap-3 items-center justify-center dark:text-gray-200">
                <div>
                    <h1 class="font-bold">Proveedor</h1>
                    <span class="w-full text-sm ">--------</span>
                </div>
                <div>
                    <h1 class="font-bold">Razón social</h1>
                    <span class="w-full text-sm ">WALMART</span>
                </div>
                <div>
                    <h1 class="font-bold">RFC</h1>
                    <span class="w-full text-sm ">HHHHH09090900</span>
                </div>
                <div>
                    <h1 class="font-bold">Teléfono</h1>
                    <span class="w-full text-sm ">HHHHH09090900</span>
                </div>
            </div>

            <div class="container px-4 py-8 grid grid-cols-8 gap-3 items-center justify-center dark:text-gray-200">
                <div class="col-span-2">
                    <h1 class="font-bold">Justificación:</h1>
                    <label class="w-full text-sm "></label>
                </div>

            </div>

            <div class="container px-4 py-6 dark:text-gray-200">
                <div class="grid grid-cols-8 gap-3 items-center justify-center">
                    <div class="col-span-2">
                        <h1 class="font-bold">Condiciones de entrega:</h1>
                        <label class="w-full text-sm "></label>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="font-bold">
                            <h1>Lugar:</h1>
                        </div>
                        <div>
                            <span>Matriz</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="font-bold">
                            <h1>Fecha:</h1>
                        </div>
                        <div>
                            <span>13/09/2023</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- Notificacion verde --}}
        <div class="flex relative gap-x-7 items-center h-4 p-6 mt-4 bg-lime-500 rounded-lg w-30 dark:text-gray-200">
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
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-zinc-700 dark:text-gray-400">
                    <tr class="text-center dark:text-gray-200 ">
                        <th class="px-4 py-2 whitespace-nowrap">
                            Cantidad
                        </th>
                        <th class="px-4 py-2">
                            Concepto
                        </th>
                        <th class="px-4 py-2">
                            P/U
                        </th>
                        <th class="px-4 py-2">
                            Importe
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b dark:border-b-gray-400 dark:bg-zinc-800 dark:border-gray-700 text-center">
                        <td class="px-4 py-2"> 1</td>
                        <td class="px-4 py-2"> 2 gallos, 1 Tsuru </td>
                        <td class="px-4 py-2">
                            <div
                                class=" flexitems-center mx-auto bg-white border w-1/2 border-gray-400 text-gray-900 text-sm rounded-lg p-2 dark:bg-zinc-800 dark:text-gray-400">
                                <span class="mx-auto">$00.00</span>
                            </div>
                        </td>
                        <td class="px-4 py-2">
                            <div
                                class=" flex items-center mx-auto bg-white border w-1/2 border-gray-400 text-gray-900 text-sm rounded-lg p-2 dark:bg-zinc-800 dark:text-gray-400">
                                <span class="mx-auto">$00.00</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="p-6 bg-white h-16 text dark:bg-zinc-800 dark:border-none">
            </div>

            <hr class="dark:border-gray-400">

            <div class="grid grid-cols-12 gap-2 mb-1 bg-white p-6 dark:bg-zinc-800 ">
                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        Subtotal:
                    </p>
                </div>
                <div class="col-span-2 px-3 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        $00.000
                    </p>
                </div>
                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        I.V.A:
                    </p>
                </div>
                <div class="col-span-2 px-3 text-end border rounded-lg w-2/3 ml-auto  ">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        $00.00
                    </p>
                </div>
                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        Total:
                    </p>
                </div>
                <div class="col-span-2 px-3 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        $00.00
                    </p>
                </div>
            </div>
        </div>

        {{-- Notificacion roja --}}
        <div class="flex relative gap-x-7 items-center h-4 p-6 mt-4 bg-red-600 rounded-lg w-30 dark:text-gray-400 ">
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
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-zinc-700 dark:text-gray-400">
                    <tr class="text-center dark:text-gray-200 ">
                        <th class="px-4 py-2 whitespace-nowrap">
                            Cantidad
                        </th>
                        <th class="px-4 py-2">
                            Concepto
                        </th>
                        <th class="px-4 py-2">
                            P/U
                        </th>
                        <th class="px-4 py-2">
                            Importe
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b dark:border-b-gray-400 dark:bg-zinc-800 dark:border-gray-700 text-center">
                        <td class="px-4 py-2"> 1</td>
                        <td class="px-4 py-2"> 2 gallos, 1 Tsuru </td>
                        <td class="px-4 py-2">
                            <div
                                class=" flexitems-center mx-auto bg-white border w-1/2 border-gray-400 text-gray-900 text-sm rounded-lg p-2 dark:bg-zinc-800 dark:text-gray-400">
                                <span class="mx-auto">$00.00</span>
                            </div>
                        </td>
                        <td class="px-4 py-2">
                            <div
                                class=" flex items-center mx-auto bg-white border w-1/2 border-gray-400 text-gray-900 text-sm rounded-lg p-2 dark:bg-zinc-800 dark:text-gray-400">
                                <span class="mx-auto">$00.00</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="p-6 bg-white h-16 text dark:bg-zinc-800 dark:border-none">
            </div>

            <hr class="dark:border-gray-400">

            <div class="grid grid-cols-12 gap-2 mb-1 bg-white p-6 dark:bg-zinc-800 ">
                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        Subtotal:
                    </p>
                </div>
                <div class="col-span-2 px-3 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        $00.000
                    </p>
                </div>
                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        I.V.A:
                    </p>
                </div>
                <div class="col-span-2 px-3 text-end border rounded-lg w-2/3 ml-auto  ">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        $00.00
                    </p>
                </div>
                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        Total:
                    </p>
                </div>
                <div class="col-span-2 px-3 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        $00.00
                    </p>
                </div>
            </div>
        </div>

        {{-- Botones --}}
        <div class="container mt-12 flex relative items-center w-full ">
            <div class="">
                <button type="button"
                    class="disabled:opacity-25 px-8 py-2 focus:outline- text-white bg-red-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm transition-all active:translate-y-1">
                    RECHAZAR
                </button>
            </div>

            <div class="ml-auto sm:col-span-2">
                <div class="text-center col-span-1 ml-auto">
                    <button type="button"
                        class="disabled:opacity-25 px-8 py-2 focus:outline- text-white bg-green-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm transition-all active:translate-y-1">
                        DISPONIBILIDAD PRESUPUESTAL
                    </button>
                </div>
            </div>
        </div>

    </div>
