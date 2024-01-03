@props(['vale_id'])

@php
    use App\Models\Vales_compra;
    $vale = Vales_compra::find($vale_id);
@endphp

{{-- bg-gray-700 --}}

<div class="p-6 my-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-zinc-800 dark:border-zinc-700">
    <div class="container w-2/3 px-4 mx-auto">
        <div class="mb-3">
            <label class="block mb-2 text-lg font-bold text-center text-gray-900 dark:text-white">ESTATUS</label>
        </div>
        <div class="relative h-8 mb-4">
            {{-- Línea base de la barra de progreso --}}
            <div
                class="h-0.5 w-[86%] sm:w-[86%] md:w-[86%] lg:w-[92%] xl:w-[86%] bg-gray-300 absolute top-3 left-0 right-0 mx-12">
            </div>

            {{-- Círculos y etiquetas --}}
            <div class="flex items-center justify-between">
                <div class="relative flex flex-col items-center">
                    <div class="w-6 h-6 bg-green-400 rounded-full"></div>
                    <p class="mt-1 text-xs">Servicios Generales</p>
                </div>

                <div class="relative flex flex-col items-center">
                    <div class="

                        @if(($vale->creation_status === 'Validado' || $vale->pass_filter===1) && $vale->token_solicitante != null && $vale->token_rev_val != null)
                            w-6 h-6 bg-green-400 rounded-full
                        @elseif($vale->creation_status === 'Rechazado' && $vale->token_rev_val===null && $vale->motivo_rechazo != null && $vale->pass_filter===0)
                            w-6 h-6 bg-red-400 rounded-full
                        @else
                            w-6 h-6 bg-stone-400 rounded-full
                        @endif

                    "></div>
                    <p class="mt-1 text-xs">Unidad técnica</p>
                </div>

                <div class="relative flex flex-col items-center">
                    <div class="

                        @if(($vale->creation_status === 'Presupuestado' || ($vale->pass_cp===1 && $vale->pass_filter===1)) && $vale->token_solicitante != null && $vale->token_rev_val != null && $vale->token_disp_ppta != null)
                            w-6 h-6 bg-green-400 rounded-full
                        @elseif($vale->creation_status === 'Rechazado' && $vale->token_disp_ppta===null && $vale->motivo_rechazo != null && $vale->pass_cp===0 && $vale->pass_filter===1)
                            w-6 h-6 bg-red-400 rounded-full
                        @else
                            w-6 h-6 bg-stone-400 rounded-full
                        @endif

                    "></div>
                    <p class="mt-1 text-xs">Control Presupuestal</p>
                </div>

                <div class="relative flex flex-col items-center">
                    <div class="

                        @if(($vale->creation_status === 'Aprobado' || ($vale->pass_cp===1 && $vale->pass_filter===1)) && $vale->token_solicitante != null && $vale->token_rev_val != null && $vale->token_disp_ppta != null && $vale->token_autorizacion != null)
                            w-6 h-6 bg-green-400 rounded-full
                        @elseif($vale->creation_status === 'Rechazado' && $vale->token_autorizacion===null && $vale->motivo_rechazo != null && $vale->pass_cp===1 && $vale->pass_filter===1)
                            w-6 h-6 bg-red-400 rounded-full
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
