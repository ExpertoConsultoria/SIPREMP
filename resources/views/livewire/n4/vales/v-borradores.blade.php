<div>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                    {{_('Vales en borrador')}}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem" >
                <a href="{{route('vales')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 40 40" fill="none">
                        <path
                            d="M36.6666 18.3334H7.35664L16.1783 9.51172C16.3375 9.35798 16.4645 9.17407 16.5518 8.97073C16.6392 8.76739 16.6851 8.54869 16.6871 8.32739C16.689 8.10609 16.6468 7.88662 16.563 7.6818C16.4792 7.47697 16.3554 7.29088 16.199 7.1344C16.0425 6.97791 15.8564 6.85415 15.6516 6.77035C15.4467 6.68655 15.2273 6.64438 15.006 6.6463C14.7847 6.64823 14.566 6.6942 14.3626 6.78155C14.1593 6.8689 13.9754 6.99587 13.8216 7.15505L2.15497 18.8217C1.84252 19.1343 1.66699 19.5581 1.66699 20.0001C1.66699 20.442 1.84252 20.8658 2.15497 21.1784L13.8216 32.8451C14.136 33.1487 14.557 33.3166 14.994 33.3128C15.431 33.309 15.849 33.1338 16.158 32.8248C16.467 32.5157 16.6423 32.0977 16.6461 31.6607C16.6499 31.2237 16.4819 30.8027 16.1783 30.4884L7.35664 21.6667H36.6666C37.1087 21.6667 37.5326 21.4911 37.8451 21.1786C38.1577 20.866 38.3333 20.4421 38.3333 20.0001C38.3333 19.558 38.1577 19.1341 37.8451 18.8215C37.5326 18.509 37.1087 18.3334 36.6666 18.3334Z"
                            fill="#515151" />
                    </svg>
                </a>
            </div>

        </div>
    </x-slot>

    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-around w-10/12 px-6 py-4 space-x-4">
            <select wire:model.live="mostrar"
                class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="10">Mostrar: 10</option>
                <option value="25">Mostrar: 25</option>
                <option value="50">Mostrar: 50</option>
            </select>

            {{-- Extraido de caja menor borradores --}}
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="z-20 text-gray-400 fa fa-search dark:text-gray-400"></i>
                </div>

                <x-input type="text" wire:model.live="buscar" placeholder="Buscar..." autofocus
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                <button type="button" wire:click="$set('buscar','')"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 dark:text-gray-400 hover:text-red-500 dark:hover:text-white">
                    <i class="fa-solid fa-delete-left"></i>
                </button>
            </div>
        </div>
    

    <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center text-black">
                    <th class="px-4 py-2 cursor-pointer whitespace-nowrap">
                        Folio
                    </th>
                    <th class="px-4 py-2 cursor-pointer">
                        Fecha de Creación
                    </th>
                    <th class="px-16 py-2 cursor-pointer">
                        Asunto
                    </th>
                    <th class="px-4 py-2 cursor-pointer">
                        Solicitante
                    </th>
                    <th class="px-4 py-2 cursor-pointer">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                    <td class="px-4 py-2">
                        <p>#88898</p>
                    </td>
                    <td class="px-4 py-2">
                        <p>14/09/2023</p>
                    </td>
                    <td class="px-4 py-2">
                        <p>Solicitud de computadoras</p>
                    </td>
                    <td class="px-4 py-2">
                        <p>Usuario del que proviene</p>
                    </td>
                    <td class="px-4 py-2">
                        <div>
                            <x-button-colors color="indigo" wire:click="getDetails()">
                                <i class="fas fa-eye"></i>
                            </x-button-colors>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="p-6 bg-white h-96 text dark:bg-gray-800 dark:border-gray-700">
        </div>

        </div>
    </div>
    
</div>
