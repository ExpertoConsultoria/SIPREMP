<div>
    <div class="pt-4 pb-4 ps-3 pe-3">
        <h2 class="mb-3 text-xl font-semibold leading-tight text-center text-gray-800 font dark:text-gray-200">
            Detalles de Cotización
            <br>
            <span class="text-base">#{{ $quote->folio }}</span>
        </h2>

        @if ($quote->arch_extension === 'pdf')
            <div class=" ps-16 pe-16">
                <a href="{{ asset($quote->arch_ruta) }}" target="_blank"
                    class="flex items-center justify-center p-6 bg-white border border-gray-200 rounded-lg shadow max-w-s hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <svg xmlns="http://www.w3.org/2000/svg" width="58" height="77" viewBox="0 0 58 77" fill="none">
                        <path
                            d="M49.5588 0.792603H7.63521C5.61022 0.792603 3.66818 1.59671 2.2363 3.02802C0.804421 4.45933 0 6.40061 0 8.42479L0 69.3932C0 71.4174 0.804421 73.3587 2.2363 74.79C3.66818 76.2213 5.61022 77.0254 7.63521 77.0254H49.5588C51.5838 77.0254 53.5259 76.2213 54.9578 74.79C56.3896 73.3587 57.1941 71.4174 57.1941 69.3932V8.41207C57.1907 6.39009 56.3848 4.45208 54.9533 3.02352C53.5217 1.59496 51.5816 0.7926 49.5588 0.792603ZM30.4708 65.5708H15.2704C14.2579 65.5708 13.2869 65.1687 12.571 64.4531C11.855 63.7374 11.4528 62.7668 11.4528 61.7547C11.4528 60.7426 11.855 59.7719 12.571 59.0563C13.2869 58.3406 14.2579 57.9386 15.2704 57.9386H30.5408C31.5533 57.9386 32.5243 58.3406 33.2403 59.0563C33.9562 59.7719 34.3584 60.7426 34.3584 61.7547C34.3584 62.7668 33.9562 63.7374 33.2403 64.4531C32.5243 65.1687 31.5533 65.5708 30.5408 65.5708H30.4708ZM41.9236 50.3064H15.2704C14.2579 50.3064 13.2869 49.9044 12.571 49.1887C11.855 48.473 11.4528 47.5024 11.4528 46.4903C11.4528 45.4782 11.855 44.5076 12.571 43.7919C13.2869 43.0763 14.2579 42.6742 15.2704 42.6742H41.93C42.9425 42.6742 43.9135 43.0763 44.6295 43.7919C45.3454 44.5076 45.7476 45.4782 45.7476 46.4903C45.7476 47.5024 45.3454 48.473 44.6295 49.1887C43.9135 49.9044 42.9425 50.3064 41.93 50.3064H41.9236ZM41.9236 35.042H15.2704C14.7611 35.0726 14.2511 34.9949 13.774 34.8139C13.297 34.633 12.8638 34.3529 12.503 33.9923C12.1422 33.6316 11.862 33.1986 11.681 32.7217C11.5 32.2449 11.4222 31.7351 11.4528 31.2259C11.4222 30.7168 11.5 30.207 11.681 29.7301C11.862 29.2533 12.1422 28.8202 12.503 28.4596C12.8638 28.0989 13.297 27.8189 13.774 27.6379C14.2511 27.457 14.7611 27.3792 15.2704 27.4098H41.93C42.4393 27.3792 42.9493 27.457 43.4264 27.6379C43.9034 27.8189 44.3367 28.0989 44.6975 28.4596C45.0583 28.8202 45.3384 29.2533 45.5194 29.7301C45.7005 30.207 45.7782 30.7168 45.7476 31.2259C45.7848 31.7387 45.712 32.2534 45.5339 32.7357C45.3559 33.2179 45.0767 33.6566 44.7152 34.0222C44.3536 34.3878 43.9181 34.6719 43.4377 34.8554C42.9574 35.039 42.4433 35.1178 41.93 35.0865L41.9236 35.042ZM41.9236 19.7777H15.2704C14.7608 19.8093 14.2504 19.7323 13.7729 19.5517C13.2953 19.3711 12.8617 19.0911 12.5007 18.7302C12.1397 18.3693 11.8595 17.9359 11.6789 17.4585C11.4982 16.9812 11.4212 16.4709 11.4528 15.9616C11.4222 15.4524 11.5 14.9426 11.681 14.4658C11.862 13.9889 12.1422 13.5559 12.503 13.1952C12.8638 12.8346 13.297 12.5545 13.774 12.3736C14.2511 12.1926 14.7611 12.1149 15.2704 12.1455H41.93C42.4393 12.1149 42.9493 12.1926 43.4264 12.3736C43.9034 12.5545 44.3367 12.8346 44.6975 13.1952C45.0583 13.5559 45.3384 13.9889 45.5194 14.4658C45.7005 14.9426 45.7782 15.4524 45.7476 15.9616C45.7888 16.4761 45.7188 16.9934 45.5424 17.4785C45.366 17.9635 45.0873 18.405 44.7253 18.773C44.3632 19.1409 43.9262 19.4268 43.4439 19.6111C42.9616 19.7954 42.4453 19.8739 41.93 19.8413L41.9236 19.7777Z"
                            fill="#515151" />
                    </svg>

                    <h5 class="mb-2 text-xl font-bold tracking-tight text-center text-gray-900 ps-4 dark:text-white">
                        {{ $quote->arch_nombre }}.{{ $quote->arch_extension }}
                    </h5>

                </a>
            </div>
        @elseif ($quote->arch_extension === 'txt')
            <div class="max-w-2xl p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <p class="font-normal text-gray-700 dark:text-gray-400">
                    {{ File::get($quote->arch_ruta) }}
                </p>
            </div>

            <div class="text-center mt-6">
                <a href="{{ route('pdf.Cotizacion', ['details_of_folio' => $quote->folio]) }}" target="_blank" wire:click="$dispatch('closeModal')"
                    class="disabled:opacity-25 focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Imprimir
                </a>
            </div>
        @else
            <div class="max-w-4xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="rounded-t-lg" src="{{ asset($quote->arch_ruta) }}" alt="{{ $quote->arch_descripcion }}" />
            </div>

            <div class="text-center mt-6">
                <a href="{{ route('pdf.Cotizacion', ['details_of_folio' => $quote->folio]) }}" target="_blank" wire:click="$dispatch('closeModal')"
                    class="disabled:opacity-25 focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Imprimir
                </a>
            </div>
        @endif

    </div>
</div>
