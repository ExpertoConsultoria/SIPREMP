<div>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-2xl font-bold leading-tight text-gray-800 font dark:text-gray-200">
                    {{ __('Vale de bien o servicio | ') }}{{$vale_details->folio}}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem">
                <a href="{{ route('bandejaentrada.pendientes') }}">
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

        <x-vale-status vale_id="{{$vale_details->id}}" />

        <div class="p-6 my-6 bg-white border-gray-200 rounded-lg shadow-lg shadow-zinc-300 dark:shadow-none dark:bg-zinc-800 dark:border-zinc-800">
            <div class="container px-4">
                <div class="grid items-center justify-center grid-cols-12 gap-3 ">

                    <div class="col-span-1">
                        <h1 class="font-bold">Fecha</h1>
                        <span class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-400">{{$vale_details->fecha}}</span>
                    </div>
                    <div class="col-span-2">
                        <h1 class="font-bold">Folio</h1>
                        <span class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-400">{{$vale_details->folio}}</span>
                    </div>
                    <div class="col-span-2">
                        <h1 class="font-bold">Área</h1>
                        <span class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-400">{{$vale_details->solicitante->name}} -
                        {{$vale_details->solicitante?->org4empleado?->org3Puesto?->org2Area ? $vale_details->solicitante?->org4empleado?->org3Puesto?->org2Area->AreaNombre : $vale_details->solicitante->name}}</span>
                    </div>
                    <div class="col-span-3">
                        <h1 class="font-bold">Lugar</h1>
                        <span class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-400">{{$vale_details->lugar}}</span>
                    </div>
                    <div class="col-span-3">
                        <h1 class="font-bold" >MIR</h1>
                        <span class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-400">{{ $MIR }}</span>
                    </div>
                    <div class="col-span-1 ml-auto">
                        {{-- Agregarle el pinche texto --}}
                        <div>
                            <button type="button"
                            class="px-12 py-1 text-sm font-medium transition-all bg-blue-600 rounded-lg disabled:opacity-25 focus:outline-1 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 active:translate-y-1">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_317_5348)">
                                <path d="M15 6.05859C9.26818 6.05859 4.07027 9.19453 0.234735 14.2881C-0.0782449 14.7054 -0.0782449 15.2884 0.234735 15.7057C4.07027 20.8054 9.26818 23.9414 15 23.9414C20.7318 23.9414 25.9297 20.8054 29.7653 15.7119C30.0782 15.2946 30.0782 14.7116 29.7653 14.2942C25.9297 9.19453 20.7318 6.05859 15 6.05859ZM15.4112 21.2964C11.6063 21.5357 8.46425 18.3998 8.70359 14.5888C8.89997 11.4467 11.4468 8.89996 14.5888 8.70358C18.3937 8.46424 21.5357 11.6002 21.2964 15.4112C21.0939 18.5471 18.5471 21.0939 15.4112 21.2964ZM15.2209 18.3875C13.1712 18.5164 11.4774 16.8288 11.6125 14.7791C11.7168 13.0853 13.0914 11.7168 14.7852 11.6063C16.8349 11.4774 18.5287 13.1651 18.3937 15.2148C18.2832 16.9147 16.9086 18.2832 15.2209 18.3875Z" fill="white"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_317_5348">
                                <rect width="30" height="30" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>
                            </button>

                        </div>
                    </div>

                </div>
            </div>

            <div class="container px-4 py-8">
                <div class="grid items-center justify-center grid-cols-8 gap-3 ">
                    <div class="col-span-1">
                        <h1 class="font-bold">Proveedor</h1>
                    </div>
                    <div class="col-span-2">
                        <h1 class="font-bold">Razón social</h1>
                        <span class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-400">{{ $proveedor->RazonSocial }}</span>
                    </div>
                    <div class="col-span-2">
                        <h1 class="font-bold">RFC</h1>
                        <span class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-400">{{ $proveedor->RFC }}</span>
                    </div>
                    <div class="col-span-2">
                        <h1 class="font-bold" >Teléfono</h1>
                        <span class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-400">{{ $proveedor?->Telefono ? $proveedor->Telefono : 'Ninguno' }}</span>
                    </div>
                </div>
            </div>

            <div class="container px-4 py-6">
                <div class="grid grid-cols-1 gap-2 mb-1">
                    <div class="text-left">
                        <label class="block text-base font-bold text-gray-900">Justificación:</label>
                    </div>
                    <div class="col-span-9">
                        <p class="font-sans text-sm text-gray-500 font-extralight dark:text-gray-200">
                            {{$vale_details->justificacion}}
                        </p>
                    </div>
                </div>
            </div>

            <div class="container px-4 py-6">
                <div class="grid items-center justify-center grid-cols-8 gap-3">
                    <div class="col-span-2">
                        <h1 class="font-bold">Condiciones de entrega:</h1>
                        <label class="w-full text-sm "></label>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="font-bold">
                            <h1>Lugar:</h1>
                        </div>
                        <div>
                            <span class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-400">{{$vale_details->lugar_entrega}}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="font-bold">
                            <h1>Fecha:</h1>
                        </div>
                        <div>
                            <span class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-400">{{$vale_details->fecha_entrega}}</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- Partidas presupuestales --}}
        @foreach ($partidas_data as $data)

            @if ($data->estado === 'DISPONIBLE')
                {{-- Partidas Disponibles --}}
                <div
                    class="relative flex items-center h-4 p-6 mt-4 border rounded-lg gap-x-7 bg-lime-500 w-30 text dark:bg-gray-800 dark:border-gray-700">
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

        {{-- Botones --}}
        <div class="mt-16">
            <div class="container">
                <div class="relative flex items-center w-full dark:bg-gray-800 dark:border-gray-700">
                    <div class="">
                        <button type="button" wire:click="$dispatch('alertForReject')"
                            class="disabled:opacity-25 focus:outline- text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 transition-all active:translate-y-1">
                            RECHAZAR VALE
                        </button>
                    </div>

                    <div class="ml-auto sm:col-span-2">
                        <div class="col-span-1 ml-auto text-center">
                            <button type="button" wire:click="$dispatch('alertForAprove')"
                                class="disabled:opacity-25 focus:outline- text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition-all active:translate-y-1">
                                REVISAR Y VALIDAR
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

<script>
    document.addEventListener('livewire:initialized', () => {
            Livewire.on('alertForAprove', (event) => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¿Deseas aprobar esta Solicitud Extraordinaria?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Si, Aprobar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('approveVale');
                    }
                })
            });

            Livewire.on('alertForReject', () => {

                var razon= '';

                Swal.fire({
                    text: 'Describa le motivo de Rechazo de esta solicitud',
                    icon: 'warning',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off',
                    },
                    preConfirm: (value) => {
                        if (!value) {
                            Swal.showValidationMessage(
                                'Motivo requerido'
                            )
                        } else {
                            razon = value;
                        }
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Enviar motivo',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('rejectVale', {reason: razon});
                    }
                })
            });
        });
</script>

</div>
