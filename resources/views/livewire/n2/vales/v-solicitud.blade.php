<div>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-2xl font-bold leading-tight text-gray-800 font dark:text-gray-200">
                    {{ __('Vale | Solicitud #0001') }}
                </h2>
            </div>

            <div class="grid" style="justify-content: end; padding-right: 5.5rem">
                <a href="{{ route('dashboard') }}">
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

    {{-- <x-vale-status vale_id="{{$vale_details->id}}" /> --}}

    <div class="py-8 max-w-screen-xl mx-auto">
        <div class="p-6 my-6 bg-white border-gray-200 rounded-lg shadow-lg  shadow-zinc-300 dark:shadow-none dark:bg-zinc-800 dark:border-zinc-800">
            <div class="container mx-auto px-4 w-2/3">
                <div class="mb-3">
                    <label class="block mb-2 text-lg font-bold text-center text-gray-900 dark:text-white">APROBACIONES</label>
                </div>
                <div class="relative h-10 mb-4">
                    {{-- Línea base de la barra de progreso  --}}
                    <div class="h-0.5 w-[86%] sm:w-[86%] md:w-[86%] lg:w-[92%] xl:w-[86%] bg-gray-300 absolute top-3 left-0 right-0 mx-12"></div>
        
                    {{-- Círculos y etiquetas --}}
                    <div class="flex justify-between items-center">
                        <div class="relative flex flex-col items-center">
                            <div class="w-6 h-6 bg-green-400 rounded-full"></div>
                            <p class="text-sm text-gray-800 dark:text-gray-200 mt-1">Unidad técnica</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Solicitado y enviado</p>
                        </div>
        
                        <div class="relative flex flex-col items-center">
                            <div class="w-6 h-6 bg-green-400 rounded-full"></div>
                            <p class="text-xs text-gray-800 dark:text-gray-200 mt-1">Control Presupuestal</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Aprobado</p>
                        </div>
        
                        <div class="relative flex flex-col items-center">
                            <div class="w-6 h-6 bg-green-400 rounded-full "></div>
                            <p class="text-xs text-gray-800 dark:text-gray-200 mt-1">Dirección Administrativa</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Aprobado</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-6 mb-6 text-center bg-white border-gray-200 rounded-lg shadow-lg  shadow-zinc-300 dark:shadow-none dark:bg-zinc-800 dark:border-zinc-800">
            <button type="button"
                    class="disabled:opacity-25 focus:outline-none text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all active:translate-y-1">
                    <i class="fas fa-eye mr-2"></i>
                    COTIZACIÓN
            </button>
        </div>

        <div
            class="p-6 mb-6 bg-white border-gray-200 rounded-lg shadow-lg  shadow-zinc-300 dark:shadow-none dark:bg-zinc-800 dark:border-zinc-800">
            <div class="container px-4">
                <div class="grid grid-cols-6  gap-6">
                    <div>
                        <x-label for="fecha" value="{{ __('Fecha') }}" />
                        <p class="font-extralight text-xs text-gray-500 font-sans dark:text-gray-200">13/09/2023</p>
                    </div>
                    <div>
                        <x-label for="folio" value="{{ __('Folio') }}" />
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">SP-000001</p>
                    </div>
                    <div>
                        <x-label for="area" value="{{ __('Área') }}" />
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">User + area</p>
                    </div>
                    <div>
                        <x-label for="lugar" value="{{ __('Lugar') }}" />
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">Matriz</p>
                    </div>
                    <div>
                        <x-label for="mir" value="{{ __('MIR') }}" />
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">
                            97438498328498-38293898</p>
                    </div>
                </div>

                <div class="grid grid-cols-6  gap-6 mt-6">
                    <div class="flex items-center">
                        <label
                            class="block text-lg font-bold text-gray-900 text-start dark:text-white">Proveedor</label>
                    </div>

                    <div>
                        <x-label for="razonsocial" value="{{ __('Razón social') }}" />
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">Solicitante</p>
                    </div>
                    <div>
                        <x-label for="rfc" value="{{ __('RFC') }}" />
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">Matriz</p>
                    </div>
                    <div>
                        <x-label for="telefono" value="{{ __('Teléfono') }}" />
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">
                            97438498328498-38293898</p>
                    </div>
                </div>

                <div class="container py-6">
                    <div class="grid grid-cols-1 gap-2 mb-1">
                        <div class="text-left">
                            <label class="block text-lg font-bold text-gray-900 dark:text-white">Justificación:</label>
                        </div>
                        <div class="col-span-9">
                            <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus temporibus ducimus et eum, error officia libero sunt cum voluptatibus obcaecati rerum. Molestias cumque ex distinctio voluptatum itaque explicabo consequuntur iure!</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-10  gap-6 mb-6">
                    <div class="col-span-3 flex items-center">
                        <label class="block text-lg font-bold text-gray-900 text-start dark:text-white">Condiciones de
                            entrega:</label>
                    </div>
                    <div class="flex items-center">
                        <label
                            class="block text-lg font-semibold text-gray-900 text-start dark:text-white">Lugar:</label>
                    </div>
                    <div class="flex items-center text-center col-span-2">
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">Matriz </p>
                    </div>
                    <div class="flex items-center">
                        <label
                            class="block text-lg font-semibold text-gray-900 text-start dark:text-white">Fecha:</label>
                    </div>
                    <div class="flex items-center text-center col-span-2">
                        <p class="font-extralight text-xs  text-gray-500 font-sans dark:text-gray-200">13/09/2023</p>
                    </div>
                </div>
            </div>
        </div>


        <div
            class="flex relative gap-x-7 items-center h-4 p-6 mt-4 bg-lime-500 rounded-lg w-30">
            <div>
                <h1 class="text-white font-bold">Partida presupuestal</h1>
            </div>
            <div>
                <span class="text-sm text-white">09397589347598437597295</span>
            </div>
            <div class="ml-auto sm:col-span-2">
                <h1 class="text-white font-bold">DISPONIBLE</h1>
            </div>
        </div>

        <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-zinc-700 dark:text-gray-400">
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
                    <tr class="bg-white border-b dark:bg-zinc-800 dark:border-zinc-700 text-center">
                        <td class="px-4 py-2"> 1</td>
                        <td class="px-4 py-2"> 1 Coca </td>
                        <td class="px-4 py-2">
                            <div
                                class=" flex items-center mx-auto bg-white dark:bg-zinc-700 border w-1/2 border-gray-400 dark:border-zinc-500 text-gray-900 dark:text-gray-300 text-sm rounded-lg p-2">
                                <span class="mx-auto">$00.00</span>
                            </div>
                        </td>
                        <td class="px-4 py-2">
                            <div
                                class=" flex items-center mx-auto bg-white dark:bg-zinc-700 border w-1/2 border-gray-400 dark:border-zinc-500 text-gray-900 dark:text-gray-300 text-sm rounded-lg p-2">
                                <span class="mx-auto">$00.00</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="p-6 bg-white h-16 text dark:bg-zinc-800 dark:border-zinc-700">
            </div>

            <hr>

            <div class="grid grid-cols-12 gap-2 mb-1 bg-white dark:bg-zinc-800 p-6 ">

                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        Subtotal:</p>
                </div>
                <div class="col-span-2 px-3 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">$10
                    </p>
                </div>
                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">I.V.A:
                    </p>
                </div>
                <div class="col-span-2 px-3 border border-gray-400 rounded-lg text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">$6
                    </p>
                </div>
                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">Total:
                    </p>
                </div>
                <div class="col-span-2 px-3 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">$16
                    </p>
                </div>
            </div>
        </div>

        <div
            class="flex relative gap-x-7 items-center h-4 p-6 mt-4 bg-red-600 rounded-lg w-30 ">
            <div>
                <h1 class="text-white font-bold">Partida presupuestal</h1>
            </div>
            <div>
                <span class="text-sm text-white">09397589347598437597295</span>
            </div>
            <div class="ml-auto sm:col-span-2">
                <h1 class="text-white font-bold">NO DISPONIBLE</h1>
            </div>
        </div>

        <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-zinc-700 dark:text-gray-400">
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
                    <tr class="bg-white border-b dark:bg-zinc-800 dark:border-zinc-700 text-center">
                        <td class="px-4 py-2"> 1</td>
                        <td class="px-4 py-2"> 1 Coca </td>
                        <td class="px-4 py-2">
                            <div
                                class=" flex items-center mx-auto bg-white dark:bg-zinc-700 border w-1/2 border-gray-400 dark:border-zinc-500 text-gray-900 dark:text-gray-300 text-sm rounded-lg p-2">
                                <span class="mx-auto">$00.00</span>
                            </div>
                        </td>
                        <td class="px-4 py-2">
                            <div
                                class=" flex items-center mx-auto bg-white dark:bg-zinc-700 border w-1/2 border-gray-400 dark:border-zinc-500 text-gray-900 dark:text-gray-300 text-sm rounded-lg p-2">
                                <span class="mx-auto">$00.00</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="p-6 bg-white h-16 text dark:bg-zinc-800 dark:border-zinc-700">
            </div>

            <hr>

            <div class="grid grid-cols-12 gap-2 mb-1 bg-white dark:bg-zinc-800 p-6 ">

                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                        Subtotal:</p>
                </div>
                <div class="col-span-2 px-3 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">$10
                    </p>
                </div>
                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800 font dark:text-gray-200">I.V.A:
                    </p>
                </div>
                <div class="col-span-2 px-3 border border-gray-400 rounded-lg text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800  dark:text-gray-200">$6
                    </p>
                </div>
                <div class="col-span-10 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800  dark:text-gray-200">Total:
                    </p>
                </div>
                <div class="col-span-2 px-3 text-end">
                    <p class="text-sm font-semibold leading-tight text-gray-800  dark:text-gray-200">$16
                    </p>
                </div>
            </div>
        </div>

        {{-- 7ma parte --}}
        <div class="p-6 mt-4 bg-white border border-gray-200 rounded-lg shadow-md w-30 dark:bg-zinc-800 dark:border-zinc-700">
            <div>
                <h1 class="text-2xl font-bold text-gray-800  dark:text-gray-200">Anexo</h1>
            </div>
            <div class="mt-3 text-lg text-gray-500 dark:text-gray-400 font-bold">
                <span>Asunto</span>
            </div>
            <div class="mt-1">
                <p class="text-xs text-gray-800 dark:text-gray-200">
                    ESPECIFICACIONES TÉCNICAS DE LA IMPRESIÓN DE BOLETAS DE EMPEÑO PARA LA MATRIZ Y SUCURSALES DEL MONTE DE PIEDAD DEL ESTADO DE OAXACA.
                </p>
            </div>
            <div class="grid grid-cols-10">
                <div class="col-span-5 mr-2">
                    <div class="mt-3 text-lg text-gray-500 dark:text-gray-400 font-bold">
                        <span>Objeto</span>
                    </div>
                    <div class="mt-1">
                        <p class="text-xs text-gray-800 dark:text-gray-200">
                            Adquisición de boletas de empeño para surtir a todas las sucursales del Monte de Piedad del Estado de Oaxaca; con el propósito de que las sucursales cuenten con los insumos necesarios para las actividades diarias en cuanto al proceso de préstamo prendario que ofrece la Institución a los pignorantes.
                        </p>
                    </div>
                </div>
                <div class="col-span-5 ml-2">
                    <div class="mt-3 text-lg text-gray-500 dark:text-gray-400 font-bold">
                        <span>Alcance</span>
                    </div>
                    <div class="mt-1">
                        <p class="text-xs text-gray-800 dark:text-gray-200">
                            Gerencia Matriz y 22 Sucursales del Monte de Piedad del Estado de Oaxaca.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mb-6 mt-4">
                <h1 class="text-xl font-bold text-gray-500 dark:text-gray-400">Descripción de los bienes</h1>
            </div>
            {{-- Borrar la linea inferior de la etiqueta table --}}
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-zinc-700 dark:text-gray-400">
                    <tr class="text-center text-black dark:text-gray-200 ">
                        <th class="px-4 py-2 cursor-pointer whitespace-nowrap">
                            Cantidad 
                        </th>
                        <th class="px-4 py-2 cursor-pointer">
                            Unidad de media
                        </th>
                        <th class="px-4 py-2 cursor-pointer">
                            Descripción
                        </th>
                        <th class="px-4 py-2 cursor-pointer">
                            Atributos
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 dark:text-gray-400">
                    <tr class="bg-white dark:bg-zinc-800 dark:border-gray-700 text-center">
                        <td class="px-4 py-2"> 
                            <p>1</p>
                        </td>
                        <td class="px-4 py-2"> 
                            <p>Millar</p>
                        </td>
                        <td class="px-4 py-2">
                            <p>Boletas de empeño tamaño carta, impresas 1x1 tinta, bond de 75 grs. con perforación y folio</p>
                        </td>
                        <td class="px-4 py-2">
                            <p>Color verde</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-6 text-lg text-gray-500 dark:text-gray-400 font-bold">
                <span>Plazo y procedimiento de entrega</span>
            </div>
            <div class="mt-1">
                <p class="text-xs text-gray-800 dark:text-gray-200">
                    Los bienes descritos en el Punto 3, se entregarán a partir del dieciséis de febrero del año dos mil veintitrés y “El Proveedor” tendrá como plazo 90 días posteriores a la realización del pedido, y se entregarán en el Departamento de Servicios Generales del Monte de Piedad del Estado de Oaxaca, ubicado en Avenida Morelos núm. 703 esquina Macedonio Alcalá, Colonia Centro, Oaxaca de Juárez, Oaxaca. C.P. 68000. La recepción y verificación de los bienes estará a cargo del personal que oportunamente designe la Dirección de Administración dependiente de “El Organismo” dependiendo de la requisición que se haya remitido en su oportunidad.
                </p>
            </div>
            <div class="grid grid-cols-10">
                <div class="col-span-5 mr-2 mt-6">
                    <div class="text-lg text-gray-500 dark:text-gray-400 font-bold">
                        <span>Entregables</span>
                    </div>
                    <div class="mt-1">
                        <p class="text-xs text-gray-800 dark:text-gray-200">
                            No aplica
                        </p>
                    </div>
                </div>
                <div class="col-span-5 ml-2 mt-6">
                    <div class="text-lg text-gray-500 dark:text-gray-400 font-bold">
                        <span>Muestras</span>
                    </div>
                    <div class="mt-1">
                        <p class="text-xs text-gray-800 dark:text-gray-200">
                            No aplica
                        </p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-10">
                <div class="col-span-5 mr-2 mt-6">
                    <div class="mt-3 text-lg text-gray-500 dark:text-gray-400 font-bold">
                        <span>Recursos humanos</span>
                    </div>
                    <div class="mt-1">
                        <p class="text-xs text-gray-800 dark:text-gray-200">
                            No aplica
                        </p>
                    </div>
                </div>
                <div class="col-span-5 ml-2 mt-6">
                    <div class="mt-3 text-lg text-gray-500 dark:text-gray-400 font-bold">
                        <span>Soporte técnico</span>
                    </div>
                    <div class="mt-1">
                        <p class="text-xs text-gray-800 dark:text-gray-200">
                            No aplica
                        </p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-10">
                <div class="col-span-5 mr-2 mt-6">
                    <div class="mt-3 text-lg text-gray-500 dark:text-gray-400 font-bold">
                        <span>Mantenimiento</span>
                    </div>
                    <div class="mt-1">
                        <p class="text-xs text-gray-800 dark:text-gray-200">
                            No aplica
                        </p>
                    </div>
                </div>
                <div class="col-span-5 ml-2 mt-6">
                    <div class="mt-3 text-lg text-gray-500 dark:text-gray-400 font-bold">
                        <span>Capacitación y/o actualización</span>
                    </div>
                    <div class="mt-1">
                        <p class="text-xs text-gray-800 dark:text-gray-200">
                            No aplica
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-6 text-lg text-gray-500 dark:text-gray-400 font-bold">
                <span>Vigencia de la contratación</span>
            </div>
            <div class="mt-1">
                <p class="text-xs text-gray-800 dark:text-gray-200">
                    No aplica
                </p>
            </div>
            <div class="mt-6 text-lg text-gray-500 dark:text-gray-400 font-bold">
                <span>Forma de pago</span>
            </div>
            <div class="mt-1">
                <p class="text-xs text-gray-800 dark:text-gray-200">
                    Los pagos se realizarán de acuerdo a lo siguiente: El importe será fijo durante la vigencia de la contratación, no se otorgará anticipo alguno, el pago se efectuará por cada requisición solicitada por el Departamento de Servicios Generales, y posterior a la presentación del comprobante fiscal correspondiente, mismo que deberá reunir los requisitos fiscales. Los pagos se realizarán, por parte de la Dirección Administrativa del Monte de Piedad del Estado de Oaxaca, dentro de los veinte días naturales posteriores a la presentación del comprobante fiscal correspondiente, pago que será efectuado mediante transferencia bancaria previo a que el proveedor que resulte adjudicado proporcione los datos bancarios correspondientes.
                </p>
            </div>
            <div class="mt-6 text-lg text-gray-500 dark:text-gray-400 font-bold">
                <span>Garantias</span>
            </div>
            <div class="mt-1">
                <p class="text-xs text-gray-800 dark:text-gray-200">
                    Para garantizar el anticipo, “el proveedor” al momento de recibir el anticipo deberá otorgar fianza por el monto total del anticipo, es decir, por el 30% del monto total de los bienes adquiridos, a más tardar quince días posteriores al otorgamiento del mismo. La garantía de cumplimiento se constituirá al 10% del monto total adjudicado considerando el impuesto al valor agregado (I.V.A.), la cual podrá presentarse a través de fianza, billete de depósito o cheque certificado y constituirse a favor del Monte de Piedad del Estado de Oaxaca, con fundamento en el numeral 104 fracción I de los Lineamientos en Materia de Adquisiciones, Enajenaciones, Arrendamientos, Prestación de Servicios y Administración de Bienes Muebles e Inmuebles del Monte de Piedad del Estado de Oaxaca, la cual deberá presentarse a más tardar dentro de los diez días naturales contados a partir de la formalización del contrato.
                </p>
            </div>

            <div class="mt-8 text-lg text-gray-500 dark:text-gray-400 font-bold">
                <span>ADJUNTAR ANEXOS ADICIONALES Y DOCUMENTACIÓN COMPLEMENTARIA, EN CASO DE QUE SE REQUIERA</span>
            </div>

        </div>

        <div class="mt-10">
            <div class="grid grid-cols-2">
                <div class="text-start">
                    <button type="button"
                        class="disabled:opacity-25 focus:outline-none text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all active:translate-y-1">
                        RECHAZAR
                    </button>
                </div>
                <div class="text-end">
                    <button type="button"
                        class="disabled:opacity-25 focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-2.5 transition-all active:translate-y-1">
                        DISPONIBILIDAD PRESUPUESTAL
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
