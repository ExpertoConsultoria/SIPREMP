<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">
                    {{ __('Dashboard') }}
                </h2>
            </div>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl lg:px-8">
            <div class="overflow-hidden bg-transparent">

                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">
                    <p class="mb-3 text-lg font-semibold text-center text-gray-700 text dark:text-gray-400">¡HOLA, USER! BIENVENIDO AL
                        SIPREMP</p>
                </div>


                <div class="p-6 mt-8 bg-white border border-gray-200 rounded-lg shadow text dark:bg-gray-800 dark:border-gray-700">
                    <div class="grid grid-cols-3 gap-4 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">

                        <div class="grid justify-start">
                            <x-user-icon class="block w-auto h-9" />
                        </div>
                        <div class="grid justify-start">
                            <x-building-icon class="block w-auto h-9" />
                        </div>
                        <div class="grid justify-start">
                            <x-localization-icon class="block w-auto h-9" />
                        </div>

                    </div>
                </div>

                <div class="grid justify-center">
                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">

                        <div
                            class="p-6 mt-8 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">
                            <a href="{{ route('cajamenor') }}" class="grid text-center justify-items-center">

                                <svg xmlns="http://www.w3.org/2000/svg" width="77" height="77" viewBox="0 0 90 90" fill="none">
                                    <g clip-path="url(#clip0_94_6247)">
                                        <path
                                            d="M89.2173 20.1954C88.5169 19.2983 87.442 18.774 86.3038 18.774H15.9335L14.8875 7.12085C14.7164 5.21519 13.1193 3.755 11.206 3.755H3.69621C1.65485 3.755 0 5.40985 0 7.45122C0 9.49259 1.65485 11.1474 3.69621 11.1474H7.82682L11.8782 56.2833C11.8791 56.3365 11.8765 56.3887 11.8795 56.4422C11.8877 56.5841 11.9062 56.7228 11.9298 56.8594L12.078 58.5097C12.0808 58.5408 12.084 58.572 12.0877 58.6028C12.5369 62.4944 14.5256 65.8662 17.4014 68.1443C15.9113 70.0473 15.0197 72.4402 15.0197 75.039C15.0197 81.218 20.0467 86.245 26.2255 86.245C32.4045 86.245 37.4316 81.218 37.4316 75.039C37.4316 73.7004 37.1948 72.4164 36.7625 71.2253H56.9925C56.56 72.4164 56.3234 73.7004 56.3234 75.039C56.3234 81.218 61.3505 86.245 67.5295 86.245C73.7085 86.245 78.7355 81.218 78.7355 75.039C78.7355 68.86 73.7085 63.8329 67.5295 63.8329H26.2505C23.4428 63.8329 20.9961 62.139 19.94 59.671L79.0105 56.1994C80.6231 56.1047 81.9875 54.9733 82.3795 53.4061L89.8898 23.3664C90.1656 22.2625 89.9176 21.0927 89.2173 20.1954Z"
                                            fill="#515151" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_94_6247">
                                            <rect width="90" height="90" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                                <p class="mt-6 text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">CAJA MENOR</p>
                                <p class="mt-2">Crea o revisa las compras de la Caja Menor</p>
                            </a>
                        </div>

                        <div
                            class="p-6 mt-8 bg-white border border-gray-200 rounded-lg shadow w-30 text dark:bg-gray-800 dark:border-gray-700">
                            <a href="{{ route('solicitudes') }}" class="grid text-center justify-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="58" height="77" viewBox="0 0 58 77" fill="none">
                                    <path
                                        d="M49.5588 0.792603H7.63521C5.61022 0.792603 3.66818 1.59671 2.2363 3.02802C0.804421 4.45933 0 6.40061 0 8.42479L0 69.3932C0 71.4174 0.804421 73.3587 2.2363 74.79C3.66818 76.2213 5.61022 77.0254 7.63521 77.0254H49.5588C51.5838 77.0254 53.5259 76.2213 54.9578 74.79C56.3896 73.3587 57.1941 71.4174 57.1941 69.3932V8.41207C57.1907 6.39009 56.3848 4.45208 54.9533 3.02352C53.5217 1.59496 51.5816 0.7926 49.5588 0.792603ZM30.4708 65.5708H15.2704C14.2579 65.5708 13.2869 65.1687 12.571 64.4531C11.855 63.7374 11.4528 62.7668 11.4528 61.7547C11.4528 60.7426 11.855 59.7719 12.571 59.0563C13.2869 58.3406 14.2579 57.9386 15.2704 57.9386H30.5408C31.5533 57.9386 32.5243 58.3406 33.2403 59.0563C33.9562 59.7719 34.3584 60.7426 34.3584 61.7547C34.3584 62.7668 33.9562 63.7374 33.2403 64.4531C32.5243 65.1687 31.5533 65.5708 30.5408 65.5708H30.4708ZM41.9236 50.3064H15.2704C14.2579 50.3064 13.2869 49.9044 12.571 49.1887C11.855 48.473 11.4528 47.5024 11.4528 46.4903C11.4528 45.4782 11.855 44.5076 12.571 43.7919C13.2869 43.0763 14.2579 42.6742 15.2704 42.6742H41.93C42.9425 42.6742 43.9135 43.0763 44.6295 43.7919C45.3454 44.5076 45.7476 45.4782 45.7476 46.4903C45.7476 47.5024 45.3454 48.473 44.6295 49.1887C43.9135 49.9044 42.9425 50.3064 41.93 50.3064H41.9236ZM41.9236 35.042H15.2704C14.7611 35.0726 14.2511 34.9949 13.774 34.8139C13.297 34.633 12.8638 34.3529 12.503 33.9923C12.1422 33.6316 11.862 33.1986 11.681 32.7217C11.5 32.2449 11.4222 31.7351 11.4528 31.2259C11.4222 30.7168 11.5 30.207 11.681 29.7301C11.862 29.2533 12.1422 28.8202 12.503 28.4596C12.8638 28.0989 13.297 27.8189 13.774 27.6379C14.2511 27.457 14.7611 27.3792 15.2704 27.4098H41.93C42.4393 27.3792 42.9493 27.457 43.4264 27.6379C43.9034 27.8189 44.3367 28.0989 44.6975 28.4596C45.0583 28.8202 45.3384 29.2533 45.5194 29.7301C45.7005 30.207 45.7782 30.7168 45.7476 31.2259C45.7848 31.7387 45.712 32.2534 45.5339 32.7357C45.3559 33.2179 45.0767 33.6566 44.7152 34.0222C44.3536 34.3878 43.9181 34.6719 43.4377 34.8554C42.9574 35.039 42.4433 35.1178 41.93 35.0865L41.9236 35.042ZM41.9236 19.7777H15.2704C14.7608 19.8093 14.2504 19.7323 13.7729 19.5517C13.2953 19.3711 12.8617 19.0911 12.5007 18.7302C12.1397 18.3693 11.8595 17.9359 11.6789 17.4585C11.4982 16.9812 11.4212 16.4709 11.4528 15.9616C11.4222 15.4524 11.5 14.9426 11.681 14.4658C11.862 13.9889 12.1422 13.5559 12.503 13.1952C12.8638 12.8346 13.297 12.5545 13.774 12.3736C14.2511 12.1926 14.7611 12.1149 15.2704 12.1455H41.93C42.4393 12.1149 42.9493 12.1926 43.4264 12.3736C43.9034 12.5545 44.3367 12.8346 44.6975 13.1952C45.0583 13.5559 45.3384 13.9889 45.5194 14.4658C45.7005 14.9426 45.7782 15.4524 45.7476 15.9616C45.7888 16.4761 45.7188 16.9934 45.5424 17.4785C45.366 17.9635 45.0873 18.405 44.7253 18.773C44.3632 19.1409 43.9262 19.4268 43.4439 19.6111C42.9616 19.7954 42.4453 19.8739 41.93 19.8413L41.9236 19.7777Z"
                                        fill="#515151" />
                                </svg>

                                <p class="mt-6 text-xl font-semibold leading-tight text-gray-800 font dark:text-gray-200">SOLICITUDES
                                </p>
                                <p class="mt-2">Solcitudes de bienes/servicios</p>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
