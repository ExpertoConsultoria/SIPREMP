<div>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-2xl font-bold leading-tight text-gray-800 font dark:text-gray-200">
                    {{ __('Vale de compra o servicio321 | ') }}{{$vale_details->folio}}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem">
                <a href="{{ route('vales.send-revised') }}">
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

    <div class="max-w-screen-xl py-8 mx-auto">

        <x-vale-status vale_id="{{$vale_details->id}}" />

        {{-- Datos --}}
        <div
            class="p-6 my-6 bg-white border-gray-200 rounded-lg shadow-lg shadow-zinc-300 dark:shadow-none dark:bg-zinc-800 dark:border-zinc-800">
            <div class="container px-4">
                <div class="grid grid-cols-6 gap-6">
                    <div>
                        <x-label for="fecha" value="{{ __('Fecha') }}" />
                        <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">{{$vale_details->fecha}}</p>
                    </div>
                    <div>
                        <x-label for="folio" value="{{ __('Folio') }}" />
                        <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">{{$vale_details->folio}}</p>
                    </div>
                    <div>
                        <x-label for="area" value="{{ __('Área') }}" />
                        <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                            {{$vale_details->solicitante->name}} -
                            {{$vale_details->solicitante?->org4empleado?->org3Puesto?->org2Area ? $vale_details->solicitante?->org4empleado?->org3Puesto?->org2Area->AreaNombre : $vale_details->solicitante->name}}
                        </p>
                    </div>
                    <div>
                        <x-label for="lugar" value="{{ __('Sede/Lugar') }}" />
                        <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">{{$vale_details->lugar}}</p>
                    </div>
                    <div>
                        <x-label for="mir" value="{{ __('MIR') }}" />
                        <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                            {{ $MIR }}
                        </p>
                    </div>
                    <div>
                        <button type="button" onclick="Livewire.dispatch('openModal', { component: 'shared.components.see-quote', arguments: { quote_id: {{ $vale_details->id_cotizacion }} } })"
                            class="disabled:opacity-25 focus:outline-none text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all active:translate-y-1">
                            <i class="fas fa-eye"></i>
                            COTIZACIÓN
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-6 gap-6 mt-6">
                    <div class="flex">
                        <label
                            class="block text-lg font-bold text-gray-900 text-start dark:text-white">Proveedor</label>
                    </div>

                    <div>
                        <x-label for="razonsocial" value="{{ __('Razón social') }}" />
                        <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">{{ $proveedor->RazonSocial }}</p>
                    </div>
                    <div>
                        <x-label for="rfc" value="{{ __('RFC') }}" />
                        <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">{{ $proveedor->RFC }}</p>
                    </div>
                    <div>
                        <x-label for="telefono" value="{{ __('Teléfono') }}" />
                        <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                            {{ $proveedor?->Telefono ? $proveedor->Telefono : 'Ninguno' }}</p>
                    </div>
                </div>

                <div class="container py-6">
                    <div class="grid grid-cols-2 gap-2 mb-1">
                        <div>
                            <div class="text-left">
                                <label class="block text-lg font-bold text-gray-900 dark:text-white">Justificación:</label>
                            </div>
                            <div class="col-span-12">
                                <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                    {{$vale_details->justificacion}}
                                </p>
                            </div>
                        </div>

                        @if ($vale_details->motivo_rechazo != null)
                            <div>
                                <div class="text-left">
                                    <label class="block text-lg font-bold text-gray-900 dark:text-white">Motivo de Rechazo:</label>
                                </div>
                                <div class="col-span-12">
                                    <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                        {{$vale_details->motivo_rechazo}}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-10 gap-6 mb-6">
                    <div class="flex items-center col-span-3">
                        <label class="block text-lg font-bold text-gray-900 text-start dark:text-white">Condiciones de
                            entrega:</label>
                    </div>
                    <div class="flex items-center">
                        <label
                            class="block text-lg font-semibold text-gray-900 text-start dark:text-white">Lugar:</label>
                    </div>
                    <div class="flex items-center col-span-2 text-center">
                        <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">{{$vale_details->lugar_entrega}} </p>
                    </div>
                    <div class="flex items-center">
                        <label
                            class="block text-lg font-semibold text-gray-900 text-start dark:text-white">Fecha:</label>
                    </div>
                    <div class="flex items-center col-span-2 text-center">
                        <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">{{$vale_details->fecha_entrega}}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Partidas presupuestales --}}
        @foreach ($partidas_data as $data)

            @if ($data->estado === 'DISPONIBLE')
                {{-- Partidas Disponibles --}}
                <div
                    class="flex relative gap-x-7 items-center h-4 p-6 mt-4 bg-lime-500  rounded-lg w-30">
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
            @elseif ($data->estado === 'NO DISPONIBLE')
                {{-- Partidas No Disponibles --}}
                <div
                    class="relative flex items-center h-4 p-6 mt-4 bg-red-600 border rounded-lg gap-x-7 w-30 text dark:bg-gray-800 dark:border-gray-700">
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
            @endif

            <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-zinc-700 dark:text-gray-400">
                        <tr class="text-center dark:text-gray-200">
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
                        @foreach ($data->elementos as $elemento)
                        <tr class="bg-white border-b dark:border-b-gray-400 dark:bg-zinc-800 dark:border-gray-700 text-center">
                            <td class="px-4 py-2"> {{ $elemento->cantidad }}</td>
                            <td class="px-4 py-2"> {{ $elemento->concepto }} </td>
                            <td class="px-4 py-2">
                                <div
                                    class="flex items-center mx-auto bg-white border w-1/2 border-gray-400 text-gray-900 text-sm rounded-lg p-2 dark:bg-zinc-800 dark:text-gray-400">
                                    <span class="mx-auto">${{ $elemento->precio_unitario }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-2">
                                <div
                                    class="flex items-center mx-auto bg-white border w-1/2 border-gray-400 text-gray-900 text-sm rounded-lg p-2 dark:bg-zinc-800 dark:text-gray-400">
                                    <span class="mx-auto">${{ $elemento->importe }}</span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-6 bg-white h-16 text dark:bg-zinc-800 dark:border-none">
                </div>

                <hr class="dark:border-gray-400">

                <div class="grid grid-cols-12 gap-2 mb-1 bg-white p-6 dark:bg-zinc-800">

                    <div class="col-span-10 text-end">
                        <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                            Subtotal:</p>
                    </div>
                    <div class="col-span-2 px-3 text-end">
                        <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">${{ $data->subtotal }}
                        </p>
                    </div>
                    <div class="col-span-10 text-end">
                        <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">I.V.A:
                        </p>
                    </div>
                    <div class="col-span-2 px-3 border border-gray-400 rounded-lg text-end">
                        <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">${{ $data->iva }}
                        </p>
                    </div>
                    <div class="col-span-10 text-end">
                        <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">Total:
                        </p>
                    </div>
                    <div class="col-span-2 px-3 text-end">
                        <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">${{ $data->total_compra
                            }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
