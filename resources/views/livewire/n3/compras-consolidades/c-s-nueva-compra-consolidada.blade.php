<div>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                    {{_('Nuevo vale de compra o servicio | Solicitud #000')}}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem" >
                <a href="{{route('compraconsolidada')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 40 40" fill="none">
                        <path
                            d="M36.6666 18.3334H7.35664L16.1783 9.51172C16.3375 9.35798 16.4645 9.17407 16.5518 8.97073C16.6392 8.76739 16.6851 8.54869 16.6871 8.32739C16.689 8.10609 16.6468 7.88662 16.563 7.6818C16.4792 7.47697 16.3554 7.29088 16.199 7.1344C16.0425 6.97791 15.8564 6.85415 15.6516 6.77035C15.4467 6.68655 15.2273 6.64438 15.006 6.6463C14.7847 6.64823 14.566 6.6942 14.3626 6.78155C14.1593 6.8689 13.9754 6.99587 13.8216 7.15505L2.15497 18.8217C1.84252 19.1343 1.66699 19.5581 1.66699 20.0001C1.66699 20.442 1.84252 20.8658 2.15497 21.1784L13.8216 32.8451C14.136 33.1487 14.557 33.3166 14.994 33.3128C15.431 33.309 15.849 33.1338 16.158 32.8248C16.467 32.5157 16.6423 32.0977 16.6461 31.6607C16.6499 31.2237 16.4819 30.8027 16.1783 30.4884L7.35664 21.6667H36.6666C37.1087 21.6667 37.5326 21.4911 37.8451 21.1786C38.1577 20.866 38.3333 20.4421 38.3333 20.0001C38.3333 19.558 38.1577 19.1341 37.8451 18.8215C37.5326 18.509 37.1087 18.3334 36.6666 18.3334Z"
                            fill="#515151" />
                    </svg>
                </a>
            </div>

        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="container mx-auto">
                <form>
                    {{-- 1ra PARTE --}}
                    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md w-30 text dark:text-gray-300 dark:bg-zinc-800 dark:border-zinc-800">

                        <div class="container px-4">
                            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-8 xl:grid-cols-10 gap-3 mb-6">
                                <div class="col-span-1">
                                    <x-label for="fecha" value="{{_('Fecha')}}"/>
                                    {{-- <input wire:model.blur="fecha" type="date" name="fecha" readonly
                                    class="cursor-no-drop w-full bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required
                                    > --}}
                                    <label class="w-full text-sm ">00/00/0000</label>
                                </div>
                                <div class="col-span-1 " >
                                    <x-label for="folio" value="{{_('Folio')}}"/>
                                    {{-- <input wire:model.blur="fecha" type="date" name="fecha" readonly
                                    class="cursor-no-drop w-full bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required
                                    > --}}
                                    <label class="w-full text-sm ">SP-000001</label>
                                </div>
                                <div class="col-span-2 ">
                                    <x-label for="area" value="{{_('Área')}}"/>
                                    <input name="area" readonly
                                    class="cursor-no-drop w-full h-4 bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required
                                    >
                                </div>
                                <div class="col-span-2">
                                    <x-label for="lugar" value="{{_('Lugar')}}"/>
                                    <input name="lugar" readonly
                                    class="cursor-no-drop w-full h-4 bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required
                                    >
                                </div>
                                <div class="col-span-2">
                                    <x-label for="mir" value="{{_('MIR')}}"/>
                                    <input name="mir" readonly
                                    class="cursor-no-drop w-full h-4 bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required
                                    >
                                </div>
                                <div class="py-4 col-span-2">
                                    <button type="button"
                                    class="px-5 py-2 text-xs w-full font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        ADJUNTAR COTIZACIONES
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="container px-4 ">
                            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-2 xl:grid-cols-10 gap-2 mb-1" >
                                {{-- Centrarlo o no? --}}
                                <div class="flex mt-3">
                                    <h1 class="font-bold">Proveedor</h1>
                                </div>


                                <div class="col-span-9" >

                                    <div>
                                        <x-input type="text" wire:model.live="buscar" placeholder="Buscar usuario..." autofocus
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5
                                    dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                    </div>

                                    <div class="">
                                        <button class="uppercase text-sm text-blue-400">
                                            <p >Dar de alta nuevo proveedor</p>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="container px-4 py-6">
                            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-8 lg:grid-cols-10 xl:grid-cols-10 gap-4 mb-1">

                                <div class="flex col-span-2 gap-7">
                                    <div class="flex items-center ">
                                        <h1 class="font-bold">ID Contrato</h1>
                                    </div>

                                    <div class=" flex items-center bg-gray-100 border border-gray-400 text-sm rounded-lg p-2 dark:bg-zinc-700 dark:border-zinc-600 ">
                                        <span class="mx-auto">#00000000</span>
                                    </div>
                                </div>

                                {{-- <div class="flex items-center col-span-8 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-8  gap-28 "> --}}
                                    <div class="col-span-2 ml-0 sm:ml-1 md:ml-2 lg:ml-2 xl:ml-4">
                                        <h1 class="font-bold">Razon social</h1>
                                        <label class="text-sm">WALMART</label>
                                    </div>

                                    <div class="col-span-2">
                                        <h1 class="font-bold">RFC</h1>
                                        <label class="text-sm">HHHHHH09090900</label>
                                    </div>

                                    <div class="col-span-2">
                                        <h1 class="font-bold">Telefono</h1>
                                        <label class="text-sm">HHHHHH09090900</label>
                                    </div>

                                    <div class="col-span-2">
                                        <h1 class="font-bold">Periodo</h1>
                                        <label class="text-sm">Primer trimestre</label>
                                    </div>
                                {{-- </div> --}}

                            </div>
                        </div>

                        <div class="container px-4 py-6">
                            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-2 xl:grid-cols-10 gap-2 mb-1">
                                <div>
                                    <h1 class="font-bold">Justificación</h1>
                                </div>
                                <div class="col-span-9">
                                    <textarea name="justificacion" id="" rows="4"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                </div>
                            </div>
                        </div>


                    </div>

                    {{--2da PARTE --}}
                    <div class="p-6 mt-4 bg-white border border-gray-200 rounded-lg shadow-md w-30 text dark:bg-zinc-800 dark:border-zinc-700" >
                        <div class="container px-4">
                            <div
                                class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-6 xl:grid-cols-10 gap-3 mb-6">
                                <div class="col-span-1">
                                    <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                                    <input type=""name="cantidad" placeholder="int/txt/select"
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="col-span-4">
                                    <x-label for="concepto" value="{{ __('Concepto') }}" />
                                    <input type="text" name="concepto" placeholder="txt"
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="col-span-1">
                                    <x-label for="p_u" value="{{ __('P/U') }}" />
                                    <input type="text" name="p_u" placeholder=""
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="col-span-1">
                                    <x-label for="importe" value="{{ __('Importe') }}" />
                                    <input type="text" name="importe" placeholder="cant * p/u"
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="col-span-3">
                                    <x-label for="partida_presupuestal" value="{{ __('Partida presupuestal') }}" />
                                    <input type="text" name="partida_presupuestal" placeholder="txt/select (CATALOGO BASE DE DATOS)"
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>
                        </div>

                        <div class="container px-4">
                            <div class="text-center">
                                <button type="button"
                                    class="disabled:opacity-25 text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition-all active:translate-y-1">
                                    REGISTRAR
                                </button>
                            </div>
                        </div>

                    </div>

                    {{-- 3ra PARTE Nota: Solucionar la vista en dispositivos moviles --}}
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

                    {{-- <div class="text-center mt-4 bg-lime-500 grid border py-2 px-6 rounded-lg grid-cols-3 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12  mb-6 sm:text-center">
                        <div class="col-span-3 text-start">
                            <h1 class="text-white font-bold">Partida presupuestal</h1>
                        </div>
                        <div class="col-span-6 text-start">
                            <span class="text-sm text-white ">09397589347598437597295</span>
                        </div>
                        <div class="col-span-3">
                            <h1 class="text-white font-bold text-start sm:text-end md:text-end lg:text-end  xl:text-end">DISPONIBLE</h1>
                        </div>
                    </div> --}}

                    {{-- 4ta parte --}}
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
                                <tr class="bg-white border-b dark:border-b-gray-400 dark:bg-zinc-800 dark:border-gray-700 text-center">
                                    <td class="px-4 py-2"> 1</td>
                                    <td class="px-4 py-2"> 2 gallos, 1 Tsuru </td>
                                    <td class="px-4 py-2">
                                        <div class=" flexitems-center mx-auto bg-white border w-1/2 border-gray-400 text-gray-900 text-sm rounded-lg p-2 dark:bg-zinc-800 dark:text-gray-400">
                                            <span class="mx-auto">$00.00</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class=" flex items-center mx-auto bg-white border w-1/2 border-gray-400 text-gray-900 text-sm rounded-lg p-2 dark:bg-zinc-800 dark:text-gray-400">
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

                    {{-- 5ta parte  --}}
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

                    {{-- 6ta parte --}}
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
                                <tr class="bg-white border-b dark:border-b-gray-400 dark:bg-zinc-800 dark:border-gray-700 text-center">
                                    <td class="px-4 py-2"> 1</td>
                                    <td class="px-4 py-2"> 2 gallos, 1 Tsuru </td>
                                    <td class="px-4 py-2">
                                        <div class=" flexitems-center mx-auto bg-white border w-1/2 border-gray-400 text-gray-900 text-sm rounded-lg p-2 dark:bg-zinc-800 dark:text-gray-400">
                                            <span class="mx-auto">$00.00</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class=" flex items-center mx-auto bg-white border w-1/2 border-gray-400 text-gray-900 text-sm rounded-lg p-2 dark:bg-zinc-800 dark:text-gray-400">
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

                    {{-- 7ma parte --}}
                    <div class="p-6 mt-4 bg-white border border-gray-200 rounded-lg shadow-md w-30 text dark:bg-zinc-800 dark:border-zinc-700 dark:text-gray-300">
                        <div>
                            <h1 class="text-2xl font-bold">Anexo</h1>
                        </div>
                        <div class="mt-3 text-lg font-bold">
                            <span>Asunto</span>
                        </div>
                        <div class="mt-1">
                            <textarea name="justificacion" id="" rows="2" placeholder="ESPECIFICACIONES TÉCNICAS DE LA IMPRESIÓN DE BOLETAS DE EMPEÑO PARA LA MATRIZ Y SUCURSALES DEL MONTE DE PIEDAD DEL ESTADO DE OAXACA"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </textarea>
                        </div>
                        <div class="grid grid-cols-10">
                            <div class="col-span-5 mr-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Objeto</span>
                                </div>
                                <div class="mt-1">
                                    <textarea name="justificacion" id="" rows="3" placeholder="Adquisición de boletas de empeño para surtir a todas las sucursales del Monte de Piedad del Estado de Oaxaca; con el propósito de que las sucursales cuenten con los insumos necesarios para las actividades diarias en cuanto al proceso de préstamo prendario que ofrece la Institución a los pignorantes."
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-span-5 ml-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Alcance</span>
                                </div>
                                <div class="mt-1">
                                    <textarea name="justificacion" id="" rows="3" placeholder="Gerencia Matriz y 22 Sucursales del Monte de Piedad del Estado de Oaxaca."
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 8va parte --}}
                    <div class="p-6 mt-4 bg-white border border-gray-200 rounded-lg shadow-md w-30 text dark:bg-zinc-800 dark:border-zinc-700 dark:text-gray-300">
                        <div class="mb-6">
                            <h1 class="text-xl font-bold">Descripción de los bienes</h1>
                        </div>
                        {{-- Borrar la linea inferior de la etiqueta table --}}
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-zinc-700 dark:text-gray-400">
                                <tr class="text-center dark:text-gray-200">
                                    <th class="px-4 py-2 cursor-pointer whitespace-nowrap">
                                        Cantidad
                                    </th>
                                    <th class="px-4 py-2 cursor-pointer">
                                        Unidad de media
                                    </th>
                                    <th class="px-4 py-2 cursor-pointer">
                                        Descripción
                                    </th>
                                    <th class="px-4 py-2 cursor-pointer">
                                        Atributos
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white dark dark:bg-zinc-800 dark:border-gray-700 text-center">
                                    <td class="px-4 py-2">
                                        <p>1</p>
                                    </td>
                                    <td class="px-4 py-2">
                                        <p>2 gallos, 1 Tsuru</p>
                                    </td>
                                    <td class="px-4 py-2">
                                        <p>dasd</p>
                                    </td>
                                    <td class="px-4 py-2">
                                        <p>dadsasd</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                    </div>

                    {{-- Novena parte --}}
                    <div class="p-6 mt-4 bg-white border border-gray-200 rounded-lg shadow-md w-30 text dark:bg-zinc-800 dark:border-zinc-700 dark:text-gray-300">
                        <div class="mt-3 text-lg font-bold">
                            <span>Plazo y procedimiento de entrega</span>
                        </div>
                        <div class="mt-1">
                            <textarea name="justificacion" id="" rows="3" placeholder="Los bienes descritos en el Punto 3, se entregarán a partir del dieciséis de febrero del año dos mil veintitrés y “El Proveedor” tendrá como plazo 90 días posteriores a la realización del pedido, y se entregarán en el Departamento de Servicios Generales del Monte de Piedad del Estado de Oaxaca, ubicado en Avenida Morelos núm. 703 esquina Macedonio Alcalá, Colonia Centro, Oaxaca de Juárez, Oaxaca. C.P. 68000. La recepción y verificación de los bienes estará a cargo del personal que oportunamente designe la Dirección de Administración dependiente de “El Organismo” dependiendo de la requisición que se haya remitido en su oportunidad."
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </textarea>
                        </div>
                        <div class="grid grid-cols-10">
                            <div class="col-span-5 mr-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Entregables</span>
                                </div>
                                <div class="mt-1">
                                    <textarea name="justificacion" id="" rows="4" placeholder="No aplica"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-span-5 ml-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Muestras</span>
                                </div>
                                <div class="mt-1">
                                    <textarea name="justificacion" id="" rows="4" placeholder="No aplica"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-10">
                            <div class="col-span-5 mr-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Recursos humanos</span>
                                </div>
                                <div class="mt-1">
                                    <textarea name="justificacion" id="" rows="4" placeholder="No aplica"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-span-5 ml-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Soporte técnico</span>
                                </div>
                                <div class="mt-1">
                                    <textarea name="justificacion" id="" rows="4" placeholder="No aplica"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-10">
                            <div class="col-span-5 mr-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Mantenimiento</span>
                                </div>
                                <div class="mt-1">
                                    <textarea name="justificacion" id="" rows="4" placeholder="No aplica"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-span-5 ml-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Capacitación y/o actualización</span>
                                </div>
                                <div class="mt-1">
                                    <textarea name="justificacion" id="" rows="4" placeholder="No aplica"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 text-lg font-bold">
                            <span>Vigencia de la contratación</span>
                        </div>
                        <div class="mt-1">
                            <textarea name="justificacion" id="" rows="1" placeholder="Del 16 de febrero de 2023 al 31 de diciembre de 2023."
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </textarea>
                        </div>
                        <div class="mt-3 text-lg font-bold">
                            <span>Forma de pago</span>
                        </div>
                        <div class="mt-1">
                            <textarea name="justificacion" id="" rows="3" placeholder="Los pagos se realizarán de acuerdo a lo siguiente: El importe será fijo durante la vigencia de la contratación, no se otorgará anticipo alguno, el pago se efectuará por cada requisición solicitada por el Departamento de Servicios Generales, y posterior a la presentación del comprobante fiscal correspondiente, mismo que deberá reunir los requisitos fiscales. Los pagos se realizarán, por parte de la Dirección Administrativa del Monte de Piedad del Estado de Oaxaca, dentro de los veinte días naturales posteriores a la presentación del comprobante fiscal correspondiente, pago que será efectuado mediante transferencia bancaria previo a que el proveedor que resulte adjudicado proporcione los datos bancarios correspondientes."
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </textarea>
                        </div>
                        <div class="mt-3 text-lg font-bold">
                            <span>Garantias</span>
                        </div>
                        <div class="mt-1">
                            <textarea name="justificacion" id="" rows="3" placeholder="Para garantizar el anticipo, “el proveedor” al momento de recibir el anticipo deberá otorgar fianza por el monto total del anticipo, es decir, por el 30% del monto total de los bienes adquiridos, a más tardar quince días posteriores al otorgamiento del mismo. La garantía de cumplimiento se constituirá al 10% del monto total adjudicado considerando el impuesto al valor agregado (I.V.A.), la cual podrá presentarse a través de fianza, billete de depósito o cheque certificado y constituirse a favor del Monte de Piedad del Estado de Oaxaca, con fundamento en el numeral 104 fracción I de los Lineamientos en Materia de Adquisiciones, Enajenaciones, Arrendamientos, Prestación de Servicios y Administración de Bienes Muebles e Inmuebles del Monte de Piedad del Estado de Oaxaca, la cual deberá presentarse a más tardar dentro de los diez días naturales contados a partir de la formalización del contrato."
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </textarea>
                        </div>

                        <div class="py-4">
                            <button type="button"
                            class="p-3 text-md w-full font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            ADJUNTAR ANEXOS ADICIONALES Y DOCUMENTACIÓN COMPLEMENTARIA, EN CASO DE QUE SE REQUIERA
                            </button>
                        </div>
                    </div>

                    {{-- Botonoes --}}
                            <div class="container mt-16 flex relative items-center w-full">
                                <div class="">
                                    <button type="button"
                                        class="disabled:opacity-25 px-8 py-4 focus:outline- text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all active:translate-y-1">
                                        Guardar Borrador
                                    </button>
                                </div>

                                <div class="ml-auto sm:col-span-2">
                                    <div class="text-center col-span-1 ml-auto">
                                        <button type="button"
                                            class="disabled:opacity-25 px-8 py-4 focus:outline- text-white bg-green-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all active:translate-y-1">
                                            Guardar
                                        </button>
                                    </div>
                                </div>

                            </div>


                </form>

            </div>
        </div>
    </div>
</div>
