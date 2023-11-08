<div>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-2xl font-bold leading-tight text-gray-800 font dark:text-gray-200">
                    {{ __('Estatus | Solicitud | #') }} {{ $details_of_folio }}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem">
                <a href="{{ route('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 40 40" fill="">
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
            {{-- status --}}
            <div
                class="p-6 my-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="container mx-auto px-4">
                    <div class="mb-3">
                        <label
                            class="block mb-2 text-lg font-bold text-center text-gray-900 dark:text-white">ESTATUS</label>
                    </div>
                    <div class="relative h-8 mb-4">
                        {{-- Línea base de la barra de progreso  --}}
                        <div
                            class="h-1 w-[82%] sm:w-[85%] md:w-[89%] lg:w-[92%] xl:w-[93%] bg-gray-300 absolute top-3 left-0 right-0 mx-4">
                        </div>

                        {{-- Círculos y etiquetas --}}
                        <div class="flex justify-between items-center">
                            <div class="relative flex flex-col items-center">
                                <div
                                    class="@if($memorandum_details -> memo_creation_status === 'Enviado') w-6 h-6 bg-green-400 rounded-full @elseif($memorandum_details -> memo_creation_status === 'Borrador') w-6 h-6 bg-red-400 rounded-full @endif ">
                                </div>
                                <p class="text-xs mt-1">Enviado</p>
                            </div>

                            <div class="relative flex flex-col items-center">
                                <div class="@if($memorandum_details -> token_aceptacion) w-6 h-6 bg-green-400 rounded-full @elseif($memorandum_details -> token_aceptacion === null) w-6 h-6 bg-red-400 rounded-full @endif"></div>
                                <p class="text-xs mt-1">Filtrado</p>
                            </div>

                            <div class="relative flex flex-col items-center">
                                <div class="@if($memorandum_details -> token_aceptacion === null) w-6 h-6 bg-red-400 rounded-full @else w-6 h-6 bg-green-400 rounded-full @endif"></div>
                                <p class="text-xs mt-1">Servicios Generales</p>
                            </div>

                            <div class="relative flex flex-col items-center">
                                <div class="@if($memorandum_details -> token_aceptacion === null) w-6 h-6 bg-red-400 rounded-full @else w-6 h-6 bg-green-400 rounded-full @endif"></div>
                                <p class="text-xs mt-1">Unidad Técnica</p>
                            </div>

                            <div class="relative flex flex-col items-center">
                                <div class="@if($memorandum_details -> token_aceptacion === null) w-6 h-6 bg-red-400 rounded-full @else w-6 h-6 bg-green-400 rounded-full @endif"></div>
                                <p class="text-xs mt-1">Control Presupuestal</p>
                            </div>

                            <div class="relative flex flex-col items-center">
                                <div class="@if($memorandum_details -> token_aceptacion === null) w-6 h-6 bg-red-400 rounded-full @else w-6 h-6 bg-green-400 rounded-full @endif"></div>
                                <p class="text-xs mt-1">Dirección Administrativa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- {{$memoList }} -->

            {{-- Datos --}}
            <div
                class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-md w-30 text dark:bg-gray-800 dark:border-gray-700">
                <div class="container px-4">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-6 xl:grid-cols-6 gap-6">
                        <div>
                            <x-label for="fecha" value="{{ __('Fecha') }}" />
                            <p class="font-extralight text-xs text-gray-500 font-sans dark:text-gray-200">
                                {{$memorandum_details -> memo_fecha}}</p>
                        </div>
                        <div>
                            <x-label for="folio" value="{{ __('Folio') }}" />
                            <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">
                                {{$memorandum_details -> memo_folio}}</p>
                        </div>
                        <div>
                            <x-label for="solicitante" value="{{ __('Solicitante') }}" />
                            <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">
                                {{$memorandum_details -> solicitante -> name}}</p>
                        </div>
                        <div>
                            <x-label for="lugar" value="{{ __('Lugar') }}" />
                            <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">
                                {{$memorandum_details -> memo_sucursal}}</p>
                        </div>
                        <div>
                            <x-label for="destinatario" value="{{ __('Destinatario') }}" />
                            <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">
                                {{$memorandum_details -> destinatario}}</p>
                        </div>
                        <div>
                            <x-label for="mir" value="{{ __('MIR') }}" />
                            <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">00001010</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <x-label for="a sunto" value="{{ __('Asunto') }}" />
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">
                            {{$memorandum_details -> memo_asunto}}</p>
                    </div>
                </div>
            </div>

            {{-- Table --}}
            <div
                class="pb-12 mt-4 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-800 uppercase  bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Cantidad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Unidad de medida
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
                            @foreach($memoList as $item)
                            <tr>
                                <th class="px-6 py-3">
                                    {{$item -> im_cantidad}}
                                </th>
                                <th class="px-6 py-3">
                                    {{$item -> im_unidad_medida}}
                                </th>
                                <th class="px-6 py-3">
                                    {{$item -> im_concepto}}
                                </th>
                                <th class="px-6 py-3">
                                    {{$item -> im_partida_presupuestal}}
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="mt-4 ">
                <div class="container">
                    <div class="grid grid-cols-2 gap-10">
                        <div class="text-start">
                            <a href="{{ route('pdf.Cotizacion') }}" target="_blank" class="disabled:opacity-25 focus:outline-none text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Cotización
                            </a>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('pdf.Memorandum', ['details_of_folio' => $memorandum_details->memo_folio]) }}"  target="_blank" class="disabled:opacity-25 focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Imprimir
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
