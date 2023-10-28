<div>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                    {{_('Compras consolidadas | Guardados')}}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem" >
                <a href="{{route('compraConsolidadaBorrador.borradorCompra')}}">
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
                        SKU
                    </th>
                    <th class="px-4 py-2 cursor-pointer">
                        Fecha
                    </th>
                    <th class="px-16 py-2 cursor-pointer">
                        Cantidad
                    </th>
                    <th class="px-4 py-2 cursor-pointer">
                        Concepto
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
                        <p>10</p>
                    </td>
                    <td class="px-4 py-2">
                        <p>Solicitud de computadoras</p>
                    </td>
                    <td class="px-4 py-2">
                        <div>
                            <a href="{{route('compraConsolidadaBorrador.guardado')}}">
                                <button type="button"
                                class=" disabled:opacity-25 focus:outline-1 px-4 py-1 bg-green-600  hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all active:translate-y-1">
                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_745_1195)">
                                        <path d="M15.0416 9.53651C14.6038 9.53651 14.25 9.89122 14.25 10.3281V16.6615C14.25 17.0977 13.8953 17.4531 13.4584 17.4531H2.375C1.93795 17.4531 1.58338 17.0977 1.58338 16.6615V5.57812C1.58338 5.14194 1.93795 4.78651 2.375 4.78651H8.70838C9.14616 4.78651 9.5 4.43179 9.5 3.99489C9.5 3.55784 9.14616 3.20312 8.70838 3.20312H2.375C1.06559 3.20312 0 4.26871 0 5.57812V16.6615C0 17.9709 1.06559 19.0365 2.375 19.0365H13.4584C14.7678 19.0365 15.8334 17.9709 15.8334 16.6615V10.3281C15.8334 9.89035 15.4794 9.53651 15.0416 9.53651Z" fill="white"/>
                                        <path d="M7.42191 8.81541C7.36654 8.87079 7.32928 8.94124 7.31348 9.0172L6.7538 11.8166C6.72771 11.9464 6.76887 12.0802 6.86223 12.1744C6.93746 12.2496 7.03879 12.2899 7.14258 12.2899C7.1678 12.2899 7.19404 12.2876 7.22013 12.2821L10.0187 11.7224C10.0963 11.7065 10.1667 11.6694 10.2214 11.6138L16.485 5.35018L13.6864 2.55176L7.42191 8.81541Z" fill="white"/>
                                        <path d="M18.4196 0.616037C17.6478 -0.155867 16.3922 -0.155867 15.621 0.616037L14.5254 1.71163L17.324 4.5102L18.4196 3.41446C18.7933 3.04163 18.9991 2.54442 18.9991 2.01561C18.9991 1.4868 18.7933 0.989595 18.4196 0.616037Z" fill="white"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_745_1195">
                                        <rect width="19" height="19" fill="white"/>
                                        </clipPath>
                                        </defs>
                                    </svg>
                                </button>
                            </a>
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
    


