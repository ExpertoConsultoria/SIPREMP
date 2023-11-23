<div>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-2xl font-bold leading-tight text-gray-800 font dark:text-gray-200">
                    @if(!$edit_to_folio) {{ __('Nuevo Vale de Compra o Servicio') }} @else
                    {{ __('Editar Vale de Compra o Servicio | ') }}{{ $folio }} @endif
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem">
                <a href="
                    @if(!$edit_to_folio)
                        {{ route('vales') }}
                    @else
                        @if ($vale_to_edit->creation_status === 'Borrador')
                            {{ route('vales.borradores') }}
                        @else
                            {{ route('vales.send-revised') }}
                        @endif
                    @endif
                ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 40 40" fill="">
                        <path
                            d="M36.6666 18.3334H7.35664L16.1783 9.51172C16.3375 9.35798 16.4645 9.17407 16.5518 8.97073C16.6392 8.76739 16.6851 8.54869 16.6871 8.32739C16.689 8.10609 16.6468 7.88662 16.563 7.6818C16.4792 7.47697 16.3554 7.29088 16.199 7.1344C16.0425 6.97791 15.8564 6.85415 15.6516 6.77035C15.4467 6.68655 15.2273 6.64438 15.006 6.6463C14.7847 6.64823 14.566 6.6942 14.3626 6.78155C14.1593 6.8689 13.9754 6.99587 13.8216 7.15505L2.15497 18.8217C1.84252 19.1343 1.66699 19.5581 1.66699 20.0001C1.66699 20.442 1.84252 20.8658 2.15497 21.1784L13.8216 32.8451C14.136 33.1487 14.557 33.3166 14.994 33.3128C15.431 33.309 15.849 33.1338 16.158 32.8248C16.467 32.5157 16.6423 32.0977 16.6461 31.6607C16.6499 31.2237 16.4819 30.8027 16.1783 30.4884L7.35664 21.6667H36.6666C37.1087 21.6667 37.5326 21.4911 37.8451 21.1786C38.1577 20.866 38.3333 20.4421 38.3333 20.0001C38.3333 19.558 38.1577 19.1341 37.8451 18.8215C37.5326 18.509 37.1087 18.3334 36.6666 18.3334Z"
                            fill="#515151" />
                    </svg>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-screen-xl py-8 mx-auto">
        <form wire:submit.prevent="Save" autocomplete="off">

            {{-- Basic Data --}}
            <div
                class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-md w-30 text dark:bg-gray-800 dark:border-gray-700">
                <div class="container px-4">

                    {{-- Default --}}
                    <div class="grid grid-cols-6 gap-6">
                        <div></div>
                        <div>
                            <x-label for="fecha" value="{{ __('Fecha') }}" />
                            <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">{{ $fecha }}
                            </p>
                        </div>
                        <div>
                            <x-label for="folio" value="{{ __('Folio') }}" />
                            <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">{{ $folio }}
                            </p>
                        </div>
                        <div>
                            <x-label for="solicitante" value="{{ __('Solicitante') }}" />
                            <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                @if(!$edit_to_folio)
                                {{ Auth::user()->name }}
                                @else
                                {{ $solicitante }}
                                @endif
                            </p>
                        </div>
                        <div>
                            <x-label for="lugar" value="{{ __('Sede/Lugar') }}" />
                            <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">{{ $lugar }}
                            </p>
                        </div>
                        <div>
                            <button type="button"
                                class="disabled:opacity-25 focus:outline-none text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all active:translate-y-1">
                                ADJUNTAR COTIZACIÓN
                            </button>
                        </div>
                    </div>

                    {{-- Proveedor --}}
                    <div class="grid grid-cols-12 gap-6 mt-6">
                        <button type="button" data-modal-target="new_proveedor_modal"
                            data-modal-toggle="new_proveedor_modal"
                            class=" relative items-center col-span-2 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                            Agregar provedor
                            <i class="fas fa-plus"></i>
                        </button>
                        <div class="flex items-center col-span-2">
                            <label
                                class="block text-lg font-bold text-gray-900 text-start dark:text-white">Proveedor</label>
                        </div>
                        <div class="col-span-4">
                            <x-input type="text" wire:keyup='searchProveedor' wire:model.lazy="buscar"
                                placeholder="Buscar..." autofocus
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/6 pl-10 p-2.5
                                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                            @if($showResults)
                            <ul>
                                @if(!empty($resultados))
                                @foreach($resultados as $resultado)
                                <li wire:click='getProvedor({{ $resultado->id }})'>{{ $resultado->RazonSocial }}</li>
                                @endforeach
                                @endif
                            </ul>
                            @endif

                            <x-input type="hidden" wire:model.live="id_proveedor" name='id_proveedor' />
                            @error('id_proveedor')
                            <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <x-label for="razonsocial" value="{{ __('Razón social') }}" />
                            <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                {{ $razon_social }}</p>
                        </div>
                        <div class="col-span-2">
                            <x-label for="rfc" value="{{ __('RFC') }}" />
                            <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">{{ $RFC }}</p>
                        </div>
                        <div class="col-span-2">
                            <x-label for="telefono" value="{{ __('Teléfono') }}" />
                            <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                {{ $telefono }}
                            </p>
                        </div>
                    </div>

                    {{-- Justificacion y MIR --}}
                    <div class="container py-6">
                        <div
                            class="grid grid-cols-2 gap-2 mb-1 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-2 xl:grid-cols-10">
                            <div class="text-left">
                                <label
                                    class="block text-lg font-bold text-gray-900 dark:text-white">Justificación</label>
                            </div>

                            <div class="col-span-4">
                                <textarea name="justificacion" rows="4"
                                    placeholder="Justifique el motivo de la solicitud" wire:model.blur="justificacion"
                                    class="w-11/12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                @error('justificacion')
                                <span class="text-xs text-rose-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-auto mx-2 mt-6 h-36">
                                <div
                                    class="flex items-center justify-center w-full h-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                    <p
                                        class="content-center font-semibold leading-tight text-center text-gray-800 font dark:text-gray-200">
                                        MIR</p>
                                </div>
                            </div>

                            <div class="col-span-2">
                                <div>
                                    <x-label for="NoFin" value="{{ __('Fin *') }}" />
                                    <select wire:model.blur="NoFin" wire:change="GetProposes($event.target.value)"
                                        name="NoFin"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled value="">Selecciona una Opción</option>
                                        @foreach ($fines_mir as $fin_mir)
                                        <option value="{{ $fin_mir->NoFin }}">{{ $fin_mir->DescFin }}</option>
                                        @endforeach
                                    </select>
                                    @error('NoFin')
                                    <span class="text-xs text-rose-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <x-label for="NoProposito" value="{{ __('Proposito *') }}" />
                                    <select wire:model.blur="NoProposito"
                                        wire:change="GetComponents($event.target.value)" name="NoProposito" @if (!$mir2)
                                        disabled @endif
                                        class="@if (!$mir2) bg-gray-300 @else bg-gray-100 @endif border-gray-300 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        <option selected disabled value="">Selecciona una Opción</option>
                                        @foreach ($propositos_mir as $proposito_mir)
                                        <option value="{{ $proposito_mir['NoProposito'] }}">
                                            {{ $proposito_mir['DescProposito'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('NoProposito')
                                    <span class="text-xs text-rose-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-2">
                                <div>
                                    <x-label for="NoComponente" value="{{ __('Componente *') }}" />
                                    <select wire:model.blur="NoComponente"
                                        wire:change="GetActivities($event.target.value)" name="NoComponente" @if (!$mir3)
                                        disabled @endif
                                        class="@if (!$mir3) bg-gray-300 @else bg-gray-100 @endif border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled value="">Selecciona una Opción</option>
                                        @foreach ($componetes_mir as $componete_mir)
                                        <option value="{{ $componete_mir['NoComponente'] }}">
                                            {{ $componete_mir['DescComponente'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('NoComponente')
                                    <span class="text-xs text-rose-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <x-label for="NoActividad" value="{{ __('Actividad *') }}" />
                                    <select wire:model.blur="NoActividad" name="NoActividad" @if (!$mir4) disabled
                                        @endif
                                        class="@if (!$mir4) bg-gray-300 @else bg-gray-100 @endif border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled value="">Selecciona una Opción</option>
                                        @foreach ($actividades_mir as $actividad_mir)
                                        <option value="{{ $actividad_mir['NoActividad'] }}">
                                            {{ $actividad_mir['DescActividad'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('NoActividad')
                                    <span class="text-xs text-rose-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Entrega --}}
                    <div class="grid grid-cols-10 gap-6 mb-6">
                        <div class="flex items-center col-span-3">
                            <label class="block text-lg font-bold text-gray-900 text-start dark:text-white">Condiciones
                                de
                                entrega:</label>
                        </div>
                        <div class="flex items-center">
                            <label
                                class="block text-lg font-semibold text-gray-900 text-start dark:text-white">Lugar</label>
                        </div>
                        <div class="col-span-2">
                            <input wire:model.blur="lugar_entrega" type="text" name="lugar_entrega"
                                placeholder="Lugar de Entrega"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('lugar_entrega')
                            <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-center">
                            <label
                                class="block text-lg font-semibold text-gray-900 text-start dark:text-white">Fecha</label>
                        </div>
                        <div class="col-span-2">
                            <input wire:model.blur="fecha_entrega" type="date" name="fecha_entrega"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required max="2100-12-31" step="1">
                            @error('fecha_entrega')
                            <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Add to List --}}
            <div
                class="p-6 mt-4 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">

                <div class="container px-4">
                    <div class="grid gap-3 mb-6 lg:grid-cols-12">
                        <div class="col-span-2">
                            <x-label for="cantidad" value="{{ __('Cantidad') }}" />
                            <input wire:model.blur="cantidad" wire:change="CalculateAmount()" type="number"
                                name="cantidad" step="0.01" placeholder="0.00"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('cantidad') <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <x-label for="unidad_medida" value="{{ __('Unidad de medida') }}" />
                            <input wire:model.blur="unidad_medida" type="text" name="unidad_medida"
                                placeholder="Unidad de Medida"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('unidad_medida') <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-4">
                            <x-label for="concepto" value="{{ __('Concepto') }}" />
                            <input wire:model.blur="concepto" type="text" name="concepto" placeholder="Concepto"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('concepto') <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <x-label for="p_u" value="{{ __('P/U') }}" />
                            <input wire:model.blur="p_u" wire:change="CalculateAmount()" type="number" step="0.001"
                                placeholder="0.00" name="p_u"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('p_u') <span class="text-xs text-rose-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-2">
                            <x-label for="importe" value="{{ __('Importe') }}" />
                            <input wire:model.blur="importe" type="number" name="importe" step="0.01" placeholder="0.00"
                                readonly
                                class="w-full bg-gray-200 border border-gray-400 text-gray-900 text-sm font-bold rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="23">
                            @error('importe') <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="container px-4">
                    <div class="grid grid-cols-12 gap-2 mb-1">
                        <div class="col-span-2">
                            <x-label for="partida_presupuestal" value="{{ __('Partida presupuestal') }}" />
                        </div>

                        <div class="col-span-4">
                            <select wire:model.blur="partida_presupuestal" name="partida_presupuestal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled value="">Selecciona una Opción</option>
                                @foreach ($partidas_presupuestales as $pp)
                                <option value="{{ $pp->CvePptal }}">{{ $pp->PartidaEspecifica }}</option>
                                @endforeach
                            </select>
                            @error('partida_presupuestal') <span class="text-xs text-rose-600">{{ $message
                                }}</span> @enderror
                        </div>

                        <div class="col-span-2">
                            <button type="button" wire:click='AddToList'
                                class="w-4/5 focus:outline- text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Registrar
                            </button>
                        </div>

                    </div>
                </div>

            </div>

            {{-- Partidas Presupuestales --}}
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
                <button type="button" wire:click="RemoveByPartida({{ json_encode($data) }})"
                    class=" relative items-center col-span-1 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    <i class="fas fa-trash"></i>
                </button>
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
                <button type="button" wire:click="RemoveByPartida({{ json_encode($data) }})"
                    class=" relative items-center col-span-1 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    <i class="fas fa-trash"></i>
                </button>
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
                            <th class="px-4 py-2 cursor-pointer">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->elementos as $elemento)
                        <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-4 py-2"> {{ $elemento->v_cantidad }}</td>
                            <td class="px-4 py-2"> {{ $elemento->v_concepto }} </td>
                            <td class="px-4 py-2">
                                <div
                                    class="flex items-center w-1/2 p-2 mx-auto text-sm text-gray-900 bg-white border border-gray-400 rounded-lg ">
                                    <span class="mx-auto">${{ $elemento->v_precio_u }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-2">
                                <div
                                    class="flex items-center w-1/2 p-2 mx-auto text-sm text-gray-900 bg-white border border-gray-400 rounded-lg ">
                                    <span class="mx-auto">${{ $elemento->v_importe }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <x-button-colors color="red" wire:click="RemoveFromList({{ json_encode($elemento) }})">
                                    <i class="fas fa-trash"></i>
                                </x-button-colors>
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

            {{-- Buttons --}}
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
        </form>
    </div>

    <!--
        ! MODAL DE AGREGAR PROVEEDORES
    -->
    <div id="new_proveedor_modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Agregar nuevo proveedor
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="new_proveedor_modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-4">
                            <x-label for="nombre" value="{{ __('Nombre') }}" />
                            <input wire:model="new_nombre" type="text" name="new_nombre" id="new_nombre" placeholder="Nombre del proveedor"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('new_nombre') <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-4">
                            <x-label for="nombre" value="{{ __('Telefono') }}" />
                            <input wire:model="new_telefono" type="text" name="new_telefono" id="new_telefono" placeholder="Numero celular de contacto"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('new_telefono') <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-4">
                            <x-label for="new_persona" value="{{ __('Tipo de persona') }}" />
                            <select wire:model="new_persona" name="new_persona" id="new_persona"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled value="">Selecciona una Opción</option>
                                <option value="M">Moral</option>
                                <option value="F">Fisica</option>
                            </select>
                            @error('new_persona') <span class="text-xs text-rose-600">{{ $message
                                }}</span> @enderror
                        </div>

                        <div class="col-span-4">
                            <x-label for="nombre" value="{{ __('Direccion del proveedor') }}" />
                            <input wire:model="new_direccion" type="text" name="new_direccion" id="new_direccion" placeholder="Direccion del proveedor"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('new_direccion') <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-4">
                            <x-label for="nombre" value="{{ __('Codigo postal del proveedor') }}" />
                            <input wire:model="new_codigo_postal" type="text" name="new_codigo_postal" id="new_codigo_postal" placeholder="Codigo postal del proveedor"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('new_codigo_postal') <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-4">
                            <x-label for="nombre" value="{{ __('Razon social del proveedor') }}" />
                            <input wire:model="new_razon_social" type="text" name="new_razon_social" id="new_razon_social" placeholder="Ingrese la razon social del proveedor"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('new_razon_social') <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-4">
                            <x-label for="nombre" value="{{ __('RFC del proveedor') }}" />
                            <input wire:model="new_RFC" type="text" name="new_RFC" id="new_RFC" placeholder="Ingrese el RFC del proveedor"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('new_RFC') <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-4">
                            <x-label for="nombre" value="{{ __('Regimen del proveedor') }}" />
                            <input wire:model="new_regimen" type="text" name="new_regimen" id="new_regimen" placeholder="Ingrese el regimen del proveedor"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('new_regimen') <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-4">
                            <x-label for="nombre" value="{{ __('Datos bancarios del proveedor') }}" />
                            <input wire:model="new_datos_banco" type="text" name="new_datos_banco" id="new_datos_banco" placeholder="Ingrese los datos bancarios del proveedor"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('new_datos_banco') <span class="text-xs text-rose-600">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <button type="button" wire:click="addNewProveedorTemp"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Agregar nuevo proveedor
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
