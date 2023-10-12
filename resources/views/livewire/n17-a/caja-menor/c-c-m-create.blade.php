<div>

    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-2xl font-bold leading-tight text-gray-800 font dark:text-gray-200">
                    {{ __('Nueva Compra | Caja menor') }}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem">
                <a href="{{ route('cajamenor') }}">
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
            <div class="container mx-auto">
                <form wire:submit.prevent="Save" autocomplete="off">

                    {{-- Basic Data --}}
                    <div
                        class="p-6 bg-white border border-gray-200 rounded-lg shadow-md w-30 text dark:bg-gray-800 dark:border-gray-700">

                        {{-- Defualt --}}
                        <div class="container px-4">
                            <div
                                class="grid grid-cols-2 gap-3 mb-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-6 xl:grid-cols-6">
                                <div>
                                    <x-label for="fecha" value="{{ __('Fecha') }}" />
                                    <input wire:model.blur="fecha" type="date" name="fecha" readonly
                                        class="cursor-no-drop w-full bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required max="2100-12-31" step="1">
                                </div>

                                <div>
                                    <x-label for="folio" value="{{ __('Folio') }}" />
                                    <input wire:model.blur="folio" type="text" name="folio" readonly
                                        class="cursor-no-drop w-full bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                                <div class="col-span-2">
                                    <x-label for="solicitante" value="{{ __('Solicitante') }}" />
                                    <input wire:model.blur="solicitante" type="text" name="solicitante" readonly
                                        class="cursor-no-drop w-full bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                                <div class="col-span-2">
                                    <x-label for="sucursal" value="{{ __('Sucursal') }}" />
                                    <input wire:model.blur="sucursal" type="text" name="sucursal" readonly
                                        class="cursor-no-drop w-full bg-gray-200 font-bold border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                            </div>
                        </div>

                        {{-- MIR --}}
                        <div class="container px-4">
                            <div
                                class="grid grid-cols-4 gap-2 mb-1 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-8 xl:grid-cols-8">

                                <div class="col-span-3">
                                    <x-label for="asunto" value="{{ __('Asunto *') }}" />
                                    <textarea wire:model.blur="asunto" name="asunto" rows="6"
                                        placeholder="Describe el motivo de la compra"
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </textarea>
                                    @error('asunto') <span class="text-xs text-rose-600">{{ $message }}</span> @enderror
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
                                        <x-label for="fin_mir" value="{{ __('Fin *') }}" />
                                        <select wire:model.blur="fin_mir" wire:change="GetProposes($event.target.value)"
                                            name="fin_mir"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected disabled value="">Selecciona una Opción</option>
                                            @foreach ($fines_mir as $fin_mir)
                                            <option value="{{ $fin_mir->NoFin }}">{{ $fin_mir->DescFin }}</option>
                                            @endforeach
                                        </select>
                                        @error('fin_mir') <span class="text-xs text-rose-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-4">
                                        <x-label for="proposito_mir" value="{{ __('Proposito *') }}" />
                                        <select wire:model.blur="proposito_mir"
                                            wire:change="GetComponents($event.target.value)" name="proposito_mir"
                                            @if(!$mir2) disabled @endif
                                            class="@if(!$mir2) bg-gray-300 @else bg-gray-100 @endif border-gray-300 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                            <option selected disabled value="">Selecciona una Opción</option>
                                            @foreach ($propositos_mir as $proposito_mir)
                                            <option value="{{ $proposito_mir['NoProposito'] }}">{{
                                                $proposito_mir['DescProposito'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('proposito_mir') <span class="text-xs text-rose-600">{{ $message
                                            }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-span-2">
                                    <div>
                                        <x-label for="componente_mir" value="{{ __('Componente *') }}" />
                                        <select wire:model.blur="componente_mir"
                                            wire:change="GetActivities($event.target.value)" name="componente_mir"
                                            @if(!$mir3) disabled @endif
                                            class="@if(!$mir3) bg-gray-300 @else bg-gray-100 @endif border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected disabled value="">Selecciona una Opción</option>
                                            @foreach ($componetes_mir as $componete_mir)
                                            <option value="{{ $componete_mir['NoComponente'] }}">{{
                                                $componete_mir['DescComponente'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('componente_mir') <span class="text-xs text-rose-600">{{ $message
                                            }}</span> @enderror
                                    </div>
                                    <div class="mt-4">
                                        <x-label for="actividad_mir" value="{{ __('Actividad *') }}" />
                                        <select wire:model.blur="actividad_mir" name="actividad_mir" @if(!$mir4)
                                            disabled @endif
                                            class="@if(!$mir4) bg-gray-300 @else bg-gray-100 @endif border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected disabled value="">Selecciona una Opción</option>
                                            @foreach ($actividades_mir as $actividad_mir)
                                            <option value="{{ $actividad_mir['NoActividad'] }}">{{
                                                $actividad_mir['DescActividad'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('actividad_mir') <span class="text-xs text-rose-600">{{ $message
                                            }}</span> @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    {{-- Buttons --}}
                    <div
                        class="p-6 mt-4 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="container px-4">
                            <div class="grid grid-cols-1">
                                <input wire:model.blur="factura_id" type="hidden" name="factura_id">
                                @error('factura_id') <span class="text-xs text-rose-600">{{ $message }}</span> @enderror
                                @if ($add_xml)
                                    @livewire('n17-a.caja-menor.add-xml')
                                @else
                                    <div class="text-center">
                                        <p class="block text-lg font-bold text-gray-900 text-start dark:text-white">
                                            ! Factura almacenada Correctamente !
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Provedor --}}
                    <div
                        class="p-6 mt-4 bg-white border border-gray-200 rounded-lg shadow-md text dark:bg-gray-800 dark:border-gray-700">
                        <div class="container px-4">
                            <div
                                class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">
                                <div class="flex items-center">
                                    <label
                                        class="block text-lg font-bold text-gray-900 text-start dark:text-white">Proveedor</label>
                                </div>
                                <div>
                                    <x-label for="razon_social" value="{{ __('Razón Social') }}" />
                                    <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                        {{ $razon_social }}</p>
                                </div>
                                <div>
                                    <x-label for="rfc" value="{{ __('RFC') }}" />
                                    <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                        {{ $RFC }}</p>
                                </div>
                                <div>
                                    <x-label for="telefono" value="{{ __('Teléfono') }}" />
                                    <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                        {{ $telefono }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Table --}}
                    <div
                        class="pb-12 mt-4 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-800 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
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
                                        <th scope="col" class="px-6 py-3">
                                            P/U
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Importe
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($elementosCompraMenor as $elemento)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">
                                            {{ $elemento->icm_cantidad }}
                                        </td>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $elemento->icm_concepto }}
                                        </th>
                                        <td class="px-6 py-4">
                                            <select wire:change="setPartidaP($event.target.value, {{ $loop->index }})" required
                                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                <option value="" disabled selected> Partida Presupuestal</option>

                                                @foreach ($partidas_presupuestales as $partida_presupuestal )
                                                    <option value="{{ $partida_presupuestal->CvePptal }}">
                                                        {{ $partida_presupuestal->PartidaEspecifica }}
                                                    </option>
                                                @endforeach
                                                {{-- opciones --}}
                                            </select>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $elemento->icm_precio_u }}
                                        </td>
                                        <th
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $elemento->icm_importe }}
                                        </th>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Totals --}}
                    <div class="mt-5">
                        <div class="container px-4">
                            <div class="grid grid-cols-12 gap-2 mb-1">
                                <div class="col-span-10 text-end">
                                    <p
                                        class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                                        Subtotal:</p>
                                </div>
                                <div class="col-span-2 px-3 text-end">
                                    <p
                                        class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                                        $
                                        {{ $subtotal }}
                                    </p>
                                </div>
                                <div class="col-span-10 text-end">
                                    <p
                                        class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                                        I.V.A:</p>
                                </div>
                                <div class="col-span-2 px-3 border border-gray-400 rounded-lg text-end">
                                    <p
                                        class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                                        $
                                        {{ $iva }}
                                    </p>
                                </div>
                                <div class="col-span-10 text-end">
                                    <p
                                        class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                                        Total:</p>
                                </div>
                                <div class="col-span-2 px-3 text-end">
                                    <p
                                        class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                                        $
                                        {{ $total }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="mt-4 ">
                        <div class="container">
                            <div class="grid grid-cols-2 gap-10">
                                <div class="text-start">
                                    <button type="button" wire:click="SaveAsDraft"
                                        class="disabled:opacity-25 focus:outline- text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all active:translate-y-1">
                                        Guardar borrador
                                    </button>
                                </div>
                                <div class="text-end">
                                    <button type="submit" wire:loading.attr="disabled"
                                        class="disabled:opacity-25 focus:outline- text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition-all active:translate-y-1">
                                        Crear compra
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
