<div>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                    {{_('Detalles de Compra Consolidada')}} {{$compra->folio}}
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
                    {{-- 1ra PARTE --}}
                    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md w-30 text dark:text-gray-300 dark:bg-zinc-800 dark:border-zinc-800">

                        <div class="container px-4">
                            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-8 xl:grid-cols-10 gap-3 mb-6">
                                    <div class="col-span-2">
                                        <x-label for="razonsocial" value="{{ __('Fecha') }}" />
                                        <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                            {{ $compra->fecha }}
                                        </p>
                                    </div>
                                <div class="col-span-2 ">
                                    <x-label for="sku" value="{{ __('Folio SKU') }}" />
                                    <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                        {{ $compra->folio }}
                                    </p>
                                </div>
                                <div class="col-span-2">
                                    <x-label for="area" value="{{ __('Sucursal') }}" />
                                    <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                        {{ $compra->sucursal }}
                                    </p>
                                </div>
                                <div class="col-span-2">
                                    <x-label for="lugar" value="{{ __('Area') }}" />
                                    <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                        {{ $compra->area }}
                                    </p>
                                </div>
                                <div class="col-span-2">
                                    <x-label for="mir" value="{{_('MIR')}}"/>
                                    <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                        {{ $MIR }}
                                    </p>
                                </div>
                                <!-- <div class="py-4 col-span-2">
                                    <button type="button"
                                    class="px-5 py-2 text-xs w-full font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        ADJUNTAR COTIZACIONES
                                    </button>
                                </div> -->
                            </div>
                        </div>

                        <div class="container px-4 ">
                            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-2 xl:grid-cols-10 gap-2 mb-1" >
                                {{-- Centrarlo o no? --}}
                                <div class="flex mt-3">
                                    <h1 class="font-bold">Proveedor</h1>
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
                                    <div class="col-span-2">
                                        <x-label for="razonsocial" value="{{ __('Razón social') }}" />
                                        <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                            {{ $proveedor ->RazonSocial }}</p>
                                    </div>
                                    <div class="col-span-2">
                                        <x-label for="rfc" value="{{ __('RFC') }}" />
                                        <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-400">{{ $proveedor->RFC }}</p>
                                    </div>
                                    <div class="col-span-2">
                                        <x-label for="telefono" value="{{ __('Teléfono') }}" />
                                        <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-400">
                                            {{ $proveedor->telefono }}
                                        </p>
                                    </div>
                                    <div class="col-span-2">
                                        <h1 class="font-bold">Periodo</h1>
                                        <label class="text-sm">Primer trimestre</label>
                                    </div>
                                {{-- </div> --}}

                            </div>
                        </div>

                        <div class="text-left">
                            <label
                                class="block text-lg font-bold text-gray-900 dark:text-white">Justificación</label>
                        </div>
                        <div class="col-span-4">
                            <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                {{ $compra->asunto }}
                            </p>
                        </div>
                    </div>


                    {{-- 3ra PARTE Nota: Solucionar la vista en dispositivos moviles --}}
                    @foreach ($partidas_data as $data)

                        @if ($data->estado === 'DISPONIBLE')
                            {{-- Partidas Disponibles --}}
                            <div class="grid grid-cols-12 gap-2 mt-4">
                                <div
                                    class="relative flex items-center h-4 col-span-11 p-6 border rounded-lg gap-x-7 bg-lime-500 w-30 text dark:bg-gray-800 dark:border-gray-700">
                                    <div>
                                        <h1 class="font-bold text-white">Partida presupuestal</h1>
                                    </div>
                                    <div>
                                        <span class="text-sm text-white">{{ $data->nombre }}</span>
                                    </div>
                                    <div class="ml-auto sm:col-span-2">
                                        <h1 class="font-bold text-white">DISPONIBLE</h1>
                                    </div>
                                </div>
                            </div>
                        @elseif ($data->estado === 'NO DISPONIBLE')
                            {{-- Partidas No Disponibles --}}
                            <div class="grid grid-cols-12 gap-2 mt-4">
                                <div
                                    class="relative flex items-center h-4 col-span-11 p-6 bg-red-600 border rounded-lg gap-x-7 w-30 text dark:bg-gray-800 dark:border-gray-700">
                                    <div>
                                        <h1 class="font-bold text-white">Partida presupuestal</h1>
                                    </div>
                                    <div>
                                        <span class="text-sm text-white">{{ $data->nombre }}</span>
                                    </div>
                                    <div class="ml-auto sm:col-span-2">
                                        <h1 class="font-bold text-white">NO DISPONIBLE</h1>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
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
                                    @foreach ($data->elementos as $elemento)
                                        <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-4 py-2"> {{ $elemento->cantidad }}</td>
                                            <td class="px-4 py-2"> {{ $elemento->concepto }} </td>
                                            <td class="px-4 py-2">
                                                <div
                                                    class="flex items-center w-1/2 p-2 mx-auto text-sm text-gray-900 bg-white border border-gray-400 rounded-lg ">
                                                    <span class="mx-auto">${{ $elemento->precio_unitario }}</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2">
                                                <div
                                                    class="flex items-center w-1/2 p-2 mx-auto text-sm text-gray-900 bg-white border border-gray-400 rounded-lg ">
                                                    <span class="mx-auto">${{ $elemento->importe }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="h-16 p-6 bg-white text dark:bg-gray-800 dark:border-gray-700">
                            </div>

                            <hr>

                            <div class="grid grid-cols-12 gap-2 p-6 mb-1 bg-white ">
                                <div class="col-span-10 text-end">
                                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                                        Subtotal:</p>
                                </div>
                                <div class="col-span-2 px-3 text-end">
                                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                                        ${{ $data->subtotal }}
                                    </p>
                                </div>
                                <div class="col-span-10 text-end">
                                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">I.V.A:
                                    </p>
                                </div>
                                <div class="col-span-2 px-3 border border-gray-400 rounded-lg text-end">
                                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                                        ${{ $data->iva }}
                                    </p>
                                </div>
                                <div class="col-span-10 text-end">
                                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">Total:
                                    </p>
                                </div>
                                <div class="col-span-2 px-3 text-end">
                                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                                        ${{ $data->total_compra }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    {{-- 7ma parte --}}
                    <div class="p-6 mt-4 bg-white border border-gray-200 rounded-lg shadow-md w-30 text dark:bg-zinc-800 dark:border-zinc-700 dark:text-gray-300">
                        <div>
                            <h1 class="text-2xl font-bold">Anexo</h1>
                        </div>
                        <div class="mt-3 text-lg font-bold">
                            <span>Asunto</span>
                        </div>
                        <div class="col-span-4">
                            <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                {{ $compra->asunto }}
                            </p>
                        </div>
                        <div class="grid grid-cols-10">
                            <div class="col-span-5 mr-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Objeto</span>
                                </div>
                                <div class="col-span-4">
                                <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                    {{ $compra->objeto }}
                                </p>
                            </div>
                            </div>
                            <div class="col-span-5 ml-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Alcance</span>
                                </div>
                                <div class="col-span-4">
                                <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                    {{ $compra->alcance }}
                                </p>
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
                                @foreach($partidas_data as $data)
                                @foreach($data->elementos as $elemento)
                                <tr class="bg-white dark dark:bg-zinc-800 dark:border-gray-700 text-center">
                                    <td class="px-4 py-2">
                                        <p>{{$elemento->cantidad}}</p>
                                    </td>
                                    <td class="px-4 py-2">
                                        <p>pz</p>
                                    </td>
                                    <td class="px-4 py-2">
                                        <p>{{$elemento->concepto}}</p>
                                    </td>
                                    <td class="px-4 py-2">
                                        <p>prueba ####</p>
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>


                    </div>

                    {{-- Novena parte --}}
                    <div class="p-6 mt-4 bg-white border border-gray-200 rounded-lg shadow-md w-30 text dark:bg-zinc-800 dark:border-zinc-700 dark:text-gray-300">
                        <div class="mt-3 text-lg font-bold">
                            <span>Plazo y procedimiento de entrega</span>
                        </div>
                        <div class="col-span-4">
                        <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                            {{ $compra->procedimiento_entrega }}
                        </p>
                        </div>
                        <div class="grid grid-cols-10">
                            <div class="col-span-5 mr-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Entregables</span>
                                </div>
                                <div class="col-span-4">
                                    <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                        {{ $compra->entregables }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-span-5 ml-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Muestras</span>
                                </div>
                                <div class="col-span-4">
                                    <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                        {{ $compra->muestras }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-10">
                            <div class="col-span-5 mr-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Recursos humanos</span>
                                </div>
                                <div class="col-span-4">
                                    <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                        {{ $compra->recursos_humanos }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-span-5 ml-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Soporte técnico</span>
                                </div>
                                <div class="col-span-4">
                                    <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                        {{ $compra->soporte_tecnico }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-10">
                            <div class="col-span-5 mr-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Mantenimiento</span>
                                </div>
                                <div class="col-span-4">
                                    <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                        {{ $compra->mantenimiento }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-span-5 ml-2">
                                <div class="mt-3 text-lg font-bold">
                                    <span>Capacitación y/o actualización</span>
                                </div>
                                <div class="col-span-4">
                                    <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                        {{ $compra->capacitacion }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 text-lg font-bold">
                            <span>Vigencia de la contratación</span>
                        </div>
                        <div class="col-span-4">
                            <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                {{ $compra->vigencia }}
                            </p>
                        </div>
                        <div class="mt-3 text-lg font-bold">
                            <span>Forma de pago</span>
                        </div>
                        <div class="col-span-4">
                            <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                {{ $compra->forma_pago }}
                            </p>
                        </div>
                        <div class="mt-3 text-lg font-bold">
                            <span>Garantias</span>
                        </div>
                        <div class="col-span-4">
                            <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                {{ $compra->garantia }}
                            </p>
                        </div>

                        <!-- <div class="py-4">
                            <button type="button"
                            class="p-3 text-md w-full font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            ADJUNTAR ANEXOS ADICIONALES Y DOCUMENTACIÓN COMPLEMENTARIA, EN CASO DE QUE SE REQUIERA
                            </button>
                        </div> -->
                    </div>

                    {{-- Botonoes --}}
                    <!-- <div class="container mt-16 flex relative items-center w-full">
                        <div class="">
                            <button type="button" wire:click="saveDraft"
                                class="disabled:opacity-25 px-8 py-4 focus:outline- text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all active:translate-y-1">
                                Guardar Borrador
                            </button>
                        </div>

                        <div class="ml-auto sm:col-span-2">
                            <div class="text-center col-span-1 ml-auto">
                                <button type="button" wire:click="saveCompra"
                                    class="disabled:opacity-25 px-8 py-4 focus:outline- text-white bg-green-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all active:translate-y-1">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>
</div>
