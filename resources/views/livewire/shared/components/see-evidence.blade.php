<div>
    <div class="pt-4 pb-4 ps-3 pe-3">
        <h2 class="mb-3 text-xl font-semibold leading-tight text-center text-gray-800 font dark:text-gray-200">
            Detalles | Evidencia Vale de Compra
            <br>
            <span class="text-base">#{{ $evidence->folio }}</span>
        </h2>

        <div class=" ps-16 pe-16">

            <div class="max-w-4xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="rounded-t-lg" src="{{ asset($evidence->arch_ruta) }}" alt="{{ $evidence->arch_descripcion }}" />
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('pdf.Evidencia', ['details_of_folio' => $evidence->folio]) }}" target="_blank"
                    wire:click="$dispatch('closeModal')"
                    class="disabled:opacity-25 focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Imprimir
                </a>
            </div>

        </div>

    </div>
</div>
