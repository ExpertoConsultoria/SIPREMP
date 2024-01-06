<div>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
            <div>
                <h2 class="text-2xl font-bold leading-tight text-gray-800 font dark:text-gray-200">
                    {{ __('Detalles del Proveedor') }}
                </h2>
            </div>
            <div class="grid" style="justify-content: end; padding-right: 5.5rem">
                <a href="{{ route('proveedores.pendientes') }}">
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
            <div class="container">
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-5 p-6 bg-white  border-gray-200 rounded-lg shadow-lg shadow-gray-300 dark:shadow-zinc-700 text-gray-900  dark:text-gray-300 dark:bg-zinc-800 dark:border-zinc-800">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="col-span-2">
                                <label
                                    class="block m-auto text-lg font-bold text-gray-900 text-center dark:text-white">Datos Personales</label>
                            </div>
                            <div>
                                <x-label for="razon_social" value="{{ __('Nombre') }}" />
                                <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                    {{ $proveedor->Nombre }}</p>
                            </div>
                            <div>
                                <x-label for="telefono" value="{{ __('Teléfono') }}" />
                                <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                    {{ $proveedor->Telefono }}</p>
                            </div>
                            <div>
                                <x-label for="rfc" value="{{ __('Direccion') }}" />
                                <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                    {{ $proveedor->Direccion }}</p>
                            </div>
                            <div>
                                <x-label for="rfc" value="{{ __('Codigo Postal') }}" />
                                <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                    {{ $proveedor->CodigoPostal }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-7 p-6 bg-white  border-gray-200 rounded-lg shadow-lg shadow-gray-300 dark:shadow-zinc-700 text-gray-900  dark:text-gray-300 dark:bg-zinc-800 dark:border-zinc-800">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3">
                                <label
                                    class="block m-auto text-lg font-bold text-gray-900 text-center dark:text-white">Datos Fiscales</label>
                            </div>
                            <div>
                                <x-label for="rfc" value="{{ __('Clasificación') }}" />
                                <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                    {{ $proveedor->Persona }}</p>
                            </div>
                            <div>
                                <x-label for="rfc" value="{{ __('RFC') }}" />
                                <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                    {{ $proveedor->RFC }}</p>
                            </div>
                            <div>
                                <x-label for="razon_social" value="{{ __('Razón Social') }}" />
                                <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                    {{ $proveedor->RazonSocial }}</p>
                            </div>
                            <div>
                                <x-label for="rfc" value="{{ __('Regimen') }}" />
                                <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                    @if ( $proveedor->Regimen )
                                    {{ $proveedor->Regimen }}
                                    @else
                                    No hay regimen
                                    @endif
                                </p>
                            </div>
                            <div>
                                <x-label for="telefono" value="{{ __('Datos de contacto') }}" />
                                <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                    {{ $proveedor->DatosContacto }}</p>
                            </div>
                            <div>
                                <x-label for="telefono" value="{{ __('Datos bancarios') }}" />
                                <p class="font-sans text-xs text-gray-500 font-extralight dark:text-gray-200">
                                    @if ( $proveedor->DatosBanco )
                                    {{ $proveedor->DatosBanco }}
                                    @else
                                    No hay datos bancarios
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-7 mt-4 p-6 bg-white border-gray-200 rounded-lg shadow-lg shadow-gray-300 dark:shadow-zinc-700 w-full text-gray-900 dark:text-gray-300 dark:bg-zinc-800 dark:border-zinc-800">
                        <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12">
                            <div class="col-span-12">
                                <label class="block m-auto text-lg font-bold text-gray-900 text-center dark:text-white">Proveedores con el mismo RFC</label>
                            </div>
                            <div class="col-span-12 mt-6">
                                @if (count($proveedoresList))
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    RFC</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nombre</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Razon social</th>
                                                <!-- Agregar más columnas según sea necesario -->
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($proveedoresList as $prov)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $prov->RFC }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $prov->Nombre }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $prov->RazonSocial }}</td>
                                                <!-- Agregar más celdas según sea necesario -->
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

                    <div class="col-span-5 mt-4 p-6 bg-white border-gray-200 rounded-lg shadow-lg shadow-gray-300 dark:shadow-zinc-700 w-full text-gray-900 dark:text-gray-300 dark:bg-zinc-800 dark:border-zinc-800">
                        <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12">
                            <div class="col-span-12">
                                <label class="block m-auto text-lg font-bold text-gray-900 text-center dark:text-white">Vales Generados con este Proveedor</label>
                            </div>
                            <div class="col-span-12 mt-6">
                                @if (count($valesByProveedor))
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Folio</th>
                                                <th
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Fecha</th>
                                                <th
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Usuario</th>
                                                <!-- Agregar más columnas según sea necesario -->
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($valesByProveedor as $vale)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $vale->folio }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $vale->fecha }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $vale->solicitante->name }}</td>
                                                <!-- Agregar más celdas según sea necesario -->
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

                </div>
            </div>
            {{-- Vales Generados con este Proveedor --}}

            <div class="mt-4 p-6">
                <div class="container">
                    <div class="grid @if (count($this->proveedoresList)) grid-cols-3 @else grid-cols-2 @endif gap-6">

                        <div class="text-end">
                            <x-button-colors wire:click="autorizarProveedor()" color="green"
                                class="inline-flex text-white rounded text-lg">
                                Autorizar proveedor
                            </x-button-colors>
                        </div>
                        <div class="text-center">
                            <x-button-colors color="red" wire:click="$dispatch('delete')"
                                class="inline-flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">
                                Rechazar proveedor
                            </x-button-colors>
                        </div>
                        @if ( count($this->proveedoresList) )
                            <div class="text-start">
                                <x-button-colors wire:click="reasignarProveedor()" color="gray"
                                    class="inline-flex text-white rounded text-lg">
                                    Reasignar proveedor
                                </x-button-colors>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('delete', (event) => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡Ya no podras revertir esta acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Si, Eliminalo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('deleteProveedor');
                    }
                })
            });
        });

    </script>

</div>
