<div>

    <form class="p-4 md:p-5">
        <div class="mb-6">
            <h2 class="text-xl font-semibold leading-tight text-center text-gray-800 font dark:text-gray-200">
                Añadir nuevo Proveedor
            </h2>
        </div>

        <div class="grid grid-cols-4 gap-4 mb-4 ps-6 pe-6">

            <div class="col-span-4">
                <label
                    class="block m-auto text-lg font-bold text-gray-900 text-start dark:text-white">Datos Personales</label>
            </div>

            <div class="col-span-2">
                <x-label for="nombre" value="{{ __('Nombre') }}" />
                <input wire:model="new_nombre" type="text" name="new_nombre" id="new_nombre"
                    placeholder="Nombre del proveedor"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('new_nombre') <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2">
                <x-label for="nombre" value="{{ __('Telefono') }}" />
                <input wire:model="new_telefono" type="text" name="new_telefono" id="new_telefono"
                    placeholder="Numero celular de contacto"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('new_telefono') <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2">
                <x-label for="new_direccion" value="{{ __('Direccion del proveedor') }}" />
                <input wire:model="new_direccion" type="text" name="new_direccion" id="new_direccion"
                    placeholder="Direccion del proveedor"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('new_direccion') <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2">
                <x-label for="new_codigo_postal" value="{{ __('Codigo postal del proveedor') }}" />
                <input wire:model="new_codigo_postal" type="text" name="new_codigo_postal" id="new_codigo_postal"
                    placeholder="Codigo postal del proveedor"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('new_codigo_postal') <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-4 mt-4">
                <label
                    class="block m-auto text-lg font-bold text-gray-900 text-start dark:text-white">Datos Fiscales</label>
            </div>

            <div class="col-span-2">
                <x-label for="new_persona" value="{{ __('Tipo de persona') }}" />
                <select wire:model="new_persona" name="new_persona" id="new_persona"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selecciona una Opción</option>
                    <option value="M">Moral</option>
                    <option value="F">Fisica</option>
                </select>
                @error('new_persona')
                    <span class="text-xs text-rose-600">{{ $message}}</span>
                @enderror
            </div>

            <div class="col-span-2">
                <x-label for="new_RFC" value="{{ __('RFC del proveedor') }}" />
                <input wire:model="new_RFC" type="text" name="new_RFC" id="new_RFC"
                    placeholder="Ingrese el RFC del proveedor"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('new_RFC') <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2">
                <x-label for="new_razon_social" value="{{ __('Razon social del proveedor') }}" />
                <input wire:model="new_razon_social" type="text" name="new_razon_social" id="new_razon_social"
                    placeholder="Ingrese la razon social del proveedor"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('new_razon_social') <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2">
                <x-label for="new_regimen" value="{{ __('Regimen del proveedor') }}" />
                <input wire:model="new_regimen" type="text" name="new_regimen" id="new_regimen"
                    placeholder="Ingrese el regimen del proveedor"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('new_regimen') <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2">
                <x-label for="new_datos_banco" value="{{ __('Datos bancarios del proveedor') }}" />
                <input wire:model="new_datos_banco" type="text" name="new_datos_banco" id="new_datos_banco"
                    placeholder="Ingrese los datos bancarios del proveedor"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('new_datos_banco') <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2">
                <x-label for="new_datos_contacto" value="{{ __('Datos de contacto del proveedor') }}" />
                <input wire:model="new_datos_contacto" type="text" name="new_datos_contacto" id="new_datos_contacto"
                    placeholder="Ingrese los datos de contacto del proveedor"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('new_datos_contacto')
                <span class="text-xs text-rose-600">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="mt-8">
            <div class="container">
                <div class="grid grid-cols-1 gap-10">
                    <div class="text-center">
                        <button type="button" wire:click="addNewProveedorTemp"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Agregar nuevo proveedor
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
