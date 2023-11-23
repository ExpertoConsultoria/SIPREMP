@props(['memorandum_id'])

@php
    use App\Models\Memorandum;
    $memo = Memorandum::find($memorandum_id);

    use App\Models\Vales_compra;
    $vale_data = Vales_compra::where('folio_solicitud',$memo->memo_folio)->first();

@endphp

<div class="p-6 my-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div class="container px-4 mx-auto">
        <div class="mb-3">
            <label class="block mb-2 text-lg font-bold text-center text-gray-900 dark:text-white">ESTATUS</label>
        </div>
        <div class="relative h-8 mb-4">
            {{-- Línea base de la barra de progreso --}}
            <div
                class="h-1 w-[82%] sm:w-[85%] md:w-[89%] lg:w-[92%] xl:w-[93%] bg-gray-300 absolute top-3 left-0 right-0 mx-4">
            </div>

            {{-- Círculos y etiquetas --}}
            <div class="flex items-center justify-between">
                <div class="relative flex flex-col items-center">
                    <div class="w-6 h-6 bg-green-400 rounded-full">
                    </div>
                    <p class="mt-1 text-xs">Enviado</p>
                </div>

                <div class="relative flex flex-col items-center">
                    <div class="
                        @if($memo->memo_creation_status === 'Validado')
                            w-6 h-6 bg-green-400 rounded-full
                        @elseif((($memo->memo_creation_status === 'Aprobado' && $memo->token_aceptacion!=null) || ($memo->memo_creation_status === 'Rechazado' && $memo->motivo_rechazo != null && $memo->token_aceptacion===null)) && $memo->pass_filter===1)
                            w-6 h-6 bg-green-400 rounded-full
                        @elseif($memo->memo_creation_status === 'Rechazado' && $memo->token_aceptacion===null && $memo->motivo_rechazo != null && $memo->pass_filter===0)
                            w-6 h-6 bg-red-400 rounded-full
                        @else
                            w-6 h-6 bg-stone-400 rounded-full
                        @endif
                    "></div>
                    <p class="mt-1 text-xs">Filtrado</p>
                </div>

                <div class="relative flex flex-col items-center">
                    <div class="
                        @if ($memo->memo_creation_status === 'Aprobado' && $memo->token_aceptacion !=  null && $memo->pass_filter===1)
                            @if ($vale_data != null && $vale_data?->token_solicitante != null)
                                w-6 h-6 bg-green-400 rounded-full
                            @endif
                        @elseif($memo->memo_creation_status === 'Rechazado' && $memo->token_aceptacion === null && $memo->motivo_rechazo != null && $memo->pass_filter===1)
                            w-6 h-6 bg-red-400 rounded-full
                        @else
                            w-6 h-6 bg-stone-400 rounded-full
                        @endif
                    "></div>
                    <p class="mt-1 text-xs">Servicios Generales</p>
                </div>

                <div class="relative flex flex-col items-center">
                    <div class="
                        @if ($memo->pending_review === 3)
                            w-6 h-6 bg-green-400 rounded-full
                        @else
                            w-6 h-6 bg-stone-400 rounded-full
                        @endif
                    "></div>
                    <p class="mt-1 text-xs">Unidad Técnica</p>
                </div>

                <div class="relative flex flex-col items-center">
                    <div class="
                        @if ($memo->pending_review === 3)
                            w-6 h-6 bg-green-400 rounded-full
                        @else
                            w-6 h-6 bg-stone-400 rounded-full
                        @endif
                    "></div>
                    <p class="mt-1 text-xs">Control Presupuestal</p>
                </div>

                <div class="relative flex flex-col items-center">
                    <div class="
                        @if ($memo->pending_review === 3)
                            w-6 h-6 bg-green-400 rounded-full
                        @else
                            w-6 h-6 bg-stone-400 rounded-full
                        @endif
                    "></div>
                    <p class="mt-1 text-xs">Dirección Administrativa</p>
                </div>
            </div>
        </div>
    </div>
</div>
