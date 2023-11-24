<div wire:init="loadApproved">
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                    {{_('Vales Aprobados')}}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem" >
                <a href="{{route('vales')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 40 40" fill="none">
                        <path
                            d="M36.6666 18.3334H7.35664L16.1783 9.51172C16.3375 9.35798 16.4645 9.17407 16.5518 8.97073C16.6392 8.76739 16.6851 8.54869 16.6871 8.32739C16.689 8.10609 16.6468 7.88662 16.563 7.6818C16.4792 7.47697 16.3554 7.29088 16.199 7.1344C16.0425 6.97791 15.8564 6.85415 15.6516 6.77035C15.4467 6.68655 15.2273 6.64438 15.006 6.6463C14.7847 6.64823 14.566 6.6942 14.3626 6.78155C14.1593 6.8689 13.9754 6.99587 13.8216 7.15505L2.15497 18.8217C1.84252 19.1343 1.66699 19.5581 1.66699 20.0001C1.66699 20.442 1.84252 20.8658 2.15497 21.1784L13.8216 32.8451C14.136 33.1487 14.557 33.3166 14.994 33.3128C15.431 33.309 15.849 33.1338 16.158 32.8248C16.467 32.5157 16.6423 32.0977 16.6461 31.6607C16.6499 31.2237 16.4819 30.8027 16.1783 30.4884L7.35664 21.6667H36.6666C37.1087 21.6667 37.5326 21.4911 37.8451 21.1786C38.1577 20.866 38.3333 20.4421 38.3333 20.0001C38.3333 19.558 38.1577 19.1341 37.8451 18.8215C37.5326 18.509 37.1087 18.3334 36.6666 18.3334Z"
                            class="fill-neutral-600 dark:fill-neutral-500" />
                    </svg>
                </a>
            </div>

        </div>
    </x-slot>

    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-around w-10/12 px-6 py-4 space-x-4">
            <select wire:model.live="mostrar"
                class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                                dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                <button type="button" wire:click="$set('buscar','')"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 dark:text-gray-400 hover:text-red-500 dark:hover:text-white">
                    <i class="fa-solid fa-delete-left"></i>
                </button>
            </div>
        </div>


        <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
            @if (count($vales))
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-zinc-700 dark:text-zinc-400">
                        <tr>
                            <th wire:click="ordenaPor('folio')" class="px-4 py-2 text-center cursor-pointer">
                                SKU
                                @if ($ordenar == 'folio')
                                @if ($direccion == 'asc')
                                <i class="float-right mt-1 fas fa-sort-numeric-asc"></i>
                                @else
                                <i class="float-right mt-1 fas fa-sort-numeric-up-alt"></i>
                                @endif
                                @else
                                <i class="float-right mt-1 fas fa-sort"></i>
                                @endif
                            </th>
                            <th wire:click="ordenaPor('fecha')" class="px-4 py-2 text-center cursor-pointer">
                                Fecha de Creación
                                @if ($ordenar == 'fecha')
                                @if ($direccion == 'asc')
                                <i class="float-right mt-1 fas fa-sort-numeric-asc"></i>
                                @else
                                <i class="float-right mt-1 fas fa-sort-numeric-up-alt"></i>
                                @endif
                                @else
                                <i class="float-right mt-1 fas fa-sort"></i>
                                @endif
                            </th>
                            <th wire:click="ordenaPor('id_usuario')" class="px-4 py-2 text-center cursor-pointer">
                                Cantidad
                                @if ($ordenar == 'id_usuario')
                                @if ($direccion == 'asc')
                                <i class="float-right mt-1 fas fa-sort-numeric-asc"></i>
                                @else
                                <i class="float-right mt-1 fas fa-sort-numeric-up-alt"></i>
                                @endif
                                @else
                                <i class="float-right mt-1 fas fa-sort"></i>
                                @endif
                            </th>
                            <th wire:click="ordenaPor('justificacion')" class="px-4 py-2 text-center cursor-pointer">
                                Concepto
                                @if ($ordenar == 'justificacion')
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
                        @foreach ($vales as $vale)
                            <tr class="text-center bg-white border-b dark:bg-zinc-800 dark:border-zinc-700">
                                <td class="px-4 py-2">
                                    <p>{{ $vale->folio }}</p>
                                </td>
                                <td class="px-4 py-2">
                                    <p>{{ $vale->fecha }}</p>
                                </td>
                                <td class="px-4 py-2">
                                    @php
                                        $default_iva = $vale->Elementos_Vales_compra->sum('importe') * 1.16;
                                        $total_with_iva = number_format($default_iva, 2, '.', '');
                                    @endphp
                                    <p>
                                        {{$total_with_iva}}
                                    </p>
                                </td>
                                <td class="px-4 py-2">
                                    <p>{{ $vale->justificacion }}</p>
                                </td>
                                <td class="px-4 py-2">
                                    <div>
                                        <x-button-colors color="indigo" wire:click="getDetails({{ $vale }})">
                                            <svg width="15" height="15" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_156_545)">
                                                <path d="M15 6.05859C9.26818 6.05859 4.07027 9.19453 0.234735 14.2881C-0.0782449 14.7054 -0.0782449 15.2884 0.234735 15.7057C4.07027 20.8054 9.26818 23.9414 15 23.9414C20.7318 23.9414 25.9297 20.8054 29.7653 15.7119C30.0782 15.2946 30.0782 14.7116 29.7653 14.2942C25.9297 9.19453 20.7318 6.05859 15 6.05859ZM15.4112 21.2964C11.6063 21.5357 8.46425 18.3998 8.70359 14.5888C8.89997 11.4467 11.4468 8.89996 14.5888 8.70358C18.3937 8.46424 21.5357 11.6002 21.2964 15.4112C21.0939 18.5471 18.5471 21.0939 15.4112 21.2964ZM15.2209 18.3875C13.1712 18.5164 11.4774 16.8288 11.6125 14.7791C11.7168 13.0853 13.0914 11.7168 14.7852 11.6063C16.8349 11.4774 18.5287 13.1651 18.3937 15.2148C18.2832 16.9147 16.9086 18.2832 15.2209 18.3875Z" fill="white"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_156_545">
                                                <rect width="30" height="30" fill="white"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        </x-button-colors>

                                        <x-button-colors color="green" wire:click="getAdd({{ $vale }})">
                                            <svg width="15" height="15" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_156_6045)">
                                                <path d="M14.8438 0H2.86458C1.28125 0 0 1.28125 0 2.86458V19.0104C0 20.5938 1.28125 21.875 2.86458 21.875H9.72917C9.16667 20.6875 8.85417 19.3646 8.85417 17.9688C8.85417 16.7708 9.08333 15.625 9.51042 14.5729C9.46875 14.5833 9.42708 14.5833 9.375 14.5833H4.16667C3.59375 14.5833 3.125 14.1146 3.125 13.5417C3.125 12.9687 3.59375 12.5 4.16667 12.5H9.375C9.77083 12.5 10.125 12.7292 10.2917 13.0625C10.9688 12.0104 11.8438 11.1146 12.875 10.4167H4.16667C3.59375 10.4167 3.125 9.94792 3.125 9.375C3.125 8.80208 3.59375 8.33333 4.16667 8.33333H13.5417C14.1146 8.33333 14.5833 8.80208 14.5833 9.375C14.5833 9.42708 14.5833 9.46875 14.5729 9.51042C15.5417 9.11458 16.6042 8.88542 17.7083 8.86458V2.86458C17.7083 1.28125 16.4271 0 14.8438 0ZM8.33333 6.25H4.16667C3.59375 6.25 3.125 5.78125 3.125 5.20833C3.125 4.63542 3.59375 4.16667 4.16667 4.16667H8.33333C8.90625 4.16667 9.375 4.63542 9.375 5.20833C9.375 5.78125 8.90625 6.25 8.33333 6.25Z" fill="white"/>
                                                <path d="M17.9687 10.9375C14.0917 10.9375 10.9375 14.0917 10.9375 17.9687C10.9375 21.8458 14.0917 25 17.9687 25C21.8458 25 25 21.8458 25 17.9687C25 14.0917 21.8458 10.9375 17.9687 10.9375ZM20.8333 19.0104H19.0104V20.8333C19.0104 21.4083 18.5437 21.875 17.9687 21.875C17.3937 21.875 16.9271 21.4083 16.9271 20.8333V19.0104H15.1042C14.5292 19.0104 14.0625 18.5437 14.0625 17.9687C14.0625 17.3937 14.5292 16.9271 15.1042 16.9271H16.9271V15.1042C16.9271 14.5292 17.3937 14.0625 17.9687 14.0625C18.5437 14.0625 19.0104 14.5292 19.0104 15.1042V16.9271H20.8333C21.4083 16.9271 21.875 17.3937 21.875 17.9687C21.875 18.5437 21.4083 19.0104 20.8333 19.0104Z" fill="#F3F4F6"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_156_6045">
                                                <rect width="25" height="25" fill="white"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        </x-button-colors>

                                        <x-button-colors color="gray" wire:click="getPrint({{ $vale }})">
                                            <svg width="15" height="15" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_156_4726)">
                                                <path d="M16.1103 19.5231H8.88804C8.42783 19.5231 8.05469 19.8962 8.05469 20.3565C8.05469 20.8168 8.42778 21.1898 8.88804 21.1898H16.1103C16.5705 21.1898 16.9436 20.8168 16.9436 20.3565C16.9436 19.8962 16.5705 19.5231 16.1103 19.5231Z" fill="white"/>
                                                <path d="M16.1103 16.8948H8.88804C8.42783 16.8948 8.05469 17.2679 8.05469 17.7282C8.05469 18.1884 8.42778 18.5615 8.88804 18.5615H16.1103C16.5705 18.5615 16.9436 18.1884 16.9436 17.7282C16.9436 17.2679 16.5705 16.8948 16.1103 16.8948Z" fill="white"/>
                                                <path d="M23.0556 6.53843H20.4041V1.71543C20.4041 1.25522 20.031 0.88208 19.5707 0.88208H5.4293C4.96909 0.88208 4.59595 1.25518 4.59595 1.71543V6.53843H1.94443C0.872266 6.53843 0 7.41074 0 8.48291V16.8668C0 17.939 0.872266 18.8112 1.94443 18.8112H4.59609V23.2846C4.59609 23.7448 4.96919 24.1179 5.42944 24.1179H19.5706C20.0308 24.1179 20.4039 23.7448 20.4039 23.2846V18.8112H23.0556C24.1277 18.8112 25 17.939 25 16.8668V8.48291C25 7.41079 24.1277 6.53843 23.0556 6.53843ZM6.2626 2.54878H18.7374V6.53843H6.2626V2.54878ZM18.7372 22.4512H6.26279C6.26279 22.2884 6.26279 15.8349 6.26279 15.6334H18.7373C18.7372 15.8399 18.7372 22.2946 18.7372 22.4512ZM19.5707 11.4317H17.4495C16.9893 11.4317 16.6161 11.0586 16.6161 10.5984C16.6161 10.1381 16.9892 9.76504 17.4495 9.76504H19.5707C20.0309 9.76504 20.4041 10.1381 20.4041 10.5984C20.4041 11.0586 20.031 11.4317 19.5707 11.4317Z" fill="white"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_156_4726">
                                                <rect width="25" height="25" fill="white"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        </x-button-colors>

                                        <x-button-colors color="gray" wire:click="getExpe({{ $vale }})">
                                            <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_156_4753)">
                                                <path d="M6.78516 16.0715H1.78516V18.2143H6.78516V16.0715ZM3.92795 17.5H2.85663C2.65933 17.5 2.49942 17.3401 2.49942 17.1428C2.49942 16.9456 2.65933 16.7857 2.85663 16.7857H3.92795C4.12524 16.7857 4.28516 16.9456 4.28516 17.1428C4.28516 17.3401 4.12524 17.5 3.92795 17.5ZM5.71368 17.5H5.35663C5.15933 17.5 4.99942 17.3401 4.99942 17.1428C4.99942 16.9456 5.15933 16.7857 5.35663 16.7857H5.71368C5.91098 16.7857 6.07089 16.9456 6.07089 17.1428C6.07089 17.3401 5.91098 17.5 5.71368 17.5Z" fill="white"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5771 2.97852L14.0517 0.0250244C14.0123 0.00915527 13.9704 0.000762937 13.9278 0H0.356476C0.313904 0.000762937 0.271942 0.00915527 0.232422 0.0250244L1.70779 2.98004C1.89197 3.34091 2.26199 3.56903 2.66711 3.57147H6.785V2.79144C6.29306 2.61749 5.99796 2.11441 6.08615 1.60004C6.17435 1.08582 6.62036 0.709839 7.14206 0.709839C7.66391 0.709839 8.10992 1.08582 8.19812 1.60004C8.28632 2.11441 7.99121 2.61749 7.49927 2.79144V3.57147H11.6172C12.0229 3.56888 12.3932 3.34015 12.5771 2.97852Z" fill="white"/>
                                                <path d="M19.6428 1.07147H15V6.42853H18.2143C18.4116 6.42853 18.5715 6.58844 18.5715 6.78574C18.5715 6.98303 18.4116 7.14279 18.2143 7.14279H15V10H18.2143C18.4116 10 18.5715 10.1599 18.5715 10.3572C18.5715 10.5544 18.4116 10.7143 18.2143 10.7143H15V11.7857H15.3572C15.5544 11.7857 15.7143 11.9456 15.7143 12.1428C15.7143 12.3401 15.5544 12.5 15.3572 12.5H15V13.5715H18.2143C18.4116 13.5715 18.5715 13.7314 18.5715 13.9285C18.5715 14.1258 18.4116 14.2857 18.2143 14.2857H15V18.9285H19.6428C19.8401 18.9285 20 18.7686 20 18.5715V1.42853C20 1.23138 19.8401 1.07147 19.6428 1.07147ZM18.2143 12.5H17.1428C16.9456 12.5 16.7857 12.3401 16.7857 12.1428C16.7857 11.9456 16.9456 11.7857 17.1428 11.7857H18.2143C18.4116 11.7857 18.5715 11.9456 18.5715 12.1428C18.5715 12.3401 18.4116 12.5 18.2143 12.5ZM18.2143 8.92853H16.4285C16.2314 8.92853 16.0715 8.76862 16.0715 8.57147C16.0715 8.37418 16.2314 8.21426 16.4285 8.21426H18.2143C18.4116 8.21426 18.5715 8.37418 18.5715 8.57147C18.5715 8.76862 18.4116 8.92853 18.2143 8.92853Z" fill="white"/>
                                                <path d="M0.357208 20H13.9285C14.1258 20 14.2857 19.8401 14.2857 19.6428V1.15646L13.2161 3.29926C12.9099 3.90121 12.2932 4.28192 11.6179 4.28574H7.5V5.06577C7.99194 5.23972 8.28705 5.7428 8.19885 6.25702C8.11066 6.77139 7.66464 7.14737 7.14279 7.14737C6.62109 7.14737 6.17508 6.77139 6.08688 6.25702C5.99869 5.7428 6.29379 5.23972 6.78574 5.06577V4.28574H2.66785C1.99326 4.28146 1.37741 3.90121 1.07147 3.30002L0 1.15707V19.6428C0 19.8401 0.159912 20 0.357208 20ZM1.07147 16.0715C1.07147 15.6769 1.3913 15.3572 1.78574 15.3572H6.78574C7.18018 15.3572 7.5 15.6769 7.5 16.0715V18.2143C7.5 18.6087 7.18018 18.9285 6.78574 18.9285H1.78574C1.3913 18.9285 1.07147 18.6087 1.07147 18.2143V16.0715Z" fill="white"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.49942 1.78574C7.49942 1.98303 7.33951 2.14279 7.14221 2.14279C6.94507 2.14279 6.78516 1.98303 6.78516 1.78574C6.78516 1.58844 6.94507 1.42853 7.14221 1.42853C7.33951 1.42853 7.49942 1.58844 7.49942 1.78574Z" fill="white"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.49942 6.07147C7.49942 6.26862 7.33951 6.42853 7.14221 6.42853C6.94507 6.42853 6.78516 6.26862 6.78516 6.07147C6.78516 5.87418 6.94507 5.71426 7.14221 5.71426C7.33951 5.71426 7.49942 5.87418 7.49942 6.07147Z" fill="white"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_156_4753">
                                                <rect width="20" height="20" fill="white"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        </x-button-colors>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($vales->hasPages())
                    <div class="px-6 py-3">
                        {{ $vales->links() }}
                    </div>
                @endif
            @else
                <div class="bg-gray-50 dark:bg-zinc-700">
                    <p class="p-4 font-semibold text-center text-gray-700 dark:text-gray-300">
                        !! No existen registros ¡¡
                    </p>
                </div>
            @endif
        </div>
    </div>

</div>
