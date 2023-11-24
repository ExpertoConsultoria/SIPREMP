<div>
    <div class="flex items-center justify-center">
        <img class="rounded-t-lg" src="{{ asset('Img/Engranes.gif') }}" alt="" width="60%" height="auto" />
    </div>
    <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white">
            Seccíon en Progreso
        </h5>
        <p class="mb-3 font-normal text-center text-gray-700 dark:text-gray-400">
            Lo sentimos, por el momento esta función no se encuentra disponible.
        </p>
        <div class="flex items-center justify-center">
            <button wire:click="$dispatch('closeModal')"
                class="items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Entendido
            </button>
        </div>
    </div>
</div>
