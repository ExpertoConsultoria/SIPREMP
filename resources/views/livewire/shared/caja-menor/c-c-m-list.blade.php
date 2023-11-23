<div>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                    {{ __('Compras | Caja menor') }}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem">
                <a href="{{ route('cajamenor') }}">
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

    <div class="max-w-screen-xl p-4 mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-5 py-4 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-8 xl:grid-cols-8 ">
            <div>
                <select wire:model.live="mostrar"
                    class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="10">Mostrar: 10</option>
                    <option value="25">Mostrar: 25</option>
                    <option value="50">Mostrar: 50</option>
                </select>
            </div>

            <div>
                <select wire:model.live="ejercicio"
                    class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled value="">Ejercicio</option>
                    @foreach ($ejercicios as $ejercicio)
                        <option>{{ $ejercicio }}</option>
                    @endforeach
                </select>
                @error('ejercicio')
                    <div class="text-center">
                        <span class="text-xs text-rose-600">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div>
                <input wire:model.live="fecha_inicio" type="date" name="fecha_inicio"
                    class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('fecha_inicio')
                    <div class="text-center">
                        <span class="text-xs text-rose-600">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div>
                <input wire:model.live="fecha_fin" type="date" name="fecha_fin"
                    class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('fecha_fin')
                    <div class="text-center">
                        <span class="text-xs text-rose-600">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="col-span-2">
                <select wire:model.live="partida_presupuestal"
                    class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected disabled>Partida Presupuestal</option>
                    @foreach ($partidas_presupuestales as $partida_presupuestal)
                        <option value="{{ $partida_presupuestal->CvePptal }}">
                            {{ $partida_presupuestal->PartidaEspecifica }}
                        </option>
                    @endforeach
                </select>
                @error('partida_presupuestal')
                    <div class="text-center">
                        <span class="text-xs text-rose-600">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="col-span-2">
                <form wire:submit.prevent="forgeReport" autocomplete="off">
                    <button type="sumit" wire:loading.attr="disabled"
                        @if (count($compras_enviadas) == 0) disabled @endif
                        class="disabled:opacity-25 focus:outline- text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition-all active:translate-y-1">
                        GENERAR REPORTE
                    </button>
                </form>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @if (count($compras_enviadas))
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-zinc-700 dark:text-gray-400">
                        <tr>
                            <th wire:click="ordenaPor('cm_folio')" class="px-4 py-2 cursor-pointer whitespace-nowrap">
                                Folio
                                @if ($ordenar == 'cm_folio')
                                    @if ($direccion == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-alpha-asc"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif
                            </th>
                            <th wire:click="ordenaPor('cm_fecha')" class="px-4 py-2 cursor-pointer">
                                Fecha
                                @if ($ordenar == 'cm_fecha')
                                    @if ($direccion == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-numeric-asc"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-numeric-up-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif
                            </th>
                            <th wire:click="ordenaPor('cm_asunto')" class="px-4 py-2 cursor-pointer">
                                Asunto
                                @if ($ordenar == 'cm_asunto')
                                    @if ($direccion == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-numeric-asc"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-numeric-up-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif
                            </th>
                            <th wire:click="ordenaPor('cm_asunto')" class="px-4 py-2 cursor-pointer">
                                Estado
                                @if ($ordenar == 'cm_asunto')
                                    @if ($direccion == 'asc')
                                        <i class="float-right mt-1 fas fa-sort-numeric-asc"></i>
                                    @else
                                        <i class="float-right mt-1 fas fa-sort-numeric-up-alt"></i>
                                    @endif
                                @else
                                    <i class="float-right mt-1 fas fa-sort"></i>
                                @endif
                            </th>
                            <th class="px-4 py-2 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compras_enviadas as $compra)
                            <tr class="bg-white border-b dark:bg-zinc-800 dark:border-zinc-700">
                                <td class="px-4 py-2"> {{ $compra->cm_folio }} </td>
                                <td class="px-4 py-2"> {{ $compra->cm_fecha }} </td>
                                <td class="px-4 py-2"> {{ $compra->cm_asunto }} </td>
                                <td class="px-4 py-2"> {{ $compra->cm_creation_status }} </td>
                                <td class="text-center">
                                    <x-button-icons class="my-2" icon="eye" wire:click="getDetails({{ $compra }})"/>
                                    <x-button-icons icon="print" wire:click="printData({{ $compra }})"/>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($compras_enviadas?->hasPages())
                    <div class="px-6 py-3">
                        {{ $compras_enviadas?->links() }}
                    </div>
                @endif
            @else
                <div class="bg-gray-50 dark:bg-gray-700">
                    <p class="p-4 font-semibold text-center">
                        !! No existen registros ¡¡
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>
